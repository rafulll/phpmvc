<?php
require_once PATH_APP . "/models/DAO/Conexao.php";

$conexaoBanco = Conexao::getInstancia("localhost", "pdsiii-ecommerce", "root", "");
$conexaoBanco = $conexaoBanco->getConexao();