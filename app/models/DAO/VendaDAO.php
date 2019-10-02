<?php
require_once PATH_APP . "/models/DAO/Dao.php";
require_once PATH_APP . "/models/dados/Venda.php";
class VendaDAO extends DAO
{

    public function inserir($obj)
    {
        try {
            $sql = 'INSERT INTO tb_venda (tb_status_venda_id, usuario_cliente, data) VALUES (?,?,now())';
            $rq = $this->pdo->prepare($sql);
            $rq->bindValue(1, 2);
            $rq->bindValue(2, $obj);
            $rq->execute();
        } catch (Exception $e) {
            echo $e->getMessage() . "<br>Algum erro ocorreu ao tentar fazer a solicitação.";
            return;
        }
    }

    public function atualizar($obj)
    {
        try {
            $sql = 'UPDATE tb_venda SET tb_status_venda_id = 1 where id = ?';
            $rq = $this->pdo->prepare($sql);
            $rq->bindValue(1, $obj);
            $rq->execute();
        } catch (Exception $e) {
            echo $e->getMessage() . "<br>Algum erro ocorreu ao tentar fazer a solicitação.";
            return null;
        }
        return "tudo ok";
    }
    public function excluir($id)
    { }
    public function buscar($id)
    {

        try {
            //  //JOIN tb_item_venda TIV ON TIV.tb_venda_id = TV.id 
            $sql =
            'SELECT TV.id,TSV.nome as tnome,TU.nome, TV.usuario_cliente as UC, TV.data as data  FROM tb_venda TV 
            JOIN tb_status_venda TSV ON TSV.id = TV.tb_status_venda_id
            JOIN tb_usuario TU ON TV.usuario_cliente = TU.id
            WHERE TV.id = ?';

            $rq = $this->pdo->prepare($sql);
            $rq->bindValue(1, $id);
            $rq->execute();
            $result = $rq->fetchAll();
            //var_dump($result);
            $resultado = array();
            foreach ($result as $key) {

                array_push($resultado, (new Venda($key['id'], $key['nome'], $key['tnome'], $key['data'])));
            }
            // var_dump($resultado);

        } catch (Exception $th) {
            throw $th;
        }
        return $resultado;
    }
    public function buscarTodos()
    {
        try {
            //  //JOIN tb_item_venda TIV ON TIV.tb_venda_id = TV.id 
            $sql =
            'SELECT TV.id,TSV.nome as tnome,TU.nome, TV.usuario_cliente as UC, TV.data as data  FROM tb_venda TV 
            JOIN tb_status_venda TSV ON TSV.id = TV.tb_status_venda_id
            JOIN tb_usuario TU ON TV.usuario_cliente = TU.id
            WHERE TV.tb_status_venda_id = 2 || TV.tb_status_venda_id = 1
            ORDER BY TSV.id desc';
            $rq = $this->pdo->prepare($sql);
            $rq->execute();
            $result = $rq->fetchAll();
            //var_dump($result);
            $resultado = array();
            foreach ($result as $key) {

                array_push($resultado, (new Venda($key['id'], $key['nome'], $key['tnome'], $key['data'])));
            }
            // var_dump($resultado);

        } catch (Exception $th) {
            throw $th;
        }
        return $resultado;
    }
}
