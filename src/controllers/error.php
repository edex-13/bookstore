<?php

class Errors extends Controller{
  public function __construct() {
    parent::__construct();
    $this->view->message = "Error 404";
    $this->view->render('error/index');
  }
}

?>