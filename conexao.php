<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "db_cadastro";

    if ($conn = mysqli_connect($server, $user, $pass, $db)){
            "Conectado com sucesso!";
        }else
            echo "Erro na conexão";


        function alerta($y, $x) {
            echo "<div class='alert alert-$x' role='alert'>
            $y 
        </div> ";
        }
    
?>