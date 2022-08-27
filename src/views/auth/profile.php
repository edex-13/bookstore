<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/bookstore/public/css/main.css">
  <link rel="stylesheet" href="/bookstore/public/css/dashboard.css">
  <title>Libreria - Edex</title>
</head>

<body>
  <?php require_once "src/views/components/header.php" ?>
  <main class="main">
    <?php require_once "src/views/components/menu.php" ?>
    <div class="container">
      
      
      <section class="section__form">
        <form action="#" id="form-password" method="POST" >
          <h1 class="title">Cambiar contraseña </h1>
          <label for="password">
            Contraseña actual:
            <input type="password" name="password" id="password" placeholder="*********">
          </label>
          <label for="newPassword">
            Nueva contraseña:
            <input type="password" name="newPassword" id="newPassword" placeholder="xxxxxxxx">
          </label>
          <button type="button" onclick="changePassword()">Aceptar</button>
        </form>

      </section>
    </div>

  </main>
  <?php include("src/views/components/footer.php") ?>
  <script src="/bookstore/public/js/utils/data.js"></script>

  <script src="/bookstore/public/js/profile.js"></script>
</body>

</html>