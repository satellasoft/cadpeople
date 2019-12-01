<?php
require_once("vendor/autoload.php");
use App\Controller\PessoaController;
use App\Entity\Pessoa;

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$pessoaController = new PessoaController();
$pessoa = $pessoaController->getById($id);
$result = "";

if(filter_input(INPUT_POST, "txtNome")){
  $pessoa = new Pessoa(
    filter_input(INPUT_POST, "txtId", FILTER_SANITIZE_NUMBER_INT),
    filter_input(INPUT_POST, "txtNome", FILTER_SANITIZE_STRING),
    filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_EMAIL),
    filter_input(INPUT_POST, "slSexo", FILTER_SANITIZE_STRING),
    filter_input(INPUT_POST, "slEstado", FILTER_SANITIZE_STRING)
  );

  if((new PessoaController())->update($pessoa)){
    $result = "<div class='alert bg-green'>Pessoa Alterada</div>";
  }else{
    $result = "<div class='alert bg-red'>Erro ao alterar</div>";
  }
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
    <h1>Editar</h1>
    <div class="box">
      <form method="post">

        <div class="form-control">
          <label for="txtNome">Nome</label>
          <input type="hidden" name="txtId" value="<?=$pessoa->getId();?>">
          <input value="<?=$pessoa->getNome();?>" type="text" name="txtNome" id="txtNome" placeholder="Nome completo" class="input-text">
        </div>

        <div class="form-control">
          <label for="txtEmail">E-mail</label>
          <input value="<?=$pessoa->getEmail();?>" type="text" name="txtEmail" id="txtEmail" placeholder="E-maill principal" class="input-text">
        </div>

        <div class="form-control">
          <label for="slSexo">Sexo</label>
          <select name="slSexo" id="slSexo" class="input-text">
            <option value="F" <?=$pessoa->getSexo() == "F" ? "selected" : "";?>>Feminino</option>
            <option value="M" <?=$pessoa->getSexo() == "M" ? "selected" : "";?>>Masculuno</option>
          </select>
        </div>

        <div class="form-control">
          <label for="slEstado">Estado</label>
          <select name="slEstado" id="slEstado" class="input-text">
            <option value="SP" <?=$pessoa->getEstado() == "SP" ? "selected" : "";?>>São Paulo</option>
            <option value="RJ" <?=$pessoa->getEstado() == "RJ" ? "selected" : "";?>>Rio de Janeiro</option>
            <option value="PR" <?=$pessoa->getEstado() == "PR" ? "selected" : "";?>>Paraná</option>
          </select>
        </div>

        <div class="form-control">
          <input type="submit" name="brnSend" value="Editar" class="btn bg-green">
        </div>

        <div class="form-control">
          <?=$result;?>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
