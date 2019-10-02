<?php
//DaoGeral
require_once PATH_APP . "/models/DAO/Dao.php";
//Model
require_once PATH_APP . "/models/dados/Usuario.php";

class UserDAO extends Dao
{
    public static $v = 1;
    public function atualizar($obj)
    { }

    public function login($id, $senha)
    {
        try {
            $sql = "SELECT * FROM tb_usuario WHERE login = :identificador AND senha = :senha";
            $rq = $this->pdo->prepare($sql);
            $rq->bindValue(":identificador", $id);
            $rq->bindValue(":senha", $senha);
            $rq->execute();



            if ($rq->rowCount() > 0) {
                $result = array();
            } else {
                $result = null;
            }


            $result =  $rq->fetchAll();
            //var_dump($result);
            foreach ($result as $r) {
                if ($r['ativo'] == 0) {
                    echo "banido";
                    return;
                } else {
                    array_push($result, new Usuario($r['id'], $r['nome'], $r['tb_tipo_usuario_id'], $r['login'], $r['senha'], $r['ativo']));
                }
            }


            //var_dump($result);

        } catch (Exception $ex) { }

        return $result;
        //return $count;
    }

    public function buscarTodos()
    {
        try {
            $sql_user = "SELECT id, nome, login as l FROM tb_usuario";
            $rqu = $this->pdo->prepare($sql_user);
            $rqu->execute();
            $row = $rqu->rowCount();

            if ($row > 0) {
                $result = $rqu->fetchAll();
                $usuarios = array();

                foreach ($result as $key => $value) {
                    array_push($usuarios, new Usuario($value['id'], $value['nome'], null,  $value['l'], null, null));
                }
            } else {
                echo "não há usuarios.";
                return;
            }
           
        } catch (PDOException $e) {
            $e->getMessage();
        }
        return $usuarios;
    }

    public function excluir($id)
    { }
    public function buscar($id)
    { }

    public function inserir($obj)
    {

        if (!$obj) {
            echo "Alguma coisa deu errado";
            return;
        }
        try {
            $sql_v = "SELECT login FROM tb_usuario WHERE login = ?";
            $rqv = $this->pdo->prepare($sql_v);
            $rqv->bindValue(1, $obj[1]);
            $rqv->execute();
            $row = $rqv->rowCount();
            if ($row > 0) {
                echo "usuario ja cadastrado";
                return;
            }
            $sql = "INSERT INTO tb_usuario (nome, login, senha)  VALUES (?,?,?)";
            $rq = $this->pdo->prepare($sql);
            $rq->bindValue(1, $obj[0]);
            $rq->bindValue(2, $obj[1]);
            $rq->bindValue(3, $obj[2]);

            $rq->execute();
        } catch (PDOException $e) {
            echo "Impossivel inserir registro";
            return;
        }
        //code...
        echo "SUCESSO, ADICIONADO!";
    }
}
