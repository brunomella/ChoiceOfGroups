<?php
require_once '../../../ChoiceOfGroups/Model/DAO/TurmaDAO.class.php';
require_once '../../../ChoiceOfGroups/Model/Entity/Turma.class.php';
require_once 'IService.class.php';


class TurmaService {
	private $_Lista = array();
	private $_DAO = null;

	public function create($class) {
		#Instancia do DAO
		$_DAO = new TurmaDAO();
		#Chama Metodo Create
		$flag = $_DAO->create($class);
		#Libera Objeto
		unset($_DAO);
		return $flag;
	}


	public function read() {
		#Instancia do DAO
		$_DAO = new TurmaDAO();
		#Chama metodo e joga dentro do array
		$_Lista = $_DAO->read();
		#Libera Objeto
		unset($_DAO);
		#Retorna Lista
		return $_Lista;
	}


	public function readById($id) {
		#Instancia do DAO
		$_DAO = new TurmaDAO();
		#Chama metodo e joga dentro do array por ID
		$_Lista = $_DAO->readById($id);
		#Libera Objeto
		unset($_DAO);
		#Retorna Lista
		return $_Lista;

	}

	public function update($class) {
		#Instancia do DAO
		$_DAO = new TurmaDAO();
		#
		$flag = $_DAO->update($class);
		#Libera Objeto
		unset($_DAO);
		#Retorna Lista
		return $flag;
	}


	public function delete($id) {
		#Instancia do DAO
		$_DAO = new TurmaDAO();
		$flag = $_DAO->delete($id);
		#Libera Objeto
		unset($_DAO);
		#Retorna Lista
		return $flag;
	}
}

?>
