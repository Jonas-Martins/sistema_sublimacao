<?php
include_once 'validarLogin.php';

require_once 'classes/EstoqueTintaCrud.php';
$objTintaCrud = new EstoqueTintaCrud();
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
                <th>Marca</th>
                <th>Cor</th>
                <th>Tipo</th>
                <th>Quantidade</th>
            </tr>
            <?php
            $tintaEstoque = $objTintaCrud->consultar_tinta_estoque();

            if ($tintaEstoque) {
                foreach ($tintaEstoque as $tinta):
                    ?>
                    <tr>
                        <td><?php echo $tinta['marca'] ?></td>
                        <td><?php echo $tinta['cor'] ?></td>
                        <td><?php echo $tinta['tipo'] ?></td>
                        <td>
                            <form style="display: flex;">
                                <input class="qtTabela" min="0" size="<?php echo strlen($tinta['quantidade']) ?>" type="number" name="qtTinta" value="<?php echo $tinta['quantidade'] ?>">

                                <div class="btnTabela">
                                    <button class="btnTabela" type="submit" name="<?php echo $tinta['cor'] ?>" title="Atualizar">
                                        <img src="https://img.icons8.com/ios-filled/22/000000/update-left-rotation.png"/>
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <?php
                    if (isset($_GET[$tinta['cor']])) {
                        $qtTinta = filter_input(INPUT_GET, 'qtTinta', FILTER_VALIDATE_INT);

                        if ($qtTinta >= $tinta['quantidade']) {
                            $objTinta = new EstoqueTinta($tinta['marca'], $tinta['cor'], 0, $tinta['tipo'], 0);
                            while ($tinta['quantidade'] != $qtTinta) {
                                $objTintaCrud->cadastrarTinta($objTinta);
                                $tinta['quantidade']++;
                            }
                            echo "<meta http-equiv='Refresh' content='0; url=tinta.php' />";
                        } else {
                            while ($tinta['quantidade'] != $qtTinta) {
                                $objTintaCrud->deletarTintaId($tinta['cor']);
                                $tinta['quantidade']--;
                            }
                            echo "<meta http-equiv='Refresh' content='0; url=tinta.php' />";
                        }
                    }

                endforeach;
            }
            ?>
        </table>
        <?php
        /* $tintaEstoque = $objTintaCrud->consultar_tinta_estoque();

          foreach ($tintaEstoque as $value):
          ?>
          Cor: <?php echo $value['cor'] ?>
          <form method="post">
          <input type="text" name="idTinta" value="<?php echo $value['id'] ?>" placeholder=""/><br />
          <input type="text" name="marcaTinta" value="<?php echo $value['marca'] ?>" placeholder=""/><br />
          <input type="text" name="corTinta" value="<?php echo $value['cor'] ?>" placeholder=""/><br />
          <input type="text" name="precoTinta" value="<?php echo $value['preco'] ?>" placeholder=""/><br />
          <input type="text" name="tipoTinta" value="<?php echo $value['tipo'] ?>" placeholder=""/><br />
          <input type="text" name="quantidadeTinta" value="<?php echo $value['quantidade'] ?>" placeholder=""/><br />

          <input type="submit" name="btnEnviarPapel"/><br />
          </form><br />
          <?php
          endforeach;

          $tintaCor = $objTintaCrud->consultar_tinta_estoque_cor('vermelha');

          foreach ($tintaCor as $value):
          ?>
          Cor: <?php echo $value['cor'] ?>
          <form method="post">
          <input type="text" name="idTinta" value="<?php echo $value['id'] ?>" placeholder=""/><br />
          <input type="text" name="marcaTinta" value="<?php echo $value['marca'] ?>" placeholder=""/><br />
          <input type="text" name="corTinta" value="<?php echo $value['cor'] ?>" placeholder=""/><br />
          <input type="text" name="precoTinta" value="<?php echo $value['preco'] ?>" placeholder=""/><br />
          <input type="text" name="tipoTinta" value="<?php echo $value['tipo'] ?>" placeholder=""/><br />
          <input type="text" name="quantidadeTinta" value="<?php echo $value['quantidade'] ?>" placeholder=""/><br />

          <input type="submit" name="btnEnviarPapel"/><br />
          </form><br />
          <?php
          endforeach; */
        ?>
        <?php
        include_once 'navLogado/navLogadoFooter.php';
        ?>
    </body>
</html>
