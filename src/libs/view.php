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
    }else {
      $id = $_SESSION['id_role'];
    }

    echo '
      <script>
        const rol = '.  $id. '
      </script>'
    ;
    require 'src/views/' . $nombre . '.php';
    
  }
}
