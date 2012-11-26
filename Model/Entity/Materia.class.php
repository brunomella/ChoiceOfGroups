<?php
class Materia {
	private $id;
	private $materia;
	private $descricao;
	
	function __construct(){}
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function setMateria($materia) {
		$this->materia = $materia;
	}
	
	public function getMateria() {
		return $this->materia;
	}
	
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}
	
	public function getDescricao() {
		return $this->descricao;
	}
	
	
}


?>