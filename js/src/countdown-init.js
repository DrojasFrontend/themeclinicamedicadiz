function countdownTimer(seconds) {
  if (seconds <= 0) {
    document.getElementById("countdown-timer").innerHTML = "Countdown Ended";
  } else {
    var c_days = Math.floor(seconds / (60 * 60 * 24));
    var c_hrs = Math.floor((seconds % (60 * 60 * 24)) / (60 * 60));
    var c_min = Math.floor((seconds % (60 * 60)) / 60);
    var c_sec = Math.floor(seconds % 60);

    document.getElementById("countdown-timer").innerHTML =
      "<div>" +
      c_days +
      "<span>Días</span></div>" +
      "<div>" +
      c_hrs +
      " <span>Horas</span></div>" +
      "<div>" +
      c_min +
      " <span>Minutos</span></div>" +
      "<div>" +
      c_sec +
      " <span>Segundos</span></div>";

    setTimeout(function () {
      countdownTimer(seconds - 1);
    }, 1000);
  }
}

export { countdownTimer }; // Exportar la función countdownTimer
