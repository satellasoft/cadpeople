<?php
namespace App\Controller;
use App\Entity\Pessoa;
use App\Model\PessoaModel;

class PessoaController{
  private $pessoaModel;

  public function __construct(){
    $this->pessoaModel = new PessoaModel();
  }

  public function create(Pessoa $pessoa){

    if(strlen($pessoa->getNome()) < 3 || strlen($pessoa->getNome()) > 100)
    return false;

    if(strlen($pessoa->getEmail()) < 5)
    return false;

    if($pessoa->getSexo() != "F")
    if($pessoa->getSexo() != "M")
    return false;

    if(strlen($pessoa->getEstado()) != 2)
    return false;

    return $this->pessoaModel->create($pessoa);
  }

  public function update($nome, $email){
    echo "Update";
  }

  public function delete(){
    echo "Delete";
  }

  public function getAll(){
    return $this->pessoaModel->getAll();
  }

  public function getById(){
    echo "Get by id";
  }

  public function search(string $term){
    if(strlen($term) < 3)
      return null;

    return $this->pessoaModel->search(strtolower($term));
  }
}
?>
