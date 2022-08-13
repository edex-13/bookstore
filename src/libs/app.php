<?php

require_once 'src/controllers/error.php';

class App
{
  public function __construct()
  {
    echo "Nueva app";

    $url = isset($_GET['url']) ? $_GET['url'] : null;

    $url = rtrim($url, '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);

    $url = explode('/', $url);


    if(empty($url[0])){
      $archivoController = 'src/controllers/main.php';
      require_once $archivoController;
      $controller = new Main();
      return false;
    }
    $fileController = 'src/controllers/' . $url[0] . '.php' ;
    

    if (file_exists($fileController)) {
      require_once $fileController;
      $controller = new $url[0];

      $method = isset($url[1]) ? $url[1] : 'index';


      if (method_exists($controller, $method)) {
        $controller->{$method}();
      } else {
        $controller = new Errors();
      }
    } else {
      $controller = new Errors();
    }
  }
}
