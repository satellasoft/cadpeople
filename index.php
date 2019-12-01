<?php
require_once("vendor/autoload.php");
use App\Controller\PessoaController;
$pessoaController = new PessoaController();
$list = $pessoaController->getAll();
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
  <div class="max-width" style="margin-top: 25px;">
    <div>
      <div class="float-left middle-width">
        <a href="create.php" class="btn bg-blue">new</a>
      </div>

      <div class="float-right middle-width text-right">
        <form action="find.php" method="get" style="display: flex;">
          <input type="text" name="find" placeholder="Buscar pessoa" class="input-text" style="flex: 1">
          <button type="submit" class="btn bg-white text-dark">find</button>
        </form>
      </div>

      <div class="clear"></div>
    </div>
    <br><br>
    <div class="box">
      <table>
        <thead>
          <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Sexo</th>
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
              <td>
                <a href="update.php?id=<?=$pessoa->getId();?>" class="btn bg-blue">Editar</a>
              </td>
              <td>
                <a href="delete.php?id=<?=$pessoa->getId();?>" class="btn bg-red" onclick="return confirm('Deseja remover?')">Remover</a>
              </td>
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
