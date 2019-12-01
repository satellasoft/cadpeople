<?php
require_once("vendor/autoload.php");
use App\Controller\PessoaController;
$pessoaController = new PessoaController();
$result = "";
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
          <input type="hidden" name="txtId" value="">
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

        <div class="form-control">
          <?=$result;?>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
