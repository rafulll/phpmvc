<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Produtos</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    session_start();
    //echo "<pre>".print_r($dados, true)."</pre>";
    if (!empty($dados["produto"])) {
        var_dump($dados["produto"]);
    }
    ?>
    <div><a href="<?= BASE_URL . "/produtos" ?>">Voltar</a></div>
</body>

</html>