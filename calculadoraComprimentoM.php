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
        <form method="get">
            <input type="text" name="largura" placeholder="Largura">
            <input type="text" name="gramatura" placeholder="Gramatura">
            <input type="text" name="pesoMalha" placeholder="Peso total da Malha (KG)">
            <input type="submit" name="btnEnviar">
        </form>
        <?php
        if (isset($_GET['btnEnviar'])) {
            $lxg = $_GET['largura'] * $_GET['gramatura'];
            $rendimento = 1000 / $lxg;
            
            $comprimentoMalha = $rendimento * $_GET['pesoMalha'];
            
            echo 'Rendimento: ' . $rendimento  . ' <br> Comprimento da Malha: ' . $comprimentoMalha;
        }
        ?>
        <?php
        include_once 'navLogado/navLogadoFooter.php';
        ?>
    </body>
</html>
