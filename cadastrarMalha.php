<?php
include_once 'validarLogin.php';

require_once 'classes/MalhaCrud.php';
$objMalhaCrud = new MalhaCrud();
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
                <input type="text" name="idMalha"/>
                Nome
                <input type="text" name="nomeMalha"/><br>

                <input type="submit" name="btnEnviar" value="Enviar"/>
            </form>
        </div>

        <?php
        if (isset($_POST['btnEnviar'])) {
            $idMalha = filter_input(INPUT_POST, 'idMalha', FILTER_VALIDATE_INT);
            $nomeMalha = filter_input(INPUT_POST, 'nomeMalha', FILTER_SANITIZE_SPECIAL_CHARS);

            $objMalha = new Malha($idMalha, $nomeMalha);
            $objMalhaCrud->cadastrarMalha($objMalha);
        }
        ?>

        <?php
        include_once 'navLogado/navLogadoFooter.php';
        ?>
    </body>
</html>
