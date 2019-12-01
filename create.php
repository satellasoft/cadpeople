<?php
require_once("vendor/autoload.php");
use App\Controller\PessoaController;
use App\Entity\Pessoa;

$result = "";

if(filter_input(INPUT_POST, "txtNome")){
  $pessoa = new Pessoa(
    null,
    filter_input(INPUT_POST, "txtNome", FILTER_SANITIZE_STRING),
    filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_EMAIL),
    filter_input(INPUT_POST, "slSexo", FILTER_SANITIZE_STRING),
    filter_input(INPUT_POST, "slEstado", FILTER_SANITIZE_STRING)
  );

  if((new PessoaController())->create($pessoa)){
    $result = "<div class='alert bg-green'>Pessoa Cadastrada</div>";
  }else{
    $result = "<div class='alert bg-red'>Erro ao cadastrar</div>";
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
    <h1>Cadastrar</h1>
    <div class="box">
      <form method="post">

        <div class="form-control">
          <label for="txtNome">Nome</label>
          <input type="text" name="txtNome" id="txtNome" placeholder="Nome completo" class="input-text">
        </div>

        <div class="form-control">
          <label for="txtEmail">E-mail</label>
          <input type="text" name="txtEmail" id="txtEmail" placeholder="E-maill principal" class="input-text">
        </div>

        <div class="form-control">
          <label for="slSexo">Sexo</label>
          <select name="slSexo" id="slSexo" class="input-text">
            <option value="F">Feminino</option>
            <option value="M">Masculuno</option>
          </select>
        </div>

        <div class="form-control">
          <label for="slEstado">Estado</label>
          <select name="slEstado" id="slEstado" class="input-text">
            <option value="SP">São Paulo</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="PR">Paraná</option>
          </select>
        </div>

        <div class="form-control">
          <input type="submit" name="brnSend" value="Cadastrar" class="btn bg-green">
        </div>

        <div>
          <?=$result;?>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
