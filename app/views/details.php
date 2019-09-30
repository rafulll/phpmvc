<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .main {
            display: flex;
            flex-direction: row;
            justify-content: space-around;

        }
    </style>

</head>

<body>



    <div class="main">
        <div>





        </div>
        <div>


            <?php
            echo "<table border='1'>";
            echo "<tr>
     <td>ID</td>
     <td>Cliente</td>
     <td>Status</td>
     <td>Valor total.</td>
   </tr>";

            $valor_venda = 0;
            if (!isset($dados['venda'])) {
                echo "Você precisa especificar uma venda.";
            } else {

                foreach ($dados['itens'] as $key => $value) {
                    if (!isset($valor_venda)) {
                        echo "";
                    }
                    $valor_venda += $value->getPreco();
                }

                foreach ($dados['venda'] as $key => $value) {
                    $v = $value->getId();
                    if ($value->getStatus() == 'Concluida') {
                        echo "<h1>Dados da Venda</h1>   <tr>
        <td>" . $value->getId() . "</td>
        <td>" . $value->getNome() . "</td>
        <td style='background-color: lightgreen;'><b>Conta Paga</b></td>
        <td> R$ " . number_format((float) $valor_venda, 2, ',', '.') . "</td>
        </tr>";
                    } else {
                        echo "<h1>Dados da Venda</h1>   <tr>
        <td>" . $value->getId() . "</td>
        <td>" . $value->getNome() . "</td>
        <td style='background-color: red;'><font color='white'><b>" . $value->getStatus() . "</b></font></td>
        <td> R$ " . number_format((float) $valor_venda, 2, ',', '.') . "</td>
        </tr>";
                    }
                    $v = $value->getId();
                    $v2 = $value->getStatus();
                }

                if ($v2 == 'Concluida') {
                    echo "</table><form action='/vendas/pagar' method='POST'>
    <input name='alt_venda' value='" . $v . "' type='hidden'>
  </form> ";
                } elseif ($v2 == "Pagamento Pendente") {
                    echo "</table><form action='/vendas/pagar' method='POST'>
    <input name='alt_venda' value='" . $v . "' type='hidden'>
    <input class='btn-lg btn-success' type='submit' value='Pagar' >
  </form>
              ";
                }
            }

            ?>
            </table>
        </div>
        <div>
            <table border='1'>

                <?php
                if (empty($dados['itens'])) {
                    echo "<h1>Itens na Venda</h1>";
                    echo "Não há itens na venda.";
                } else {
                    echo "<h1>Itens na Venda</h1><form method='post' action='/vendas/details/remover_item'><select name='item'>";
                    foreach ($dados['itens'] as $key) {
                        echo "<option name='item' value='" . $key->getId() . "'>  " . $key->getId() . "
        " . $key->getNome() . "</option>
      
       ";
                    }
                }


                if (empty($dados['itens'])) { } else {
                    if ($v2 == 'Concluida') {
                        echo "<input disabled class='btn-lg btn-alert' value='-' type='submit'> </form><table>";
                    } elseif ($v2 == 'Pagamento Pendente') {
                        echo "</select>
<input hidden type='hdden' name='venda' value='" . $v . "'>";
                        echo "<input class='btn-lg btn-warning' value='-' type='submit'> </form><table>";
                    }
                }

                foreach ($dados['itens'] as $key) {
                    echo "<tr>
        <td>" . $key->getId() . "</td>
        <td>" . $key->getNome() . "</td>
</tr>";
                }
                echo "</table></div>
    <div><h1>Adicionar Itens à Venda</h1><form action='/vendas/details/add_item' method='POST'>
    <select name='item'>";
                foreach ($dados['prod'] as $produto) {
                    echo "<tr>
            <option name='item' value='" . $produto->getId() . "'>" . $produto->getId() . " - " . $produto->getNome() . "</option>
           
           
              ";
                }
                if ($v2 == 'Concluida') {
                    echo "
    <input disabled type='submit' class='btn-lg btn-alert' value='+'> </form>";
                } elseif ($v2 == 'Pagamento Pendente') {
                    echo " <input name='venda' hidden type='number' value='" . $v . "'>
    <input type='submit' class='btn-lg btn-primary' value='+'> </form>";
                }

                ?>
        </div>

    </div>
    <a style='margin-top: 10px;' class='btn-lg btn-primary' href="/index">Inicio </a><br><br><br>
    <a style='margin-top: 10px;' class='btn-lg btn-secondary' href="/vendas">Vendas </a>
</body>

</html>