<?php

class Controller {
  public function __construct() {
    $this->view = new View();

  }

  public function loadModel($model) {
    $url = 'src/models/' . $model . '.php';
    if (file_exists($url)) {
      require $url;
      $model = $model . 'Model';
      $this->model = new $model();
    }
  }
}
