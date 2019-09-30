<?php

//$rotas[""] = array("rota"=>"/", "controller"=>"paginas", "acao"=>"index");
//$rotas["home"] = array("rota"=>"/home", "controller"=>"paginas", "acao"=>"index");
$rotas["reg"] = array("rota" => "/cadastrar", "controller" => "paginas", "acao" => "cadastrar");
$rotas["inicio"] = array("rota" => "/index", "controller" => "paginas", "acao" => "index");
$rotas["remover_item"] = array("rota" => "/vendas/details/remover_item", "controller" => "paginas", "acao" => "remover_item");
$rotas["pagar"] = array("rota" => "/vendas/pagar", "controller" => "paginas", "acao" => "pagar");

$rotas["add_produtos"] = array("rota" => "/add_produto", "controller" => "paginas", "acao" => "add_prod");
$rotas["cadastro_prod"] = array("rota" => "/cadastro_prod", "controller" => "paginas", "acao" => "cadastro_prod");

$rotas["produtos"] = array("rota" => "/produtos", "controller" => "paginas", "acao" => "listar");
$rotas["produto/detalhar"] = array("rota" => "/produto/detalhar", "controller" => "paginas", "acao" => "detalharProduto");

$rotas["produtos/listar"] = array("rota" => "/produtos/listar", "controller" => "paginas", "acao" => "sobre");
$rotas["novousuario"] = array("rota" => "/register", "controller" => "paginas", "acao" => "newuser");
$rotas["additem"] = array("rota" => "/vendas/details/add_item", "controller" => "paginas", "acao" => "add_item");
$rotas["authenticate"] = array("rota" => "/auth", "controller" => "paginas", "acao" => "authenticate");
$rotas["css"] = array("rota" => "/css", "controller" => "paginas", "acao" => "css");
//$rotas["newsell"] = array("rota"=>"/vender", "controller"=>"paginas", "acao"=>"vender");
$rotas["novavenda"] = array("rota" => "/vendas/new", "controller" => "paginas", "acao" => "nova_venda");
$rotas["details"] = array("rota" => "/vendas/details", "controller" => "paginas", "acao" => "details");
$rotas["vendas"] = array("rota" => "/vendas", "controller" => "paginas", "acao" => "nova_venda");



//echo "<pre>".print_r($rotas, true)."</pre>";
