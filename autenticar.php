<?php
define('PASSWORD', 'senha123');
$password = $_POST['senha'];

if ($password == PASSWORD)
  echo 'valido';
else
  echo 'invalido';
