<?php
include_once 'validarLogin.php';

require_once 'classes/EstoquePapelCrud.php';
$objPapelCrud = new EstoquePapelCrud();
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
                <input type="text" name="marcaPapel" placeholder="Marca"/>
                Gramatura
                <input type="text" name="gramaturaPapel" placeholder="Gramatura"/>
                Comprimento
                <input type="text" name="comprimentoPapel" placeholder="Comprimento"/>
                Largura
                <input type="text" name="larguraPapel" placeholder="Largura"/>
                Lote
                <input type="text" name="lotePapel" placeholder="Lote"/>
                Preço
                <input type="text" name="precoPapel" placeholder="Preço"/>
                Quantidade
                <input type="text" name="quantidadePapel" placeholder="Quantidade"/><br>

                <input type="submit" name="btnEnviarPapel"/>
            </form>
        </div>
        <?php
        if (isset($_POST['btnEnviarPapel'])) {
            $marcaPapel = filter_input(INPUT_POST, 'marcaPapel', FILTER_SANITIZE_SPECIAL_CHARS);
            $gramaturaPapel = filter_input(INPUT_POST, 'gramaturaPapel', FILTER_VALIDATE_FLOAT);
            $comprimentoPapel = filter_input(INPUT_POST, 'comprimentoPapel', FILTER_VALIDATE_FLOAT);
            $larguraPapel = filter_input(INPUT_POST, 'larguraPapel', FILTER_VALIDATE_FLOAT);
            $lotePapel = filter_input(INPUT_POST, 'lotePapel', FILTER_SANITIZE_SPECIAL_CHARS);
            $precoPapel = filter_input(INPUT_POST, 'precoPapel', FILTER_VALIDATE_FLOAT);
            $quantidadePapel = filter_input(INPUT_POST, 'quantidadePapel', FILTER_VALIDATE_FLOAT);
            $dtCompraPapel = new DateTime('NOW', new DateTimeZone('America/Sao_Paulo'));

            $objPapel = new EstoquePapel($marcaPapel, $gramaturaPapel, $comprimentoPapel, $larguraPapel, $lotePapel, $precoPapel, $dtCompraPapel->format('Y-m-d'));

            for ($id = 0; $id < $quantidadePapel; $id++) {
                $objPapelCrud->cadastrarPapel($objPapel);
            }
        }
        ?>
        <?php
        include_once 'navLogado/navLogadoFooter.php';
        ?>
    </body>
</html>
