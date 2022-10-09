<?php

class Admin extends Controller
{
  public function __construct()
  {
    $this->db = new Database();
    parent::__construct();
    
    if (!isset($_SESSION)) {
      session_start();
    }
  }

  public function render()
  {
    parent::validateLogin();
    if (!$this->validateRol('showPage')) {
      header('Location: ' . '/');
      return false;
    }

    $this->view->render('admin/index');
  }

  public function reportData()
  {
    $sql2 = "SELECT invoices.*, books.title as book_name, books.price as price, books.description as description, books.isbn , editorials.id as id_editorial , editorials.name as editorial , authors.id as id_author , authors.name as author from invoices inner join books on invoices.id_book = books.id inner join authors on books.id_author = authors.id inner join editorials on books.id_editorial = editorials.id";
    $data = $this->db->executeQuery($sql2, true);
    if ($data) {
      echo json_encode($data);
    } else {
      echo json_encode(array('error' => 'No hay datos'));
    }
  }

  

  public function index()
  {
      $this->render();
  }

  public function report()
  {
    $this->view->render('admin/report');
  }
  public function errors()
  {
    echo "<p>Error</p>";
  }
}
