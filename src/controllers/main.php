<?php

class Main extends Controller {
  public function __construct(){
    $this->db = new Database();

    parent::__construct();
    
  }

  public function index(){
  }
  public function render(){
    $this->view->render('main/index');
  }
  public function errors (){
    echo "<p>Error</p>";
  }
}
