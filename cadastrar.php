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

  // SALVANDO ARQUIVO NO SERVIDOR
  copy($url, $dir);

  // SUBINDO POSTAGEM PARA O BANCO DE DADOS
  $bd = Database::conexao();
  $sql = "INSERT INTO postagens(description, image) VALUES ('$description', '$dir')";
  $bd->prepare($sql)->execute();
  echo 'True';
} catch (Error $e) {
  echo 'erro';
}
