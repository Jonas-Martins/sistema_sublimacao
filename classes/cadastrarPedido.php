<?php
require_once 'conexaoPDO.php';

class cadastrarPedido {
    private $id;
    private $cliente;
    private $vendedor;
    private $cidade;
    private $dt_emissao;
    private $dt_prevista;
    
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

    function cadastrarPedido() {
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `cadastrar_pedido`('$this->id', '$this->cliente', '$this->vendedor', '$this->cidade', '$this->dt_emissao', '$this->dt_prevista');";
        return $objCnx->insert($cmdSql);
    }
}
