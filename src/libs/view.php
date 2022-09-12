<?php

class View
{
  public function __construct()
  {
  }

  public function render($nombre)
  {
      
    $id ;

    if (!isset( $_SESSION['id_role'])) {
      $id = 0;
      return false;
    }else {
      $id = $_SESSION['id_role'];
    }

    require 'src/views/' . $nombre . '.php';
   
    
  }
}
