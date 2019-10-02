<?php
require_once PATH_APP . "/controllers/ControladorCore.php";

class Paginas extends ControladorCore
{

    public function index()
    {
        $this->renderView('homepage');
    }
    // public function signin()
    // {
    //     if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {
    //         $this->renderView("v_login");
    //     } else {
    //         echo $_SESSION['id'];
    //     }
    // }
    public function cadastro_prod()
    {
        $this->renderView('cadastro_produto');
    }
    public function add_prod()
    {
        if (!isset($_POST['nome']) || !isset($_POST['valor_compra']) || !isset($_POST['valor_venda']) || !isset($_POST['quantidade'])) {

            $this->renderView('cadastro_produto');
            return;
        } else {
            $this->importModel("Produto");
            $this->importDao("ProdutoDao");
            $dados = array();
            array_push($dados, $_POST['nome']);
            array_push($dados, $_POST['valor_compra']);
            array_push($dados, $_POST['valor_venda']);
            array_push($dados, $_POST['quantidade']);
            $ins = (new ProdutoDAO())->inserir($dados);
            $this->sendResponse('resultado', $ins);
            $this->renderView('cadastro_produto');
        }
    }
    // public function vProdutos()
    // {

    //     $this->importModel("Produto");
    //     $this->importDao("ProdutoDao");
    //     $this->importDao("VendaDAO");


    //     $venda = (new VendaDAO())->buscarTodos();
    //     $produtos = (new ProdutoDao())->buscarTodos();
    //     var_dump($produtos);
    //     //$this->sendResponse("usuario", $_POST['cliente']);
    //     $this->sendResponse("produtos", $produtos);
    //     $this->sendResponse("venda", $venda);

