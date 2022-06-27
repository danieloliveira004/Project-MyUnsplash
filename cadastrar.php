<?php
require_once 'class/Database.php';
try {
  $description = $_POST['description'];
  $url = $_POST['url'];

  // CONFIGURAÇÃO
  $after = strrchr(strrchr($url, '/'), '.');
  $extension =  substr($after, 0, strpos($after, '?'));
  if (!$extension)
    $extension = $after;
  $name = date('Y_d_h_i_s') . $extension;
  $dir = './galeria/' . $name;

  // SUBINDO POSTAGEM PARA O BANCO DE DADOS
  $bd = Database::conexao();
  $sql = "INSERT INTO " . Database::$table . "(description, image) VALUES ('$description', '$dir')";
  $bd->prepare($sql)->execute();
  $id = $bd->lastInsertId();
  echo $id;
  $sql = "SELECT COUNT(*) FROM " . Database::$table . " WHERE id = " . 78;
  echo $sql . '<br>';
  $teste = $bd->query($sql)->fetch(PDO::FETCH_NUM)[0];
  print_r($teste);
  if (!$teste)
    echo 'Aqui';
  // SALVANDO ARQUIVO NO SERVIDOR
  copy($url, $dir);


  return true;
} catch (Error $e) {
  echo 'erro' . $e->getMessage();
}
