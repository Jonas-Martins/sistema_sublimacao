<?php
include_once 'validarLogin.php';

require_once 'classes/EstoquePapelCrud.php';
$objPapelCrud = new EstoquePapelCrud();

require_once 'classes/EstoqueTintaCrud.php';
$objTintaCrud = new EstoqueTintaCrud();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Papel:
        <form method="post">
            <input type="text" name="marcaPapel" placeholder="Marca"/><br />
            <input type="text" name="gramaturaPapel" placeholder="Gramatura"/><br />
            <input type="text" name="comprimentoPapel" placeholder="Comprimento"/><br />
            <input type="text" name="larguraPapel" placeholder="Largura"/><br />
            <input type="text" name="lotePapel" placeholder="Lote"/><br />
            <input type="text" name="precoPapel" placeholder="Preço"/><br />
            <input type="text" name="quantidadePapel" placeholder="Quantidade"/><br />
            <input type="date" name="dtCompraPapel"/><br />

            <input type="submit" name="btnEnviarPapel"/><br />
        </form><br />

        Tinta:
        <form method="post">
            <input type="text" name="marcaTinta" placeholder="Marca"/><br />
            <input type="text" name="corTinta" placeholder="Cor"/><br />
            <input type="text" name="precoTinta" placeholder="Preço"/><br />
            <input type="text" name="quantidadeTinta" placeholder="Quantidade"/><br />
            <input type="text" name="tipoTinta" placeholder="Tipo"/><br />
            <input type="date" name="dtCompraTinta"/><br />

            <input type="submit" name="btnEnviarTinta"/><br />
        </form><br />
        <?php
        if (isset($_POST['btnEnviarPapel'])) {
            $marcaPapel = filter_input(INPUT_POST, 'marcaPapel', FILTER_SANITIZE_SPECIAL_CHARS);
            $gramaturaPapel = filter_input(INPUT_POST, 'gramaturaPapel', FILTER_VALIDATE_FLOAT);
            $comprimentoPapel = filter_input(INPUT_POST, 'comprimentoPapel', FILTER_VALIDATE_FLOAT);
            $larguraPapel = filter_input(INPUT_POST, 'larguraPapel', FILTER_VALIDATE_FLOAT);
            $lotePapel = filter_input(INPUT_POST, 'lotePapel', FILTER_SANITIZE_SPECIAL_CHARS);
            $precoPapel = filter_input(INPUT_POST, 'precoPapel', FILTER_VALIDATE_FLOAT);
            $quantidadePapel = filter_input(INPUT_POST, 'quantidadePapel', FILTER_VALIDATE_FLOAT);
            $dtCompraPapel = filter_input(INPUT_POST, 'dtCompraPapel', FILTER_SANITIZE_SPECIAL_CHARS);

            $objPapel = new EstoquePapel($marcaPapel, $gramaturaPapel, $comprimentoPapel, $larguraPapel, $lotePapel, $precoPapel, $dtCompraPapel);
            
            for ($id = 0; $id < $quantidadePapel; $id++) {
                $objPapelCrud->cadastrarPapel($objPapel);
            }
        }

        if (isset($_POST['btnEnviarTinta'])) {
            $marcaTinta = filter_input(INPUT_POST, 'marcaTinta', FILTER_SANITIZE_SPECIAL_CHARS);
            $corTinta = filter_input(INPUT_POST, 'corTinta', FILTER_SANITIZE_SPECIAL_CHARS);
            $precoTinta = filter_input(INPUT_POST, 'precoTinta', FILTER_VALIDATE_FLOAT);
            $quantidadeTinta = filter_input(INPUT_POST, 'quantidadeTinta', FILTER_VALIDATE_INT);
            $tipoTinta = filter_input(INPUT_POST, 'tipoTinta', FILTER_SANITIZE_SPECIAL_CHARS);
            $dtCompraTinta = filter_input(INPUT_POST, 'dtCompraTinta', FILTER_SANITIZE_SPECIAL_CHARS);

            $objTinta = new EstoqueTinta($marcaTinta, $corTinta, $precoTinta, $tipoTinta, $dtCompraTinta);
            
            for ($id = 0; $id < $quantidadeTinta; $id++) {
                $objTintaCrud->cadastrarTinta($objTinta);
            }
        }
        
        /*$objTintaCrud->deletarTintaId('amarela');*/
        ?>
    </body>
</html>
