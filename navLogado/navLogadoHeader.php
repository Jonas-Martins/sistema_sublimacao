<?php
include_once 'validarLogin.php';
require_once 'classes/FuncionarioCrud.php';
$objFuncionarioCrud = new FuncionarioCrud();
?>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><a href="loginTrue.php">Sistema Sublimação</a></h3>
        </div>

        <ul class="list-unstyled components">
            <p>
                <?php
                $consultFuncionario = $objFuncionarioCrud->consultarFuncionario(0, unserialize($_SESSION['loginTrue']));
                echo $consultFuncionario[0]['nome'] . ' ' . $consultFuncionario[0]['sobrenome'];
                ?>
            </p>
            <li class="active">
                <a href="#pedidos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pedidos</a>
                <ul class="collapse list-unstyled" id="pedidos">
                    <li>
                        <a href="consultarPedidos.php">Consultar</a>
                    </li>
                    <li>
                        <a href="cadastrarPedido.php">Cadastrar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#estampas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Estampas</a>
                <ul class="collapse list-unstyled" id="estampas">
                    <li>
                        <a href="ConsultarEstampas.php">Consultar</a>
                    </li>
                    <li>
                        <a href="cadastrarEstampa.php">Cadastrar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#malhas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Malhas</a>
                <ul class="collapse list-unstyled" id="malhas">
                    <li>
                        <a href="consultarMalhas.php">Consultar</a>
                    </li>
                    <li>
                        <a href="cadastrarMalha.php">Cadastrar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#estoque" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Estoque Tinta/Papel</a>
                <ul class="collapse list-unstyled" id="estoque">
                    <li>
                        <a href="#tinta" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tinta</a>
                        <ul class="collapse list-unstyled" id="tinta">
                            <li>
                                <a href="tinta.php">Estoque</a>
                            </li>
                            <li>
                                <a href="cadastrarTinta.php">Cadastrar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#papel" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Papel</a>
                        <ul class="collapse list-unstyled" id="papel">
                            <li>
                                <a href="papel.php">Estoque</a>
                            </li>
                            <li>
                                <a href="cadastrarPapel.php">Cadastrar</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#extra" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Extra</a>
                <ul class="collapse list-unstyled" id="extra">
                    <li>
                        <a href="#comprimento" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Calculadora</a>
                        <ul class="collapse list-unstyled" id="comprimento">
                            <li>
                                <a href="calculadoraComprimentoM.php">Comprimento da Malha</a>
                            </li>
                            <li>
                                <a href="calculadoraComprimentoP.php">Comprimento do Papel</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a href="" class="download">Configurações</a>
            </li>
            <li>
                <a href="logout.php" class="article">Sair</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content Holder -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="navbar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <?php
                            $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                            echo 'Computador: ' . $hostname;
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Contiunua em navLogadoFooter -->

