/* eslint-disable import/no-unresolved, no-restricted-syntax */
const PercyScript = require('@percy/script');
const httpServer = require('http-server');
const fetch = require('node-fetch');

const PORT = 8001;
const LOCALHOST = 'http://localhost:8000';

// A script to navigate our app and take snapshots with Percy.
PercyScript.run(async (percyPage, percySnapshot) => {
  const server = httpServer.createServer();
  server.listen(PORT);

  console.log('Percy server is running'); // eslint-disable-line no-console

  // WordPress pages
  const wpPages = await fetch(`${LOCALHOST}/wp-json/wp/v2/pages?per_page=100`).then((pages) =>
    pages.json(),
  );

  // Loop through each page and run Percy
  for (const page of wpPages) {
    if (page.content.rendered !== '\n' && page.content.rendered !== '') {
      await percyPage.goto(page.link); // eslint-disable-line no-await-in-loop
      await percySnapshot(page.title.rendered, { widths: [1440] }); // eslint-disable-line no-await-in-loop
    }
  }

  server.close();
});
