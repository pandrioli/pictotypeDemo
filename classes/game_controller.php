<?php
require_once "game.php";
class GameController {
  private $phrases;
  private $words;
  public function __construct() {
    $this->loadPhrases();
    $this->loadWords();
  }

  public function getNewGame($mode) {
    $phrase = $this->phrases[array_rand($this->phrases)];
    $words = $this->getGameWords($phrase);
    $game = new Game($phrase, $words, $mode);
    return $game;
  }

  private function loadPhrases() {
    $phrases = [];
    $phrases[] = "EL TIEMPO ES TODO EL TIEMPO";
    $phrases[] = "MAS VALE PREVENIR QUE CURAR";
    $phrases[] = "MAS VALE PAJARO EN MANO QUE CIEN VOLANDO";
    $phrases[] = "QUIEN MAL ANDA MAL ACABA";
    $phrases[] = "EN BOCA CERRADA NO ENTRAN MOSCAS";
    $phrases[] = "EL QUE TIENE BOCA SE EQUIVOCA";
    $phrases[] = "AL MAL TIEMPO BUENA CARA";
    $phrases[] = "MAS VALE MAÑA QUE FUERZA";
    $phrases[] = "HAZ BIEN Y NO MIRES A QUIEN";
    $phrases[] = "CUANDO EL RIO SUENA AGUA LLEVA";
    $phrases[] = "DE TAL PALO TAL ASTILLA";
    $phrases[] = "MIENTRAS HAY VIDA HAY ESPERANZA";
    $phrases[] = "QUIEN SIEMBRA VIENTOS RECOGE TEMPESTADES";
    $phrases[] = "EN EL PAIS DE LOS CIEGOS EL TUERTO ES REY";
    $phrases[] = "MUERTO EL PERRO SE ACABO LA RABIA";
    $phrases[] = "NO HAY MAL QUE POR BIEN NO VENGA";
    $phrases[] = "CRIA CUERVOS Y TE SACARAN LOS OJOS";
    $phrases[] = "A QUIEN MADRUGA DIOS LO AYUDA";
    $phrases[] = "DIME CON QUIEN ANDAS Y TE DIRE QUIEN ERES";
    $phrases[] = "DEL DICHO AL HECHO HAY MUCHO TRECHO";
    $phrases[] = "HOMBRE PREVENIDO VALE POR DOS";
    $phrases[] = "MAS VALE MAÑA QUE FUERZA";
    $phrases[] = "DEL ARBOL CAIDO TODOS HACEN LEÑA";
    $phrases[] = "EL HABITO NO HACE AL MONJE";
    $this->phrases = $phrases;
  }
  private function loadWords() {
    $words = [];
    $files = glob("./img/pictotypes/*.jpg");
    foreach ($files as $file) {
      $words[] = pathinfo($file)['filename'];
    }
    $this->words = $words;
  }
  private function getGameWords($phrase) {
    $word_chain = '';
    $phrase = strtolower($phrase);
    $phrase = str_replace("Ñ", "_", $phrase);
    $required_words = [];
    $words = $this->words;
    shuffle($words);
    $letters = array_unique(str_split($phrase));
    shuffle($letters);
    foreach ($letters as $letter) {
      if (strpos($word_chain, $letter)===FALSE) {
        foreach ($words as $word) {
          if ($letter !== ' '
            && strpos($word, $letter) !== FALSE
            && !in_array($word, $required_words)) {
            $required_words[] = $word;
            $word_chain = $word_chain.$word;
            break;
          }
        }
      }
    }
    $cant = count($required_words);
    $results = $required_words;
    foreach ($words as $word) {
      if ($cant==Game::IMAGE_COUNT) break;
      if (!in_array($word, $required_words)) {
        $results[] = $word;
        $cant++;
      }
    }
    $to_shuffle = array_slice($results,0,20);
    shuffle($to_shuffle);
    $last4 = array_slice($results,20,24);
    $results = array_merge($to_shuffle,$last4);
    return $results;
  }
}

 ?>
