/* eslint-disable import/no-unresolved, no-restricted-syntax */
const PercyScript = require('@percy/script');
const httpServer = require('http-server');

const PORT = 8001;
const PROD_URL = process.env.npm_config_prodUrl || 'https://www.15five.com';

// A script to navigate our app and take snapshots with Percy.
PercyScript.run(async (percyPage, percySnapshot) => {
  const server = httpServer.createServer();
  server.listen(PORT);

  console.log('Percy server is running'); // eslint-disable-line no-console

  // WordPress pages
  const wpPages = [
    '/',
    '/why-15five/',
    '/why-15five/customer-stories/',
    '/why-15five/the-science/',
    '/about/',
    '/about/careers/',
    '/contact-us/',
    '/refer-a-friend/',
    '/partners/',
    '/partners/technology-partners/',
    '/products/',
    '/products/career-growth/',
    '/products/engagement/high-fives/',
    '/resources/content-library/',
    '/resources/events/',
    '/resources/podcast/',
    '/pricing/',
    '/feature-template/',
    '/company/about/',
    '/company/careers/',
    '/products/education-overview/',
    '/products/community-overview/',
    '/resources/podcasts/',
    '/performance-and-growth/',
    '/ebook/okrs/',
    '/blog/',
    '/blog/posts/',
    '/blog/category/engagement/',
    '/blog/15five-acquisition-emplify-50-million/',
  ];

  // Loop through each page and run Percy
  for (const page of wpPages) {
    console.log(`Page: ${page}`); // eslint-disable-line no-console
    await percyPage.goto(PROD_URL + page); // eslint-disable-line no-await-in-loop
    await percySnapshot(page, { widths: [375, 1440] }); // eslint-disable-line no-await-in-loop
  }

  server.close();
});
