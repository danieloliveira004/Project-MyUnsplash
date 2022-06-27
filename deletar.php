<?php
require_once 'class/Database.php';
try {

  $id = $_POST['id'];

  $bd = Database::conexao();
  $sql = "SELECT image FROM " . Database::$table . " WHERE id = $id";
  $url = $bd->query($sql)->fetch(PDO::FETCH_OBJ)->image;

  // EXCLUIR IMAGEM DO SERVIDOR
  unlink($url);

  // EXCLUIR NO BANCO
  $sql = "DELETE FROM " . Database::$table . " WHERE id = $id";
  $bd->prepare($sql)->execute();
} catch (Error $e) {
  echo 'error';
}
