#!/usr/bin/env node

const { exec } = require('child_process');
const semver = require('semver');

/**
 * Valid npm version string to use with semver.
 *
 * @type  {string}
 */
const validNpmVersion = '>=3.0.0';
/**
 * Valid node version string to use with semver.
 *
 * @type  {string}
 */
const validNodeVersion = '>=6.11.3';

exec('npm -v', (err, stdout) => {
  if (err) {
    throw err;
  }

  if (!semver.satisfies(stdout, validNpmVersion)) {
    throw new Error('[ERROR: brandonclothier.me] You need npm version @>=3.0.0');
  }
});

exec('node -v', (err, stdout) => {
  if (err) {
    throw err;
  }

  if (!semver.satisfies(stdout, validNodeVersion)) {
    throw new Error('[ERROR: brandonclothier.me] You need node version @>=6.11.3');
  }
});
