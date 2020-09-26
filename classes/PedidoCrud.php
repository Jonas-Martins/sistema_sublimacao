<?php

require_once 'conexaoPDO.php';
require_once 'Pedido.php';

class PedidoCrud implements PedidoDAO {

    function cadastrarPedido(Pedido $ped) {
        $objCnx = new ConexaoPDO();

        $id = $ped->getId();
        $cliente = $ped->getCliente();
        $vendedor = $ped->getVendedor();
        $cidade = $ped->getCidade();
        $dt_emissao = $ped->getDt_emissao();
        $dt_prevista = $ped->getDt_prevista();
        $status = $ped->getStatus();
        $dt_conclusao = $ped->getDt_conclusao();

        $cmdSql = "CALL `cadastrar_pedido`('$id', '$cliente', '$vendedor', '$cidade', '$dt_emissao', '$dt_prevista', '$status', '$dt_conclusao');";
        return $objCnx->insert($cmdSql);
    }
    
    function consultarPedidoAll(){
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `consultar_pedido_all`()";
        return $objCnx->consult($cmdSql);
    }
    
    function consultarPedidoId($id){
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `consultar_pedido_id`($id)";
        return $objCnx->consult($cmdSql)[0];
    }
    
    function atualizarPedido(Pedido $ped){
        $objCnx = new ConexaoPDO();

        $id = $ped->getId();
        $cliente = $ped->getCliente();
        $vendedor = $ped->getVendedor();
        $cidade = $ped->getCidade();
        $dt_prevista = $ped->getDt_prevista();
        $status = $ped->getStatus();
        $dt_conclusao = $ped->getDt_conclusao();

        $cmdSql = "CALL `atualizar_pedido`('$id', '$cliente', '$vendedor', '$cidade', '$dt_prevista', '$status', '$dt_conclusao');";
        return $objCnx->alterar($cmdSql);
    }
    
    function deletarPedidoId($id){
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `deletar_pedido_id`('$id');";
        return $objCnx->deletar($cmdSql);
    }
    
    function like_pedido_cliente($nome){
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `like_pedido_cliente`('$nome');";
        return $objCnx->consult($cmdSql);
    }
}
