<?php
include_once 'validarLogin.php';

require_once 'classes/EstoqueTintaCrud.php';
$objTintaCrud = new EstoqueTintaCrud();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/register.css" />
        <?php
        include_once 'navLogado/navLogadoHead.php';
        ?>
    </head>
    <body>
        <?php
        include_once 'navLogado/navLogadoHeader.php';
        ?>
        <div class="formCadastro">
            <form method="post">
                Marca
                <input type="text" name="marcaTinta" placeholder="Marca"/>
                Cor
                <input type="text" name="corTinta" placeholder="Cor"/>
                Preço
                <input type="text" name="precoTinta" placeholder="Preço"/>
                Quantidade
                <input type="text" name="quantidadeTinta" placeholder="Quantidade"/>
                Tipo
                <input type="text" name="tipoTinta" placeholder="Tipo"/><br>
                
                <input type="submit" name="btnEnviarTinta"/>
            </form>
        </div>
        <?php
        if (isset($_POST['btnEnviarTinta'])) {
            $marcaTinta = filter_input(INPUT_POST, 'marcaTinta', FILTER_SANITIZE_SPECIAL_CHARS);
            $corTinta = filter_input(INPUT_POST, 'corTinta', FILTER_SANITIZE_SPECIAL_CHARS);
            $precoTinta = filter_input(INPUT_POST, 'precoTinta', FILTER_VALIDATE_FLOAT);
            $quantidadeTinta = filter_input(INPUT_POST, 'quantidadeTinta', FILTER_VALIDATE_INT);
            $tipoTinta = filter_input(INPUT_POST, 'tipoTinta', FILTER_SANITIZE_SPECIAL_CHARS);
            $dtCompraTinta = new DateTime('NOW', new DateTimeZone('America/Sao_Paulo'));

            $objTinta = new EstoqueTinta($marcaTinta, $corTinta, $precoTinta, $tipoTinta, $dtCompraTinta->format('Y-m-d'));

            for ($id = 0; $id < $quantidadeTinta; $id++) {
                $objTintaCrud->cadastrarTinta($objTinta);
            }
        }

        /* $objTintaCrud->deletarTintaId('amarela'); */
        ?>
        <?php
        include_once 'navLogado/navLogadoFooter.php';
        ?>
    </body>
</html>
