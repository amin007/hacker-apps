div {
  width: 1em;
  height: 1em;
  overflow: hidden;
  line-height: 1em;
  display: inline-block;
}
span {
  position: relative;
}
.animate {
  -webkit-animation: spinit 0.2s 5;
  -moz-animation: spinit 0.2s 5;
  animation: spinit 0.2s 5;
}
@-webkit-keyframes spinit {
  0% { top: 0em; }
  9.9% { top: 0em; }
  10%{ top: -1em; }
  19.9%{ top: -1em; }
  20%{ top: -2em; }
  29.9%{ top: -2em; }
  30%{ top: -3em; }
  39.9%{ top: -3em; }
  40%{ top: -4em; }
  49.9%{ top: -4em; }
  50% { top: -5em; }
  59.9%{ top: -5em; }
  60%{ top: -6em; }
  69.9%{ top: -6em; }
  70%{ top: -7em; }
  79.9%{ top: -7em; }
  80%{ top: -8em; }
  89.9%{ top: -8em; }
  90%{ top: -9em; }
  99.9%{ top: -9em; }
  100% { top: -9em; }
}
@-moz-keyframes spinit {
  0% { top: 0em; }
  9.9% { top: 0em; }
  10%{ top: -1em; }
  19.9%{ top: -1em; }
  20%{ top: -2em; }
  29.9%{ top: -2em; }
  30%{ top: -3em; }
  39.9%{ top: -3em; }
  40%{ top: -4em; }
  49.9%{ top: -4em; }
  50% { top: -5em; }
  59.9%{ top: -5em; }
  60%{ top: -6em; }
  69.9%{ top: -6em; }
  70%{ top: -7em; }
  79.9%{ top: -7em; }
  80%{ top: -8em; }
  89.9%{ top: -8em; }
  90%{ top: -9em; }
  99.9%{ top: -9em; }
  100% { top: -9em; }
}
@keyframes spinit {
  0% { top: 0em; }
  9.9% { top: 0em; }
  10%{ top: -1em; }
  19.9%{ top: -1em; }
  20%{ top: -2em; }
  29.9%{ top: -2em; }
  30%{ top: -3em; }
  39.9%{ top: -3em; }
  40%{ top: -4em; }
  49.9%{ top: -4em; }
  50% { top: -5em; }
  59.9%{ top: -5em; }
  60%{ top: -6em; }
  69.9%{ top: -6em; }
  70%{ top: -7em; }
  79.9%{ top: -7em; }
  80%{ top: -8em; }
  89.9%{ top: -8em; }
  90%{ top: -9em; }
  99.9%{ top: -9em; }
  100% { top: -9em; }
}

/* Set the value according to the on-load position of the spinner */

#digit1 {
  top: -4em;
  /* -4em means 5 will be the number */
}
#digit2 {
  top: -2em;
}
#digit3 {
  top: 0em;
}
<div>
  <span id='digit1'>1 2 3 4 5 6 7 8 9 0</span>
</div>

<div>
  <span id='digit2'>1 2 3 4 5 6 7 8 9 0</span>
</div>

<div>
  <span id='digit3'>1 2 3 4 5 6 7 8 9 0</span>
</div>

<button id='spinner'>Spin It</button>