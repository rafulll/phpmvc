<!doctype html>
<html lang='en'>
  <head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
<link href='css/style.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
    <title>Proferta Página Oficial</title>
  </head>
  <body>
   <link href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
<div class='container'>
    <?php 
   
	if(!isset($_SESSION['id'])){
         echo "<div id='login-row' class='row justify-content-center align-items-center'>
         <div id='login-column' class='col-md-6'>
             <div class='box'>
                 <div class='shape1'></div>
                 <div class='shape2'></div>
                 <div class='shape3'></div>
                 <div class='shape4'></div>
                 <div class='shape5'></div>
                 <div class='shape6'></div>
                 <div class='shape7'></div>
                 <div class='float'>
                 
                 <form class='form' method='post' action='./auth' align='center'>
                 
                 <h1>Entre Já!</h1>
                     <div class='form-group'>
                         <label for='username' class='text-strong'>CPF:</label><br>
                         <input type='number' name='username' id='username' class='form-control'>
                     </div>
                     <div class='form-group'>
                         <label for='password' class='text-strong'>Senha:</label><br>
                         <input type='password' name='password' id='password' class='form-control'>
                     </div>
                     <div class='form-group' align='center'>
                         <input type='submit' name='submit' class='btn btn-info btn-md' value='Entrar'>
                     </div>
                     
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>";
        //include('v_login.php');  
	}else{
       
       if(is_array($dados['user'])){
        foreach ($dados['user'] as $u => $value) {
            echo $value->getNome();
            // . "< Ok"
        }
       }else{
        echo $dados['user'];
       }
        
        echo '</div>';
        // foreach($dados['usuario'] as $key) {
        //     # code...
        //     echo $key['username'];
        // }
       
	}
	
		?>
       

<!------ Include the above in your HEAD tag ---------->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
  </body>
</html>