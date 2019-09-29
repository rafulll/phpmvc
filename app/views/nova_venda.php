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

<!-- <table border='1'>
    <tr>
        <td>ID</td>
        <td>NOME</td>
        <td>AÇÃO</td>
    </tr>
   
    
        <?php 
        // $itens_venda = array();
        //     foreach ($dados['produtos'] as $produto) {
        //         echo "<tr>
        //                 <td>".$produto->getId()."</td>
        //                 <td>".$produto->getNome()."</td>
        //                 <td style='text-align: center;'> <a href='/nova_venda/produtos/adicionar?item=".$produto->getId()."'> Adicionar </a></td>";
        //     }
        ?>
        
    
</table></div> -->
<div>
       
           
<?php 
        //echo $dados['venda_selecionada'];
        echo "Continuar Venda<form action='/nova_venda/details' method='POST'>
                 <select class='form-control form-control-lg' name='venda'>";
            foreach ($dados['venda'] as $venda =>$value) {
                if($value->getStatus() == 'Pagamento Pendente'){
                    echo "
                    
                    
                        <option name='venda' value='".$value->getId()."'><".$value->getId()."> - Para: ".$value->getNome()." - Na data: ".$value->getData()."</option></td>";
                       
                }
                
            }
        ?>
          <input type='submit' class='btn btn-primary' value="Continuar Venda Selecionada">
        </select>
      
        </form>
</div>

<?php 


        // if(!isset($dados['sessao'])){
        //     echo 'Necessario fazer login';
        //     return;
        // }else{

        //     $_SESSION['id'] = $dados['sessao'];
        echo "<div>NOVA VENDA PARA ";
        echo "<form action='/nova_venda/' method='POST'>
        <select name='cliente'>";
        foreach ($dados['user'] as $key => $value) {
            // if($value->getLogin() == $_SESSION['id']){
            
            // }else{
                echo "<option value='' type='hidden' style='display: none;' selected> Selecione o Comprador</option> 
                <option value='".$value->getId()."'> ".$value->getId(). " - " .$value->getNome()."</option><br>";
            
              
         
        }   
       
echo "<br></select><br>
<input type='submit' class='btn btn-warning' value='Criar Nova Venda para Cliente Selecionado'></form>";
if(isset($dados['info'])){
    echo $dados['info'];
}

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
    <?php
    
// echo "
// <div>";
// $i = 0;
// echo "<div class='produtos'>
// ";
// foreach ($dados['produtos'] as $key => $value) {
//     $i++;
// echo "
// <div>
//   <input type='checkbox'  name='item".$i."' value='".$value->getId()."'>
//   <label for=>".$value->getNome()."</label><input placeholder='quantidade' type='number' name='qtd".$i."'><br>
// </div>";
// }  
//  echo "
//  </div>

//  <input type='submit' value='prosseguir'>
//  </form>";             
           
        
    ?>

