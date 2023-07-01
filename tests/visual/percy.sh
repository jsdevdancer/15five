#!/usr/bin/env bash

export PERCY_TOKEN=48dedfafd62002a44a765b97745f2e0ceb7fac2b9f2d2b4d7b00e2d3d10fd87e
export STAGING_URL=https://15five.dengar.dengun.net
npm run snapshots --testUrl=$STAGING_URL