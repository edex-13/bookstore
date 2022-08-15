<?php

class Authors extends Controller
{
  public function __construct()
  {
    $this->db = new Database();
    parent::__construct();
  }

  public function render()
  {
    $this->view->render('authors/index');
  }

  public function showData()
  {
    $data = $this->db->select_all('authors');
    if ($data) {
      echo json_encode($data);
    } else {
      echo json_encode(array('error' => 'No hay datos'));
    }
  }

  public function create()
  {
    if (empty($_REQUEST['name'])) {
      print_r ($_REQUEST);
      return false;
    }
    $id = rand(1, 100000);
    $id = (string)$id;

    $data = array(
      'id' => $id,
      'name' => $_REQUEST['name']
    );

    try {
      $result = $this->db->insert('authors', $data);
      echo json_encode($result);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function update()
  {
    if (empty($_REQUEST['name'])) {
      echo json_encode(array('error' => 'No hay nombre para actualizar'));
      return false;
    }
    $data = array(
      'name' => $_REQUEST['name']
    );
    $where = "id = '" . $_REQUEST['id'] . "'";
    try {
      $result = $this->db->update('authors', $data, $where);
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
      $result = $this->db->delete('authors', "id = '$id'");
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
