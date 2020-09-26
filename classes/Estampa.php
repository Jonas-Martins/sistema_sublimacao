<?php
class Estampa {
    private $id;
    private $nome;
    private $variante;
    
    function __construct($id, $nome, $variante) {
        $this->id = $id;
        $this->nome = $nome;
        $this->variante = $variante;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getVariante() {
        return $this->variante;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }

    function setVariante($variante): void {
        $this->variante = $variante;
    }
}

interface EstampaDAO{
    function cadastrarEstampa(Estampa $est);
    
    function consultarEstampaAll();
    
    function consultarEstampaId($id);
    
    function deletarEstampa($id);
}
