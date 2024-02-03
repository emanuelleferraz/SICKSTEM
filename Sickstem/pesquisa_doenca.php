<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>SICKSTEM - Listar Doenças</title>

    <!-- Favicon -->
    <link rel="icon" href="img/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- icofont CSS -->
    <link rel="stylesheet" href="css/icofont.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="css/owl-carousel.css">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="css/datepicker.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Medipro CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <title>Sickstem</title>
</head>

<body>
    <?php

    $pesquisa = $_POST['busca'] ?? '';

    include "conexao.php";

    $sql = "SELECT * FROM doenca WHERE Nome LIKE '%$pesquisa%'";
    $dados = mysqli_query($conn, $sql);
    ?>
    <!-- Header Area -->
    <header class="header shadow-sm">
        <!-- Header Inner -->
        <div class="header-inner">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                            <!-- Start Logo -->
                            <div class="logo">
                                <a href="pagina_inicial.php"><img src="img/logo.png" alt="#"></a>
                            </div>
                            <!-- End Logo -->
                            <!-- Mobile Nav -->
                            <div class="mobile-nav"></div>
                            <!-- End Mobile Nav -->
                        </div>
                        <div class="col-lg-7 col-md-9 col-12">
                            <!-- Main Menu -->
                            <div class="main-menu">
                                <nav class="navigation">
                                    <ul class="nav menu">
                                        <li><a href="#">Pacientes <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="pesquisa_paciente.php">Listar</a></li>
                                                <li><a href="cadastro_paciente.php">Cadastrar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Agentes <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="pesquisa_agente.php">Listar</a></li>
                                                <li><a href="cadastro_agente.php">Cadastrar</a></li>
                                                <li><a href="registrar_visita.php">Registrar Visita</a></li>
                                                <li><a href="pesquisa_visita.php">Listar Visita</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Doenças <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="pesquisa_doenca.php">Listar</a></li>
                                                <li><a href="cadastro_doenca.php">Cadastrar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Médicos <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="pesquisa_medico.php">Listar</a></li>
                                                <li><a href="cadastro_medico.php">Cadastrar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Consultas <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="pesquisa_consulta.php">Listar</a></li>
                                                <li><a href="registrar_consulta.php">Registrar</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!-- End Header Area -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="border rounded-3 p-5  mt-5 shadow box-area">
                    <h1>Pesquisar Doenças</h1><br>
                    <nav class="navbar bg-body-tertiary">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-md-13 ml-auto"> <!-- Ajuste a largura conforme necessário -->
                                    <form class="d-flex" role="search" action="pesquisa_doenca.php" method="POST">
                                        <input class="form-control me-2" type="search" placeholder="Consulte" aria-label="Search" name="busca" autofocus>
                                        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Gravidade</th>
                                <th scope="col">Classificação</th>
                                <th scope="col">Condição</th>
                                <th scope="col">Funções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($linha = mysqli_fetch_assoc($dados)) {
                                $nome = $linha['Nome'];
                                $gravidade = $linha['Gravidade'];
                                $classificacao = $linha['Classificacao'];
                                $condicao = $linha['Condicao'];

                                echo "<tr>
                                            <th scope='row'>$nome</th>
                                            <td>$gravidade</td>
                                            <td>$classificacao</td>
                                            <td>$condicao</td>
                                            <td>
                                                <a href='editar_doenca.php?id=$nome' class='text-white btn btn-success btn-sm'>Editar</a>
                                                <a href='#' class='text-white btn btn-danger btn-sm' data-toggle='modal' data-target='#confirma' onclick=\"pegar_dados('$nome')\" style='background-color: #dc3545;'>Excluir</a>
                                            </td>
                                     </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <a href="pagina_inicial.php" class="text-white btn btn-primary my-2">Voltar a Página Inicial</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="excluir_doenca.php" method="POST">
                        <p>Deseja realmente excluir <b id="nome_pessoa"> </b>?</p>
                        <input type=hidden name="nome" id="nome_pessoa1" value="<?= $nome ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                            <input type="submit" class="btn btn-danger" value="Sim">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function pegar_dados(nome) {
            document.getElementById('nome_pessoa').innerHTML = nome;
            document.getElementById('nome_pessoa1').value = nome;
        }
    </script>


    <!-- Adicione os scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>