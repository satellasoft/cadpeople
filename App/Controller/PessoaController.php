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

    $result = $this->pessoaModel->create($pessoa);
    if($result > 0){
      header("Location: update.php?id=" . $result);
    }
  }

  public function update(Pessoa $pessoa){
    if($pessoa->getId() < 1)
      return false;

    if(strlen($pessoa->getNome()) < 3 || strlen($pessoa->getNome()) > 100)
      return false;

    if(strlen($pessoa->getEmail()) < 5)
      return false;

    if($pessoa->getSexo() != "F")
      if($pessoa->getSexo() != "M")
        return false;

    if(strlen($pessoa->getEstado()) != 2)
      return false;

    return $this->pessoaModel->update($pessoa);
  }

  public function delete(int $pessoaId){
    if($pessoaId < 1)
      return false;

    return $this->pessoaModel->delete($pessoaId);
  }

  public function getAll(){
    return $this->pessoaModel->getAll();
  }

  public function getById(int $pessoaId){
    if($pessoaId < 1)
      return null;

    return $this->pessoaModel->getbyId($pessoaId);
  }

  public function search(string $term){
    if(strlen($term) < 3)
      return null;

    return $this->pessoaModel->search(strtolower($term));
  }
}
?>
