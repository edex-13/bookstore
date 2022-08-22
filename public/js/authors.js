const $form = document.getElementById("form-author");
const $autors = document.getElementById("authors");

async function getAuthors() {
  const authors = await getData("http://localhost/bookstore/authors/showData");

  if (authors.length > 0) {
    renderDataTable(authors);
  } else {
    document.getElementById("authors").innerHTML =
      "<p>No hay autores registrados</p>";
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
    updateEditorial(id);
  };
  $form.elements[1].textContent = "Actualizar";
}

async function updateEditorial(id) {
  const data = new FormData($form);
  data.append("id", id);

  await setData("http://localhost/bookstore/authors/update/", data);

  getAuthors();
  $form.reset();
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
      <div>
        <p>${editorial.id}</p>
        <p>${editorial.name}</p>
        <button onclick="update('${editorial.name}' , '${editorial.id}')">Update</button>
        <button onclick="deleteEditorial('${editorial.id}')">Delete</button>
      </div>
    `;
    })
    .join("");
  $autors.innerHTML = view;
}

getAuthors();