    //     $this->renderView('vprod');
    // }
    public function details()
    {
        $this->importDao("ProdutoDao");
        $this->importDao("VendaDAO");
        $this->importDao("UserDAO");
        $this->importDao("ItemVendaDAO");
        if (empty($_POST['venda'])) {
            echo "<font color='red'><h1 style='text-color: red;' align='center'>Selecione a Venda.</h1></font> ";
            $dao = (new UserDAO())->buscarTodos();
            $prod = (new ProdutoDAO())->buscarTodos();
            $venda  = (new VendaDAO())->buscarTodos();

            $this->sendResponse('user', $dao);
            $this->sendResponse('venda', $venda);
            $this->sendResponse('produtos', $prod);
            //$this->sendResponse('sessao', $_POST['session']);
            $this->renderView('nova_venda');
            return;
        } else {
            $venda = (new VendaDAO())->buscar($_POST['venda']);
            $itens_venda = (new ItemVendaDAO())->buscar($_POST['venda']);
            $this->sendResponse('venda', $venda);
            $this->sendResponse('itens', $itens_venda);
            $prod = (new ProdutoDao())->buscarTodos();
            $this->sendResponse('prod', $prod);
            $this->renderView('details');
            return;
        }


        $prod = (new ProdutoDao())->buscarTodos();
        $this->sendResponse('prod', $prod);
        $this->renderView('details');
    }
    public function cadastrar()
    {
        $this->renderView("cadastro");
    }
    public function vender()
    {

        $this->renderView('nova_venda');
    }
    public function remover_item()
    {
        if (!isset($_POST['item']) || !isset($_POST['venda'])) {
            echo " <h1>Não há item na venda pra deletar ou a Venda já foi paga.</h1> ";
           
            return;
        }
        $dados = array();
        array_push($dados, $_POST['item']);
        array_push($dados, $_POST['venda']);
        $this->importDao("ItemVendaDAO");
        $this->importDao("UserDAO");
        $this->importDao("ProdutoDAO");
        $this->importDao("VendaDAO");
        $venda2 = (new ItemVendaDAO())->excluir($dados);
        $dao = (new UserDAO())->buscarTodos();
        $prod = (new ProdutoDAO())->buscarTodos();
        $venda = (new VendaDAO())->buscar($_POST['venda']);
        $itens    = (new ItemVendaDAO())->buscar($_POST['venda']);

        $this->sendResponse('user', $dao);
        $this->sendResponse('venda', $venda);
        $this->sendResponse('prod', $prod);
        $this->sendResponse('itens', $itens);

        //$this->sendResponse('sessao', $_POST['session']);
        $this->renderView('details');
    }
    public function nova_venda()
    {


        $this->importDao('UserDAO');
        $this->importDao('ProdutoDAO');
        $this->importDao('VendaDAO');
        $this->importModel("Usuario");
        $this->importModel("Produto");

        if (empty($_POST['cliente'])) {
            echo "<font color='red'><h1 align='center'>Selecione o Cliente</h1></font>";
            $dao = (new UserDAO())->buscarTodos();
            $prod = (new ProdutoDAO())->buscarTodos();
            $venda  = (new VendaDAO())->buscarTodos();

            $this->sendResponse('user', $dao);
            $this->sendResponse('venda', $venda);
            $this->sendResponse('produtos', $prod);
            //$this->sendResponse('sessao', $_POST['session']);
            $this->renderView('nova_venda');
            return;
        } elseif (isset($_POST['cliente'])) {
            echo " <font color='lightgreen'><h1 align='center'>Venda Criada, Selecione e continue!</h1> </font>";
            $nova_venda = (new VendaDAO())->inserir($_POST['cliente']);
            $this->sendResponse('info', '');
            $dao = (new UserDAO())->buscarTodos();
            $prod = (new ProdutoDAO())->buscarTodos();
            $venda  = (new VendaDAO())->buscarTodos();

            $this->sendResponse('user', $dao);
            $this->sendResponse('venda', $venda);
            $this->sendResponse('produtos', $prod);
            //$this->sendResponse('sessao', $_POST['session']);
            $this->renderView('nova_venda');
            return;
        } else {
            $this->sendResponse('info', '');
            $dao = (new UserDAO())->buscarTodos();
            $prod = (new ProdutoDAO())->buscarTodos();
            $venda  = (new VendaDAO())->buscarTodos();

            $this->sendResponse('user', $dao);
            $this->sendResponse('venda', $venda);
            $this->sendResponse('produtos', $prod);
            //$this->sendResponse('sessao', $_POST['session']);
            $this->renderView('nova_venda');
            return;
        }
    }
    public function add_item()
    {
        if (!isset($_POST['item']) || !isset($_POST['venda']) || empty($_POST['qtd'])) {
            echo "<h1>Não há itens para adicionar ou a venda já foi paga.</h1>";
            return;
        } else {
            $this->importDao("ItemVendaDAO");
            $req = array();
            array_push($req, $_POST['venda']);
            array_push($req, $_POST['item']);
            array_push($req, $_POST['qtd']);
            $prod = (new ItemVendaDAO())->inserir($req);
            $this->importDao("ProdutoDao");
            $this->importDao("VendaDAO");

            $venda = (new VendaDAO())->buscar($_POST['venda']);
            $itens_venda = (new ItemVendaDAO())->buscar($_POST['venda']);
            $prod = (new ProdutoDao())->buscarTodos();
            $this->sendResponse('venda', $venda);
            $this->sendResponse('itens', $itens_venda);
            $this->sendResponse('prod', $prod);

            $this->renderView('details');
        }
    }
    public function pagar()
    {
        $this->importDao('VendaDAO');
        $this->importDao('ItemVendaDAO');
        $this->importDao('ProdutoDAO');
        $this->importModel("Usuario");
        $this->importModel("Produto");
        $this->importModel("Item");
        if (empty($_POST['alt_venda'])) {
            echo "<font color='lightgreen'><h1 align='center'>Como assim? Leve Dados! Selecione a venda ;)</h1> </font>";

            $venda = (new VendaDAO())->buscar($_POST['venda']);
            $itens_venda = (new ItemVendaDAO())->buscar($_POST['venda']);
            $prod = (new ProdutoDao())->buscarTodos();
            $this->sendResponse('venda', $venda);
            $this->sendResponse('itens', $itens_venda);
            $this->sendResponse('prod', $prod);

            $this->renderView('details');
            return;
        } else {
            $do = null;
            $do = (new VendaDAO())->atualizar($_POST['alt_venda']);
            if ($do == null) {
                $this->sendResponse('code', $do);
                $venda = (new VendaDAO())->buscar($_POST['alt_venda']);
                $itens_venda = (new ItemVendaDAO())->buscar($_POST['alt_venda']);
                $prod = (new ProdutoDao())->buscarTodos();
                $this->sendResponse('venda', $venda);
                $this->sendResponse('itens', $itens_venda);
                $this->sendResponse('prod', $prod);

                $this->renderView('details');
                return;
            }
            $venda = (new VendaDAO())->buscar($_POST['alt_venda']);
            $itens_venda = (new ItemVendaDAO())->buscar($_POST['alt_venda']);
            $prod = (new ProdutoDao())->buscarTodos();
            $this->sendResponse('venda', $venda);
            $this->sendResponse('itens', $itens_venda);
            $this->sendResponse('prod', $prod);

            $this->renderView('details');
        }
        $venda = (new VendaDAO())->buscar($_POST['alt_venda']);
        $itens_venda = (new ItemVendaDAO())->buscar($_POST['alt_venda']);
        $prod = (new ProdutoDao())->buscarTodos();
        $this->sendResponse('venda', $venda);
        $this->sendResponse('itens', $itens_venda);
        $this->sendResponse('prod', $prod);

        $this->renderView('details');
    }
    public function newuser()
    {
        var_dump($_POST['name']);
        if (!(isset($_POST['name'])) || !(isset($_POST['senha']))) {
            echo "Digite";
            return;
        }

        $this->importModel("Usuario");
        $this->importDao('UserDAO');


        $obj = array();
        for ($i = 0; $i < 2; $i++) {
            array_push($obj, $_POST['name']);
            array_push($obj, $_POST['login']);
            array_push($obj, $_POST['senha']);
        }

        $dao = (new UserDAO())->inserir($obj);
    }
    // public function authenticate()
    // {
    //     if (!isset($_POST['username']) || !isset($_POST['password'])) {
    //         echo "Necessario fazer login primeiro.";
    //         return;
    //     }
    //     session_start();

