<?php
require_once '../../../ChoiceOfGroups/Model/DAO/InstituicaoDAO.class.php';
require_once '../../../ChoiceOfGroups/Model/Entity/Instituicao.class.php';
require_once 'IService.class.php';

class InstituicaoService {
	private $_Lista = array();
	private $_DAO = null;

	public function create($class) {
		#Instancia do DAO
		$_DAO = new InstituicaoDAO();
		#Chama Metodo Create
		$flag = $_DAO->create($class);
		#Libera Objeto
		unset($_DAO);
		return $flag;
	}


	public function read() {
		#Instancia do DAO
		$_DAO = new InstituicaoDAO();
		#Chama metodo e joga dentro do array
		$_Lista = $_DAO->read();
		#Libera Objeto
		unset($_DAO);
		#Retorna Lista
		return $_Lista;
	}


	public function readById($id) {
		$_DAO = new InstituicaoDAO();
		$_Lista = $_DAO->readById($id);
		unset($_DAO);
		return $_Lista;

	}

	public function update($class) {
		$_DAO = new InstituicaoDAO();
		$flag = $_DAO->update($class);
		unset($_DAO);
		return $flag;
	}


	public function delete($id) {
		$_DAO = new InstituicaoDAO();
		$flag = $_DAO->delete($id);
		unset($_DAO);
		return $flag;
	}
}

?>