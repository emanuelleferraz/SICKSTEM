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
	<title>SICKSTEM - Tenha o registro de doenças de sua região.</title>

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

	<!-- Header Area -->
	<header class="header shadow-sm mb-3">
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

	<!-- Adicione os scripts do Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


	<div class="container d-flex justify-content-center align-items-center">
		<div class="row border rounded-5 p-3 bg-white shadow box-area mt-2">
			<style>
				/*------------ Login container ------------*/
				.box-area {
					width: 930px;
				}

				/*------------ Right box ------------*/
				.right-box {
					padding: 40px 30px 40px 40px;
				}
			</style>
			<!-- Caixa da Esquerda -->
			<div class="col-md-6 right-box">
				<div class="row align-items-center">
					<div class="header-text mb-4 ">
						<h1>Editar doença</h1><br>

						<?php
						include "conexao.php";

						$nome = $_GET['id'] ?? '';
						$sql = "SELECT * FROM doenca WHERE Nome = '$nome'";
						$dados = mysqli_query($conn, $sql);
						$linha = mysqli_fetch_assoc($dados);
						?>

						<form method="POST" action="processa_cadastro_doenca.php">
							<input type="hidden" name="nome" value="<?php echo $linha['Nome']; ?>">
							<div class="form-row">
								<div class="form-group">
									<label for="nome">Nome:</label>
									<input type="text" class="form-control" id="nome" name="nome" required value="<?php echo $linha['Nome']; ?>">
								</div>
								<div class="form-group">
									<label for="gravidade">Gravidade:</label>
									<input type="text" class="form-control" id="gravidade" name="Gravidade" value="<?php echo $linha['Gravidade']; ?>" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group">
									<label for="classificacao">Classificação:</label>
									<input type="text" class="form-control" id="classificacao" name="Classificacao" value="<?php echo $linha['Classificacao']; ?>" required>
								</div>
								<div class="form-group mb-3">
									<label for="condicao">Condição:</label>
									<input type="text" class="form-control" id="condicao" name="Condicao" value="<?php echo $linha['Condicao']; ?>" required>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Salvar</button>
						</form>
					</div>
				</div>
			</div>
			<!-- Caixa da Direita -->
			<div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #4169E1;">
				<div class="featured-image mb-3">
					<img src="img/doenca.png" class="img-fluid" style="width: 250px;">
				</div>
				<p class="text-white fs-2 mb-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Registre as doenças!</p>
				<small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Ajude a monitorar as doenças da sua cidade. Saúde em primeiro lugar!</small>
			</div>
		</div>
	</div>


	<!-- Adicione os scripts do Bootstrap e da jQuery Mask -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>