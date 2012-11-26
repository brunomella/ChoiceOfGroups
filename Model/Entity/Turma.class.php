<?php
class Turma {
	private $id;
	private $turma;
	private $descricao;
	private $instituicaoId;
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function setTurma($turma) {
		$this->turma = $turma;
	}
	
	public function getTurma() {
		return $this->turma;
	}
	
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}
	
	public function getDescricao() {
		return $this->descricao;
	}
	
	public function setInstituicaoId($instituicaoId) {
		$this->instituicaoId = $instituicaoId;
	}
	
	public function getInstituicaoId() {
		return $this->instituicaoId;
	}
	
	
	
	
}
?>