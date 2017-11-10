<?php
require_once 'resources.php';
$game = $game_controller->getNewGame();
//var_dump($game);
//exit;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono" rel="stylesheet">
    <title>PictoType Test</title>
    <script type="text/javascript" src="js/TweenLite.min.js"></script>
    <script type="text/javascript" src="js/CSSPlugin.min.js"></script>
    <script type="text/javascript" src="js/game.js"></script>
  </head>
  <body onload="start()">
    <div class="loader" id="game-loader">CARGANDO PARTIDA</div>
    <div class="vertical-parent"><div class="vertical-child">
    <section class="game-container" id="game-container" hidden>
      <div id="phrase-text" hidden><?=$game->getPhrase();?></div>
      <div id="image-count" hidden><?=Game::IMAGE_COUNT;?></div>
      <div class="game-panel game-phrase" id="phrase">
        <div id="done-text"></div><div id="current-letter"></div><div id="remaining-text"></div>
      </div>
      <div class="game-panel game-timer" id="timer">
      </div>
      <div class="game-panel game-cancel" id="cancel" onclick="cancel_game()">
      </div>
      <div class="game-images-container">
        <?php foreach($game->getWords() as $word) : ?>
          <div>
            <img src='img/pictotypes/<?=$word?>.jpg' onclick="image_click(this)"  id='word-<?=$word?>'/>
            <span><?=str_replace("_","ñ",$word);?></span>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="game-popup" id="game-popup"></div>
    </section>
    </div></div>
  </body>
</html>
