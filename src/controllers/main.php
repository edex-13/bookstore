<?php

class Main extends Controller {
  public function __construct(){
    $this->db = new Database();

    parent::__construct();
    $this->view->render('main/index');
  }

  public function index(){
  }
  public function saludo(){

  

  }
  public function errors (){
    echo "<p>Error</p>";
  }
}
