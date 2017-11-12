<?php
require_once 'resources.php';
$mode = isset($_GET['mode']) ? $_GET['mode'] : 1;
$game = $game_controller->getNewGame($mode);
$title = "PictoType test";
//var_dump($game);
//exit;
?>
<!DOCTYPE html>
<html>
  <?php require_once "includes/head.php" ?>
  <body onload="start()">
    <div class="loader" id="game-loader">CARGANDO PARTIDA</div>
    <div class="vertical-parent"><div class="vertical-child">
    <section class="game-container" id="game-container" hidden>
      <div id="game-mode" hidden><?=$game->getMode();?></div>
      <div id="phrase-text" hidden><?=$game->getPhrase();?></div>
      <div id="image-count" hidden><?=Game::IMAGE_COUNT;?></div>
      <div class="game-panel game-phrase" id="phrase">
        <div id="done-text"></div><div id="current-letter"></div><div id="remaining-text"></div>
      </div>
      <div class="game-panel game-timer" id="timer">
      </div>
      <a class="game-panel game-cancel" href="index.php">
        X
      </a>
      <div class="game-images-container" id="images-container">
        <?php foreach($game->getWords() as $word) : ?>
          <div>
            <img src='img/pictotypes/<?=$word?>.jpg' onclick="image_click(this)"  id='word-<?=$word?>'/>
            <span><?=str_replace("_","ñ",$word);?></span>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="game-popup" id="game-popup"></div>
      <div class="game-popup" id="letter-timer"></div>
    </section>
    </div></div>
  </body>
</html>
