<?php
require_once PATH_APP . "/models/DAO/Dao.php";
require_once PATH_APP . "/models/dados/Venda.php";
require_once PATH_APP . "/models/dados/Item.php";
class ItemVendaDAO extends DAO
{
    public function inserir($obj)
    {
       
       
       // var_dump($obj);
        try {

            $sql = "INSERT INTO tb_item_venda (tb_venda_id, tb_preco_produto_id, quantidade) values (?,?,?)";
            $rq = $this->pdo->prepare($sql);
            $sql_sel_qtd = "SELECT tp.nome, tpp.quantidade FROM tb_preco_produto tpp JOIN tb_produto tp on tpp.tb_produto_id = tp.id WHERE tpp.tb_produto_id = ?";
            $rq_qtd = $this->pdo->prepare($sql_sel_qtd);
           
            $rq_qtd->bindValue(1,$obj[1]);
            $rq_qtd->execute();
            $current_qtd = $rq_qtd->fetchAll();
           
               
            foreach ($current_qtd as $key => $value) {
               
               // echo "<br>Quantidade do item selecionado: ".$value['quantidade'];
                //echo "<br>Nova Quantidade ".($value['quantidade'] - $obj[2]);
                $new_qtd = ($value['quantidade'] - $obj[2]);
                $prodname = $value['nome'];
                $qtd = $value['quantidade'];
            }
            if($new_qtd < 0){
                echo "Quantidade indisponível. :( Só temos  ".$qtd." ",$prodname;
                return;
            }
            $sql_update_prod_qtd = "UPDATE tb_preco_produto SET quantidade = ? WHERE tb_produto_id = ?";
            $rq_update_qtd  = $this->pdo->prepare($sql_update_prod_qtd);
            $rq_update_qtd->bindValue(1,$new_qtd);
            $rq_update_qtd->bindValue(2, $obj[1]);
            $rq_update_qtd->execute();

            $rq->bindValue(1, $obj[0]);
            $rq->bindValue(2, $obj[1]);
            $rq->bindValue(3, $obj[2]);
             

            


            $rq->execute();
            //decrementar em tb_preco_produto
            echo $obj[1];
        }catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function atualizar($obj)
    { 
      
    }
    public function excluir($obj)
    {
        $sql = "DELETE from tb_item_venda WHERE tb_item_venda.id = ? AND tb_item_venda.tb_venda_id = ?";
        $rq = $this->pdo->prepare($sql);
        $sql_select_actual_qtd = "SELECT quantidade FROM tb_venda_produto WHERE id = ?";
        $stm_select_actual_qtd = $this->pdo->prepare($sql_select_actual_qtd);
        $stm_select_actual_qtd->bindValue(1, $obj[0]);
        $stm_select_actual_qtd->execute();
        $sql2 = "UPDATE tb_preco_protudo SET quantidade = ? WHERE id = ?";
        $stm = $this->pdo->prepare($sql2);
        $actual_qtd = $stm_select_actual_qtd->fetchAll();
        foreach ($actual_qtd as $key => $value) {
            $new_qtd = $value['quantidade'];
            $stm->bindValue(1, ($new_qtd+$obj[2]));
        }
       
        $stm->bindValue(2, $obj[0]);
        $stm->execute();

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
