<?php
function dimensionamento($url) {
  list($largura, $altura) = getimagesize($url);
  if ($altura > 700)
    return 'r-2';
  else
    return '';
}

try {
  require_once 'class/Database.php';
  $bd = Database::conexao();
  $sql = "SELECT id, description, image FROM  " . Database::$table;
  $postagens = $bd->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  foreach ($postagens as $postagem) : ?>
    <div class="container-img <?= dimensionamento($postagem['image']) ?>">
      <img src="<?= $postagem['image'] ?>" id="<?= $postagem['id'] ?>">
      <div class="container-description">
        <button class="delete" onclick="deletar(<?= $postagem['id'] ?>)">delete</button>
        <div class="p-description">
          <p><?= $postagem['description'] ?></p>
        </div>
      </div>
    </div>
<?php
  endforeach;
} catch (Error $e) {
  echo 'erro';
} catch (PDOException $e) {
  echo 'erro';
}
?>