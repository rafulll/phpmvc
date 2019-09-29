<?php

class ControladorCore {
    
    private $dadosView = array();
    
    protected function carregarModelo($nomeModelo) {
        require_once PATH_APP."/models/Dados/$nomeModelo.php";
    }
    
    protected function carregarDAO($nomeDao) {
        require_once PATH_APP."/models/DAO/$nomeDao.php";
    }
    
    protected function carregarView($nomeView) {
        
        $dados = $this->dadosView;
        require_once PATH_APP."/views/v_header.php";
        require_once(PATH_APP."/views/$nomeView.php");
        require_once PATH_APP."/views/v_footer.php";
        
    }
    
    protected function addDadosPagina($nomeVariavel, $valor) {
      return  $this->dadosView[$nomeVariavel] = $valor;
    }
}
