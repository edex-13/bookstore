const $containerForm = document.querySelector(".section__form");
if (validateRole("create")) {
  $containerForm.innerHTML = `
  <form action="#" id="form-book" >
    <h1 class="title">Books </h1>
    <div class="form-groups">
      <div class="form-groud">
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
      </div>
      <div class="form-groud">
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
      </div>
    </div>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    <button type="button" onclick="crateBook()">Crear</button>
  </form>
`;
  getAuthors();
  getEditorials();
}
getBooks();

const $form = document.getElementById("form-book");
const $editorials = document.getElementById("editorials");
const $autors = document.getElementById("authors");
const $books = document.getElementById("books");

async function getEditorials() {
  const editorials = await getData(
    "/editorials/showData"
  );
  if (authors.length > 0 && !editorials.error) {
    appendSelect(editorials, $editorials, "Seleccione una editorial");
  }
}
async function getAuthors() {
  const authors = await getData("/authors/showData");
  if (authors.length > 0 && !authors.error) {
    appendSelect(authors, $autors, "Seleccione un autor");
  }
}

const appendSelect = (data, input, text) => {
  let view = "<option value=''> " + text + "</option>";
  console.log(data);
  data.forEach((author) => {
    view += `<option value="${author.id}">${author.name}</option>`;
  });
  input.innerHTML = view;
};

async function crateBook() {
  const data = new FormData($form);
  await setData("/books/create/", data);
  getBooks();
  $form.reset();

}

async function getBooks() {
  const books = await getData("/books/showData");
  if (books.length > 0) {
    renderDataTable(books);
  } else {
    $books.innerHTML = "<p>No hay autores registrados</p>";
  }
}

async function deleteBook(id) {
  const data = new FormData();
  data.append("id", id);
  await setData("/books/delete/", data);

  getBooks();
}

async function update(id, title, author, editorial, isbn, price, description) {
  $form.elements["title"].value = title;
  $form.elements["isbn"].value = isbn;
  $form.elements["price"].value = price;
  $form.elements["description"].value = description;
  $form.elements["authors"].value = author;
  $form.elements["editorials"].value = editorial;
  $form.elements["img"].parentNode.classList.add("hide");

  $form.elements[7].onclick = () => {
    updateBook(id);
  };
  $form.elements[7].textContent = "Actualizar";
}
async function updateBook(id) {
  const data = new FormData($form);
  data.append("id", id);

  await setData("/books/update/", data);

  getBooks();
  $form.reset();
  $form.elements[7].textContent = "Crear";
  $form.elements[7].onclick = () => {
    crateBook();
  };
}

function renderDataTable(data) {
  let view = `<section class="main_sections">
            <div>Titulo</div>
            <div>Id</div>
            <div>Autor</div>
            <div>Editorial</div>
            <div>isbn</div>
            <div>Precio</div>
            <div>Descripción</div>
            <div>Img</div>
            <div>Acciones</div>
        `;
  view += data
    .map((book) => {
      return `



          <h3 class="card__title">${book.title}</h3>
          <p class="card__text">
            ${book.id}
          </p>
          <p class="card__text">
            ${book.author}
          </p>
          <p class="card__text">
            ${book.editorial}
          </p>
          <p class="card__text">
            ${book.isbn}
          </p>
          <p class="card__text">
            ${book.price}
          </p>
          <p class="card__text">
            ${book.description}
          </p>
          <img  src="${book.image}" alt="${book.title}" width="100">
       
       <div class="no"> 
       ${
          validateRole("update")
            ? `
          
            <button class="icon-update icon "  onclick="update(
              '${book.id}',
              '${book.title}',
              '${book.id_author}',
              '${book.id_editorial}',
              '${book.isbn}',
              '${book.price}',
              '${book.description}',
            )"></button>
          `
            : ""
        }
        ${
          validateRole("delete")
            ? `<button class="icon-delete icon " onclick="deleteBook('${book.id}')"></button>`
            : ""
        }
       </div>

        
      

    `;
    })
    .join("");

    view += "</section>";
  $books.innerHTML = view;
}
