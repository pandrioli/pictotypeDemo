<?php
class Game {
  const IMAGE_COUNT = 24;
  private $phrase;
  private $words;
  private $mode;
  private $time;
  private $score;
  public function __construct($phrase, $words, $mode) {
    $this->phrase = $phrase;
    $this->words = $words;
    $this->mode = $mode;
    $this->time = 0;
  }
  public function getPhrase() {
    return $this->phrase;
  }
  public function getWords() {
    return $this->words;
  }
  public function getMode() {
    return $this->mode;
  }
  public function getTime() {
    return $this->time;
  }
  public function setTime($time) {
    $this->time = $time;
  }
  public function getScore() {
    return $this->time;
  }
  public function setScore($time) {
    $this->time = $time;
  }
}

 ?>
