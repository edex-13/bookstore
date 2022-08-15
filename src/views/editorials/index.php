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
        <form action="#" id="form-editorial" >
          <h1 class="title">Editorial </h1>
          <label for="name">
            Nombre:
            <input type="text" name="name" id="name" placeholder="Panamericana">
          </label>
          <button type="button" onclick="crateEditorial()">Crear</button>
        </form>

      </section>
      <section class="section__dataTable">

        <div id="editorials"></div>
      </section>
    </div>

  </main>
  <?php include("src/views/components/footer.php") ?>

  <script src="/bookstore/public/js/editorials.js"></script>
</body>

</html>