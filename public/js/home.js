const $books = document.querySelector(".books");
const a = () => {
  const swiper = new Swiper(".swiper-container", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination",
      type: "bullets",
      clickable: true,
    },
    scrollbar: {
      el: ".swiper-scrollbar",
      draggable: true,
    },

    breakpoints: {
      620: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      680: {
        slidesPerView: 2,
        spaceBetween: 40,
      },
      920: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
      1240: {
        slidesPerView: 4,
        spaceBetween: 50,
      },
    },
  });
};

async function getBooks() {
  const books = await getData("/books/showData");
  if (books.length > 0) {
    render(books);
  } else {
    $books.innerHTML = "<p>No hay autores registrados</p>";
  }
}
getBooks();

function render(books) {
  let view = "";
  books.forEach((book) => {
    view += `
      <article class="book swiper-slide">
        <section class="book-img" style="background-image:url('${book.image}')">
          <section class="book-data s">
            <p>${book.description}</p>

          </section>
        </section>
        
        <section class="book-info">
          <p>${book.title}</p>
          <span>${book.author}</span>
          <p>$ ${book.price}</p>
        </section>
      </article>
    `;
  });
  $books.innerHTML = view;
  a();


  
}
