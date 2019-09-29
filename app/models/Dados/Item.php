<?php

class Item {
    
    private $id;
    private $nome;
    private $dono;
    private $preco;
    private $quantidade;
    public function __construct($id, $nome, $dono, $preco, $quantidade){
        $this->id = $id;
        $this->nome = $nome;
        $this->dono = $dono;
        $this->preco = $preco;
        $this->quantidade = $quantidade;

    }
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getDono(){
        return $this->dono;
    }
    public function setDono($dono){
        $this->dono = $dono;
    }
    public function getPreco(){
        return $this->preco;
    }
    public function setpreco($preco){
        $this->preco = $preco;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }
}
?>