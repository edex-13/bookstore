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
        <form action="#" id="form-book" >
          <h1 class="title">Books </h1>
          <label for="title">
            Titulo:
            <input type="text" name="title" id="title" placeholder="Cien años de soledad">
          </label>
          <label for="isbn">
            isbn:
            <input type="text" name="isbn" id="isbn" placeholder="453454654">
          </label>
          <label for="price">
            Precio:
            <input type="text" name="price" id="price" placeholder="10000">
          </label>
          <label for="editorials">
            Editorial:
            <select name="editorials" id="editorials">
              <option value="">Seleccione una editorial</option>
            </select>
          </label>
          <label for="authors">
            Autor:
            <select name="authors" id="authors">
              <option value="">Seleccione un autor</option>
            </select>
          </label>
          <label for="img">
            Imagen:
            <input type="file" name="img" id="img">
          </label>
          <textarea name="description" id="description" cols="30" rows="10"></textarea>
          <button type="button" onclick="crateBook()">Crear</button>
        </form>

      </section>
      <section class="section__dataTable">

        <div id="books"></div>
      </section>
    </div>

  </main>
  <?php include("src/views/components/footer.php") ?>
  <script src="/bookstore/public/js/utils/data.js"></script>
  <script src="/bookstore/public/js/books.js"></script>
</body>

</html>