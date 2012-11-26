<?php
class Instituicao {
    private $instituicao;
    private $cidade;
    private $estado;
    private $id;

    function __construct(){}
    
    public function setInstituicao($instituicao){
        $this->instituicao = $instituicao;
    }

    public function getInstituicao(){
        return $this->instituicao;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
}
?>