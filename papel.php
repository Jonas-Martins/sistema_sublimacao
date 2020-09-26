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
        <table class="consult">
            <tr>
                <th>Marca</th>
                <th>Gramatura</th>
                <th>Comprimento (M)</th>
                <th>Largura</th>
                <th>Quantidade</th>
                <th>Opções</th>
            </tr>
            <?php
            $papelGramatura = $objPapelCrud->consultarPapelGramatura();

            foreach ($papelGramatura as $papel):
                ?>
                <tr>
                    <td><?php echo $papel['marca'] ?></td>
                    <td><?php echo $papel['gramatura'] ?></td>
                    <td><?php echo round($papel['comprimento'], 2) ?></td>
                    <td><?php echo $papel['largura'] ?></td>
                    <td><?php echo $papel['quantidade'] ?></td>
                    <td>
                        <a href="editarPapel.php?gramatura=<?php echo $papel['gramatura']?>">
                            <img src="https://img.icons8.com/material-rounded/24/000000/edit.png"/>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php
        /* $papelGramatura = $objPapelCrud->consultarPapelGramatura();

          foreach ($papelGramatura as $value):
          ?>
          Gramatura: <?php echo $value['gramatura'] ?>
          <form method="post">
          <input type="text" name="marcaPapel" value="<?php echo $value['marca'] ?>" placeholder="Marca"/><br />
          <input type="text" name="gramaturaPapel" value="<?php echo $value['gramatura'] ?>" placeholder="Gramatura"/><br />
          <input type="text" name="comprimentoPapel" value="<?php echo $value['comprimento'] ?>" placeholder="Comprimento"/><br />
          <input type="text" name="larguraPapel" value="<?php echo $value['largura'] ?>" placeholder="Largura"/><br />
          <input type="text" name="precoPapel" value="<?php echo $value['preco'] ?>" placeholder="Preço"/><br />
          <input type="text" name="quantidadePapel" value="<?php echo $value['quantidade'] ?>" placeholder="Quantidade"/><br />

          <input type="submit" name="btnEnviarPapel"/><br />
          </form><br />
          <?php
          endforeach;

          /* $papelEstoque = $objPapelCrud->consultarPapelLote();
          foreach ($papelEstoque as $value):
          ?>
          Lote: <?php echo $value['lote'] ?>
          <form method="post">
          <input type="text" name="marcaPapel" value="<?php echo $value['marca'] ?>" placeholder="Marca"/><br />
          <input type="text" name="gramaturaPapel" value="<?php echo $value['gramatura'] ?>" placeholder="Gramatura"/><br />
          <input type="text" name="comprimentoPapel" value="<?php echo $value['comprimento'] ?>" placeholder="Comprimento"/><br />
          <input type="text" name="larguraPapel" value="<?php echo $value['largura'] ?>" placeholder="Largura"/><br />
          <input type="text" name="precoPapel" value="<?php echo $value['preco'] ?>" placeholder="Preço"/><br />
          <input type="text" name="quantidadePapel" value="<?php echo $value['quantidade'] ?>" placeholder="Quantidade"/><br />

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
