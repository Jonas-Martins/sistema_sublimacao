<?php
class Malha {
    private $id;
    private $nome;
    
    function __construct($id, $nome) {
        $this->id = $id;
        $this->nome = $nome;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }
}

interface MalhaDAO{
    function cadastrarMalha(Malha $mal);
    
    function consultarMalhaAll();
    
    function consultarMalhaId($id);
    
    function deletarMalha($id);
}
