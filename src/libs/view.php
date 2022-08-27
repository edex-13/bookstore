<?php

class View
{
  public function __construct()
  {
  }

  public function render($nombre)
  {
    echo '
      <script>
        const rol = '. (isset($_SESSION['id_role']) ?: ""). '
      </script>'
    ;
    require 'src/views/' . $nombre . '.php';
    
  }
}
