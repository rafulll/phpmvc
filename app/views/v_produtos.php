<table border="1">
    <!-- <tr>
        <th>COD</th>
        <th>Nome Produto</th>
        <th>-</th>
    </tr> -->
    <?php
  
//    echo $_SESSION['id']; 
//      if(!isset($_SESSION['id'])){
        
//         foreach ($dados["produtos"] as $p){
//             echo"<form method='POST' action=".BASE_URL."/produto/detalhar><tr>
//             <td>".$p->getId()."</td>
//             <td>".$p->getNome()."</td>
//             <td><input name='id' type='number' hidden value='".$p->getId()."'> <input type='submit' value='Detalhar'></form></td>
            
//             </tr>";
//         }
       
    

//      }else{
//  //echo "<pre>".print_r($dados, true)."</pre>";
//  foreach ($dados["produtos"] as $p){
//     echo "<form method='POST' action=".BASE_URL."/produto/detalhar><tr>
//     <td>".$p->getId()."</td>
//     <td>".$p->getNome()."</td>
//     <td><input name='id' type='number' hidden value='".$p->getId()."'> <input type='submit' value='Detalhar'></form></td>
// </tr>";


//  }
// }
?>
 
   
</table>

<!DOCTYPE html5>
<html>
<head>
	<title>Proferta - Seja Bem Vindo ! </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="../../css/style.css" rel="stylesheet" type="text/css">


</head>
<body style="
    background-color: #cccccc;
    position: all;">

 
 
<nav class="navbar navbar-expand-lg navbar-light bg-light" ><?php

// define("PATH_SESSION", dirname(__FILE__));
// require_once(PATH_SESSION . "/../../connection/connection.class.php");
//     $conObj = new Connection();
//     $con = $conObj->getConnection();
    if(isset($_SESSION['id'])){
     
     echo "<a class='navbar-brand'  href='#'></a>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo02' aria-controls='navbarTogglerDemo02' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div  class='collapse navbar-collapse' id='navbarTogglerDemo02'> Bem Vindo ".$_SESSION['id'].".
    <ul class='navbar-nav mr-auto mt-2 mt-lg-0'>
     
    </ul>
  </div>
</nav>";
}else{

}
    // }else{
//        $sql_prof = "SELECT profile_img, nome, saldo FROM userr WHERE cpf = ?";
//   $stm_prof = $con->prepare($sql_prof);
//   $stm_prof->bindValue(1,$_SESSION['id']);
//   $stm_prof->execute();
//   $row = $stm_prof->fetchAll();
//   foreach ($row as $key => $value) {
//     echo " <img width='50px' height='50px' src='".$value['profile_img']."'>  <b> ". $value['nome'] . " </b>  "    . "<div class='btn'><font color='green'> <b>R$ ". number_format((float)$value['saldo'], 2, ',', '.') . "</font></b></div>";
//     echo "<a class='navbar-brand' href='#'></a>
//   <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo02' aria-controls='navbarTogglerDemo02' aria-expanded='false' aria-label='Toggle navigation'>
//     <span class='navbar-toggler-icon'></span>
//   </button>
//   <div class='collapse navbar-collapse' id='navbarTogglerDemo02'>
//     <ul class='navbar-nav mr-auto mt-2 mt-lg-0'>
//       <li class='nav-item active'>
//         <a class='btn btn-danger' href='logout.php'>Sair <span class='sr-only'>(current)</span></a>
//       </li>
//     <a class='navbar-brand' href='#'></a>
//       <li class='nav-item'>
//        <form class='nav' method='post' action='./add_prod'><input name='user' type='hidden' value='".$_SESSION['id']."'> <input class='btn btn-outline-primary' type='submit' value='Vender um produto.'></form>
//       </li>
//       <a class='navbar-brand' href='#'></a>
//       <li class='nav-item'>
//         <form class='nav' action='./my_prod/' method='POST'><input name='owner' type='hidden' value='".$_SESSION['id']."'><input class='btn btn-outline-warning' type='submit' value='Meus Produtos'></form>
//       </li>
//            <a class='navbar-brand' href='#'></a>
//       <li class='nav-item'>
//         <form class='nav' action='./my_deals/' method='POST'><input name='owner' type='hidden' value='".$_SESSION['id']."'><input class='btn btn-outline-dark' type='submit' value='Minhas Vendas'></form>
//       </li>
//          <a class='navbar-brand' href='#'></a>
//       <li class='nav-item'>
//         <form class='nav' action='./my_deals2/' method='POST'><input name='owner' type='hidden' value='".$_SESSION['id']."'><input class='btn btn-outline-dark' type='submit' value='Minhas Compras'></form>
//       </li>
//     </ul>
//     <form class='form-inline my-2 my-lg-0'>
//       <input class='form-control mr-sm-2' type='search' placeholder='Procurar produto'>
//       <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Procurar</button>
//     </form>
//   </div>
// </nav>";
//   }
// }
  
 
?>
  

	<div class="jumbotron text-center">
  <h1>
   </h1>
  <p>Compre e Venda, Produtos e Serviços.</p> 
