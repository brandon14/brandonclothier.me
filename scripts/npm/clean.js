#!/usr/bin/env node

// Set up dotenv config to parse .env file into node env.
require('dotenv-expand')(require('dotenv').config());

const fs = require('fs');
const rimraf = require('rimraf');
const { resolve } = require('path');
const addCheckMark = require('./helpers/checkmark.js');
const forEach = require('lodash/forEach');
const filter = require('lodash/filter');

/**
 * Public directory.
 *
 * @type  {string}
 */
const publicDir = process.env.APP_PUBLIC_PATH || 'public';

process.stdout.write('Cleanup started...\n');

/**
 * All files in the public folder excluding index.php.
 *
 * @type  {string[]}
 */
const files = filter(fs.readdirSync(publicDir), (file) => file !== 'index.php' && file !== 'favicon.ico' && file !== 'humans.txt' && file !== 'robots.txt');
// Delete each file/directory.
forEach(files, (file) => {
  const resolvedPath = resolve(publicDir, file);

  rimraf.sync(resolvedPath);
});

addCheckMark();

process.stdout.write('Cleanup done.\n\n');
