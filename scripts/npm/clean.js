#!/usr/bin/env node

// Set up dotenv config to parse .env file into node env.
require('dotenv-expand')(require('dotenv').config());

const fs = require('fs');
const rimraf = require('rimraf');
const { resolve } = require('path');
const addCheckMark = require('./helpers/checkmark.js');
const forEach = require('lodash/forEach');
const filter = require('lodash/filter');
const includes = require('lodash/includes');

/**
 * Webpack asset directory.
 *
 * @type  {string}
 */
const assetDir = process.env.APP_WEBPACK_ASSET_DIR || 'public/assets';
const excludedFiles = [
  '.gitignore',
  'index.php',
  'robots.txt',
  'humans.txt',
];

process.stdout.write('Cleanup started...\n');

if (fs.existsSync(assetDir)) {
  /**
   * All files in the asset directory except for the gitignore file.
   *
   * @type  {string[]}
   */
  const files = filter(fs.readdirSync(assetDir), (file) => !includes(excludedFiles, file));

  // Delete each file/directory.
  forEach(files, (file) => {
    const resolvedPath = resolve(assetDir, file);

    rimraf.sync(resolvedPath);
  });
}

addCheckMark();

process.stdout.write('Cleanup done.\n\n');
