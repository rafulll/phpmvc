<?php

class ControladorCore {
    
    private $dadosView = array();
    
    protected function importModel($nomeModelo) {
        require_once PATH_APP."/models/Dados/$nomeModelo.php";
    }
    
    protected function importDao($nomeDao) {
        require_once PATH_APP."/models/DAO/$nomeDao.php";
    }
    
    protected function renderView($nomeView) {
        
        $dados = $this->dadosView;
        require_once PATH_APP."/views/v_header.php";
        require_once(PATH_APP."/views/$nomeView.php");
        require_once PATH_APP."/views/v_footer.php";
        
    }
    
    protected function sendResponse($nomeVariavel, $valor) {
      return  $this->dadosView[$nomeVariavel] = $valor;
    }
}
