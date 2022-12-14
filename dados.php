<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </head>

  <body class="w-100  p-3">
    <div class="container border mt-5 w-25 bg-primary"> </div>
      <a href="index.php" class="btn btn-primary">Voltar à pagina inicial</a>
    <div class="container mt-4" id="dadosCadastro"></div>

    <?php

    include "conexao.php";
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];


    $sql = "INSERT INTO `tb_pessoas`
      (`nome`, `email`, `telefone`) VALUES ('$nome','$email','$telefone')";

      if (mysqli_query($conn, $sql)) {
        alerta("$nome <b>cadastrado(a) com sucesso !!!</b>", 'success');
      } else
        alerta("$nome NÃO cadastrado!", 'danger');
    ?>
    
  </body>
</html>