<?php

require_once 'conexaoPDO.php';
require_once 'Funcionario.php';

class FuncionarioCrud implements FuncionarioDAO {

    function cadastrarFuncionario(Funcionario $func) {
        $objCnx = new ConexaoPDO();

        $cpf = $func->getCpf();
        $nome = $func->getNome();
        $sobrenome = $func->getSobrenome();
        $senha = $func->getSenha();
        $dtAniversario = $func->getDtAniversario();
        $sexo = $func->getSexo();
        $telefone = $func->getTelefone();
        $email = $func->getEmail();
        $nivel = $func->getNivel();

        $cmdSql = "CALL `cadastrar_funcionario`('$cpf', '$nome', '$sobrenome', '$senha', '$dtAniversario', '$sexo', '$telefone', '$email', '$nivel');";
        return $objCnx->insert($cmdSql);
    }

    function consultarFuncionario($cpf, $email) {
        $objCnx = new ConexaoPDO();
        $cmdSql = "CALL `consultar_funcionario`('$cpf', '$email');";
        return $objCnx->consult($cmdSql);
    }

}
