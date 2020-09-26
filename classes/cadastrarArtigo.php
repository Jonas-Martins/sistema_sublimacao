<?php
require_once 'conexaoPDO.php';

class cadastrarArtigo {
    private $id;
    private $malha;
    private $estampa;
    private $variante;
    private $calandra;
    private $atual;
    private $reserva;
    private $disponivel;
            
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

    function getCalandra() {
        return $this->calandra;
    }

    function getAtual() {
        return $this->atual;
    }

    function getReserva() {
        return $this->reserva;
    }

    function getDisponivel() {
        return $this->disponivel;
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

    function setCalandra($calandra): void {
        $this->calandra = $calandra;
    }

    function setAtual($atual): void {
        $this->atual = $atual;
    }

    function setReserva($reserva): void {
        $this->reserva = $reserva;
    }

    function setDisponivel($disponivel): void {
        $this->disponivel = $disponivel;
    }

    function cadastrarArtigo() {
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `cadastrar_artigo`('$this->id', '$this->malha', '$this->estampa', '$this->variante', '$this->calandra', '$this->atual', '$this->reserva', '$this->disponivel');";
        return $objCnx->insert($cmdSql);
    }

    
}
