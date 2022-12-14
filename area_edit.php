<!DOCTYPE html>
<html lang="en">
  <!--------------------------- Área de Edição e exclusão de dados----------------->
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </head>

  <body class="container">
    <?php

    include "conexao.php";

    $pesquisa = $_POST['busca'] ?? '';
    $sql = "SELECT * FROM tb_pessoas WHERE nome LIKE '%$pesquisa%'";
    $dados = mysqli_query($conn, $sql);

    ?>

    <div class="container-center mt-5 pd-3">
      <h2 class="font-italic">Pesquise</h2>
      <nav class="navbar navbar-light bg-light">
        <form class="form-inline" action="area_edit.php" method="POST">
          <input class="form-control mr-sm-2" type="search" placeholder="Nome" aria-label="Search" name="busca" autofocus>
          <button class="btn btn-primary my-2 my-sm-0" type="submit">Pesquisar</button> 
        </form>
      </nav>

      <table class="table table-bordered">
        <thead>
          <tr class="bg-info">
            <th scope="col"><b>Nome</b></th>
            <th scope="col"><b>E-mail</b></th>
            <th scope="col"><b>Telefone</b></th>
            <th scope="col"><b>Ações</b></th>
          </tr>
        </thead>
        <tbody>
          <?php

          while ($linha = mysqli_fetch_assoc($dados)) {
            $id_pessoa = $linha['id_pessoa'];
            $nome = $linha['nome'];
            $email = $linha['email'];
            $telefone = $linha['telefone'];
            
          echo " <tr>
            <th scope='row'>$nome</th>
            <td>$email</td>
            <td>$telefone</td>
            <td width='200px'><a href='cadastro_ed.php?id=$id_pessoa' class='btn btn-success btn-sm col-lg-5'>Edtar</a>
            <a href='#' class='btn btn-danger btn-sm col-lg-5' data-toggle='modal' data-target='#confirma'
              onclick=" . '"' . "getDados($id_pessoa, '$nome')" . '"' . ">Excluir</a>
              </td>
          </tr> ";
          }
          ?>
          </tr>
        </tbody>
      </table>

      <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Confirma a exclusão?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <form action="excluir_script.php" method="POST">
                <p>Tem certeza que deseja excluir <b id="nome_pessoa">Nome da pessoa></b>?</p>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
              <input type="hidden" name="nome" id="nome_pessoa2" value="">
              <input type="hidden" name="id" id="id_pessoa" value="">
              <input type="submit" class="btn btn-danger" value="sim">
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Função JavaScript para capturar dados excluidos -->

      <script type="text/javascript">
        function getDados(id, nome) {
          document.getElementById('nome_pessoa').innerHTML = nome;
          document.getElementById('nome_pessoa2').value = nome;
          document.getElementById('id_pessoa').value = id;
        }
      </script>

      <a href="index.php" class="btn btn-primary">Voltar à pagina inicial</a>
      
    </div>
  </body>
</html>