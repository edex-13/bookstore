getReport();


const $form = document.getElementById("form-book");
const $report = document.getElementById("books");



async function getReport() {
  const data = await getData("/admin/reportData");
  console.log(data);
  if (data.length > 0) {
    renderDataTable(data);
  } else {
    $report.innerHTML = "<p>No hay datos registrados</p>";
  }
}


function renderDataTable(data) {
  let viewTable = `<table class="table table-bordered" id="dataTable">
  <thead>
    <tr>
      <th>Id Factura</th>
      <th>Fecha</th>
      <th>Cliente</th>
      <th>Id Del Libro</th>
      <th>Libro</th>
      <th>Precio</th>
      <th>Descripción</th>
      <th>isbn</th>
      <th>Id Editorial</th>
      <th>Editorial</th>
      <th>Id Autor</th>
      <th>Autor</th>
    
    </tr>
  </thead>
  <tbody>`;
  data.forEach((report) => {
    viewTable += `
    <tr>

      <td>${report.id}</td>
      <td>${report.date}</td>
      <td>${report.client}</td>
      <td>${report.id_book}</td>
      <td>${report.book_name}</td>
      <td>${report.price}</td>
      <td>${report.description}</td>
      <td>${report.isbn}</td>
      <td>${report.id_editorial}</td>
      <td>${report.editorial}</td>
      <td>${report.id_author}</td>
      <td>${report.author}</td>
    </tr>
    `;
  });
  viewTable += `</tbody></table>`;
  $report.innerHTML = viewTable;

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

}
