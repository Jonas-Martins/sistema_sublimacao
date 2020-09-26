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
        <link rel="stylesheet" href="css/consult.css" />
        <?php
        include_once 'navLogado/navLogadoHead.php';
        ?>
    </head>
    <body>
        <?php
        include_once 'navLogado/navLogadoHeader.php';
        ?>
        <form method="post">
            <table class="consult">
                <tr>
                    <th>Marca</th>
                    <th>Gramatura</th>
                    <th>Comprimento</th>
                    <th>Largura</th>
                    <th>Lote</th>
                    <th>Data da Compra</th>
                    <th>Opções</th>
                </tr>
                <?php
                $papelGramatura = $objPapelCrud->consultarPapelGramaturaAll($_GET['gramatura']);

                foreach ($papelGramatura as $papel):
                    ?>
                    <tr>

                        <td><input class="inputTabela" type="text" name="marca<?php echo $papel['id'] ?>" size="<?php echo strlen($papel['marca']) ?>" value="<?php echo $papel['marca'] ?>"></td>
                        <td><input class="inputTabela" type="text" name="gramatura<?php echo $papel['id'] ?>" size="<?php echo strlen($papel['gramatura']) ?>" value="<?php echo $papel['gramatura'] ?>"></td>
                        <td><input class="inputTabela" type="text" name="comprimento<?php echo $papel['id'] ?>" size="<?php echo strlen($papel['comprimento']) ?>" value="<?php echo $papel['comprimento'] ?>"></td>
                        <td><input class="inputTabela" type="text" name="largura<?php echo $papel['id'] ?>" size="<?php echo strlen($papel['largura']) ?>" value="<?php echo $papel['largura'] ?>"></td>
                        <td><input class="inputTabela" type="text" name="lote<?php echo $papel['id'] ?>" size="<?php echo strlen($papel['lote']) ?>" value="<?php echo $papel['lote'] ?>"></td>
                        <td><input class="inputTabela" type="date" name="dtCompra<?php echo $papel['id'] ?>" size="<?php echo strlen($papel['dt_compra']) ?>" value="<?php echo $papel['dt_compra'] ?>"></td>
                        <td> 
                            <div class="btnTabela">

                                <button type="submit" name="btnAtualizar<?php echo $papel['id'] ?>">
                                    <img src="https://img.icons8.com/ios-filled/24/000000/update-left-rotation.png"/>
                                </button>

                                <button style="cursor: pointer;" type="submit" name="btnDeletar<?php echo $papel['id'] ?>">
                                    <img src="https://img.icons8.com/material-rounded/24/000000/delete-trash.png"/>
                                </button>
                            </div>

                            <?php
                            if (isset($_POST['btnAtualizar' . $papel['id']])) {
                                $objPapel = new EstoquePapel($_POST['marca' . $papel['id']], $_POST['gramatura' . $papel['id']], $_POST['comprimento' . $papel['id']], $_POST['largura' . $papel['id']], $_POST['lote' . $papel['id']], 0, $_POST['dtCompra' . $papel['id']]);
                                $teste = $objPapelCrud->atualizarPapel($papel['id'], $objPapel);
                                
                                echo "<meta http-equiv='Refresh' content='0; url=editarPapel.php?gramatura=".$_POST['gramatura' . $papel['id']]."' />";
                            }

                            if (isset($_POST['btnDeletar' . $papel['id']])) {
                                $objPapelCrud->deletarPapelId($papel['id']);

                                echo "<meta http-equiv='Refresh' content='0; url='editarPapel.php?gramtura='" . $_GET['gramatura'] . " />";
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </form>
        <?php
        include_once 'navLogado/navLogadoFooter.php';
        ?>
    </body>
</html>
