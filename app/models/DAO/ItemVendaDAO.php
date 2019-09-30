<?php
require_once PATH_APP . "/models/DAO/Dao.php";
require_once PATH_APP . "/models/dados/Venda.php";
require_once PATH_APP . "/models/dados/Item.php";
class ItemVendaDAO extends DAO
{
    public function inserir($obj)
    {
        //var_dump($obj);
        try {

            $sql = "INSERT INTO tb_item_venda (tb_venda_id, tb_preco_produto_id, quantidade) values (?,?,?)";
            $rq = $this->pdo->prepare($sql);

            for ($i = 1; $i < 4; $i++) {

                if ($i == 1) {
                    $rq->bindValue($i, $obj[$i - 1]);
                }
                if ($i == 2) {
                    $rq->bindValue($i, $obj[$i - 1]);
                }
                if ($i == 3) {

                    $rq->bindValue($i, '1');
                }
                if ($i == 4) { }
            }


            $rq->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function atualizar($obj)
    { }
    public function excluir($obj)
    {
        $sql = "DELETE from tb_item_venda WHERE tb_item_venda.id = ? AND tb_item_venda.tb_venda_id = ?";
        $rq = $this->pdo->prepare($sql);



        $rq->bindValue(1, $obj[0]);

        $rq->bindValue(2, $obj[1]);

        $rq->execute();
    }
    public function buscar($venda)
    {

        $sql = "SELECT tiv.id as id_item_venda, tv.usuario_cliente, tp.nome, tpp.preco_venda, tiv.quantidade as i_qtd FROM tb_item_venda tiv JOIN tb_venda tv ON tv.id = tiv.tb_venda_id JOIN tb_produto tp ON tp.id = tiv.tb_preco_produto_id JOIN tb_preco_produto tpp ON tpp.tb_produto_id = tp.id WHERE tv.id = ?";
        $rq = $this->pdo->prepare($sql);
        $rq->bindValue(1, $venda);
        $rq->execute();
        $dados = $rq->fetchAll();
        $itens = array();
        // echo "dados: <br><br>";
        // var_dump($dados);

        // echo " <Br><br> itens: <br><br>";

        foreach ($dados as $key => $value) {
            array_push($itens, (new Item($value['id_item_venda'], $value['nome'], $value['usuario_cliente'], ($value['preco_venda'] * $value['i_qtd']), $value['i_qtd'])));
            // var_dump($itens);

        }

        return $itens;
    }
    public function buscarTodos()
    { }
}
