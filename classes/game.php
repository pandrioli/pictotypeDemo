<?php
class Game {
  const IMAGE_COUNT = 24;
  private $phrase;
  private $words;
  private $time;
  public function __construct($phrase, $words) {
    $this->phrase = $phrase;
    $this->words = $words;
    $this->time = 0;
  }
  public function getPhrase() {
    return $this->phrase;
  }
  public function getWords() {
    return $this->words;
  }
  public function getTime() {
    return $this->time;
  }
  public function setTime($time) {
    $this->time = $time;
  }
}

 ?>
