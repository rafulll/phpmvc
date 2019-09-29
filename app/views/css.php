<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}
a{
  color: orange;
}
body {
  font-family: Arial;
  background: #f1f1f1;
}

.header {
   padding: 30px; 
  text-align: center;
  background: #fe5c50;
}

.header h1 {
  font-size: 50px;
}


.leftcolumn {   
  float: right;
  width: 75%;
}

.rightcolumn {
  float: left;
  width: 25%;
  background-color: #f1f1f1;
}

.itemmenu {
  background-color: #c800b1;
  width: 100%;
  padding: 20px;
}

.menu {
  background-color: #c800b1;
}
.publicidade {
  background-color: #fedb2a;
  height: 65%;
}
.conteudo {
  background-color: lightgreen;
  height: 100%;

}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.footer {
  padding: 20px;
  text-align: center;
  background: #094f66;
  margin-top: 20px;
}


</style>
</head>
<body>

<div class="header">
  <h1>Topo do Site</h1>
  
</div>



<div class="row">
  <div class="leftcolumn">
    <div class="conteudo">
      <h2 align="center" style="height: 100%;">PRINCIPAL</h2>
      
    </div>
    <div class="menu">
      
    </div>
  </div>
  <div class="rightcolumn">
    <div class="menu">
      <h2>MENU</h2>
      <div class="itemmenu" style="height:100px;">HOME</div>
      <div class="itemmenu" style="height:100px;">QUEM SOMOS</div>
      <div class="itemmenu" style="height:100px;">CONTATO</div>
    </div>
    <div class="publicidade">
      <h3>Publicidade</h3>
      <div></div>
    </div>
    
  </div>
</div>

<div class="footer">
  <p>Rodapé do Site - <a href="">Desenvolvimento de Sistemas</a></p>
</div>

</body>
</html>