    //     if (($_POST['username'] == "" || $_POST['username'] == null) || ($_POST['password'] == "" || $_POST['password'] == null)) {
    //         //session_destroy();
    //         echo "Digite algo nos campos<br> <a href='javascript:history.go(-1)'>voltar</a>";
    //         return;
    //     } else {
    //         $_SESSION['id'] = $_POST['username'];

    //         $this->importModel("Usuario");
    //         $this->importDao('UserDAO');
    //         $dao = new UserDAO();



    //         //code...


    //         $user = $dao->login($_POST['username'], $_POST['password']);
    //         if (!$user) {
    //             echo " :( alguma coisa esta errada.";
    //             return;
    //         }
    //         if (isset($user[0]['nome'])) {
    //             $this->listar();
    //             // $this->sendResponse("produtos", $produtos);
    //             $this->sendResponse("user", $user[0]['nome']);
    //             $this->renderView("v_produtos");
    //         } else {
    //             $this->listar();
    //             $this->sendResponse("user", $user);
    //             $this->renderView("v_produtos");
    //         }
    //     }
    // }

    // public function listar()
    // {

    //     //if(!isset($_SESSION['id'])){
    //     //    echo "Precisa fazer login<br> <a href='javascript:history.go(-1)'>Voltar</a>";
    //     //}else{
    //     $this->importModel("Produto");
    //     $this->importDao("ProdutoDao");

    //     $produtos = (new ProdutoDao())->buscarTodos();

    //     $this->sendResponse("produtos", $produtos);
    //     $this->renderView("v_produtos");
    //     //}


    //     //echo "<pre>".print_r($produtos, true)."</pre>";  
    // }

    public function detalharProduto()
    {
        require_once PATH_APP . "/models/Dados/Produto.php";
        require_once PATH_APP . "/models/DAO/ProdutoDao.php";

        if (isset($_POST["id"])) {
            $produtoBuscado = (new ProdutoDao())->buscar($_POST["id"]);

            $this->sendResponse("produto", $produtoBuscado);
            $this->renderView("v_detalhar_produto");
        } else {
            echo "Informe todos os campos obrigatórios...";
        }
    }
    // public function css()
    // {
    //     $this->renderView("css");
    // }
    // public function sobre()
    // {
    //     echo __FUNCTION__;
    // }


    public function erro404()
    {
        echo "PAGINA NÃO ENCONTRADA";
    }
}
