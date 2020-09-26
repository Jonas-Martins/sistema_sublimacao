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
        <link rel="stylesheet" href="css/consult.css" />
        <?php
        include_once 'navLogado/navLogadoHead.php';
        ?>
    </head>
    <body>
        <?php
        include_once 'navLogado/navLogadoHeader.php';
        ?>
        <table class="consult">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Variante</th>
                <th>Opções</th>
            </tr>
            <?php
            $estampas = $objEstampaCrud->consultarEstampaAll();

            foreach ($estampas as $estampa):
                ?>
                <tr>
                    <td><?php echo $estampa['id'] ?></td>
                    <td><?php echo $estampa['nome'] ?></td>
                    <td><?php echo $estampa['variante'] ?></td>
                    <td>
                        <div class="btnTabela">
                            <form method="get">
                                <button class="btnTabela" style="cursor: pointer;" type="submit" name="btnDeletar<?php echo $estampa['id'] ?>">
                                    <img src="https://img.icons8.com/material-rounded/24/000000/delete-trash.png"/>
                                </button>
                            </form>
                            <?php
                            if(isset($_GET['btnDeletar'.$estampa['id']])){
                                $objEstampaCrud->deletarEstampa($estampa['id']);
                                
                                echo "<meta http-equiv='Refresh' content='0; url='consultarEstampas.php' />";
                            }
                            ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php
        include_once 'navLogado/navLogadoFooter.php';
        ?>
    </body>
</html>
