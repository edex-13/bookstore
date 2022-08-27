const $form = document.getElementById("form-password");
async function changePassword() {
  const data = new FormData($form);

  const result = await setData("http://localhost/bookstore/auth/changePassword/", data);
  if (result.success) {
    alert("Contraseña cambiada con éxito");
  } else {
    alert("Error al cambiar la contraseña, verifique que la contraseña actual sea correcta");
  }

  $form.reset();

}