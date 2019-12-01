<?php
namespace App\Entity;

class Pessoa{

	private $id;
	private $nome;
	private $email;
	private $sexo;
	private $estado;

	//Constructor
	public function __construct ($id = 0, $nome = '', $email = '', $sexo = '', $estado = ''){
		$this->id = $id;
		$this->nome = $nome;
		$this->email = $email;
		$this->sexo = $sexo;
		$this->estado = $estado;
	}
	//Setters
	public function setId($Id){
		$this->id = $Id;
	}

	public function setNome($Nome){
		$this->nome = $Nome;
	}

	public function setEmail($email){
		$this->email = strtolower($email);
	}

	public function setSexo($Sexo){
		$this->sexo = $Sexo;
	}

	public function setEstado($Estado){
		$this->estado = $Estado;
	}

	//Getter
	public function getId(){
		return $this->id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function getEstado(){
		return $this->estado;
	}
}
