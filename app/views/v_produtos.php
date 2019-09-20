<table border="1">
    <tr>
        <th>COD</th>
        <th>Nome Produto</th>
        <th>-</th>
    </tr>
    <?php
  
   echo $_SESSION['id']; 
     if(!isset($_SESSION['id'])){
        
        foreach ($dados["produtos"] as $p){
            echo"<form method='POST' action=".BASE_URL."/produto/detalhar><tr>
            <td>".$p->getId()."</td>
            <td>".$p->getNome()."</td>
            <td><input name='id' type='number' hidden value='".$p->getId()."'> <input type='submit' value='Detalhar'></form></td>
            
            </tr>";
        }
       
    

     }else{
 //echo "<pre>".print_r($dados, true)."</pre>";
 foreach ($dados["produtos"] as $p){
    echo "<form method='POST' action=".BASE_URL."/produto/detalhar><tr>
    <td>".$p->getId()."</td>
    <td>".$p->getNome()."</td>
    <td><input name='id' type='number' hidden value='".$p->getId()."'> <input type='submit' value='Detalhar'></form></td>
</tr>";


 }
}
?>
 
   
</table>