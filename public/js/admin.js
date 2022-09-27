getBooks();
getAuthors();
getEditorials();
getInvoices();

const $form = document.getElementById("form-book");
const $editorials = document.getElementById("editorials");
const $invoices = document.getElementById("invoices");
const $autors = document.getElementById("authors");
const $books = document.getElementById("books");

async function getEditorials() {
  const editorials = await getData("/editorials/showData");
  if (editorials.length > 0 && !editorials.error) {
    renderDataTableEditorials(editorials);
  }
  
}

async function getInvoices() {
  const invoices = await getData(
    "/invoices/showData"
  );
  if (invoices.length > 0 && !invoices.error) {
    renderDataTableInvoices(invoices);
  }
}
async function getAuthors() {
  const authors = await getData("/authors/showData");
  if (authors.length > 0 && !authors.error) {
    renderTablaAutores(authors);
  }
}




async function getBooks() {
  const books = await getData("/books/showData");
  if (books.length > 0) {
    renderDataTable(books);
  } else {
    $books.innerHTML = "<p>No hay autores registrados</p>";
  }
}


function renderDataTable(data) {
  let viewTable = `<table class="table table-bordered" id="dataTable">
  <thead>
    <tr>
      <th>Titulo</th>
      <th>Id</th>
      <th>Autor</th>
      <th>Editorial</th>
      <th>isbn</th>
      <th>Precio</th>
      <th>Descripción</th>
      <th>Img</th>
    
    </tr>
  </thead>
  <tbody>`;
  data.forEach((book) => {
    viewTable += `
    <tr>

      <td>${book.title}</td>
      <td>${book.id}</td>
      <td>${book.author}</td>
      <td>${book.editorial}</td>
      <td>${book.isbn}</td>
      <td>${book.price}</td>
      <td>${book.description}</td>
      <td><img src="${book.img}" alt=""></td>
    </tr>
    `;
  });
  viewTable += `</tbody></table>`;
  $books.innerHTML = viewTable;

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
          <p class="card__text text_corto">
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
  $('#dataTable').DataTable();

  //$books.innerHTML = view;
}

function renderDataTableEditorials(data) {
  let viewTable = `<table class="table table-bordered" id="editorialsTabla">
  <thead>

    <tr>
    <th>Nombre</th>
      <th>Id</th>
    </tr>
  </thead>
  `
  data.forEach((editorial) => {
    viewTable += `
    <tr>
      <td>${editorial.name}</td>
      <td>${editorial.id}</td>
    </tr>
    `;
  }
  );
  viewTable += `</tbody></table>`;

  console.log(viewTable);
  $editorials.innerHTML = viewTable;
  $('#editorialsTabla').DataTable();

}

function renderTablaAutores(data) {
  let viewTable = `<table class="table table-bordered" id="autoresTabla">
  <thead>

    <tr>

      <th>Nombre</th>
      <th>Id</th>
    </tr>
  </thead>
  <tbody>`;
  data.forEach((author) => {
    viewTable += `
    <tr>
      <td>${author.name}</td>
      <td>${author.id}</td>
    </tr>
    `;
  }
  );
  viewTable += `</tbody></table>`;
  $autors.innerHTML = viewTable;
  $('#autoresTabla').DataTable();
}
function renderDataTableInvoices(data){
  let viewTable = `<table class="table table-bordered" id="invoicesTabla">
  <thead>

    <tr>
      <th>Id</th>
      <th>Usuario</th>
      
      <th>Libro</th>
    </tr>
  </thead>
  <tbody>`;
  data.forEach((invoice) => {
    viewTable += `
    <tr>
      <td>${invoice.id}</td>
      <td>${invoice.client}</td>
      <td>${invoice.book}</td>
    </tr>
    `;
  }
  );
  viewTable += `</tbody></table>`;
  $invoices.innerHTML = viewTable;
  $('#invoicesTabla').DataTable();
}