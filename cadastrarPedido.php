<?php
include_once 'validarLogin.php';
require_once 'classes/PedidoCrud.php';
$objPedidoCrud = new PedidoCrud();
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
                ID do Pedido
                <input type="text" name="idPedido" placeholder="ID do Pedido"/>
                Cliente
                <input type="text" name="cliente" placeholder="Cliente"/>
                Vendendor
                <input type="text" name="vendedor" placeholder="Vendedor"/>
                Cidade
                <input type="text" name="cidade" placeholder="Cidade"/>
                Data Prevista
                <input type="date" name="dtPrevista"/><br>

                <input type="submit" name="btnEnviar"/>
            </form>
        </div>
        <?php
        if (isset($_POST['btnEnviar'])) {

            //Pedido
            $idPedido = filter_input(INPUT_POST, 'idPedido', FILTER_VALIDATE_INT);
            $cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $vendedor = filter_input(INPUT_POST, 'vendedor', FILTER_SANITIZE_SPECIAL_CHARS);
            $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
            $dtEmissao = new DateTime('NOW', new DateTimeZone('America/Sao_Paulo'));
            $dtPrevista = filter_input(INPUT_POST, 'dtPrevista', FILTER_SANITIZE_SPECIAL_CHARS);
            $status = 'Andamento';
            $dtConclusao = '0001-01-01';

            $objPedido = new Pedido($idPedido, $cliente, $vendedor, $cidade, $dtEmissao->format('Y-m-d'), $dtPrevista, $status, $dtConclusao);
            if ($objPedidoCrud->cadastrarPedido($objPedido)) {
                echo "<meta http-equiv='Refresh' content='0; url=cadastrarPedidoArtigo.php?idPedido=$idPedido' />";
            } else {
                echo "<meta http-equiv='Refresh' content='0; url=cadastroPedido.php' />";
            }
        }
        ?>
        <?php
        include_once 'navLogado/navLogadoFooter.php';
        ?>
    </body>
</html>
