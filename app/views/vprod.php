<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>
body{
    
}
.ownerInput:disabled{
    display: block;
    
}
.main{
    align-content:stretch;
    display:flex;
    flex-direction: row;
    justify-content:space-between;


}
</style>
</head>
<body>
<div class="main" >
<div>
<table border='1'>
    <tr>
        <td>ID</td>
        <td>NOME</td>
        <td>AÇÃO</td>
    </tr>
   
    
        <?php 
        $itens_venda = array();
            foreach ($dados['produtos'] as $produto) {
                echo "<tr>
                        <td>".$produto->getId()."</td>
                        <td>".$produto->getNome()."</td>
                        <td style='text-align: center;'> <a href='/nova_venda/details/add_prod?item=".$produto->getId()."'> Adicionar </a></td>";
            }
        ?>
        
    
</table></div>
<div>
       
           
<?php 
        //echo $dados['venda_selecionada'];
        echo "<form action='/nova_venda/produtos/pagar' method='POST'>
                 <select class='form-control form-control-lg' name='alterar_venda'>";
            foreach ($dados['venda'] as $venda =>$value) {
                if($value->getStatus() == 'Pagamento Pendente'){
                    echo "
                    
                    
                        <option value='".$value->getId()."'><".$value->getId()."> - Para: ".$value->getNome()." - Na data: ".$value->getData()."</option></td>";
                       
                }if($value->getStatus() == 'Concluida'){
                    // echo "<tr>
                    // <td><input  class='ownerInput' disabled  type='number' value='".$value->getId()."' name='alterar_venda'></td>
                    // <td>".$value->getNome()."</td>
                    // <td>".$value->getStatus()."</td>
                    // <td style='text-align: center;'> <input disabled  type='submit' value='Conta Paga!'> </a></td>";
                }
                
            }
        ?>
        </select>
        </form>
</div>
<div>
<?php 

?>

     
</div>
</div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">







</script>
</body>
</html>