<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <style>
    .main{
        display:flex;
        flex-direction:row;
        justify-content: space-around;
    }
  </style>

</head>
<body>
<div class="main">
   
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
   if(!isset($dados['venda'])){
       echo "Você precisa especificar uma venda.";

   }else{
    $v;
    foreach ($dados['itens'] as $key => $value) {
        if(!isset($valor_venda)){
        echo "";
    }
        $valor_venda += $value->getPreco();
    }

    foreach ($dados['venda'] as $key => $value) {
       
        echo "<h1>Dados da Venda</h1>   <tr>
        <td>".$value->getId()."</td>
        <td>".$value->getNome()."</td>
        <td>".$value->getStatus()."</td>
        <td> R$ ".number_format((float)$valor_venda, 2, ',', '.')."</td>
        </tr>";
        $v=$value->getId();
     
    }
   
  echo "</table>
            ";
   }
    
    ?>
    </table>
    </div>
    <div>
   <table border='1'>
        
    <?php
  if(empty($dados['itens'])){
    echo "<h1>Itens na Venda</h1>";
    echo "Não há itens na venda.";
    
}else{
    echo "<h1>Itens na Venda</h1><form method='post' action='/nova_venda/details/remover_item'><select name='item'>";
    foreach ($dados['itens'] as $key) {
        echo "<option name='item' value='".$key->getId()."'>  ".$key->getId()."
        ".$key->getNome()."</option>
      
       ";
    } 
}

echo "</select>
<input hidden type='hdden' name='venda' value='".$v."'>";
if(empty($dados['itens'])){

}else{
    echo "<input value='Remover' type='submit'> </form><table>";
}

    foreach ($dados['itens'] as $key) {
        echo "<tr>
        <td>".$key->getId()."</td>
        <td>".$key->getNome()."</td>
";    } 
    echo "</table></div>
    <div><h1>Adicionar Itens à Venda</h1><form action='/nova_venda/details/add_item' method='POST'>
    <select name='item'>";
foreach ($dados['prod'] as $produto) {
    echo "<tr>
            <option name='item' value='".$produto->getId()."'>".$produto->getId()." - ". $produto->getNome() ."</option>
           
           
              ";
}
echo " <input name='venda' hidden type='number' value='".$v."'>
<input type='submit' value='Adicionar'> </form>";
?>
    </div>
    
    </div>
</body>
</html>