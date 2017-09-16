const readline = require('readline');

/**
 * Adds an animated progress indicator.
 *
 * @param  {string}  message       Message to write next to the indicator
 * @param  {number}  amountOfDots  Amount of dots you want to animate
 */
const animateProgress = (message, amountOfDots) => {
  let dots = amountOfDots;
  let i = 0;

  if (typeof dots !== 'number') {
    dots = 3;
  }

  return setInterval(() => {
    readline.cursorTo(process.stdout, 0);

    i = (i + 1) % (dots + 1);
    const dotString = new Array(i + 1).join('.');

    process.stdout.write(`${message}${dotString}`);
  }, 500);
};

module.exports = animateProgress;
