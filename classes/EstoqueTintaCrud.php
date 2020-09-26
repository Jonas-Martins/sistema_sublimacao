<?php

require_once 'conexaoPDO.php';
require_once 'EstoqueTinta.php';

class EstoqueTintaCrud implements EstoqueTintaDAO {

    function cadastrarTinta(EstoqueTinta $tin) {
        $objCnx = new ConexaoPDO();

        $marca = $tin->getMarca();
        $cor = $tin->getCor();
        $preco = $tin->getPreco();
        $tipo = $tin->getTipo();
        $dtCompra = $tin->getDtCompra();

        $cmdSql = "CALL `cadastrar_estoque_tinta`('$marca', '$cor', '$preco', '$tipo', '$dtCompra');";
        return $objCnx->insert($cmdSql);
    }
    
    function consultar_tinta_estoque(){
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `consultar_tinta_estoque`();";
        return $objCnx->consult($cmdSql);
    }
    
    function consultar_tinta_estoque_cor($cor){
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `consultar_tinta_estoque_cor`('$cor');";
        return $objCnx->consult($cmdSql);
    }

    function deletarTintaId($cor){
        $objCnx = new ConexaoPDO();
        
        $corConsult = "CALL `consultar_tinta_cor_id`('$cor');";
        $idArray = $objCnx->consult($corConsult)[0];
        
        $id = implode("", $idArray);
        
        $deletar = "CALL `deletar_tinta_id`('$id');";
        return $objCnx->deletar($deletar);
    }
}
