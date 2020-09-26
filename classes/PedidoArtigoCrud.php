<?php

require_once 'conexaoPDO.php';
require_once 'PedidoArtigo.php';

class PedidoArtigoCrud implements PedidoArtigoDAO {

    function cadastrarPedidoArtigo(PedidoArtigo $pedArt) {
        $objCnx = new ConexaoPDO();

        $fk_pedido = $pedArt->getFk_pedido();
        $fk_funcionario = $pedArt->getFk_funcionario();
        $idMalha = $pedArt->getIdMalha();
        $idEstampa = $pedArt->getIdEstampa();
        $maquinaFunc = $pedArt->getMaquinaFunc();
        $unidade = $pedArt->getUnidade();
        $peso = $pedArt->getPeso();
        $largura = $pedArt->getLargura();
        $gramatura = $pedArt->getGramatura();
        $comprimento = $pedArt->getComprimento();
        $impresso = $pedArt->getImpresso();
        $status = $pedArt->getStatus();
        $dtConclusao = $pedArt->getDtConclusao();

        $cmdSql = "CALL `cadastrar_pedido_artigo`('$fk_pedido','$fk_funcionario','$idMalha','$idEstampa','$maquinaFunc','$unidade','$peso','$largura','$gramatura','$comprimento','$impresso','$status','$dtConclusao');";
        return $objCnx->insert($cmdSql);
    }

    function consultarPedidoArtigoId($id) {
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `consultar_pedido_artigo_id`($id);";
        return $objCnx->consult($cmdSql);
    }

    function atualizarPedidoArtigo($id, PedidoArtigo $pedArt) {
        $objCnx = new ConexaoPDO();

        $fk_pedido = $pedArt->getFk_pedido();
        $fk_funcionario = $pedArt->getFk_funcionario();
        $idMalha = $pedArt->getIdMalha();
        $idEstampa = $pedArt->getIdEstampa();
        $maquinaFunc = $pedArt->getMaquinaFunc();
        $unidade = $pedArt->getUnidade();
        $peso = $pedArt->getPeso();
        $largura = $pedArt->getLargura();
        $gramatura = $pedArt->getGramatura();
        $comprimento = $pedArt->getComprimento();
        $impresso = $pedArt->getImpresso();
        $status = $pedArt->getStatus();
        $dt_conclusao = $pedArt->getDtConclusao();
        
        $cmdSql = "CALL `atualizar_pedido_artigo`('$id', '$fk_pedido','$fk_funcionario','$idMalha','$idEstampa','$maquinaFunc','$unidade','$peso','$largura','$gramatura','$comprimento','$impresso','$status','$dt_conclusao');";
        return $objCnx->alterar($cmdSql);
    }
    
    function deletarPedidoArtigoId($id){
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `deletar_pedido_artigo_id`($id);";
        return $objCnx->deletar($cmdSql);
    }
    
    function deletarPedidoArtigoFk($fkPedido){
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `deletar_pedido_artigo_fk`($fkPedido);";
        return $objCnx->deletar($cmdSql);
    }
}
    