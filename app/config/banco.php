<?php
require_once PATH_APP . "/models/DAO/Conexao.php";

$bdCon = Conexao::getInstancia("localhost", "pdsiii-ecommerce", "root", "");
$bdCon = $bdCon->getConexao();