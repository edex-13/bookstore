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
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>
  <?php require_once "src/views/components/header.php" ?>
  <main class="main">


    <section class="main_section_one">
      <div class="main_section_left">
        <span class="phrase">"Para viajar lejos no hay mejor nave que un libro."</span>
        <h1 class="title_main">Libreria - Edex</h1>
        <p class="sub_title">Libreria - Edex es una plataforma que permite a los usuarios comprar y vender libros de manera segura y confiable.</p>
        <button class="smallBtn">
          Ver más
        </button>
      </div>
      <div class="main_section_right">
        <img src="/public/icons/plus.svg" alt="Lectura" class="img_secondary_main">
        <img src="/public/icons/person.png" alt="Libros" class="img_main">
        <article class="article_main _1">
          <span class="number_article">01</span>
          <p class="date_article ">Los mejores Libros</p>
        </article>
        <article class="article_main _2">
          <span class="number_article ">02</span>
          <p class="date_article ">Libros a un solo click</p>
        </article>
        <article class="article_main _3">
          <span class="number_article">03</span>
          <p class="date_article ">Acceso de por vida</p>
        </article>
      </div>
    </section>
    <div id="books"></div>

  </main>
  <div class="container">
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-container mySwiper">
      <div class="swiper-wrapper books">

      </div>
    </div>
  </div>

  <?php include("src/views/components/footer.php") ?>
      <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <script src="/public/js/utils/data.js"></script>
  <script src="/public/js/home.js"></script>
</body>

</html>