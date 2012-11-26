<?php
require_once '../../../ChoiceOfGroups/Model/DataBase/DBConnection.class.php';
require_once '../../../ChoiceOfGroups/Model/Entity/Alunos.class.php';
require_once('IDAO.class.php');

class AlunosDAO implements IDAO {

	#CRUD = CREATE
	public function create($class) {
		try {
			#Variavel recebe instancia do objeto de conexão
			$_Connection = DBConnection::getInstance();

			#Variavel recebe objeto instanciado referente a classe
			$_Aluno = $class;

			#Monta SQL
			$sql  = "INSERT INTO cad_alunos";
			$sql .= "(aluno, email, observacao)";
			$sql .= "VALUES";
			$sql .= "(?, ?, ?)";

			#Troca parametros pelos valores recolhidos
			if ($result = $_Connection->prepare($sql)) {
				#aqui sera colocado o tipo do campo
				$result->bind_param('sss',
				$_Aluno->getAluno,
				$_Aluno->getEmail,
				$_Aluno->getObservacao);

				#Executa comando SQL
				$result->execute();
					
				#Verifica numero de erros
				if (!$result->errno == 0){
					throw new Exception($result->error);
					return false;
				}else
					return true;
					
				#Fecha Transação
				$result->close();
			}

			#Fecha Conexão
			$_Connection->closeConnection();

			#Libera da memoria
			unset($_Connection);

		} catch (Exception $e) {
			trigger_error($e->getMessage()." na Linha : ".$e->getLine());
		}
	}

	#CRUD = READ
	public function read() {
		try {
			$id = 0;
			$aluno = "";
			$observacao = "";
			$email = "";
				

			$retorno = array();

			#Variavel recebe instancia do objeto de conexão
			$_Connection = DBConnection::getInstance();
			$_Alunos = new Alunos();

			#Monta SQL
			$sql = "SELECT * FROM cad_alunos";

			$result = $_Connection->prepare($sql);

			$result->execute();

			if (!$result->errno == 0){
				throw new Exception($result->error);
				return null;
			}

			$result->bind_result(
					$id,
					$aluno,
					$observacao,
					$email
			);

			while ($result->fetch()) {
				$retorno[] = $_Aluno->setId($id);
				$_Aluno->setAluno($aluno);
				$_Aluno->setObservacao($observacao);
				$_Aluno->setEmail($email);
			}

			$result->close();

			#Fecha Conexão
			$_Connection->closeConnection();

			#Libera da memoria
			unset($_Connection);

			return $retorno;

		} catch (Exception $e) {
			trigger_error($e->getMessage()." na Linha : ".$e->getLine());
		}
	}

	#CRUD = READ
	public function readById($id) {
		#Declarando Variaveis
		$id = 0;
		$aluno = "";
		$observacao = "";
		$email = "";

		#Inicializando os Objetos
		$_Connection = DBConnection::getInstance();
		$_Alunos = new Alunos();

		$sql =  "SELECT * FROM cad_alunos ";
		$sql .= "WHERE id=? LIMIT 1";

		$result = $_Connection->prepare($sql);

		$result->bind_param('i', $id);

		$result->execute();

		if (!$result->errno == 0){
			throw new Exception($result->error);
			return null;
		}

		$result->bind_result(
				$id,
				$aluno,
				$observacao,
				$email
		);


		$result->fetch();

		$_Aluno->setId($id);
		$_Aluno->setAluno($aluno);
		$_Aluno->setObservacao($observacao);
		$_Aluno->setEmail($email);
			
		return $_Aluno;

		$result->close();

		$_Connection->closeConnection();
		unset($_Connection);
	}

	#CRUD = READ
	public function readByCriteria($criteria) {
		trigger_error("Não implementado");
	}

	#CRUD = UPDATE
	public function update($class) {
		try {
			#Variavel recebe instancia do objeto de conexão
			$_Connection = DBConnection::getInstance();

			#Variavel recebe objeto instanciado referente a classe
			$_Alunos = $class;

			#Monta SQL
			$sql  = "UPDATE cad_alunos SET";
			$sql .= "(aluno, observacao, email)";
			$sql .= "WHERE id = ? LIMIT 1";

			#Troca parametros pelos valores recolhidos
			if ($result = $_Connection->prepare($sql)) {
				#aqui sera colocado o tipo do campo
				$result->bind_param('sssi',
				$_Aluno->getAluno,
				$_Aluno->getObservacao,
				$_Aluno->getEmail,
				$_Aluno->getId);
					
				#Executa comando SQL
				$result->execute();
					
				#Verifica numero de erros
				if (!$result->errno == 0){
					throw new Exception($result->error);
					return false;
				}else
					return true;
					
				#Fecha Transação
				$result->close();
			}

			#Fecha Conexão
			$_Connection->closeConnection();

			#Libera Objeto
			unset($_Connection);

		} catch (Exception $e) {
			trigger_error($e->getMessage());
		}
	}

	#CRUD = DELETE
	public function delete($id) {
		try {
			#Variavel recebe instancia do objeto de conexão
			$_Connection = DBConnection::getInstance();

			#Monta SQL
			$sql  = " DELETE FROM cad_alunos ";
			$sql .= " WHERE ID_INSCRICAO=? LIMIT 1";

			#Troca parametros pelos valores recolhidos
			if ($result = $_Connection->prepare($sql)){
				$result->bind_param('i',
						$id
				);

				#Executa
				$result->execute();

				#Verifica Numeros de Erros
				if (!$result->errno == 0){
					throw new Exception($result->error);
					return false;
				}
				else
					return true;

				#Fecha
				$result->close();
			}

			#Fecha conexao com o banco
			$_Connection->closeConnection();

			#Libera Objeto
			unset($_Connection);

		} catch (Exception $e) {
			trigger_error($e->getMessage());
		}
	}
}