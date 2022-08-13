<?php

class Main{
  public function __construct(){
    echo "<p>Nuevo controlador</p>";
  }

  public function index(){
    echo "<p>Nueva accion en index</p>";
  }
  public function saludo(){
    echo "<p>Hola</p>";
  }
  public function errors (){
    echo "<p>Error</p>";
  }
}

?>