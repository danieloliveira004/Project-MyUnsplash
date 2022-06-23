<?php
try {
  require_once 'class/Database.php';
  $bd = Database::conexao();
  $sql = "SELECT id, description, image FROM postagens";
  $postagens = $bd->query($sql)->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($postagens);
} catch (Error $e) {
  echo 'erro';
}
