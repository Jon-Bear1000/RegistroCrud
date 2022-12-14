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

  <body class="">

    <?php

    include "conexao.php";
    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM tb_pessoas WHERE id_pessoa = $id";

    $dados = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_assoc($dados);

    ?>

    <div class="container border mt-5 bg-write">
      <form class="form-horizontal" action="dados.php" method="POST" enctype="multipart/form-data">
        <div class="form-group mt-3">
          <label for="nome" class="font-italic">
            <h2>Edição de cadastro</h2>
          </label>
          <input type="text" name="nome" class="form-control" aria-describedby="emailHelp" placeholder="Nome do usuário" required value="<?php echo $linha['nome']; ?> ">
        </div>

        <div class="form-group">
          <label for="email"></label>
          <input type="email" name="email" class="form-control" placeholder="Digite o E-mail" value="<?php echo $linha['email']; ?> ">
        </div>

        <div class="form-group mt-3">
          <label for="telefone" class="font-italic"></label>
          <input type="text" name="telefone" class="form-control" placeholder="Digite seu número" value="<?php echo $linha['telefone']; ?> ">
        </div>

        <div>
          <button type="submit" class="btn btn-success" value="Salvar alterações">Salvar alterações</button>
          <input type="hidden" name="id" value="<?php echo $linha['id_pessoa'] ?>">
          <a href="area_edit.php" class=" btn btn-primary">Voltar à área de registros</a>
        </div>
      </form>
    </div>
  </body>
</html>