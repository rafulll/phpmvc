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

.main{
    height:50%;
    display:flex;
    flex-direction: row;
    justify-content:space-around;


}
</style>
</head>
<body>
<div class="main" >
<div><a href="/index"><button style='width: 100%;' class='btn-lg btn-primary'>Inicio
</button></a><br>

</div>
<div style='height: 100%;'>
       
           
<?php 
      
        echo "<form style='height: 100%;'  class='form-control form-control-lg' action='/vendas/details' method='POST'><h3>Continuar Venda</h3>Fique atento à <br>Hora, Codigo e Cliente da venda que está procurando.
                 <select class='form-control form-control-lg' name='venda'>
                 <option value='' type='hidden' style='display: none;' selected> Selecione a Venda</option> ";
            foreach ($dados['venda'] as $venda =>$value) {
                if($value->getStatus() == 'Pagamento Pendente'){
                    echo "
                    
                    
                        <option name='venda' value='".$value->getId()."'><".$value->getId()."> - Para: ".$value->getNome()." - Na data: ".$value->getData()."</option></br>";
                       
                }
                
            }
        ?>
          <input  style='margin-bottom: 5px;' type='submit' class='btn btn-warning' value="Continuar Venda Selecionada"><br>
        </select><br>
      
        </form>
</div>

<?php 


  
        echo "<div style='height: 100%;'>";
        echo "<form style='height: 100%;' action='/vendas/' class='form-control form-control-lg' method='POST'><h3>Nova Venda</h3>
        <select class='form-control form-control-lg' name='cliente'>";
        foreach ($dados['user'] as $key => $value) {
           
            
          
                echo "<option value='' type='hidden' style='display: none;' selected> Selecione o Cliente</option> 
                <option value='".$value->getId()."'> ".$value->getId(). " - " .$value->getNome()."</option><br>";
            
              
         
        }   
       
echo "<br></select><br>
<input style='margin-bottom: 5px;' type='submit' class='btn btn-warning' value='Criar Nova Venda para Cliente Selecionado'></form>";
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

