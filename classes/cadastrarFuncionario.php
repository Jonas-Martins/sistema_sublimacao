<?php
require_once 'conexaoPDO.php';

class cadastrarFuncionario {
    private $cpf;
    private $nome;
    private $sobrenome;
    private $senha;
    private $dtAniversario;
    private $sexo;
    private $telefone;
    private $email;
    
    function getCpf() {
        return $this->cpf;
    }

    function getNome() {
        return $this->nome;
    }

    function getSobrenome() {
        return $this->sobrenome;
    }

    function getSenha() {
        return $this->senha;
    }

    function getDtAniversario() {
        return $this->dtAniversario;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function setCpf($cpf): void {
        $this->cpf = $cpf;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }

    function setSobrenome($sobrenome): void {
        $this->sobrenome = $sobrenome;
    }

    function setSenha($senha): void {
        $this->senha = $senha;
    }

    function setDtAniversario($dtAniversario): void {
        $this->dtAniversario = $dtAniversario;
    }

    function setSexo($sexo): void {
        $this->sexo = $sexo;
    }

    function setTelefone($telefone): void {
        $this->telefone = $telefone;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function cadastrarFuncionario() {
        $objCnx = new ConexaoPDO();
        $cmdSql = " CALL `cadastrar_funcionario`('$this->cpf', '$this->nome', '$this->sobrenome', '$this->senha', '$this->dtAniversario', '$this->sexo', '$this->telefone', '$this->email');";
        return $objCnx->insert($cmdSql);
    }
}
