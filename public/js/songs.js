const music = document.querySelector("#songs");
const btnStart = document.querySelector("#btn-play");
const btnStop = document.querySelector("#btn-stop");
btnStart.addEventListener("click", () => {
  music.play();
});
btnStop.addEventListener("click", () => {
  music.pause();
});