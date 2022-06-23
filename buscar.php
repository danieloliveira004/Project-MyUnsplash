<?php
require_once 'class/Database.php';
$pesquisa = $_POST['pesquisa'];

$bd = Database::conexao();
$sql = "SELECT * FROM postagens WHERE description LIKE '%$pesquisa%'";
$postagens = $bd->query($sql)->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($postagens);
