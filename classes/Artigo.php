<?php
class Artigo {
    private $id;
    private $malha;
    private $estampa;
    private $variante;
    
    function __construct($id, $malha, $estampa, $variante) {
        $this->id = $id;
        $this->malha = $malha;
        $this->estampa = $estampa;
        $this->variante = $variante;
    }
    
    function getId() {
        return $this->id;
    }

    function getMalha() {
        return $this->malha;
    }

    function getEstampa() {
        return $this->estampa;
    }

    function getVariante() {
        return $this->variante;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setMalha($malha): void {
        $this->malha = $malha;
    }

    function setEstampa($estampa): void {
        $this->estampa = $estampa;
    }

    function setVariante($variante): void {
        $this->variante = $variante;
    }
}

interface ArtigoDAO{
    function cadastrarArtigo(Artigo $art);
}
