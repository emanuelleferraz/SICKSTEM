<!doctype html>
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

    <!-- Container principal -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!-- Login Container -->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
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
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="img/medicoSite.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2 mb-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Monitore doenças!</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Faça o monitoramento das doenças por bairro da sua cidade.</small>
            </div>
            <!-- Caixa da Direita -->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 ">
                        <div class="text-center">
                            <img src="img/logo.png" class="img-fluid" style="width: 180px;">
                        </div>    
                        <h2>Login</h2>
                        <p>Faça login com seus dados de médico.</p>
                    <form action="pagina_inicial.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">CRM</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login">
                            <small class="form-text text-muted">Entre com seus dados de acesso.</small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" name="senha">
                        </div>
                        <button type="submit" class="btn btn-primary">Acessar</button>
                    </form>
					<br>
					<button type="submit" class="btn btn-primary"><a href="index.php">Voltar a Página Inicial</a></button>
                    <?php
                        if (isset($_POST['login'])) {
                            $login = $_POST['login'];
                            $senha = md5($_POST['senha']);

                            include "conexao.php";
                            $sql = "SELECT * FROM `medico` WHERE CRM = '$crm' AND Senha = '$senha'";

                            if($result = mysqli_query($conn, $sql)){
                            $num_registros = mysqli_num_rows($result);

                                if ($num_registros == 1) {
                                    $linha = mysqli_fetch_assoc($result);

                                    if (($login == $linha['login']) and ($senha == $linha['senha'])) {
                                        session_start();
                                        $_SESSION['login'] = "Robson";
                                        header("location: restrito");
                                    } else {
                                        echo "Login inválido!";
                                    }
                                } else {
                                    echo "Login ou senha não encontrados ou inválidos";
                                }
                            } else { 
                                echo "Nenhum resultado do Banco de Dados.";
                            }
                        }
                    ?>
                </div>
           </div>
        </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>