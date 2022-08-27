const $books = document.getElementById("books");

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
      <article class="book">
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
  }
  );
  $books.innerHTML = view;
}