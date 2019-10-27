<script>
window.onload = function() {
  var spinner = document.getElementById('spinner');
  spinner.onclick = spinit;

  var el = document.querySelectorAll("span[id*=digit]");
  for (i = 0; i < el.length; i++) {
    el[i].addEventListener("animationend", randomize, false);
    el[i].addEventListener("webkitAnimationEnd", randomize, false);
    el[i].addEventListener("oanimationend", randomize, false);
    el[i].addEventListener("MSAnimationEnd", randomize, false);
  }
}

function randomize() {
  var rand = Math.floor(Math.random() * 9);
  this.style.top = -1 * rand + "em";
  this.classList.toggle('animate');
}

function spinit() {
  var el = document.querySelectorAll("span[id*=digit]");
  for (i = 0; i < el.length; i++) {
    el[i].classList.toggle('animate');
  }
}
</script>