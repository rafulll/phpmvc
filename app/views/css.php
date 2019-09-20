<!DOCTYPE html>
<html>
<head>
<style>
.item1 { grid-area: header; }
.item2 { grid-area: menu; }
.item3 { grid-area: main; }
.item4 { grid-area: right; }
.item5 { grid-area: footer; }

.grid-container {
  display: grid;
  grid-template-areas:
    'header header header header header header'
    'menu main main main right right'
    'menu footer footer footer footer footer';
   grid-gap: 1px; 
  /*background-color: #2196F3;*/
  padding: 1px; 
}
.left-button{
   /* justify-content: left; */
}
.default-button{
    /* justify-content: auto; */
}
.grid-container > .item1{
    background-color: red ; 
    height: 10%;
}
.grid-container > .item2 > .default-button{
    
    width: 100px;
}
.grid-container > div {

  background-color: rgba(255, 255, 255, 0.8);
  /* text-align: center; */
  /*padding: 20px 0;*/
  font-size: 11px;
}
</style>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>


<div class="grid-container">
  <div class="item1">
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">

    
     <a class='navbar' href='#'></a>
  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo02' aria-controls='navbarTogglerDemo02' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='collapse navbar-collapse' id='navbarTogglerDemo02'>
    <ul class='navbar-nav mr-auto mt-2 mt-lg-0'>
      <li class='nav-item active'>
        <a class='nav-link' href='../../'>Login <span class='sr-only'>(current)</span></a>
      </li>
      
      
    </ul>
    <form class='form-inline my-2 my-lg-0'>
      <input class='form-control mr-sm-2' type='search' placeholder='Procurar produto'>
      <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Procurar</button>
    </form>
  </div>
</nav>
</div>
  
  <div class="item2"><div class="w3-sidebar w3-bar-block" style="width:10%">
  <a href="#" class="btn btn-primary default-button">HOME</a>
  <a href="#" class="btn btn-primary default-button">CADASTRAS</a>
  <a href="#" class="btn btn-primary default-button">FALE CONOSCO</a>
  <a href="#" class="btn btn-primary default-button">SOBRE NOSSOS SERVIÇOS</a>

</div>
</div>
  <div class="item3">Main</div>  
  <div class="item4">Right</div>
  <div class="item5">Footer</div>
</div>

</body>
</html>
