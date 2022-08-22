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
        <form action="#" id="form-invoice" >
          <h1 class="title">Facturas </h1>
          <label for="client">
            Nombre del cliente:
            <input type="text" name="client" id="client" placeholder="Ederson Lopez ">
          </label>
          <label for="book">
            Libros:
            <select name="book" id="books">
              <option value="">Seleccione un libro</option>
            </select>
          </label>
          <button type="button" onclick="crateInvoices()">Crear</button>
        </form>

      </section>
      <section class="section__dataTable">

        <div id="invoices"></div>
      </section>
    </div>

  </main>
  <?php include("src/views/components/footer.php") ?>
  <script src="/bookstore/public/js/utils/data.js"></script>
  <script src="/bookstore/public/js/invoices.js"></script>
</body>

</html>