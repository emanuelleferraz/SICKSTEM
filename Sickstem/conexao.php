<?php
    $server = 'localhost';
    $user = 'root';
    $pass = 'devmysql24';
    $bd = 'controle_doencas_bairro';

    if ($conn = mysqli_connect($server, $user, $pass, $bd)){
        //echo "Conectado!";
    } else {
        echo "Erro!";
    }   

    function mensagem($texto, $tipo){
        echo "<div class='text-center alert alert-$tipo' role='alert'>
                   $texto
              </div>";
    }
?>