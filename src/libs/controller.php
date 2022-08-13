<?php

class Controller {
  public function __construct() {
    echo "<p>Controlador base</p>";
    $this->view = new View();
    
  }
}
