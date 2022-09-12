<?php

class View
{
  public function __construct()
  {
  }

  public function render($nombre)
  {
    
    require 'src/views/' . $nombre . '.php';
    $id ;

    if (!isset( $_SESSION['id_role'])) {
      $id = 0;
      return false;
    }else {
      $id = $_SESSION['id_role'];
    }

    echo '
      <script>
        const rol = '.  $id. '
      </script>'
    ;
    
  }
}
