<?php
require_once PATH_APP . "/models/DAO/Dao.php";
require_once PATH_APP . "/models/dados/Produto.php";

class ProdutoDao extends Dao
{

    public function atualizar($obj)
    { }

    public function buscar($id)
    {
        try {
            $sql = "SELECT * FROM tb_preco_produto WHERE id = :identificador";
            $requisicao = $this->pdo->prepare($sql);
            $requisicao->bindValue(":identificador", $id);
            $requisicao->execute();

            $resultado = $requisicao->fetch();
        } catch (Exception $ex) { }
        return $resultado;
    }

    public function buscarTodos()
    {
        $produtos = array();
        try {
            $sql = "SELECT tb_preco_produto.id , tb_produto.nome FROM tb_preco_produto JOIN tb_produto ON tb_produto.id = tb_preco_produto.tb_produto_id WHERE tb_preco_produto.ativo = 1";

            $requisicao = $this->pdo->prepare($sql);
            $requisicao->execute();
            $resultado = $requisicao->fetchAll();

            foreach ($resultado as $r) {
                array_push($produtos, new Produto($r['id'], $r['nome']));
            }
        } catch (Exception $ex) { }

        return $produtos;
    }

    public function excluir($id)
    { }

    public function inserir($obj)
    {
        if (empty($obj)) {
            echo 'Traga dados.';
            return;
        } else {
            // echo $obj;
            $sql = "SELECT nome FROM tb_produto WHERE nome = ?";
            $rq = $this->pdo->prepare($sql);
            $rq->bindValue(1, $obj[0]);
            $rq->execute();
            $row = $rq->rowCount();
            if ($row > 0) {
                echo "Ja existe um produto com nome <b>" . $obj[0] . "</b>, escolha outro.";
                return;
            } else {
                try {
                    $sql_i = "INSERT INTO tb_produto (nome) VALUES (:nome)";
                    $rq_i = $this->pdo->prepare($sql_i);
                    $rq_i->bindValue(":nome", $obj[0]);
                    $rq_i->execute();
                    sleep(1);
                    $sql2 = "SELECT nome, id FROM tb_produto WHERE nome = :nome";
                    $rq2 = $this->pdo->prepare($sql2);
                    $rq2->bindValue(':nome', $obj[0]);
                    $rq2->execute();
                    $data = $rq2->fetchAll();
                    $row2 = $rq2->rowCount();

                    if ($row2 == 0) {
                        echo "Houve um erro inesperado.";
                        return;
                    } else {
                        //var_dump($data);
                        foreach ($data as $key => $value) {
                            $id = $value['id'];
                            echo $value['id'];
                        }
                        $sql_ii = "INSERT INTO tb_preco_produto (tb_produto_id, preco_compra, preco_venda, quantidade, ativo)
                                    VALUES (?,?,?,?,?)";
                        $pc = $obj[1];
                        $pv = $obj[2];
                        $rq3 = $this->pdo->prepare($sql_ii);
                        //echo $pc ." - ".$pv;
                        //var_dump($obj[1]);
                        //var_dump($obj[2]);
                        $rq3->bindValue(1, $id);
                        $rq3->bindValue(2, $pc);
                        $rq3->bindValue(3, $pv);
                        $rq3->bindValue(4, 1);
                        $rq3->bindValue(5, 1);

                        $rq3->execute();
                        echo "Produto Cadastrado";
                        return "Produto Cadastrado";
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage() . " >>>>>>>>>> Erro.";
                }
            }
        }
    }
}
