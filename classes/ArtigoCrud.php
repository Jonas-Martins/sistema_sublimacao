<?php

require_once 'conexaoPDO.php';
require_once 'Artigo.php';

class ArtigoCrud implements ArtigoDAO {

    function cadastrarArtigo(Artigo $art) {
        $objCnx = new ConexaoPDO();
        
        $id = $art->getId();
        $malha = $art->getMalha();
        $estampa = $art->getEstampa();
        $variante = $art->getVariante();

        $cmdSql = "CALL `cadastrar_artigo`('$id', '$malha', '$estampa', '$variante');";
        return $objCnx->insert($cmdSql);
    }

}
