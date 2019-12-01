<?php
namespace App\Model;
use App\Entity\Pessoa;
use App\Util\Model;

class PessoaModel{

  private $pdo;

  public function __construct(){
    $this->pdo = new Model();
  }

  public function create(Pessoa $pessoa){
    try{
      $sql = "INSERT INTO pessoa (nome, email, sexo, estado) VALUES (:nome, :email, :sexo, :estado)";
      $params = [
        ":nome" => $pessoa->getNome(),
        ":email" => $pessoa->getEmail(),
        ":sexo" => $pessoa->getSexo(),
        ":estado" => $pessoa->getEstado(),
      ];

      return $this->pdo->ExecuteNonQuery($sql, $params);
    }catch(PDOException $ex){
      echo "ERRO: {$ex->getMessage()}";
      return false;
    }
  }

  public function getAll(){
    try {
      $sql = "SELECT id, nome, email, sexo, estado  FROM pessoa ORDER BY nome ASC";
      $dt = $this->pdo->ExecuteQuery($sql);
      $list = [];

      foreach($dt as $dr){
          $list[] = new Pessoa(
            $dr["id"],
            $dr["nome"],
            $dr["email"],
            $dr["sexo"],
            $dr["estado"]
          );
      }

      return $list;
    } catch(PDOException $ex){
      echo "ERRO: {$ex->getMessage()}";
      return false;
    }
  }

  public function search(string $term){
    try {
      $sql = "SELECT id, nome, email, sexo, estado  FROM pessoa WHERE LOWER(nome) LIKE :nome OR LOWER(email) LIKE :email ORDER BY nome ASC";
      $params = [
        ":nome"  => "%{$term}%",
        ":email" => "%{$term}%"
      ];
      $dt = $this->pdo->ExecuteQuery($sql, $params);
      $list = [];

      foreach($dt as $dr){
          $list[] = new Pessoa(
            $dr["id"],
            $dr["nome"],
            $dr["email"],
            $dr["sexo"],
            $dr["estado"]
          );
      }

      return $list;
    } catch(PDOException $ex){
      echo "ERRO: {$ex->getMessage()}";
      return false;
    }
  }
}
?>
