<?php

class Books extends Controller
{
  public function __construct()
  {
    $this->db = new Database();
    parent::__construct();
    if (!isset($_SESSION)) {
      session_start();
    }

  }
  public function validations()
  {
    $errors = array();
    if (empty($_REQUEST['title'])) {
      $errors[] = 'No hay titulo para crear';
    }
    if (empty($_REQUEST['isbn'])) {
      $errors[] = 'No hay isbn para crear';
    }
    if (empty($_REQUEST['authors'])) {
      $errors[] = 'No hay autores para crear';
    }
    if (empty($_REQUEST['description'])) {
      $errors[] = 'No hay descripcion para crear';
    }
    if (empty($_REQUEST['editorials'])) {
      $errors[] = 'No hay editoriales para crear';
    }
    if (empty($_REQUEST['price']) || !is_numeric($_REQUEST['price'])) {
      $errors[] = 'No hay precio para crear o no es numerico';
    }

    return $errors;
  }

  public function render()
  {
    parent::validateLogin();

    if (!$this->validateRol('showPage')) {
      header('Location: ' . '/bookstore/');
      return false;
    } 
    $this->view->render('books/index');
  }

  public function showData()
  {
    $sql2 = "SELECT books.* , editorials.name as editorial , authors.name as author from books inner join editorials on books.id_editorial = editorials.id inner join authors on books.id_author = authors.id ";
    $data = $this->db->executeQuery($sql2, true);
    if ($data) {
      echo json_encode($data);
    } else {
      echo json_encode(array('error' => 'No hay datos'));
    }
  }

  public function create()
  {
    parent::validateLogin();

    if (!$this->validateRol('create')){
      return false;
    }
    $errors = $this->validations();
    if (!isset($_FILES['img']) || $_FILES['img']['error'] != 0 || empty($_FILES['img']['name'])) {
      $errors[] = 'No hay imagen para crear';
    }
    if ($_FILES['img']['size'] > 1000000) {
      $errors[] = 'La imagen es muy grande';
    }
    if (!empty($errors)) {
      echo json_encode(array('error' => $errors));
      return false;
    }
    $id = rand(1, 100000);
    $id = (string)$id;

    $baseUrl = getcwd() . '/public/img/';

    if (!file_exists($baseUrl)) {
      mkdir($baseUrl, 0777, true);
    }

    $route = '/bookstore/public/img/' . $id . $_FILES['img']['name'];


    if (!move_uploaded_file($_FILES['img']['tmp_name'], $baseUrl . $id . $_FILES['img']['name'])) {
      echo json_encode(array('error' => 'No se pudo subir la imagen'));
      return false;
    }


    $data = array(
      'id' => $id,
      'isbn' => $_REQUEST['isbn'],
      'title' => $_REQUEST['title'],
      'price' => $_REQUEST['price'],
      'authors' => $_REQUEST['authors'],
      'editorials' => $_REQUEST['editorials'],
      'image' => $route,
      'description' => $_REQUEST['description']
    );

    try {
      $result = $this->db->insert('books', $data);
      echo json_encode($result);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function update()
  {
    parent::validateLogin();

    if (!$this->validateRol('update')){
      return false;
    }
    $errors = $this->validations();
    if (!empty($errors)) {
      echo json_encode(array('error' => $errors));
      return false;
    }

    
    $data = array(
      'id' => $_REQUEST['id'],
      'isbn' => $_REQUEST['isbn'],
      'title' => $_REQUEST['title'],
      'price' => $_REQUEST['price'],
      'id_author' => $_REQUEST['authors'],
      'id_editorial' => $_REQUEST['editorials'],
      'description' => $_REQUEST['description']
    );
    $where = "id = '" . $_REQUEST['id'] . "'";
    try {
      $result = $this->db->update('books', $data, $where);
      echo json_encode($result);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function delete()
  {
    parent::validateLogin();

    if (!$this->validateRol('delete')){
      return false;
    }
    if (empty($_REQUEST['id'])) {
      return false;
    }
    $id = $_REQUEST['id'];
    try {
      $result = $this->db->delete('books', "id = '$id'");
      echo json_encode($result);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }


  public function index()
  {
    $this->render();
  }
  public function errors()
  {
    echo "<p>Error</p>";
  }
}
