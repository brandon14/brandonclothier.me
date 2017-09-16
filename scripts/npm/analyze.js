#!/usr/bin/env node

const shelljs = require('shelljs');
const animateProgress = require('./helpers/progress');
const chalk = require('chalk');
const addCheckMark = require('./helpers/checkmark');

const progress = animateProgress('Generating stats');

/**
 * Called after webpack is done generating the stats.json file.
 *
 * @type  {function}
 */
const callback = () => {
  clearInterval(progress);

  const message = `\n\nOpen ${chalk.magenta('http://webpack.github.io/analyse/')} in your browser and upload the stats.json file!
    ${chalk.blue(`\n(Tip: ${chalk.italic('CMD + double-click')} the link!`)}\n\n`;

  process.stdout.write(message);
};

// Generate stats.json file with webpack
shelljs.exec(
  'webpack --config node_modules/laravel-mix/setup/webpack.config.js --profile --json > ./resources/assetseeeeeeeeeeeeeeeeee/stats.json',
  addCheckMark.bind(null, callback) // Output a checkmark on completion
);
