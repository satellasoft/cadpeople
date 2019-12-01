<?php
require_once("vendor/autoload.php");
use App\Controller\PessoaController;
$pessoaController = new PessoaController();
$term = filter_input(INPUT_GET, "find", FILTER_SANITIZE_STRING);
$list = [];

if($term){
  $list = $pessoaController->search($term);
}
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>CadPeople</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="img/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="max-width">
    <div class="text-center">
      <a href="index.php"><img src="img/logo_white.png" alt="Logo Cadpeople" id="imgLogo"></a>
    </div>
    <br><br>
    <div class="box">
      <p>Exibindo resultados para: <?=$term;?></p>
      <table>
        <thead>
          <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Estado</th>
            <th>Editar</th>
            <th>Deletar</th>
          </tr>
        </thead>

        <tbody>
          <?php
          foreach ($list as $pessoa) {
            ?>
            <tr>
              <td>#<?=$pessoa->getId();?></td>
              <td><?=$pessoa->getNome();?></td>
              <td><?=$pessoa->getEmail();?></td>
              <td><?=$pessoa->getSexo() == "F" ? "Feminino" : "Masculuno";?></td>
              <td><?=$pessoa->getEstado();?></td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
