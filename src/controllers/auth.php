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


        header('Location: ' . '/bookstore/auth/');
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


  public function index()
  {
  
      $this->render('login');

  }
  public function errors()
  {
    echo "<p>Error</p>";
  }
}
