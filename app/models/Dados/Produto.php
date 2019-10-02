<?php

class Produto {
    
    private $id;
    private $nome;
    private $preco;
    private $qtd;
    
    public function __construct($id, $nome=null, $preco=null, $qtd=null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->qtd = $qtd;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setPreco($preco) {
        $this->preco = $preco;
    }
    public function getPreco() {
        return $this->preco;
    }
    public function getQtd() {
        return $this->qtd;
    }
    public function setQtd($qtd){
        $this->qtd = $qtd;

    }
}
