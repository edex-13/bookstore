<?php
if (!isset($_SESSION)) {
  session_start();
}

?>

<link rel="stylesheet" href="/public/components/menu.css">

<style>
  nav {

    padding: 0 20px;
    display: flex;
    justify-content: space-between;
    padding: 0 24px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.046805);
  }

  .content {
    width: 90%;
    margin: 0 auto;
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
    color: var(--very-light-pink);
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
    display: flex;
    align-items: center;
  }

  .mobile-menu {
    z-index: 100;
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    background: var(--white);
    padding: 24px;
    visibility: hidden;
    opacity: 0;
    transition: all 0.3s ease-in-out;
  }

  .menuActive {
    opacity: 1;
    visibility: visible;
    transition: all 0.3s ease-in-out;
  }

  .mobile-menu a {
    text-decoration: none;
    color: var(--black);
    font-weight: 500;
    /* margin-bottom: 24px; */
  }

  .mobile-menu ul {
    padding: 0;
    margin: 24px 0 0;
    list-style: none;
  }



  .mobile-menu ul li {
    margin-bottom: 24px;
  }

  .email {
    font-size: var(--sm);
    font-weight: 300 !important;
  }

  .sign-out {
    font-size: var(--sm);
    color: var(--hospital-green) !important;
  }


  .desktop-menu {
    width: 200px;
    height: auto;
    border: 1px solid var(--hospital-green);
    border-radius: 6px;
    padding: 20px 20px 0 20px;
    background-color: white;
    box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.119789);

    position: absolute;
    top: 80px;
    right: 0;
    z-index: 10;

  }

  .hiden {
    display: none;
  }

  .rotate {
    transform: rotate(180deg);
    transition: transform 0.3s ease-in-out;
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

  .mobil_menu-close {
    margin-top: 10px;
    margin-left: calc(100% - 15px);
  }

  .navbar-email {
    cursor: pointer;
  }

  body li>a.diferetente {
    font-weight: 600;
    color: #505050;
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

<div class="mobile-menu">
  <img src="/public/icons/icon_close.svg" alt="menu" class="mobil_menu-close">

  <ul style="    border-bottom: 1px solid var(--very-light-pink);">
    <?php if (isset($_SESSION["username"]) &&  $_SESSION["id_role"] != 4) : ?>
      <li><a href="/">Home</a></li>
      <li><a href="/books">Libros</a></li>
      <li><a href="/authors">Autores</a></li>
      <li><a href="/editorials">Editorial</a></li>
      <li><a href="/invoices">Facturas</a></li>

    <?php else : ?>
      <li><a class="diferetente" href="/auth/">Iniciar Sesion</a></li>
      <li><a href="/">Home</a></li>
    <?php endif ?>
  </ul>

  <?php if (isset($_SESSION["username"])) : ?>
    <ul>
      <li>
        <a href="/auth/profile">Cambiar Contraseña</a>
      </li>

    </ul>

    <ul>
      <li>
        <a href="#" class="email"><?php echo $_SESSION["username"] ?? ""; ?></a>
      </li>
      <li>
      <li><a href="/auth/logout" class="sign-out">Cerrar Sesion</a></li>

      </li>
    </ul>
  <?php endif ?>
</div>
<nav>
    <img src="/public/icons/icon_menu.svg" alt="menu" class="mobil_menu-open menu">

    <div class="navbar-left">
      <a href="/">
        <img src="/public/logo.png" alt="logo" class="logo">
      </a>

      <ul>
        <?php if (isset($_SESSION["username"]) &&  $_SESSION["id_role"] != 4) : ?>
          <li><a href="/">Home</a></li>
          <li><a href="/books">Libros</a></li>
          <li><a href="/authors">Autores</a></li>
          <li><a href="/editorials">Editorial</a></li>
          <li><a href="/invoices">Facturas</a></li>

        <?php else : ?>
          <li><a class="diferetente" href="/auth/">Iniciar Sesion</a></li>
          <li><a href="/">Home</a></li>
        <?php endif ?>
      </ul>
    </div>

    <div class="navbar-right">
      <?php if (isset($_SESSION["username"])) : ?>

        <ul>
          <li class="navbar-email">
            <?php print_r($_SESSION["username"])  ?? ""; ?>
            <img width="15" src="/public/icons/arrow.svg" alt="">
          </li>
        </ul>
        <div class="desktop-menu hide">
          <ul>
            <li>
              <a href="/auth/profile" class="title">Cambiar Contraseña</a>
            </li>

            <li><a href="/auth/logout">Cerrar Sesion</a></li>


          </ul>
        </div>
      <?php endif ?>
    </div>

</nav>

<script src="/public/js/menu.js"></script>