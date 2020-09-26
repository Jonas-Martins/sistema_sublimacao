<?php

class Pedido {

    private $id;
    private $cliente;
    private $vendedor;
    private $cidade;
    private $dt_emissao;
    private $dt_prevista;
    private $status;
    private $dt_conclusao;

    function __construct($id, $cliente, $vendedor, $cidade, $dt_emissao, $dt_prevista, $status, $dt_conclusao) {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->vendedor = $vendedor;
        $this->cidade = $cidade;
        $this->dt_emissao = $dt_emissao;
        $this->dt_prevista = $dt_prevista;
        $this->status = $status;
        $this->dt_conclusao = $dt_conclusao;
    }

    function getId() {
        return $this->id;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getVendedor() {
        return $this->vendedor;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getDt_emissao() {
        return $this->dt_emissao;
    }

    function getDt_prevista() {
        return $this->dt_prevista;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function getStatus() {
        return $this->status;
    }

    function getDt_conclusao() {
        return $this->dt_conclusao;
    }

    function setCliente($cliente): void {
        $this->cliente = $cliente;
    }

    function setVendedor($vendedor): void {
        $this->vendedor = $vendedor;
    }

    function setCidade($cidade): void {
        $this->cidade = $cidade;
    }

    function setDt_emissao($dt_emissao): void {
        $this->dt_emissao = $dt_emissao;
    }

    function setDt_prevista($dt_prevista): void {
        $this->dt_prevista = $dt_prevista;
    }

    function setStatus($status): void {
        $this->status = $status;
    }

    function setDt_conclusao($dt_conclusao): void {
        $this->dt_conclusao = $dt_conclusao;
    }

}

interface PedidoDAO {

    function cadastrarPedido(Pedido $ped);
    
    function consultarPedidoAll();
    
    function consultarPedidoId($id);
    
    function atualizarPedido(Pedido $ped);
    
    function deletarPedidoId($id);
    
    function like_pedido_cliente($nome);
}
