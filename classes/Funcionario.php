<?php
class Funcionario {
    private $cpf;
    private $nome;
    private $sobrenome;
    private $senha;
    private $dtAniversario;
    private $sexo;
    private $telefone;
    private $email;
    private $nivel;
    
    function __construct($cpf, $nome, $sobrenome, $senha, $dtAniversario, $sexo, $telefone, $email, $nivel) {
        $this->cpf = trim($cpf);
        $this->nome = trim($nome);
        $this->sobrenome = trim($sobrenome);
        $this->senha = trim($senha);
        $this->dtAniversario = trim($dtAniversario);
        $this->sexo = trim($sexo);
        $this->telefone = trim($telefone);
        $this->email = trim($email);
        $this->nivel = trim($nivel);
    }

    
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
    
    function getNivel() {
        return $this->nivel;
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
    
    function setNivel($nivel): void {
        $this->nivel = $nivel;
    }
}

interface FuncionarioDAO {
    function cadastrarFuncionario(Funcionario $func);
    function consultarFuncionario($cpf, $email);
}