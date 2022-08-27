const $containerForm = document.querySelector(".section__form");
if (validateRole("create")) {
  $containerForm.innerHTML = `
  <form action="#" id="form-author" >
    <h1 class="title">Autores </h1>
    <label for="name">
      Nombre:
      <input type="text" name="name" id="name" placeholder="Gabriel Garcia Marquez">
    </label>
    <button type="button" onclick="crateAuthors()">Crear</button>
  </form>
`;
}
const $form = document.getElementById("form-author");
const $autors = document.getElementById("authors");

async function getAuthors() {
  const authors = await getData("http://localhost/bookstore/authors/showData");

  if (authors.length > 0) {
    renderDataTable(authors);
  } else {
    $autors.innerHTML = "<p>No hay autores registrados</p>";
  }
}

async function crateAuthors() {
  const data = new FormData($form);
  await setData("http://localhost/bookstore/authors/create/", data);
  getAuthors();
  $form.elements[0].value = "";
}

async function update(name, id) {
  $form.elements[0].value = name;
  $form.elements[1].onclick = () => {
    updateAuthor(id);
  };
  $form.elements[1].textContent = "Actualizar";
}

async function updateAuthor(id) {
  const data = new FormData($form);
  data.append("id", id);

  await setData("http://localhost/bookstore/authors/update/", data);

  getAuthors();
  $form.reset();
  $form.elements[1].textContent = "Crear";
  $form.elements[1].onclick = () => {
    crateAuthors();
  };
}

async function deleteEditorial(id) {
  const data = new FormData();
  data.append("id", id);
  await setData("http://localhost/bookstore/authors/delete/", data);
  getAuthors();
}

function renderDataTable(data) {
  const view = data
    .map((editorial) => {
      return `
      <div class="card">
        <div class="card__content">
          <h3 class="card__title">${editorial.name}</h3>
          <p class="card__text">
            <span>ID:</span> ${editorial.id}
          </p>
        </div>
        <div class="card__actions">
            ${
              validateRole("update")
                ? `<button class="icon-update icon "  onclick="update('${editorial.name}',${editorial.id})"></button>`
                : ""
            }
            ${
              validateRole("delete")
                ? `<button class="icon-delete icon " onclick="deleteEditorial(${editorial.id})"></button>`
                : ""
            }
        </div>
        
      </div>
    `;
    })
    .join("");
  $autors.innerHTML = view;
}

getAuthors();
