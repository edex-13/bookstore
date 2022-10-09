<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/css/main.css">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="/public/css/dashboard.css">
  <title>Libreria - Edex</title>
</head>

<body>
  <?php require_once "src/views/components/header.php" ?>
  <main class="main">

    <div class="container">


      <section class="section__form">


      </section>
      <section class="section__dataTable-books">
        <h2>Reporte</h2>
        <div id="books"></div>
      </section>
    </div>

  </main>
  <?php include("src/views/components/footer.php") ?>
  <script src="/public/js/utils/data.js"></script>
  <script src="/public/js/utils/rol.js"></script>

  <script src="/public/js/report.js"></script>
</body>

</html>