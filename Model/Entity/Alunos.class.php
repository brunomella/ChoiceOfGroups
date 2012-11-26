<?php
class Alunos {
	private $id;
	private $aluno;
	private $observacao;
	private $email;
	private $turmaId;
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function setAluno($aluno) {
		$this->aluno = $aluno;
	}
	
	public function getAluno() {
		return $this->aluno;
	}
	
	public function setObservacao($observacao) {
		$this->observacao = $observacao;
	}
	
	public function getObservacao() {
		return $this->observacao;
	}
	
	public function setEmail($email) {
		$this->email = $email;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function setTurmaId($turmaId) {
		$this->turmaId = $turmaId;
	}
	
	public function getTurmaId() {
		return $this->turmaId;
	}
	
	
}


?>