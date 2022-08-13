<?php

class View{
  public function __construct() {
    echo "<p>Nueva vista base</p>";
  }

  public function render($nombre) {
    require 'src/views/' . $nombre . '.php';
  }
}
