/* eslint-disable import/no-unresolved, no-restricted-syntax */
const psi = require('psi');
const { IncomingWebhook } = require('@slack/webhook');

// Page Speed Insights API
const STAGING_SITE_URL =
  process.env.npm_config_STAGING_SITE_URL || 'https://www15fivev2stg.wpengine.com';
const STAGING_BLOG_URL =
  process.env.npm_config_STAGING_BLOG_URL || 'https://blog15five2stg.wpengine.com';
const PSI_API_KEY = 'AIzaSyBGeDUq75dNUY-8hRLZI-bQMY9cABbZPdk';
const SLACK_WEBHOOK_URL =
  'https://hooks.slack.com/services/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';

// Initialize
const slackWebhook = new IncomingWebhook(SLACK_WEBHOOK_URL);

const testPage = async (page, siteURL) => {
  try {
    // // Mobile report
    // await psi.output(STAGING_URL, {
    //   key: PSI_API_KEY,
    //   strategy: 'mobile',
    //   threshold: '90',
    // });

    // // Desktop report
    // await psi.output(STAGING_URL, {
    //   key: PSI_API_KEY,
    //   strategy: 'desktop',
    //   threshold: '90',
    // });

    // Scores
    const mobileData = await psi(siteURL + page, {
      key: PSI_API_KEY,
      strategy: 'mobile',
    });
    const desktopData = await psi(siteURL + page, {
      key: PSI_API_KEY,
      strategy: 'desktop',
    });

    /* eslint-disable-next-line no-console */
    console.log(
      'Performance Score (Mobile):',
      mobileData.data.lighthouseResult.categories.performance.score,
    );
    /* eslint-disable-next-line no-console */
    console.log(
      'Performance Score (Desktop):',
      desktopData.data.lighthouseResult.categories.performance.score,
    );

    // Send notification to Slack channel
    (async () => {
      await slackWebhook.send({
        blocks: [
          {
            type: 'section',
            text: {
              type: 'mrkdwn',
              text: '*Page Speed Insights Scores*',
            },
          },
          {
            type: 'section',
            fields: [
              {
                type: 'mrkdwn',
                text: `*Mobile:*\n${mobileData.data.lighthouseResult.categories.performance.score}`,
              },
              {
                type: 'mrkdwn',
                text: `*Desktop:*\n${desktopData.data.lighthouseResult.categories.performance.score}`,
              },
            ],
          },
          {
            type: 'section',
            text: {
              type: 'mrkdwn',
              // eslint-disable-next-line max-len
              text: `Check the Page Speed Insights <${siteURL + page}|${
                siteURL + page
              }> <https://developers.google.com/speed/pagespeed/insights/?url=https%3A%2F%2F${
                (siteURL + page).split('https://')[1]
              }|report>`,
            },
          },
        ],
      });
    })();
  } catch (error) {
    console.error(error); // eslint-disable-line no-console
  }
};

const sitePages = [
  '/',
  '/resources/content-library/',
  '/content-category/performance-and-growth/',
  '/products/',
  '/feature-template/',
  '/company/about/',
  '/company/careers/',
  '/products/education-overview/',
  '/products/community-overview/',
  '/resources/podcasts/',
];

const blogPages = ['/', '/posts/', '/category/engagement/'];

for (const page of sitePages) {
  testPage(page, STAGING_SITE_URL);
}
for (const page of blogPages) {
  testPage(page, STAGING_BLOG_URL);
}
