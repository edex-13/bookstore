<?php

class Controller {
  public function __construct() {
    $this->view = new View();
    if (!isset($_SESSION)) {
      session_start();
    }

  }
  public function validateRol ($action){
    $rol = $this->rol($action);
    if (!$rol){
      echo json_encode(array('error' => 'No tienes permisos para realizar esta acción'));
      // enviar codigo  402 - no tienes permisos
      http_response_code(402);
      return false;
    }
    return true;
  }

  public function rol ($action) {
    if (!isset( $_SESSION['id_role'])) {
      return false;
    }

    if ($_SESSION['id_role'] == 1) {
      return true;
    }

    if ($_SESSION['id_role'] == 2) {
      if ($action == 'create' || $action == 'update' || $action == 'showPage') {
        return true;
      } else {
        return false;
      }
    }

    if ($_SESSION['id_role'] == 3) {
      if ($action == 'showPage' ) {
        return true;
      } else {
        return false;
      }
    }

    if ($_SESSION['id_role'] == 4) {
      return false;
    }

  }
  public function validateLogin (){

    if (!isset($_SESSION['id'])) {
      header('Location: ' . '/bookstore/auth/');
    }

  }
}
