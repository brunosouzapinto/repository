<?php
  include("lib/config.php");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cadastro de Escola</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
  
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="#">Escola</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Consulta</a></li>
            <li><a href="cadastro_aluno.php">Cadastro</a></li>
          </ul>
        </div>
      </div>
    </nav>


    <form role="form">
    <div class="container">
        <table class="table table-striped">
          <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>#</th>
            <th>#</th>
          </tr>      

          <?php
          $sql_usuario = "SELECT * FROM aluno order by nome";
          $resultado = mysqli_query($con,$sql_usuario);

          while ($query = mysqli_fetch_array($resultado)){
                    $codigo  = $query["cd_aluno"];
                    $nome    = $query["nome"];
                    $email   = $query["email"]; ?>

                     <tr>
              <td><?php echo $nome?></td>
              <td><?php echo $email?></td>
              <td>
                <a href="cadastro_aluno.php?alterar=<?php echo $codigo?>"><span class='glyphicon glyphicon-pencil altera' aria-hidden='true'></span></a>
              </td>            
              <td>
                <a href="cadastro_aluno.php?deletar=<?php echo $codigo?>" onclick="return confirm('Você realmente deseja excluir o aluno?')"><span class='glyphicon glyphicon-remove deleta' aria-hidden='true'></span></a>
              </td>  
            </tr> 

          <?php
          }
          ?>

        </table>
        <a class="btn btn-primary" href="cadastro_aluno.php" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inserir novo aluno</a>


    </div>

    </form>  


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>