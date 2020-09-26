<?php

require_once 'conexaoPDO.php';
require_once 'Malha.php';

class MalhaCrud implements MalhaDAO {

    function cadastrarMalha(Malha $mal) {
        $objCnx = new ConexaoPDO();

        $id = $mal->getId();
        $nome = $mal->getNome();
        
        $cmdSql = "CALL `cadastrar_malha`('$id', '$nome');";
        return $objCnx->insert($cmdSql);
    }
    
    function consultarMalhaAll(){
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `consultar_malha_all`();";
        return $objCnx->consult($cmdSql);
    }
    
    function consultarMalhaId($id){
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `consultar_malha_id`($id);";
        return $objCnx->consult($cmdSql);
    }
    
    function deletarMalha($id) {
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `deletar_malha`($id);";
        return $objCnx->deletar($cmdSql);
    }
}
