<?php

class EstoqueTinta {

    private $id;
    private $marca;
    private $cor;
    private $preco;
    private $tipo;
    private $dtCompra;

    function __construct($marca, $cor, $preco, $tipo, $dtCompra) {
        $this->marca = $marca;
        $this->cor = $cor;
        $this->preco = $preco;
        $this->tipo = $tipo;
        $this->dtCompra = $dtCompra;
    }

    function getId() {
        return $this->id;
    }

    function getMarca() {
        return $this->marca;
    }

    function getCor() {
        return $this->cor;
    }

    function getPreco() {
        return $this->preco;
    }

    function getTipo() {
        return $this->tipo;
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

    function setCor($cor): void {
        $this->cor = $cor;
    }

    function setPreco($preco): void {
        $this->preco = $preco;
    }

    function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    function setDtCompra($dtCompra): void {
        $this->dtCompra = $dtCompra;
    }

}

interface EstoqueTintaDAO {

    function cadastrarTinta(EstoqueTinta $tin);

    function consultar_tinta_estoque();

    function consultar_tinta_estoque_cor($cor);

    function deletarTintaId($id);
}
