<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/css/main.css">
  <link rel="stylesheet" href="/public/css/dashboard.css">
  <title>Libreria - Edex</title>
</head>

<body>
  <?php require_once "src/views/components/header.php" ?>
  <main class="main">
    
    <div class="container">
      
      
      <section class="section__form">
        <form action="/auth/login" id="form-login" method="POST" >
          <h1 class="title">Iniciar Sesión </h1>
          <label for="username">
            username:
            <input type="text" name="username" id="username" placeholder="edex">
          </label>
          <label for="password">
            password:
            <input type="password" name="password" id="password" placeholder="*********">
          </label>
          <button type="sutmit" >Login</button>
        </form>

      </section>
    </div>

  </main>
  <?php include("src/views/components/footer.php") ?>
</body>

</html>