<?php

require_once 'conexaoPDO.php';
require_once 'EstoquePapel.php';

class EstoquePapelCrud implements EstoquePapelDAO {

    function cadastrarPapel(EstoquePapel $pap) {
        $objCnx = new ConexaoPDO();

        $marca = $pap->getMarca();
        $gramatura = $pap->getGramatura();
        $comprimento = $pap->getComprimento();
        $largura = $pap->getLargura();
        $lote = $pap->getLote();
        $preco = $pap->getPreco();
        $dtCompra = $pap->getDtCompra();

        $cmdSql = "CALL `cadastrar_estoque_papel`('$marca', '$gramatura', '$comprimento', '$largura', '$lote', '$preco', '$dtCompra');";
        return $objCnx->insert($cmdSql);
    }

    function consultarPapelGramatura(){
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `consultar_papel_estoque_gramatura`();";
        return $objCnx->consult($cmdSql);
    }
    
    function consultarPapelGramaturaAll($gramatura){
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `consultar_papel_gramatura`($gramatura);";
        return $objCnx->consult($cmdSql);
    }
    
    function consultarPapelLote(){
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `consultar_papel_estoque_lote`();";
        return $objCnx->consult($cmdSql);
    }
    
    function deletarPapelId($id){
        $objCnx = new ConexaoPDO();
        
        $deletar = "CALL `deletar_papel_id`('$id');";
        return $objCnx->deletar($deletar);
    }
    
    function atualizarPapel($id, EstoquePapel $pap) {
        $objCnx = new ConexaoPDO();

        $marca = $pap->getMarca();
        $gramatura = $pap->getGramatura();
        $comprimento = $pap->getComprimento();
        $largura = $pap->getLargura();
        $lote = $pap->getLote();
        $preco = $pap->getPreco();
        $dtCompra = $pap->getDtCompra();

        $cmdSql = "CALL `atualizar_papel`('$id', '$marca', '$gramatura', '$comprimento', '$largura', '$lote', '$preco', '$dtCompra');";
        return $objCnx->alterar($cmdSql);
    }
}
