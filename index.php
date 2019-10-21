<?php
//phpinfo();
/*
 * Inclui o arquivo com as constantes que poderão ser acessadas em toda a aplicação.
 */
require dirname(__FILE__)."/app/config/constantes.php";

/**
 * Carrega o arquivo de rotas.
 */
require dirname(__FILE__)."/app/config/rotas.php";


/*
 * Classe que intercepta a requisição e encaminha para o controlador adequado.
 */
require PATH_APP."/Init.php";

Init::getInstancia($rotas);