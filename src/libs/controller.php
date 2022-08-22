<?php

class Controller {
  public function __construct() {
    $this->view = new View();
    if (!isset($_SESSION)) {
      session_start();
    }

  }
  public function validateLogin (){
    if (!isset($_SESSION['id'])) {
      header('Location: ' . '/bookstore/auth/');
    }

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
