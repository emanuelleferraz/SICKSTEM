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
    <title>SICKSTEM - Listar Consultas</title>

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
    include "conexao.php";
	
	$pesquisa = $_POST['busca'] ?? '';

	$sql = "SELECT
				P.Nome AS NomePaciente,
				M.Nome AS NomeMedico,
				D.Doenca_Nome AS DoencaDiagnostica,
				C.Data_Hora AS DataConsulta
			FROM
				controle_doencas_bairro.Consulta C
			INNER JOIN controle_doencas_bairro.faz_consulta F ON C.Codigo = F.Consulta_Codigo
			INNER JOIN controle_doencas_bairro.Medico M ON C.Medico_CRM = M.CRM
			INNER JOIN controle_doencas_bairro.Detectada D ON C.Codigo = D.Consulta_Codigo
			INNER JOIN controle_doencas_bairro.paciente P ON F.Paciente_CPF = P.CPF
			WHERE
				D.Doenca_Nome LIKE '%$pesquisa%' OR P.Nome LIKE '%$pesquisa%' OR M.Nome LIKE '%$pesquisa%';";
			
    //$sql = "SELECT * FROM paciente WHERE Nome LIKE '%$pesquisa%' OR CPF LIKE '%$pesquisa%'";

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
                    <h1>Pesquisar Consultas</h1><br>
                    <nav class="navbar bg-body-tertiary">
                        <div class="container-fluid">
                            <form class="d-flex" role="search" action="pesquisa_consulta.php" method="POST">
                                <input class="form-control me-2" type="search" placeholder="Consulte" aria-label="Search" name="busca" autofocus>
                                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                            </form>
                        </div>
                    </nav>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Paciente</th>
                                <th scope="col">Medico</th>
                                <th scope="col">Doença</th>
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($linha = mysqli_fetch_assoc($dados)) {
                                $NomePaciente = $linha['NomePaciente'];
                                $NomeMedico = $linha['NomeMedico'];
                                $DoencaDiagnostica = $linha['DoencaDiagnostica'];
                                $DataConsulta = $linha['DataConsulta'];

                                echo "<tr>
                                            <th>$NomePaciente</th>
                                            <td>$NomeMedico</td>
                                            <td>$DoencaDiagnostica</td>
                                            <td>$DataConsulta</td>
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
    <!-- Adicione os scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>