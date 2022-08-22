const $form = document.getElementById("form-book");
const $editorials = document.getElementById("editorials");
const $autors = document.getElementById("authors");
const $books = document.getElementById("books");

async function getEditorials() {
  const editorials = await getData(
    "http://localhost/bookstore/editorials/showData"
  );
  if (authors.length > 0 && !editorials.error) {
    appendSelect(editorials , $editorials , "Seleccione una editorial");
  }
}
async function getAuthors() {
  const authors = await getData("http://localhost/bookstore/authors/showData");
  if (authors.length > 0 && !authors.error) {
    appendSelect(authors , $autors , "Seleccione un autor");
  }
}

getAuthors();
getEditorials();

const appendSelect = (data , input , text ) => {
  let view = "<option value=''> " + text +"</option>";
  console.log(data);
  data.forEach((author) => {
    view += `<option value="${author.id}">${author.name}</option>`;
  });
  input.innerHTML = view;
};


async function crateBook() {
  const data = new FormData(document.getElementById("form-book"));
  await setData("http://localhost/bookstore/books/create/", data);
  getBooks();
}
getBooks();

async function getBooks() {
  const books = await getData("http://localhost/bookstore/books/showData");
  if (books.length > 0) {
    renderDataTable(books);
  }
  else {
    $autors.innerHTML =
      "<p>No hay autores registrados</p>";
  }
}

async function deleteBook(id) {
  const data = new FormData();
  data.append("id", id);
  await setData("http://localhost/bookstore/books/delete/", data);

  getBooks();
}

async function update(id, title, author, editorial, isbn, price, description) {
  $form.elements['title'].value = title;
  $form.elements['isbn'].value = isbn;
  $form.elements['price'].value = price;
  $form.elements['description'].value = description;
  $form.elements['authors'].value = author;
  $form.elements['editorials'].value = editorial;
  $form.elements['img'].parentNode.classList.add("hide");

  $form.elements[7].onclick = () => {
    updateBook(id);
  };
  $form.elements[7].textContent = "Actualizar";
}
async function updateBook(id) {
  const data = new FormData($form);
  data.append("id", id);

  await setData("http://localhost/bookstore/books/update/", data);

  getBooks();
  $form.reset();
  $form.elements[7].textContent = "Crear";
}

function renderDataTable(data) {
  const view = data
    .map((book) => {
    const stingBook = JSON.stringify(book)

      return `
      <div>
        <p>${book.id}</p>
        <p>${book.title}</p>
        <p>${book.author}</p>
        <p>${book.editorial}</p>
        <p>${book.isbn}</p>
        <p>${book.price}</p>
        <p>${book.description}</p>
        <img src="${book.image}" alt="${book.title}" width="100">
        <button onclick="update(
          '${book.id}',
          '${book.title}',
          '${book.id_author}',
          '${book.id_editorial}',
          '${book.isbn}',
          '${book.price}',
          '${book.description}',
        )">Update</button>
        <button onclick="deleteBook('${book.id}')">Delete</button>
      </div>
    `;
    })
    .join("");
  $books.innerHTML = view;
}