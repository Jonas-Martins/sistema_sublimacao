<?php

require_once 'conexaoPDO.php';
require_once 'Estampa.php';

class EstampaCrud implements EstampaDAO {

    function cadastrarEstampa(Estampa $est) {
        $objCnx = new ConexaoPDO();

        $id = $est->getId();
        $nome = $est->getNome();
        $variante = $est->getVariante();

        $cmdSql = "CALL `cadastrar_estampa`('$id', '$nome', '$variante');";
        return $objCnx->insert($cmdSql);
    }

    function consultarEstampaAll() {
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `consultar_estampa_all`();";
        return $objCnx->consult($cmdSql);
    }

    function consultarEstampaId($id) {
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `consultar_estampa_id`($id);";
        return $objCnx->consult($cmdSql);
    }

    function deletarEstampa($id) {
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `deletar_estampa`($id);";
        return $objCnx->deletar($cmdSql);
    }

}
