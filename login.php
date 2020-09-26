<!DOCTYPE html>
<?php
session_start();

require_once 'classes/FuncionarioCrud.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1' />
        <title>Login</title>
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/loginCadastro.css" />
        <link rel="stylesheet" href="css/nav.css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php include_once 'nav.php'; ?>
        <div class="container_header login">
            <h3>LOGAR</h3>
        </div>
        <main>
            <section>
                <div class="container_dados">
                    <form method="POST">
                        <div class="dados">
                            <h4>Email:</h4> <input type="email" name="email" autocomplete="off" required/>
                        </div>
                        <div class="dados">
                            <h4>Senha:</h4> <input type="password" name="senha" autocomplete="off" required/><br /><br />
                        </div>
                        <div class="btn_login"><input type="submit" value="Entrar" name="btnEnviar"/></div>
                    </form>
                </div>
            </section>
        </main>
        <?php
        if (isset($_POST['btnEnviar'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

            $objFuncionarioCrud = new FuncionarioCrud();
            $consultFuncionario = $objFuncionarioCrud->consultarFuncionario(0, $email);

            if ($consultFuncionario[0]['email'] == $email && $consultFuncionario[0]['senha'] == $senha) {
                $_SESSION['loginTrue'] = serialize($consultFuncionario[0]['email']);
                $_SESSION['idSession'] = session_id();

                echo "<meta http-equiv='Refresh' content='0; url=loginTrue.php' />";
            } else {
                echo 'erro';
            }
        }
        ?>
    </body>
</html>
