<?php
require_once 'conexaoPDO.php';

class cadastrarPedidoArtigo {
    private $fk_artigo;
    private $fk_pedido;
    private $fk_funcionario;
    private  $unidade;
    private $qt_peca;
    private $kilos;
    private $altura;
    
    function getFk_artigo() {
        return $this->fk_artigo;
    }

    function getFk_pedido() {
        return $this->fk_pedido;
    }

    function getFk_funcionario() {
        return $this->fk_funcionario;
    }

    function getUnidade() {
        return $this->unidade;
    }

    function getQt_peca() {
        return $this->qt_peca;
    }

    function getKilos() {
        return $this->kilos;
    }

    function getAltura() {
        return $this->altura;
    }

    function setFk_artigo($fk_artigo): void {
        $this->fk_artigo = $fk_artigo;
    }

    function setFk_pedido($fk_pedido): void {
        $this->fk_pedido = $fk_pedido;
    }

    function setFk_funcionario($fk_funcionario): void {
        $this->fk_funcionario = $fk_funcionario;
    }

    function setUnidade($unidade): void {
        $this->unidade = $unidade;
    }

    function setQt_peca($qt_peca): void {
        $this->qt_peca = $qt_peca;
    }

    function setKilos($kilos): void {
        $this->kilos = $kilos;
    }

    function setAltura($altura): void {
        $this->altura = $altura;
    }

                
    function cadastrarPedidoArtigo() {
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `cadastrar_pedido_artigo`('$this->fk_artigo', '$this->fk_pedido', '$this->fk_funcionario', '$this->unidade', '$this->qt_peca', '$this->kilos', '$this->altura');";
        return $objCnx->insert($cmdSql);
    }
}