</div>
<div class="container" >
<ul class='navbar-nav mr-auto mt-2 mt-lg-0'style="align-: center;">
<li class='nav-item active' >
    <form class='form-inline my-2 my-lg-0'  >
      <input class='form-control mr-sm-2' type='search' placeholder='Procurar produto' >
      <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Procurar</button>
    </form>
    </li>
    </ul> 
    </div>
<div class="container">
<?php echo $_SESSION['id']; 
echo "<form action='/index/nova_venda' method='POST'><input type='hidden' name='session' value='".$_SESSION['id']."'> <input type='submit' value='vender'></form>"
?>
  <!-- VISUALIZANDO PRODUTOS DE TODOS -->
  <?php
  
 
   echo " <div class='row'>
 <div class='container'>
 <div class='row'>";


 foreach ($dados["produtos"] as $p => $value) {
    
       
echo "      
              <div class='col-md-4'>
                <div class='card mb'>
                     <img class='card-img-top' src='https://lallahoriye.com.tirzee.com/wp-content/uploads/2019/04/Product_Lg_Type.jpg' alt='s'>
                      <div class='card-body mb'>
                        <h5 class='card-title'>".$value->getId()."</h5>
                        <div style='background-color: lightgrey' class='card'>Anunciante:<h5 class='card-title'>  DONO </div>
                        <p class='card-text'>".$value->getNome()."</p>
                        <p class='card-text'> R$ ".number_format((float)$value->getPreco(), 2, ',', '.')." - 
                        <s>".number_format((float)$value->getPreco(), 2, ',', '.')."</s>
                        </p>
                        
                        
                
                  </div>
              
                  </div>
                  </div>
         ";
 
}
echo "</div></div></div>";
// }else{
//   $stm_qtd->execute();
//   $row = $stm_qtd->fetchAll();
//  echo "
//   <div class='row'>
//       <div class='container'>
//          <div class='row'>";
//     foreach ($row as $key => $value) {  
      
//       $line = preg_split("/[\r\n]+/", $value['descript'], 3);
//       array_pop($line);
//     # code...
     
// echo "        <div class='col-md-4'>
//                     <div class='card-group' align='center'>
//                         <div class='card' style='width: 18rem; height: 40rem'>
//                           <img class='card-img-top' src='.".$value['url']."' alt='Card image cap'>
//                           <div class='card-body' style='width: 100%'>
//                               <div style='background-color: lightgreen' class='card'><h4 class='card-title'>".$value['pnome']."</h4></div>
//                               <div style='background-color: lightgrey' class='card'>
//                               Anunciante:<h5 class='card-title'>  ".$value['uname']."</h5></div>
//                               <div class='card'><p class='card-text'>".implode($line)."<br></p></div>
//                               <div class='card-item' >De:<p class='card-text'><s>". number_format((float)$value['valor'], 2, ',', '.')."</s></p></div>
//                               <div > Por:<p class='card-text'>".number_format((float)$value['valor'], 2, ',', '.')." </div>
//                               <form action='../../details/prod/' method='POST'>
//                                 <input name='prod' type='hidden' value='".$value['id']."'>
//                                 <input name='owner' type='hidden' value='".$value['id_user']."'> 
//                                 <input name='session' type='hidden' value='".$_SESSION['id']."'>
//                                   <input type='submit' class='btn btn-success' value='Comprar'>
//                               </form>
//                           </div>
//                         </div>
//                     </div>
//               </div>
// ";
// }
echo "</div>
  </div>
</div>";

  
    
  
  
        
    
  ?>
</div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>