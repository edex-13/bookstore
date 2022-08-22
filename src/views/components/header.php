<style>
  .header {
    width: 90%;
    height: 70px;
    margin: 0 auto;
    padding: 0 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
</style>

<header class="header">
  <section>LOGO</section>
  <section>

    <?php
    if (!isset($_SESSION)) {
      session_start();
    }
    echo $_SESSION["username"] ?? "<a href='/bookstore/auth/'>Inicia Sesion</a>";
    ?>
  </section>
</header>