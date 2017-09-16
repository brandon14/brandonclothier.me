const chalk = require('chalk');

/**
 * Adds mark check symbol.
 *
 * @param  {function}  callback  Callback function to execute
 *                               after displaying checkmark.
 */
const addCheckMark = (callback) => {
  process.stdout.write(chalk.green(' ✓'));

  if (callback) {
    callback();
  }
};

module.exports = addCheckMark;
