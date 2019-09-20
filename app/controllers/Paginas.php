<?php
require_once PATH_APP."/controllers/ControladorCore.php";

class Paginas extends ControladorCore {
    
    public function index() {
        echo "CHEGOU NA CLASSE ".Paginas::class." | METODO ".__FUNCTION__;
    }
    public function signin(){
        if(!isset($_SESSION['username']) && !isset($_SESSION['id'])){
            $this->carregarView("v_login");
        }else{
            echo $_SESSION['id']; 
            
        }
        
       
    }
    public function cadastrar(){
        $this->carregarView("cadastro");
    }



    public function newuser(){
        var_dump($_POST['name']);
        if(!(isset($_POST['name'])) || !(isset($_POST['senha']))){
            echo "Digite";
            return;
        }

        $this->carregarModelo("Usuario");
        $this->carregarDAO('UserDAO');
        
        
        $obj = array();
        for ($i=0; $i < 2; $i++) { 
            array_push($obj, $_POST['name']);
            array_push($obj, $_POST['login']);
            array_push($obj, $_POST['senha']);
        }
        
        $dao = (new UserDAO())->inserir($obj);
    }
    public function authenticate(){
        if(!isset($_POST['username']) || !isset($_POST['password'])){
            echo "Necessario fazer login primeiro.";
            return;
        }
        session_start();
        
        if(($_POST['username'] == "" || $_POST['username'] == null) || ($_POST['password'] == "" || $_POST['password'] == null)){
            //session_destroy();
            echo "Digite algo nos campos<br> <a href='javascript:history.go(-1)'>voltar</a>";
            return;
        }else{
            $_SESSION['id'] = $_POST['username'];
            
            $this->carregarModelo("Usuario");   
            $this->carregarDAO('UserDAO');
            $dao = new UserDAO();
            
            
            
                //code...
                
                
                $user = $dao->login($_POST['username'],$_POST['password']);
                if(!$user){
                    echo " :( alguma coisa esta errada.";
                    return;
                }
                if(isset($user[0]['nome'])){
                    $this->listar();
                    // $this->addDadosPagina("produtos", $produtos);
                    $this->addDadosPagina("user", $user[0]['nome']);
                    $this->carregarView("v_produtos");
                }else{
                    $this->listar();
                    $this->addDadosPagina("user", $user);
                    $this->carregarView("v_produtos");
                }
                
               
        }
        
    }
   
    public function listar() {

        //if(!isset($_SESSION['id'])){
        //    echo "Precisa fazer login<br> <a href='javascript:history.go(-1)'>Voltar</a>";
        //}else{
            $this->carregarModelo("Produto");
            $this->carregarDAO("ProdutoDao");
        
            $produtos = (new ProdutoDao())->buscarTodos();
            
            $this->addDadosPagina("produtos", $produtos);
            $this->carregarView("v_produtos");
        //}
        
        
        //echo "<pre>".print_r($produtos, true)."</pre>";  
    }
    
    public function detalharProduto() {
        require_once PATH_APP."/models/Dados/Produto.php";
        require_once PATH_APP."/models/DAO/ProdutoDao.php";
        
        if (isset($_POST["id"])) {
            $produtoBuscado = (new ProdutoDao())->buscar($_POST["id"]);
            
            $this->addDadosPagina("produto", $produtoBuscado);
            $this->carregarView("v_detalhar_produto");
            
        } else {
            echo "Informe todos os campos obrigatórios...";
        }
    }
    
    public function sobre() {
        echo __FUNCTION__;
    }


    public function erro404() {
        echo "PAGINA NÃO ENCONTRADA";
    }
}
