<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/css/main.css">
  <link rel="stylesheet" href="/public/css/components/article.css">
  <link rel="stylesheet" href="/public/css/dashboard.css">
  <title>Libreria - Edex</title>
</head>

<body>
  <?php require_once "src/views/components/header.php" ?>
  <main class="main">
    
    
    <h1>Libros</h1>

    <div id="books"></div>

  </main>
  <?php include("src/views/components/footer.php") ?>
  <script src="/public/js/utils/data.js"></script>
  <script src="/public/js/home.js"></script> 
</body>

</html>