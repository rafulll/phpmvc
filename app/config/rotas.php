<?php

//$rotas[""] = array("rota"=>"/", "controller"=>"paginas", "acao"=>"index");
$rotas["home"] = array("rota"=>"/home", "controller"=>"paginas", "acao"=>"index");
$rotas["reg"] = array("rota"=>"/cadastrar", "controller"=>"paginas", "acao"=>"cadastrar");

$rotas["produtos"] = array("rota"=>"/produtos", "controller"=>"paginas", "acao"=>"listar");
$rotas["produto/detalhar"] = array("rota"=>"/produto/detalhar", "controller"=>"paginas", "acao"=>"detalharProduto");

$rotas["produtos/listar"] = array("rota"=>"/produtos/listar", "controller"=>"paginas", "acao"=>"sobre");
$rotas["novousuario"] = array("rota"=>"/register", "controller"=>"paginas", "acao"=>"newuser");
$rotas["signin"] = array("rota"=>"/entrar", "controller"=>"paginas", "acao"=>"signin");
$rotas["authenticate"] = array("rota"=>"/auth", "controller"=>"paginas", "acao"=>"authenticate");
//echo "<pre>".print_r($rotas, true)."</pre>";