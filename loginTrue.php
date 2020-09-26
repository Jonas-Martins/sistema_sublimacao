<?php
include_once 'validarLogin.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
        include_once 'navLogado/navLogadoHead.php';
        ?>
    </head>
    <body>
        <?php
        include_once 'navLogado/navLogadoHeader.php';
        ?>
        <div>
            Seja Bem-Vindo <br> <?php echo $consultFuncionario[0]['nome'] . ' ' . $consultFuncionario[0]['sobrenome']; ?>
        </div>
        <?php
        include_once 'navLogado/navLogadoFooter.php';
        ?>
    </body>
</html>
