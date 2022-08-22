<?php

class Invoices extends Controller
{
  public function __construct()
  {
    $this->db = new Database();
    parent::__construct();
    parent::validateLogin();
    if (!isset($_SESSION)) {
      session_start();
    }
  }

  public function render()
  {
    $this->view->render('invoices/index');
  }

  public function showData()
  {
    $sql2 = "SELECT invoices.* , books.title as book  from invoices inner join books on invoices.id_book = invoices.id_book";

    $data = $this->db->executeQuery($sql2, true);
    if ($data) {
      echo json_encode($data);
    } else {
      echo json_encode(array('error' => 'No hay datos'));
    }
  }

  public function create()
  {
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
