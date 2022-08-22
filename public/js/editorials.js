const $form = document.getElementById("form-editorial");
const $editorials = document.getElementById("editorials");
async function getEditorials() {
  const editorials = await getData(
    "http://localhost/bookstore/editorials/showData"
  );

  if (editorials.length > 0) {
    renderDataTable(editorials);
  } else {
    $editorials.innerHTML =
      "<p>No hay editoriales registradas</p>";
  }
}

async function crateEditorial() {
  const data = new FormData($form);

  await setData("http://localhost/bookstore/editorials/create/", data);

  getEditorials();

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

  await setData("http://localhost/bookstore/editorials/update/", data);

  getEditorials();
  $form.reset();
  $form.elements[1].textContent = "Crear";
}

async function deleteEditorial(id) {
  const data = new FormData();
  data.append("id", id);
  await setData("http://localhost/bookstore/editorials/delete/", data);

  getEditorials();
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
  $editorials.innerHTML = view;
}

getEditorials();