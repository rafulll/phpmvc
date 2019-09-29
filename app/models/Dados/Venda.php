<?php
class Venda {
    private $id;
    private $status;
    private $cliente;
    private $data;
    private $itens = array();
    public function __construct($id, $cliente=null, $status, $data=null){
        $this->id = $id;
        $this->cliente = $cliente;
        $this->status = $status;
        $this->data = $data;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setNome($cliente){
        $this->cliente = $cliente;
    }
    public function getNome(){
        return $this->cliente;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getData(){
        return $this->data;
    }
}   
?>