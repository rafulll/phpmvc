<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Produto</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>
<body>
<h1>Cadastrar Produto</h1><br>
    <form class="form-control" method="POST" action="/add_produto">
    <input type="text" name="nome"  placeholder="Nome" id="">
    <input type="number" name="valor_compra"  placeholder="Valor de Compra" id="">
    <input type="number" name="valor_venda"  placeholder="Valor de Venda" id="">
    <input type="number" name="quantidade" placeholder="Quantidade" id="">
    <input class="btn btn-success" type='submit' value="Cadastrar Produto">
    </form>
</body>
</html>