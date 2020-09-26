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
            <input type="text" name="peso" placeholder="Peso (KG)">
            <input type="text" name="pesoC" placeholder="Peso do Canudo (KG)">
            <input type="text" name="largura" placeholder="Largura">
            <input type="text" name="gramatura" placeholder="Gramatura">
            <input type="submit" name="btnEnviar">
        </form>
        <?php
        if (isset($_GET['btnEnviar'])) {
            $comprimento = (($_GET['peso'] * 1000) - ($_GET['pesoC']) * 1000) / ($_GET['largura'] * $_GET['gramatura']);
            echo $comprimento;
        }
        ?>
        <?php
        include_once 'navLogado/navLogadoFooter.php';
        ?>
    </body>
</html>
