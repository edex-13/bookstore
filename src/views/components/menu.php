<?php
if (!isset($_SESSION)) {
  session_start();
}

?>

<link rel="stylesheet" href="/bookstore/public/css/components/menu.css">
<nav class="menu">
  <ul>
    <li><a href="/bookstore">Inicio</a></li>


    <?php if (isset($_SESSION["username"])) : ?>
      <li><a href="/bookstore/books">Libros</a></li>
      <li><a href="/bookstore/authors">Autores</a></li>
      <li><a href="/bookstore/editorials">Editorial</a></li>
      <li><a href="/bookstore/invoices">Facturas</a></li>
      <li><a href="/bookstore/auth/logout">Cerrar Sesion</a></li>
    <?php endif ?>


  </ul>
</nav>