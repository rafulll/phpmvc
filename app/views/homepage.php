<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
<style>
.main{
    margin-top: 0%;
    background: black;
    height: 100%;
    width:100%;
    display: flex; 
    flex-direction: column;

}
.dashboard{
    margin-top: 10%;
    display:flex;
    background: gray;
    width: 200px;
    height:200px;
}
.content{
    margin-left: 0px;
    margin-top: 100px;
    margin-bottom: 100px;
    background: gray;
    align-content: center;
    justify-content: center;
    height: 80%;
    width: 100%;
    display:flex; 
    flex-direction: row;
}
.item-menu{
    width:100%;
    height:100%;
}
.header{

    text-align: center;
    height: 20%;
    background: blue;
    display: flex;
}
.bottom{
    height: 20%;
    background: lightgray;
}
</style>
</head>
<body>
    <div class='main'>
        <div class='header'> Header</div>
        <div class='content'>
            <div class='dashboard'>
            <a href="/cadastro_prod"> <img class='item-menu' src="https://www.sigelite.com.br/img/SEOHomes/icon-item-controle-estoque.png" alt=""></a>
            </div>
            <div class='dashboard'>
            <a href="/cadastrar"> <img src="https://cdn4.iconfinder.com/data/icons/network-and-security/63/add-user-512.png" alt="Cadastrar Cliente" class="item-menu"></a>
            </div>
            <div class='dashboard'>
                <a href="/vendas"><img class='item-menu' src="https://site.guinzo.com.br/wp-content/uploads/2019/09/vendas-guinzo-nfe.png" alt=""></a>
            </div>
        </div>
        <div class="bottom"></div>
    </div>
</body>
</html>