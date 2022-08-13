<?php

class View{
  public function __construct() {
  }

  public function render($nombre) {
    require 'src/views/' . $nombre . '.php';
  }
}
