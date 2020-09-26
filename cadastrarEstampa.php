<?php
include_once 'validarLogin.php';

require_once 'classes/EstampaCrud.php';
$objEstampaCrud = new EstampaCrud();
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
            <form method="POST">
                Código
                <input type="text" name="idEstampa"/>
                Nome
                <input type="text" name="nomeEstampa"/>
                Variante
                <input type="text" name="variante"/><br>

                <input type="submit" name="btnEnviar" value="Enviar"/>
            </form>
        </div>

        <?php
        if (isset($_POST['btnEnviar'])) {
            $idEstampa = filter_input(INPUT_POST, 'idEstampa', FILTER_VALIDATE_INT);
            $nomeEstampa = filter_input(INPUT_POST, 'nomeEstampa', FILTER_SANITIZE_SPECIAL_CHARS);
            $variante = filter_input(INPUT_POST, 'variante', FILTER_SANITIZE_SPECIAL_CHARS);

            $objEstampa = new Estampa($idEstampa, $nomeEstampa, $variante);
            $objEstampaCrud->cadastrarEstampa($objEstampa);
        }
        ?>

        <?php
        include_once 'navLogado/navLogadoFooter.php';
        ?>
    </body>
</html>
