<?php

class Admin extends Controller
{
  public function __construct()
  {
    $this->db = new Database();
    parent::__construct();
    
    if (!isset($_SESSION)) {
      session_start();
    }
  }

  public function render()
  {
    parent::validateLogin();
    if (!$this->validateRol('showPage')) {
      header('Location: ' . '/');
      return false;
    }

    $this->view->render('admin/index');
  }

  

  public function index()
  {
      $this->render();
  }
  public function errors()
  {
    echo "<p>Error</p>";
  }
}
