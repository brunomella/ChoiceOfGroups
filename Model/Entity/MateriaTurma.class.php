<?php
class MateriaTurma {
	private $id;
	private $turmaId;
	private $materiaId;
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function setMateriaId($materiaId) {
		$this->materiaId = $materiaId;
	}
	
	public function getMateriaId() {
		return $this->materiaId;
	}
	
	public function setTurmaId($turmaId) {
		$this->turmaId = $turmaId;
	}
	
	public function getTurmaId() {
		return $this->turmaId;
	}
	
	
	
	
}


?>