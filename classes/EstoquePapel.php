<?php

class EstoquePapel {

    private $id;
    private $marca;
    private $gramatura;
    private $comprimento;
    private $largura;
    private $lote;
    private $preco;
    private $dtCompra;

    function __construct($marca, $gramatura, $comprimento, $largura, $lote, $preco, $dtCompra) {
        $this->marca = $marca;
        $this->gramatura = $gramatura;
        $this->comprimento = $comprimento;
        $this->largura = $largura;
        $this->lote = $lote;
        $this->preco = $preco;
        $this->dtCompra = $dtCompra;
    }

    function getId() {
        return $this->id;
    }

    function getMarca() {
        return $this->marca;
    }

    function getGramatura() {
        return $this->gramatura;
    }

    function getComprimento() {
        return $this->comprimento;
    }

    function getLargura() {
        return $this->largura;
    }

    function getLote() {
        return $this->lote;
    }

    function getPreco() {
        return $this->preco;
    }
    
    function getDtCompra() {
        return $this->dtCompra;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setMarca($marca): void {
        $this->marca = $marca;
    }

    function setGramatura($gramatura): void {
        $this->gramatura = $gramatura;
    }

    function setComprimento($comprimento): void {
        $this->comprimento = $comprimento;
    }

    function setLargura($largura): void {
        $this->largura = $largura;
    }

    function setLote($lote): void {
        $this->lote = $lote;
    }

    function setPreco($preco): void {
        $this->preco = $preco;
    }
    
    function setDtCompra($dtCompra): void {
        $this->dtCompra = $dtCompra;
    }
}

interface EstoquePapelDAO {

    function cadastrarPapel(EstoquePapel $pap);
    
    function consultarPapelGramatura();
    
    function consultarPapelGramaturaAll($gramatura);
    
    function consultarPapelLote();
    
    function deletarPapelId($id);
    
    function atualizarPapel($id, EstoquePapel $pap);
}
