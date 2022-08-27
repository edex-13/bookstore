const $containerForm = document.querySelector(".section__form");
if (validateRole("create")) {
  $containerForm.innerHTML = `
    <form action="#" id="form-editorial" >
      <h1 class="title">Editorial </h1>
      <label for="name">
        Nombre:
        <input type="text" name="name" id="name" placeholder="Panamericana">
      </label>
      <button type="button" onclick="crateEditorial()">Crear</button>
    </form>
`;
}

const $form = document.getElementById("form-editorial");
const $editorials = document.getElementById("editorials");
async function getEditorials() {
  const editorials = await getData(
    "/editorials/showData"
  );

  if (editorials.length > 0) {
    renderDataTable(editorials);
  } else {
    $editorials.innerHTML = "<p>No hay editoriales registradas</p>";
  }
}

async function crateEditorial() {
  const data = new FormData($form);

  await setData("/editorials/create/", data);

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

  await setData("/editorials/update/", data);

  getEditorials();
  $form.reset();
  $form.elements[1].textContent = "Crear";
  $form.elements[1].onclick = 
    () => {
      crateEditorial();
    };
}

async function deleteEditorial(id) {
  const data = new FormData();
  data.append("id", id);
  await setData("/editorials/delete/", data);

  getEditorials();
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
            ? `<button class="icon-update icon " onclick="update('${editorial.name}',${editorial.id})"></button>`
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
  $editorials.innerHTML = view;
}

getEditorials();
