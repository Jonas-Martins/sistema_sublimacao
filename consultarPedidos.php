<?php
include_once 'validarLogin.php';

require_once 'classes/PedidoCrud.php';
$objPedidoCrud = new PedidoCrud();

require_once 'classes/PedidoArtigoCrud.php';
$objPedidoArtigoCrud = new PedidoArtigoCrud();
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
        <form class="formPesquisar">
            <input type="text" name="pesquisarCliente" placeholder="Pesquisar Cliente">
            <button class="btnPesquisar" style="cursor: pointer;" type="submit" name="btnPesquisar" title="Pesquisar por Cliente">
                <img src="https://img.icons8.com/ios-glyphs/20/000000/detective.png"/>
            </button>
        </form>
        <?php if (isset($_GET['btnPesquisar'])): ?>
            <div class="divTabela">
                <form method="POST">    
                    <table class="consult">
                        <tr>
                            <th>Código</th>
                            <th>Cliente</th>
                            <th>Vendedor</th>
                            <th>Cidade</th>
                            <th>Data de Emissão</th>
                            <th>Data de Conclusão</th>
                            <th>Peças</th>
                            <th>Metros</th>
                            <th>Status</th>
                            <th>Opções</th>
                        </tr>
                        <?php
                        $pedidos = $objPedidoCrud->like_pedido_cliente($_GET['pesquisarCliente']);

                        if ($pedidos) {
                            foreach ($pedidos as $pedido):
                                ?>
                                <tr>
                                    <td><?php echo $pedido['id'] ?></td>
                                    <td><input class="inputTabela" size="<?php echo strlen('cliente') ?>" type="" name="cliente<?php echo $pedido['id'] ?>" value="<?php echo $pedido['cliente'] ?>"></td>
                                    <td><input class="inputTabela" size="<?php echo (strlen('vendedor') - 3) ?>" type="" name="vendedor<?php echo $pedido['id'] ?>" value="<?php echo $pedido['vendedor'] ?>"></td>
                                    <td><input class="inputTabela" size="<?php echo strlen('cidade') ?>" type="" name="cidade<?php echo $pedido['id'] ?>" value="<?php echo $pedido['cidade'] ?>"></td>
                                    <td>
                                        <?php
                                        $dtEmissao = new DateTime($pedido['dt_emissao']);
                                        echo $dtEmissao->format('d/m/Y');
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $dtConclusao = new DateTime($pedido['dt_conclusao']);
                                        echo $dtConclusao->format('d/m/Y');
                                        ?>
                                    </td>
                                    <td><?php echo $pedido['pecas'] ?></td>
                                    <td><?php echo round($pedido['comprimento'], 2); ?></td>
                                    <td>
                                        <select class="inputTabela" name="status<?php echo $pedido['id'] ?>">
                                            <option value="<?php echo $pedido['status'] ?>" hidden><?php echo $pedido['status'] ?></option>
                                            <option value="Andamento">Andamento</option>
                                            <option value="Concluido">Concluido</option>
                                        </select> 
                                    </td>
                                    <td>
                                        <div class="btnTabela">
                                            <button type="submit" name="btnAtualizar<?php echo $pedido['id'] ?>" title="AtualizarPedido">
                                                <img src="https://img.icons8.com/ios-filled/24/000000/update-left-rotation.png"/>
                                            </button>

                                            <button style="cursor: pointer;" type="submit" name="btnDeletar<?php echo $pedido['id'] ?>" title="Deletar Pedido">
                                                <img src="https://img.icons8.com/material-rounded/24/000000/delete-trash.png"/>
                                            </button>

                                            <a href="editarPedido.php?idPedido=<?php echo $pedido['id'] ?>" title="Visualizar Pedido">
                                                <img src="https://img.icons8.com/material/24/000000/enter-2--v2.png"/>
                                            </a>
                                        </div>
                                        <?php
                                        if (isset($_POST['btnAtualizar' . $pedido['id']])) {

                                            $dtConclusao2 = '0001-001-01';
                                            if ($_POST['status' . $pedido['id']] == 'Concluido') {
                                                $dtConclusao2 = new DateTime('NOW', new DateTimeZone('America/Sao_Paulo'));
                                                $dtConclusao2 = $dtConclusao2->format('Y-m-d');
                                            }

                                            $objPedido = new Pedido($pedido['id'], $_POST['cliente' . $pedido['id']], $_POST['vendedor' . $pedido['id']], $_POST['cidade' . $pedido['id']], 0, 0, $_POST['status' . $pedido['id']], $dtConclusao2);

                                            $objPedidoCrud->atualizarPedido($objPedido);

                                            echo "<meta http-equiv='Refresh' content='0; url='consultarPedidos.php' />";
                                        }

                                        if (isset($_POST['btnDeletar' . $pedido['id']])) {
                                            $objPedidoArtigoCrud->deletarPedidoArtigoFk($pedido['id']);
                                            $objPedidoCrud->deletarPedidoId($pedido['id']);

                                            echo "<meta http-equiv='Refresh' content='0; url='consultarPedidos.php' />";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                        } else {
                            echo 'Cliente não Encontrado!!';
                        }
                        ?>
                    </table>
                </form>
            </div>
        <?php else: ?>
            <div class="divTabela">
                <form method="POST">    
                    <table class="consult">
                        <tr>
                            <th>Código</th>
                            <th>Cliente</th>
                            <th>Vendedor</th>
                            <th>Cidade</th>
                            <th>Data de Emissão</th>
                            <th>Data de Conclusão</th>
                            <th>Peças</th>
                            <th>Metros</th>
                            <th>Status</th>
                            <th>Opções</th>
                        </tr>
                        <?php
                        $pedidos = $objPedidoCrud->consultarPedidoAll();

                        if ($pedidos) {
                            foreach ($pedidos as $pedido):
                                ?>
                                <tr>
                                    <td><?php echo $pedido['id'] ?></td>
                                    <td><input class="inputTabela" size="<?php echo (strlen('cliente')) ?>" type="" name="cliente<?php echo $pedido['id'] ?>" value="<?php echo $pedido['cliente'] ?>"></td>
                                    <td><input class="inputTabela" size="<?php echo (strlen('vendedor') - 3) ?>" type="" name="vendedor<?php echo $pedido['id'] ?>" value="<?php echo $pedido['vendedor'] ?>"></td>
                                    <td><input class="inputTabela" size="<?php echo (strlen('cidade')) ?>" type="" name="cidade<?php echo $pedido['id'] ?>" value="<?php echo $pedido['cidade'] ?>"></td>
                                    <td>
                                        <?php
                                        $dtEmissao = new DateTime($pedido['dt_emissao']);
                                        echo $dtEmissao->format('d/m/Y');
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $dtConclusao = new DateTime($pedido['dt_conclusao']);
                                        echo $dtConclusao->format('d/m/Y');
                                        ?>
                                    </td>
                                    <td><?php echo $pedido['pecas'] ?></td>
                                    <td><?php echo round($pedido['comprimento'], 2); ?></td>
                                    <td>
                                        <select class="inputTabela" name="status<?php echo $pedido['id'] ?>">
                                            <option value="<?php echo $pedido['status'] ?>" hidden><?php echo $pedido['status'] ?></option>
                                            <option value="Andamento">Andamento</option>
                                            <option value="Concluido">Concluido</option>
                                        </select>                        </td>
                                    <td>
                                        <div class="btnTabela">
                                            <button class="btnTabela" type="submit" name="btnAtualizar<?php echo $pedido['id'] ?>" title="AtualizarPedido">
                                                <img src="https://img.icons8.com/ios-filled/24/000000/update-left-rotation.png"/>
                                            </button>

                                            <button class="btnTabela" style="cursor: pointer;" type="submit" name="btnDeletar<?php echo $pedido['id'] ?>" title="Deletar Pedido">
                                                <img src="https://img.icons8.com/material-rounded/24/000000/delete-trash.png"/>
                                            </button>

                                            <a href="editarPedido.php?idPedido=<?php echo $pedido['id'] ?>" title="Visualizar Pedido">
                                                <img src="https://img.icons8.com/material/24/000000/enter-2--v2.png"/>
                                            </a>
                                        </div>
                                        <?php
                                        if (isset($_POST['btnAtualizar' . $pedido['id']])) {

                                            $dtConclusao2 = '0001-001-01';
                                            if ($_POST['status' . $pedido['id']] == 'Concluido') {
                                                $dtConclusao2 = new DateTime('NOW', new DateTimeZone('America/Sao_Paulo'));
                                                $dtConclusao2 = $dtConclusao2->format('Y-m-d');
                                            }

                                            $objPedido = new Pedido($pedido['id'], $_POST['cliente' . $pedido['id']], $_POST['vendedor' . $pedido['id']], $_POST['cidade' . $pedido['id']], 0, 0, $_POST['status' . $pedido['id']], $dtConclusao2);

                                            $objPedidoCrud->atualizarPedido($objPedido);

                                            echo "<meta http-equiv='Refresh' content='0; url='consultarPedidos.php' />";
                                        }

                                        if (isset($_POST['btnDeletar' . $pedido['id']])) {
                                            $objPedidoArtigoCrud->deletarPedidoArtigoFk($pedido['id']);
                                            $objPedidoCrud->deletarPedidoId($pedido['id']);

                                            echo "<meta http-equiv='Refresh' content='0; url='consultarPedidos.php' />";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                        } else {
                            echo 'Sem Pedidos!!';
                        }
                        ?>
                    </table>
                </form>
            </div>
        <?php endif; ?>
        <?php
        include_once 'navLogado/navLogadoFooter.php';
        ?>

    </body>
</html>
