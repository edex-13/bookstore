const $form = document.getElementById("form-invoice");
const $books = document.getElementById("books");
const $invoices = document.getElementById("invoices");

const appendSelect = (data, input, text) => {
  let view = "<option value=''> " + text + "</option>";
  data.forEach((item) => {
    view += `<option value="${item.id}">${item.title}</option>`;
  });
  input.innerHTML = view;
};

async function getBooks() {
  const books = await getData("http://localhost/bookstore/books/showData");
  if (books.length > 0 && !books.error) {
    appendSelect(books, $books, "Seleccione un libro");
  }
}
getBooks();

async function getInvoices() {
  const invoices = await getData(
    "http://localhost/bookstore/invoices/showData"
  );

  if (invoices.length > 0) {
    renderDataTable(invoices);
  } else {
    $invoices.innerHTML = "<p>No hay facturas registradas</p>";
  }
}

async function crateInvoices() {
  const data = new FormData($form);

  await setData("http://localhost/bookstore/invoices/create/", data);

  getInvoices();
}

async function update(id, client, id_book) {
  console.log($form.elements);
  $form.elements["client"].value = client;
  $form.elements["book"].value = id_book;
  $form.elements[2].onclick = () => {
    updateInvoices(id);
  };
  $form.elements[2].textContent = "Actualizar";
}

async function updateInvoices(id) {
  const data = new FormData($form);
  data.append("id", id);

  await setData("http://localhost/bookstore/invoices/update/", data);

  getInvoices();
  $form.reset();
  $form.elements[2].textContent = "Crear";
  $form.elements[2].onclick = crateInvoices;
}

async function deleteEditorial(id) {
  const data = new FormData();
  data.append("id", id);
  await setData("http://localhost/bookstore/invoices/delete/", data);

  getInvoices();
}

function renderDataTable(data) {
  const view = data
    .map((invoice) => {
      return `
      <div class="card">
        <div class="card__content">
          <h3 class="card__title">${invoice.client}</h2>
          <p class="card__text">
            <span>ID:</span>
            ${invoice.id}
          </p>
          <p class="card__text">
            <span>Libro: </span>
            ${invoice.book}
          </p>
        </div>
        <div class="card__actions">
        ${
          validateRole("udpate")
            ? `
        <button class="icon-update icon " onclick="update('${invoice.id}' , '${invoice.client}' , '${invoice.id_book}')"></button>

          `
            : ""
        }
        ${
          validateRole("delete")
            ? `
        <button class="icon-delete icon " onclick="deleteEditorial('${invoice.id}')"></button>

          `
            : ""
        }
        </div>
      </div>
    `;
    })
    .join("");
  $invoices.innerHTML = view;
}

getInvoices();
