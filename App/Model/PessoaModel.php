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

      $result =  $this->pdo->ExecuteNonQuery($sql, $params);

      if($result > 0)
        return $this->pdo->GetLastID();
      else
        return -1;
    }catch(PDOException $ex){
      echo "ERRO: {$ex->getMessage()}";
      return false;
    }
  }

  public function update(Pessoa $pessoa){
    try{
      $sql = "UPDATE pessoa SET nome = :nome, email = :email, sexo = :sexo, estado = :estado WHERE id = :id";
      $params = [
        ":id"     => $pessoa->getId(),
        ":nome"   => $pessoa->getNome(),
        ":email"  => $pessoa->getEmail(),
        ":sexo"   => $pessoa->getSexo(),
        ":estado" => $pessoa->getEstado()
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

  public function getById(int $pessoaId){
    try {
      $sql = "SELECT nome, email, sexo, estado  FROM pessoa WHERE id = :id";
      $param = [":id"  => $pessoaId];

      $dr = $this->pdo->ExecuteQueryOneRow($sql, $param);
      return  new Pessoa(
        $pessoaId,
        $dr["nome"],
        $dr["email"],
        $dr["sexo"],
        $dr["estado"]
      );

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

  public function delete(int $pessoaId){
    try{
      $sql = "DELETE FROM pessoa WHERE id = :id";
      $param = [":id" => $pessoaId];

      return $this->pdo->ExecuteNonQuery($sql, $param);
    }catch(PDOException $ex){
      echo "ERRO: {$ex->getMessage()}";
      return false;
    }
  }
}
?>
