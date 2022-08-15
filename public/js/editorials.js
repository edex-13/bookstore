async function getEditorials () {
  const response = await fetch('http://localhost/bookstore/editorials/showData')
  const editorials = await response.json()
  if (editorials.length > 0) {
    renderDataTable(editorials)
  }else {
    document.getElementById('editorials').innerHTML = '<p>No hay editoriales registradas</p>'
  }
}


async function crateEditorial () {
  const data = new FormData(document.getElementById('form-editorial'));

  const response = await fetch(`http://localhost/bookstore/editorials/create/`, {
    method: 'POST',
    body: data 
  })
  await response.json()
  getEditorials()
}

async function update (name  , id) {

  const form = document.getElementById('form-editorial')
  form.elements[0].value = name;
  form.elements[1].onclick = () => {
    updateEditorial(id)
    };
  form.elements[1].textContent = 'Update'
}
  
async function updateEditorial (id) {
  const data = new FormData(document.getElementById('form-editorial'));
  data.append('id', id);


  const response = await fetch(`http://localhost/bookstore/editorials/update/`, {
    method: 'POST',
    body: data
  })
  await response.json()
  getEditorials()
  
}


async function deleteEditorial (id) {
  const data = new FormData();
  data.append('id', id);
  const response = await fetch(`http://localhost/bookstore/editorials/delete/`, {
    method: 'POST',
    body: data
  })
  await response.json()
  getEditorials()
}



function renderDataTable(data) {
  const view = data.map(editorial => {
    return `
      <div>
        <p>${editorial.id}</p>
        <p>${editorial.name}</p>
        <button onclick="update('${editorial.name}' , '${editorial.id}')">Update</button>
        <button onclick="deleteEditorial('${editorial.id}')">Delete</button>
      </div>
    `
  }).join('')
  document.getElementById('editorials').innerHTML = view


}


getEditorials()
// updateEditorial()
// deleteEditorial()