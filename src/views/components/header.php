<?php
if (!isset($_SESSION)) {
  session_start();
}

?>

<link rel="stylesheet" href="/bookstore/public/css/components/menu.css">

<style>
  :root {
    --white: #FFFFFF;
    --black: #000000;
    --very-light-pink: #C7C7C7;
    --text-input-field: #F7F7F7;
    --hospital-green: #ACD9B2;
    --sm: 14px;
    --md: 16px;
    --lg: 18px;
  }

  nav {
    display: flex;
    justify-content: space-between;
    padding: 0 24px;
    border-bottom: 1px solid var(--hospital-green);
  }

  .menu {
    display: none;
  }

  .logo {
    width: 100px;
  }

  .navbar-left>ul,
  .navbar-right>ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    align-items: center;
    height: 60px;
  }

  .navbar-left {
    display: flex;
    align-items: center;
  }

  .navbar-left>ul {
    margin-left: 12px;
  }

  .navbar-left>ul li a,
  .navbar-right>ul li a {
    text-decoration: none;
    color: var(  --very-light-pink);
    border: 1px solid var(--white);
    padding: 8px;
    border-radius: 8px;
  }

  .navbar-left>ul li a:hover,
  .navbar-right>ul li a:hover {
    border: 1px solid var(--hospital-green);
    color: var(--hospital-green);
  }

  .navbar-right {
    position: relative;
  }




  .desktop-menu {
    width: 200px;
    height: auto;
    border: 1px solid var(--hospital-green);
    border-radius: 6px;
    padding: 20px 20px 0 20px;
    background-color: white;
    box-shadow: -1px 1px 9px 0px rgb(0 0 0 / 20%);

    position: absolute;
    top: 50;
    right: 0;

  }

  .desktop-menu>ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .desktop-menu ul li {
    text-align: end;
  }

  .desktop-menu ul li:nth-child(1),
  .desktop-menu ul li:nth-child(2) {
    font-weight: bold;
  }

  .desktop-menu ul li:last-child {
    padding-top: 20px;
    border-top: 1px solid var(--hospital-green);
  }

  .desktop-menu ul li:last-child a {
    color: var(--hospital-green);
    font-size: var(--sm);
  }

  .desktop-menu ul li a {
    color: var(--back);
    text-decoration: none;
    margin-bottom: 20px;
    display: inline-block;
  }

  @media (max-width: 640px) {
    .menu {
      display: block;
    }

    .navbar-left ul {
      display: none;
    }

    .navbar-email {
      display: none;
    }
  }
</style>


<nav>
  <img src="./icons/icon_menu.svg" alt="menu" class="menu">

  <div class="navbar-left">
    <img src="/bookstore/public/logo.png" alt="logo" class="logo">

    <ul>
      <li><a href="/bookstore">Inicio</a></li>
      <?php if (isset($_SESSION["username"]) &&  $_SESSION["id_role"] != 4) : ?>
        <li><a href="/bookstore/books">Libros</a></li>
        <li><a href="/bookstore/authors">Autores</a></li>
        <li><a href="/bookstore/editorials">Editorial</a></li>
        <li><a href="/bookstore/invoices">Facturas</a></li>

      <?php else : ?>
        <li><a href="/bookstore/auth/">Iniciar Sesion</a></li>
      <?php endif ?>
    </ul>
  </div>

  <div class="navbar-right">
    <ul>
      <li class="navbar-email">
        <?php echo $_SESSION["username"] ?? ""; ?>
      </li>
    </ul>
    <div class="desktop-menu">
      <ul>
        <li>
          <a href="/bookstore/auth/profile" class="title">Cambiar Contraseña</a>
        </li>

        


        <li><a href="/bookstore/auth/logout">Cerrar Sesion</a></li>


      </ul>
    </div>
  </div>
</nav>