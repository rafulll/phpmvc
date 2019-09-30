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

    <form class="form-control form-control-lg" method="POST" action="/add_produto">
    <a class="btn-lg btn-success" href='/index'>Pagina Inicial</a>
    <input class='form-control form-control-lg' type="text" name="nome"  placeholder="Nome" id="">
    <input class='form-control form-control-lg' type="number" name="valor_compra"  placeholder="Valor de Compra" id="">
    <input class='form-control form-control-lg' type="number" name="valor_venda"  placeholder="Valor de Venda" id="">
    <input class='form-control form-control-lg' type="number" name="quantidade" placeholder="Quantidade" id="">
    <input class="btn-lg btn-success" type='submit' value="Cadastrar Produto">
    </form>
</body>
</html>