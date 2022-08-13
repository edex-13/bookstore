<?php

class DataBase
{
  private $conn = null;
  public function __construct()
  {
    $conne =
      mysqli_connect(
        'bbpejicnyxguh6h8nstd-mysql.services.clever-cloud.com',
        'uqbgweurd4ulf3k7',
        '7M2L44U2qdOUTWB15sXU',
        'bbpejicnyxguh6h8nstd'
      );

    $this->conn = $conne;
  }

  public function executeQuery($sql)
  {
    $result = mysqli_query($this->conn, $sql);
    if (!$result) {
      die('Error: ' . mysqli_error($this->conn));
    }
    return $result;
  }

  public function select($table, $where = null)
  {

    $sql = "SELECT * FROM $table";

    if ($where != null) {
      $sql .= " WHERE $where";
    }
    $result = $this->executeQuery($sql);
    if ($result) {
      return $result;
    } else {
      return false;
    }
  }

  public function select_all($table)
  {
    return $this->select($table);
  }
  public function select_joins($table, $campos = "*", $join, $where = null)
  {

    $sql = "SELECT $campos FROM $table";
    if ($join != null) {
      $sql .= " $join";
    }
    if ($where != null) {
      $sql .= " WHERE $where";
    }


    $result = $this->executeQuery($sql);
    if ($result) {
      return $result;
    } else {
      return false;
    }
  }

  public function insert($table, $data)
  {

    $sql = "INSERT INTO $table VALUES (";
    foreach ($data as $key => $value) {
      $sql .= "'$value',";
    }
    $sql = substr($sql, 0, -1);
    $sql .= ")";



    $result = $this->executeQuery($sql);

    if ($result) {
      return true;
    } else {
      return false;
    }
  }
  public function update($table, $data, $where)
  {

    $sql = "UPDATE $table SET ";
    foreach ($data as $key => $value) {
      $sql .= "$key = '$value',";
    }
    $sql = substr($sql, 0, -1);

    $sql .= " WHERE $where";
    $result = $this->executeQuery($sql);

    if ($result) {
      return true;
    } else {
      return false;
    }
  }
  public function delete($table, $where = null)
  {
    $sql = "DELETE FROM $table ";
    if ($where != null) {
      $sql .= "WHERE $where";
    }

    $result = $this->executeQuery($sql);

    if ($result) {
      return true;
    } else {
      return false;
    }
  }
  public function delete_all($table)
  {
    return $this->delete($table);
  }
}
