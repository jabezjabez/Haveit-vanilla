const start = document.getElementById('start');
const reset = document.getElementById('reset');

const h = document.getElementById('hour');
const m = document.getElementById('minute');
const s = document.getElementById('sec');

// store a reference to the startTimer variable
let startTimer = null;

// initialize the timer interval when the Start button is clicked
start.addEventListener('click', () => {
  function startTimerInterval() {
    startTimer = setInterval(() => {
      timer();
    }, 1000);
  }
  startTimerInterval();
});

// reset the timer when the Reset button is clicked
reset.addEventListener('click', () => {
  h.value = 0;
  m.value = 0;
  s.value = 60;
  stopInterval();
});

// decrement the timer values every second
function timer() {
  if (h.value == 0 && m.value == 0 && s.value == 0) {
    h.value = 0;
    m.value = 0;
    s.value = 0;
  } else if (s.value > 0) {
    s.value--;
  } else if (m.value > 0 && s.value == 0) {
    s.value = 59;
    m.value--;
  } else if (h.value > 0 && m.value == 0) {
    m.value = 59;
    h.value--;
  }
  return;
}


// stop the timer interval when the Reset button is clicked
function stopInterval() {
  clearInterval(startTimer);
}
