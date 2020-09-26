<?php
include_once 'validarLogin.php';

require_once 'classes/PedidoArtigoCrud.php';
$objPedidoArtigoCrud = new PedidoArtigoCrud();

require_once 'classes/EstampaCrud.php';
$objEstampaCrud = new EstampaCrud();

require_once 'classes/MalhaCrud.php';
$objMalhaCrud = new MalhaCrud();

require_once 'classes/FuncionarioCrud.php';
$objFuncionarioCrud = new FuncionarioCrud();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/consult.css" />
        <?php
        include_once 'navLogado/navLogadoHead.php';
        ?>
    </head>
    <body>
        <?php
        include_once 'navLogado/navLogadoHeader.php';
        ?>
        <?php
        $consultPedido = $objPedidoArtigoCrud->consultarPedidoArtigoId($_GET['idPedido']);
        if ($consultPedido):
            echo 'Código: ' . $consultPedido[0]['codigo'] . '<br>';
            echo 'Cliente: ' . $consultPedido[0]['cliente'];
            ?>
            <br>
            <a href="cadastrarPedidoArtigo.php?idPedido=<?php echo $consultPedido[0]['codigo'] ?>">Cadastrar</a>
            <div class="divTabela">
                <form method="POST">
                    <table class="consult">
                        <tr>
                            <th>Artigo</th>
                            <th>Malha</th>
                            <th>Estampa</th>
                            <th>Quilos</th>
                            <th>Largura</th>
                            <th>Gramatura</th>
                            <th>Metros</th>
                            <th>Impresso</th>
                            <th>Status</th>
                            <th>Data de Conclusão</th>
                            <th>Opções</th>
                        </tr>

                        <?php
                        foreach ($consultPedido as $pedido):
                            ?>
                            <tr>
                                <td><?php echo $pedido['artigo'] ?></td>
                                <?php
                                $estampaCosnult = $objEstampaCrud->consultarEstampaAll();
                                $malhaConsult = $objMalhaCrud->consultarMalhaAll();
                                ?>
                                <td>
                                    <?php $artigo = explode(".", $pedido['artigo']) ?>
                                    <select class="inputTabela" name="malha<?php echo $pedido['id'] ?>" id="malha">
                                        <option size="1" value="<?php echo $artigo[0] ?>" hidden><?php echo $pedido['malha'] ?></option>
                                        <?php
                                        foreach ($malhaConsult as $malha):
                                            ?>
                                        <option value="<?php echo $malha['id'] ?>"><?php echo $malha['nome'] ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="inputTabela" name="estampa<?php echo $pedido['id'] ?>" id="estampa">
                                        <option value="<?php echo $artigo[1] ?>" hidden><?php echo $pedido['estampa'] . " " . $pedido['variante'] ?></option>
                                        <?php
                                        foreach ($estampaCosnult as $estampa):
                                            ?>
                                            <option value="<?php echo $estampa['id'] ?>"><?php echo $estampa['nome'] . " " . $estampa['variante'] ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </td>
                                <td><input class="inputTabela" type="text" name="peso<?php echo $pedido['id'] ?>" size="<?php echo (strlen('peso') - 3) ?>" value="<?php echo $pedido['peso'] ?>"></td>
                                <td><input class="inputTabela" type="text" name="largura<?php echo $pedido['id'] ?>" size="<?php echo (strlen('largura') - 5) ?>" value="<?php echo $pedido['largura'] ?>"></td>
                                <td><input class="inputTabela" type="text" name="gramatura<?php echo $pedido['id'] ?>" size="<?php echo strlen($pedido['gramatura']) ?>" value="<?php echo $pedido['gramatura'] ?>"></td>
                                <td><input class="inputTabela" type="text" name="comprimento<?php echo $pedido['id'] ?>" size="<?php echo (strlen('metros') - 5) ?>" value="<?php echo round($pedido['comprimento'], 2) ?>"></td>
                                <td><input class="inputTabela" type="text" name="impresso<?php echo $pedido['id'] ?>" size="<?php echo strlen($pedido['impresso']) ?>" value="<?php echo $pedido['impresso'] ?>"></td>
                                <td>
                                    <select class="inputTabela" name="status<?php echo $pedido['id'] ?>">
                                        <option value="<?php echo $pedido['status'] ?>" hidden><?php echo $pedido['status'] ?></option>
                                        <option value="Andamento">Andamento</option>
                                        <option value="Calandra">Calandra</option>
                                        <option value="Concluido">Concluido</option>
                                    </select>
                                </td>
                                <td>
                                    <?php
                                    $dtConclusao = new DateTime($pedido['dt_conclusao']);
                                    echo $dtConclusao->format('d/m/Y');
                                    ?>
                                </td>
                                <td>
                                    <div class="btnTabela">
                                        <button type="submit" name="btnAtualizar<?php echo $pedido['id'] ?>">
                                            <img src="https://img.icons8.com/ios-filled/24/000000/update-left-rotation.png"/>
                                        </button>

                                        <button style="cursor: pointer;" type="submit" name="btnDeletar<?php echo $pedido['id'] ?>">
                                            <img src="https://img.icons8.com/material-rounded/24/000000/delete-trash.png"/>
                                        </button>
                                    </div>
                                </td>
                                <?php
                                if (isset($_POST['btnAtualizar' . $pedido['id']])) {
                                    $consultFuncionario = $objFuncionarioCrud->consultarFuncionario(0, unserialize($_SESSION['loginTrue']));

                                    $dtConclusao2 = '0001-01-01';
                                    if ($_POST['status' . $pedido['id']] == 'Concluido') {
                                        $dtConclusao2 = new DateTime('NOW', new DateTimeZone('America/Sao_Paulo'));
                                        $dtConclusao2 = $dtConclusao2->format('Y-m-d');
                                    }

                                    $objPedidoArtigo = new PedidoArtigo($pedido['codigo'], $consultFuncionario[0]['cpf'], $_POST['malha' . $pedido['id']], $_POST['estampa' . $pedido['id']], gethostbyaddr($_SERVER['REMOTE_ADDR']), $pedido['unidade'], $_POST['peso' . $pedido['id']], $_POST['largura' . $pedido['id']], $_POST['gramatura' . $pedido['id']], $_POST['comprimento' . $pedido['id']], $_POST['impresso' . $pedido['id']], $_POST['status' . $pedido['id']], $dtConclusao2);

                                    $objPedidoArtigoCrud->atualizarPedidoArtigo($pedido['id'], $objPedidoArtigo);

                                    echo "<meta http-equiv='Refresh' content='0; url=editarPedido.php?idPedido=" . $pedido['codigo'] . "' />";
                                }

                                if (isset($_POST['btnDeletar' . $pedido['id']])) {
                                    $objPedidoArtigoCrud->deletarPedidoArtigoId($pedido['id']);

                                    echo "<meta http-equiv='Refresh' content='0; url=editarPedido.php?idPedido=" . $pedido['codigo'] . "' />";
                                }
                                ?>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </form>
            </div>
            <?php
        else:
            echo 'Pedido não Encontrado!!';
        endif;
        ?>
        <?php
        include_once 'navLogado/navLogadoFooter.php';
        ?>
    </body>
</html>
