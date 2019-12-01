<?php
require_once("vendor/autoload.php");
use App\Controller\PessoaController;

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if((new PessoaController())->delete($id)){
  header("Location: index.php");
}else{
  echo "Erro ao deletar pessoa";
}
