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
        

      </section>
      <section class="section__dataTable">
        <h2>Lista de editoriales creadas</h2>
        <div id="editorials"></div>
      </section>
    </div>

  </main>
  <?php include("src/views/components/footer.php") ?>
  <script src="/bookstore/public/js/utils/data.js"></script>
  <script src="/bookstore/public/js/utils/rol.js"></script>

  <script src="/bookstore/public/js/editorials.js"></script>
</body>

</html>