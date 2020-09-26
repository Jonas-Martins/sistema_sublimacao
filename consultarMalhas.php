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
                <th>Opções</th>
            </tr>
            <?php
            $malhas = $objMalhaCrud->consultarMalhaAll();

            foreach ($malhas as $malha):
                ?>
                <tr>
                    <td><?php echo $malha['id'] ?></td>
                    <td><?php echo $malha['nome'] ?></td>
                    <td>
                        <div class="btnTabela">
                            <form method="get">
                                <button class="btnTabela" style="cursor: pointer;" type="submit" name="btnDeletar<?php echo $malha['id'] ?>">
                                    <img src="https://img.icons8.com/material-rounded/24/000000/delete-trash.png"/>
                                </button>
                            </form>
                            <?php
                            if(isset($_GET['btnDeletar'.$malha['id']])){
                                $objMalhaCrud->deletarMalha($malha['id']);
                                echo "<meta http-equiv='Refresh' content='0; url='consultarMalhas.php' />";
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
