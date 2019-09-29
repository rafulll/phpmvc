<?php
require_once PATH_APP."/controllers/ControladorCore.php";

class Paginas extends ControladorCore {
    
    public function index() {
        $this->carregarView('homepage');
    }
    public function signin(){
        if(!isset($_SESSION['username']) && !isset($_SESSION['id'])){
            $this->carregarView("v_login");
        }else{
            echo $_SESSION['id']; 
        }
        
       
    }
    public function cadastro_prod(){
        $this->carregarView('cadastro_produto');
    }
    public function add_prod(){
        if(!isset($_POST['nome']) || !isset($_POST['valor_compra']) || !isset($_POST['valor_venda'])){
            
            $this->carregarView('cadastro_produto');
            return;
        }else{
            $this->carregarModelo("Produto");
            $this->carregarDAO("ProdutoDao");
            $dados = array();
          array_push($dados, $_POST['nome']);
          array_push($dados, $_POST['valor_compra']);
          array_push($dados, $_POST['valor_venda']);
            $ins = (new ProdutoDAO())->inserir($dados);
            $this->addDadosPagina('resultado',$ins);
            $this->carregarView('cadastro_produto');
        }
    }
    public function vProdutos(){
       
        $this->carregarModelo("Produto");
        $this->carregarDAO("ProdutoDao");
        $this->carregarDAO("VendaDAO");
       
        
        $venda = (new VendaDAO())->buscarTodos();
        $produtos = (new ProdutoDao())->buscarTodos();
       var_dump($produtos);
        //$this->addDadosPagina("usuario", $_POST['cliente']);
        $this->addDadosPagina("produtos", $produtos);
        $this->addDadosPagina("venda", $venda);

        $this->carregarView('vprod');
    }
    public function detalhar_venda(){
            $this->carregarDAO("ProdutoDao");
            $this->carregarDAO("VendaDAO");
            $this->carregarDAO("ItemVendaDAO");
            if(!isset($_POST['venda'])){
                echo "Nenhuma venda especificada";
                return;
            }else{
                $venda = (new VendaDAO())->buscar($_POST['venda']);
                $itens_venda = (new ItemVendaDAO())->buscar($_POST['venda']);
                $this->addDadosPagina('venda', $venda);
                $this->addDadosPagina('itens', $itens_venda);
                $prod = (new ProdutoDao())->buscarTodos();
                $this->addDadosPagina('prod', $prod);
                $this->carregarView('details');
            }
            
            
            $prod = (new ProdutoDao())->buscarTodos();
            $this->addDadosPagina('prod', $prod);
            $this->carregarView('details');
    }
    public function cadastrar(){
        $this->carregarView("cadastro");
    }
    public function vender(){

        $this->carregarView('nova_venda');
    }
    public function remover_item(){
        if(!isset($_POST['item']) || !isset($_POST['venda'])){
            echo "Não há item na venda pra deletar";
            return;
        }
        $dados = array();
        array_push($dados, $_POST['item']);
        array_push($dados, $_POST['venda']);
        $this->carregarDAO("ItemVendaDAO");
        $this->carregarDAO("UserDAO");
        $this->carregarDAO("ProdutoDAO");
        $this->carregarDAO("VendaDAO");
        $venda2 = (new ItemVendaDAO())->excluir($dados);
        $dao = (new UserDAO())->buscarTodos();
        $prod = (new ProdutoDAO())->buscarTodos();
        $venda = (new VendaDAO())->buscar($_POST['venda']);
        $itens    = (new ItemVendaDAO())->buscar($_POST['venda']);

        $this->addDadosPagina('user', $dao);
        $this->addDadosPagina('venda', $venda);
        $this->addDadosPagina('prod', $prod);
        $this->addDadosPagina('itens', $itens);

       //$this->addDadosPagina('sessao', $_POST['session']);
        $this->carregarView('details');

    }
    public function nova_venda(){
    

        $this->carregarDAO('UserDAO');
        $this->carregarDAO('ProdutoDAO');
        $this->carregarDAO('VendaDAO');
        $this->carregarModelo("Usuario");
        $this->carregarModelo("Produto");
        if(isset($_POST['cliente'])){
            $nova_venda = (new VendaDAO())->inserir($_POST['cliente']);
            $this->addDadosPagina('info', 'Venda Criada, Selecione  e continue!');
        }   
       
        $dao = (new UserDAO())->buscarTodos();
        $prod = (new ProdutoDAO())->buscarTodos();
        $venda  =(new VendaDAO())->buscarTodos();

        $this->addDadosPagina('user', $dao);
        $this->addDadosPagina('venda', $venda);
        $this->addDadosPagina('produtos', $prod);
       //$this->addDadosPagina('sessao', $_POST['session']);
        $this->carregarView('nova_venda');
    }


    public function add_item(){
        if(!isset($_POST['item']) || !isset($_POST['venda'])){
            echo "Não há itens para adicionar";
            return;
        }else{
            $this->carregarDAO("ItemVendaDAO");
            $req = array();
            array_push($req, $_POST['venda']);
            array_push($req, $_POST['item']);
            $prod = (new ItemVendaDAO())->inserir($req);
            $this->carregarDAO("ProdutoDao");
            $this->carregarDAO("VendaDAO");
            
            $venda = (new VendaDAO())->buscar($_POST['venda']);
            $itens_venda = (new ItemVendaDAO())->buscar($_POST['venda']);
            $prod = (new ProdutoDao())->buscarTodos();
            $this->addDadosPagina('venda', $venda);
            $this->addDadosPagina('itens', $itens_venda);
            $this->addDadosPagina('prod', $prod);
          
            $this->carregarView('details');
        }
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
    public function css(){
        $this->carregarView("css");
    }
    public function sobre() {
        echo __FUNCTION__;
    }


    public function erro404() {
        echo "PAGINA NÃO ENCONTRADA";
    }
}
