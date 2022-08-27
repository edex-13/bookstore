<?php

class Invoices extends Controller
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
    $this->view->render('invoices/index');
  }

  public function showData()
  {
    $sql2 = "SELECT invoices.* , books.title as book  from bbpejicnyxguh6h8nstd.invoices inner join bbpejicnyxguh6h8nstd.books on books.id = invoices.id_book";

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
    if (empty($_REQUEST['client'])) {
      echo json_encode(array('error' => 'No hay cliente para crear'));
      return false;
    }
    if (empty($_REQUEST['book'])){
      echo json_encode(array('error' => 'No hay libro para crear'));
      return false;
    }
    $id = rand(1, 100000);
    $id = (string)$id;

    $data = array(
      'id' => $id,
      'date' => date('Y-m-d'),
      'client' => $_REQUEST['client'],
      'id_book' => $_REQUEST['book'],
    );


    try {
      $result = $this->db->insert('invoices', $data);
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
    if (empty($_REQUEST['client'])) {
      echo json_encode(array('error' => 'No hay cliente para actualizar'));
      return false;
    }
    if (empty($_REQUEST['book'])){
      echo json_encode(array('error' => 'No hay libro para actualizar'));
      return false;
    }
    $data = array(
      'client' => $_REQUEST['client'],
      'id_book' => $_REQUEST['book']
    );
    $where = "id = '" . $_REQUEST['id'] . "'";
    try {
      $result = $this->db->update('invoices', $data, $where);
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
      $result = $this->db->delete('invoices', "id = '$id'");
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
