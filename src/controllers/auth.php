<?php

class Auth extends Controller
{
  public function __construct()
  {
    $this->db = new Database();
    parent::__construct();
    
  }

  public function render($name = 'index')
  {
    $this->view->render('auth/' . $name);
  }
  public function profile ()
  {
    $this->render('profile');
  }
  public function login()
  {

    if (empty($_REQUEST['username'])) {
      echo json_encode(array('error' => 'No hay username para iniciar sesión'));
      return false;
    }
    if (empty($_REQUEST['password'])) {
      echo json_encode(array('error' => 'No hay contraseña para iniciar sesión'));
      return false;
    }
    try {
      $result = $this->db->select('users', "username = '" . $_REQUEST['username'] . "' AND password = '" . $_REQUEST['password'] . "'");
      if ($result) {
        $_SESSION['id'] = $result[0]['id'];
        $_SESSION['username'] = $result[0]['username'];
        $_SESSION['name'] = $result[0]['name'];
        $_SESSION['id_role'] = $result[0]['id_role'];


        header('Location: ' . '/bookstore/');
      } else {
        echo json_encode(array('error' => 'Usuario o contraseña incorrectos'));
      }
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function logout()
  {
    session_destroy();
    header('Location: ' . '/bookstore/');
  }

  public function changePassword(){
    parent::validateLogin();

    if (empty($_REQUEST['password'])) {
      echo json_encode(array('error' => 'No hay contraseña actual'));
      return false;
    }
    if (empty($_REQUEST['newPassword'])) {
      echo json_encode(array('error' => 'No hay nueva contraseña'));
      return false;
    }
    $data = array(
      'password' => $_REQUEST['password']
    );
    try {
      $result = $this->db->select('users', "id = '" . $_SESSION['id'] . "' AND password = '" . $_REQUEST['password'] . "'");
      if ($result) {
        $data = array(
          'password' => $_REQUEST['newPassword']
        );
        $result = $this->db->update('users', $data, "id = '" . $_SESSION['id'] . "'");
        echo json_encode(array('success' => 'Contraseña actualizada'));
      } else {
        echo json_encode(array('error' => 'Contraseña actual incorrecta'));
      }
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function index()
  {
  
      $this->render('login');

  }
  public function errors()
  {
    echo "<p>Error</p>";
  }
}
