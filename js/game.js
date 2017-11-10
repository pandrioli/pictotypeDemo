var time;
var timer;
var phrase = "";
var current_letter;
var win;

function start() {
  win = false;
  time = 0;
  timer = setInterval(refresh_time, 100);
  current_letter = 0;
  document.getElementById("game-container").hidden = false;
  document.getElementById("game-loader").hidden = true;
  phrase = document.getElementById("phrase-text").innerHTML;
  refresh_phrase();
  show_popup("¡EMPIEZA!", "green", false);
}

function image_click(image) {
  if (win) return;
  var word = image.id.substring(5);
  var right_image = check_word(word);
  parent_div = image.parentElement;
  if (right_image) {
    parent_div.style.backgroundColor = "green";
  } else {
    parent_div.style.backgroundColor = "red";
  }
  TweenLite.to(image, .3, {opacity: .3, ease: Power3.easeOut, onComplete: function() {
    TweenLite.to(image, .1, {opacity: 1, ease: Power3.easeOut});
  }});
}

function check_word(word) {
  if (word.search(get_current_letter())>-1) return right_word(); else return wrong_word();
}

function right_word() {
  current_letter++;
  if (get_current_letter() == " ") current_letter++;
  if (current_letter == phrase.length) {
    win_game();
  } else {
    show_popup("¡BIEN!", "green", false);
  }
  refresh_phrase();
  return true;
}

function wrong_word() {
  current_letter = 0;
  refresh_phrase();
  show_popup("¡OUCH!", "red", false);
  return false;
}

function show_popup(msg, color, stay) {
  popup = document.getElementById("game-popup");
  popup.innerHTML = msg;
  //popup.style.color = color;
  TweenLite.to(popup, .5, {opacity: 1, scale: 2, delay: .3, ease: Power3.easeOut, onComplete: function() {
    if (!stay) TweenLite.to(popup, .5, {opacity:0, scale: 1, ease: Power3.easeOut});
  }});
}

function get_current_letter() {
  return phrase.substring(current_letter, current_letter+1).toLowerCase().replace(/ñ/g, "_");
}

function refresh_phrase() {
  var done = phrase.substring(0,current_letter).replace(/ /g, "&nbsp");
  var remaining = phrase.substring(current_letter+1).replace(" ", "&nbsp");
  if (!win) document.getElementById("current-letter").innerHTML = get_current_letter().toUpperCase().replace("_", "Ñ");
  else document.getElementById("current-letter").innerHTML = "";
  document.getElementById("done-text").innerHTML = done;
  document.getElementById("remaining-text").innerHTML = remaining;
}

function refresh_time() {
  zero_decimals = "";
  zero_seconds = "";
  time++;
  total_seconds = time/10;
  floor_seconds = Math.floor(total_seconds);
  decimals = Math.floor(60 * (total_seconds - floor_seconds));
  seconds = floor_seconds % 60;
  minutes = Math.floor(floor_seconds/60);
  if (decimals<10) zero_decimals = "0";
  if (seconds<10) zero_seconds = "0";
  document.getElementById("timer").innerHTML = minutes + ":" + zero_seconds + seconds + "." + zero_decimals + decimals;
  //document.getElementById("timer").innerHTML = floor_seconds;
}

function win_game() {
  win = true;
  clearInterval(timer);
  show_popup("¡LISTO!", "blue", true);
  var popup = document.getElementById("game-popup");
  popup.onclick = function() {
    location.reload();
  }
  popup.style.pointerEvents = "auto";
  popup.style.cursor = "pointer";
}

function cancel_game() {
  location.reload();
}
