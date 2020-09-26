<?php
require_once 'classes/FuncionarioCrud.php';
$objFuncionarioCrud = new FuncionarioCrud();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1' />
        <title>Cadastro</title>
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/loginCadastro.css" />
        <link rel="stylesheet" href="css/nav.css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap" rel="stylesheet">
        <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
        <script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>
</head>
<body>
    <?php include_once 'nav.php'; ?>
    <div class="container_header cadastro">
        <h3>CADASTRAR-SE</h3>
    </div>
    <main>
        <section>
            <div class="container_dados">
                <form method="POST" enctype="multipart/form-data">
                    <div class="dados">
                        <h4>CPF:</h4><input type="text" name="cpf" id="cpf" autocomplete="off" required/>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#cpf").mask("999.999.999-99");
                        });
                    </script>
                    <div class="dados">
                        <h4>Nome:</h4><input type="text" name="nome" autocomplete="off" required/>
                    </div>
                    <div class="dados">
                        <h4>Sobrenome:</h4><input type="text" name="sobrenome" autocomplete="off" required/>
                    </div>
                    <div class="dados">
                        <h4>Email:</h4><input type="email" name="email" autocomplete="off" required/>
                    </div>
                    <div class="dados">
                        <h4>Telefone:</h4><input type="text" name="telefone" id="telefone" autocomplete="off" required/>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#telefone").mask("(99)99999-9999");
                        });
                    </script>
                    <div class="dados">
                        <h4>Senha:</h4><input type="password" name="senha" autocomplete="off" required/>
                    </div>
                    <div class="dados">
                        <h4>Data de Nascimento:</h4><input type="date" name="dataA" autocomplete="off" required/>
                    </div>
                    <div class="dados">
                        <h4>Sexo:</h4><select name="sexo" autocomplete="off" required>
                            <option value=""></option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                    </div>
                    <div class="dados">
                        <h4>Nivel:</h4><select name="nivel" autocomplete="off" required>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="btn_cadastro"><input type="submit" name="btnEnviar"/></div>
                </form>   
            </div>
        </section>
    </main>
    
    <?php
    if(isset($_POST['btnEnviar'])){
        $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
        $dtAniversario = filter_input(INPUT_POST, 'dataA', FILTER_SANITIZE_SPECIAL_CHARS);
        $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_SPECIAL_CHARS);
        $nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_SPECIAL_CHARS);
        
        $objFuncionario = new Funcionario($cpf, $nome, $sobrenome, $senha, $dtAniversario, $sexo, $telefone, $email, $nivel);
        
        // Verificar depois se os dados ja estao cadastrados no banco
        $objFuncionarioCrud->cadastrarFuncionario($objFuncionario);
    }
    ?>
</body>
</html>
