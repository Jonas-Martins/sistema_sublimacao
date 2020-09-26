<?php
include_once 'validarLogin.php';

require_once 'classes/PedidoCrud.php';
$objPedidoCrud = new PedidoCrud();
$idPedido = $objPedidoCrud->consultarPedidoId($_GET['idPedido']);

require_once 'classes/EstampaCrud.php';
$objEstampaCrud = new EstampaCrud();

require_once 'classes/MalhaCrud.php';
$objMalhaCrud = new MalhaCrud();

require_once 'classes/PedidoArtigoCrud.php';
$objPedidoArtigoCrud = new PedidoArtigoCrud();

require_once 'classes/FuncionarioCrud.php';
$objFuncionarioCrud = new FuncionarioCrud();
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
        <?php
        if ($idPedido == null) {
            echo "Pedido não encontrado!!";
        } else {
            ?>
            Pedido: <?php echo $_GET['idPedido'] ?>
            <div class="formCadastro">
                <form method="POST">
                    <?php
                    $estampaCosnult = $objEstampaCrud->consultarEstampaAll();
                    $malhaConsult = $objMalhaCrud->consultarMalhaAll();
                    ?>
                    Malha
                    <select name="malha" id="malha">
                        <option value=""></option>
                        <?php
                        foreach ($malhaConsult as $malha):
                            ?>
                            <option value="<?php echo $malha['id'] ?>"><?php echo $malha['nome'] ?></option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                    Estampa
                    <select name="estampa" id="estampa">
                        <option value=""></option>
                        <?php
                        foreach ($estampaCosnult as $estampa):
                            ?>
                            <option value="<?php echo $estampa['id'] ?>"><?php echo $estampa['nome'] . " " . $estampa['variante'] ?></option>
                            <?php
                        endforeach;
                        ?>
                    </select>

                    Unidade de Medida
                    <input type="text" name="unidade"/>
                    Peso em Quilos
                    <input type="text" name="peso"/>
                    Largura
                    <input type="text" name="largura"/>
                    Gramatura
                    <input type="text" name="gramatura"/>
                    Comprimento
                    <input type="text" name="comprimento"/><br />

                    <input type="submit" name="btnEnviar"/>
                    <input type="submit" name="encerrar" value="Encerrar Pedido"/>
                </form>
            </div>
            <?php

            /*function calcComprimento($largura, $gramatura, $peso) {
                $lxg = $largura * $gramatura;
                $rendimento = 1000 / $lxg;

                return $comprimentoMalha = $rendimento * $peso;
            }*/

            if (isset($_POST['btnEnviar'])) {
                //Artigo
                $idMalha = filter_input(INPUT_POST, 'malha', FILTER_VALIDATE_INT);
                $idEstampa = filter_input(INPUT_POST, 'estampa', FILTER_VALIDATE_INT);

                //Pedido
                $unidade = filter_input(INPUT_POST, 'unidade', FILTER_SANITIZE_SPECIAL_CHARS);
                $peso = filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_SPECIAL_CHARS);
                $largura = filter_input(INPUT_POST, 'largura', FILTER_SANITIZE_SPECIAL_CHARS);
                $gramatura = filter_input(INPUT_POST, 'gramatura', FILTER_SANITIZE_SPECIAL_CHARS);
                $comprimento = filter_input(INPUT_POST, 'comprimento', FILTER_SANITIZE_SPECIAL_CHARS);
                /*$comprimento = calcComprimento($largura, $gramatura, $peso);*/

                $email = unserialize($_SESSION['loginTrue']);
                $consultFuncionario = $objFuncionarioCrud->consultarFuncionario(0, $email);
                $cpf = $consultFuncionario[0]['cpf'];

                $objPedidoArtigo = new PedidoArtigo($_GET['idPedido'], $cpf, $idMalha, $idEstampa, gethostbyaddr($_SERVER['REMOTE_ADDR']), $unidade, $peso, $largura, $gramatura, $comprimento, 0, 'Andamento', '0001-01-01');
                $objPedidoArtigoCrud->cadastrarPedidoArtigo($objPedidoArtigo);  
            }
            if (isset($_POST['encerrar'])) {
                echo "<meta http-equiv='Refresh' content='0; url=cadastrarPedido.php' />";
            }
        }
        ?>
        <?php
        include_once 'navLogado/navLogadoFooter.php';
        ?>    
    </body>
</html>
