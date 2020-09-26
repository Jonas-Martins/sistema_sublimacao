<?php

class PedidoArtigo {

    private $fk_pedido;
    private $fk_funcionario;
    private $idMalha;
    private $idEstampa;
    private $maquinaFunc;
    private $unidade;
    private $peso;
    private $largura;
    private $gramatura;
    private $comprimento;
    private $impresso;
    private $status;
    private $dtConclusao;

    function __construct($fk_pedido, $fk_funcionario, $idMalha, $idEstampa, $maquinaFunc, $unidade, $peso, $largura, $gramatura, $comprimento, $impresso, $status, $dtConclusao) {
        $this->fk_pedido = $fk_pedido;
        $this->fk_funcionario = $fk_funcionario;
        $this->idMalha = $idMalha;
        $this->idEstampa = $idEstampa;
        $this->maquinaFunc = $maquinaFunc;
        $this->unidade = $unidade;
        $this->peso = $peso;
        $this->largura = $largura;
        $this->gramatura = $gramatura;
        $this->comprimento = $comprimento;
        $this->impresso = $impresso;
        $this->status = $status;
        $this->dtConclusao = $dtConclusao;
    }

    function getFk_pedido() {
        return $this->fk_pedido;
    }

    function getFk_funcionario() {
        return $this->fk_funcionario;
    }

    function getIdMalha() {
        return $this->idMalha;
    }

    function getIdEstampa() {
        return $this->idEstampa;
    }

    function getMaquinaFunc() {
        return $this->maquinaFunc;
    }

    function getUnidade() {
        return $this->unidade;
    }

    function getPeso() {
        return $this->peso;
    }

    function getLargura() {
        return $this->largura;
    }

    function getGramatura() {
        return $this->gramatura;
    }

    function getComprimento() {
        return $this->comprimento;
    }

    function getImpresso() {
        return $this->impresso;
    }
    
    function getDtConclusao() {
        return $this->dtConclusao;
    }

    function getStatus() {
        return $this->status;
    }

    function setFk_pedido($fk_pedido): void {
        $this->fk_pedido = $fk_pedido;
    }

    function setFk_funcionario($fk_funcionario): void {
        $this->fk_funcionario = $fk_funcionario;
    }

    function setIdMalha($idMalha): void {
        $this->idMalha = $idMalha;
    }

    function setIdEstampa($idEstampa): void {
        $this->idEstampa = $idEstampa;
    }

    function setMaquinaFunc($maquinaFunc): void {
        $this->maquinaFunc = $maquinaFunc;
    }

    function setUnidade($unidade): void {
        $this->unidade = $unidade;
    }

    function setPeso($peso): void {
        $this->peso = $peso;
    }

    function setLargura($largura): void {
        $this->largura = $largura;
    }

    function setGramatura($gramatura): void {
        $this->gramatura = $gramatura;
    }

    function setComprimento($comprimento): void {
        $this->comprimento = $comprimento;
    }

    function setImpresso($impresso): void {
        $this->impresso = $impresso;
    }

    function setStatus($status): void {
        $this->status = $status;
    }
    
    function setDtConclusao($dtConclusao): void {
        $this->dtConclusao = $dtConclusao;
    }

}

interface PedidoArtigoDAO {

    function cadastrarPedidoArtigo(PedidoArtigo $pedArt);

    function consultarPedidoArtigoId($id);
    
    function atualizarPedidoArtigo($id, PedidoArtigo $pedArt);
    
    function deletarPedidoArtigoId($id);
    
    function deletarPedidoArtigoFk($fkPedido);
}
