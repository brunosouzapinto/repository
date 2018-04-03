<?php
  
  include("lib/config.php");

  /***********************************************************
  Limpo as variáveis, pois as mesmas são recebidas nos formulários
  ************************************************************/
  $nome      = '';
  $email     = '';
  $senha     = '';


  /***********************************************************
  Caso a variável alterar vier preenchida, faço um select para preencher
  os campos do formulário
  ************************************************************/
  if (isset($_GET['alterar']))
  {
     $codigoAux = $_GET['alterar'];
   
     $sql = "SELECT * FROM aluno WHERE cd_aluno = $codigoAux";
     $resultado = mysqli_query($con,$sql);  
     $query = mysqli_fetch_array($resultado);
     $nome  = $query["nome"]; 
     $email = $query["email"];
     $senha = $query["senha"];
  }
  /***********************************************************
  Caso a variável deletar vier preenchida, realizo o comando
  DELETE e volto para a página index
  ************************************************************/  
  elseif(isset($_GET['deletar']))
  {  
     $codigoAux  = $_GET['deletar'];
   
     $sql = "DELETE FROM aluno WHERE cd_aluno = $codigoAux";
     $resultado = mysqli_query($con,$sql);  

     echo "<script>";
     echo "window.location.href = 'index.php';";
     echo "</script>";
  } 
 
   /***********************************************************
  Caso a variável nome vier preenchida, entra aqui
  ************************************************************/ 
  if (isset($_POST['nome']))
  {
     $nome      = $_POST['nome'];
     $email     = $_POST['email'];
     $senha     = $_POST['senha'];

   /***********************************************************
   Caso a variável $codigoAux vier vazia, significa que ela
   não encontrou nada para alterar, portanto insere o registro
   ************************************************************/ 
     if (empty($codigoAux)) 
     { 
         $sql_code="INSERT INTO aluno(nome, email, senha) VALUES ('$nome','$email','$senha')";
         $sql_query=mysqli_query($con,$sql_code);

         if ($sql_query == true)
            { echo "<script>";
              echo "window.location.href = 'index.php';";
              echo "</script>";
            }

     }
   /***********************************************************
   Caso a variável $codigoAux vier preenchida, significa que ela
   foi recebida logo acima, portanto o registro existe para alterar
   ************************************************************/ 
     else 
     {  
       $sql_code="UPDATE aluno SET nome = '$nome', email = '$email', senha = '$senha' WHERE cd_aluno = $codigoAux";        

       $sql_query=mysqli_query($con,$sql_code); 

       echo "<script>";
       echo "window.location.href = 'index.php';";
       echo "</script>";
     }  
   }

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
            <li><a href="index.php">Consulta</a></li>
            <li class="active"><a href="cadastro_aluno.php">Cadastro</a></li>
          </ul>
        </div>
      </div>
    </nav>


    <form role="form" action="" method="POST" enctype="multipart/form-data">
    <div class="container">
        <hr/>
        <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Email" value="<?php echo $nome?>" required>
              </div>
            </div>  
            <div class="col-md-4">
              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo $email?>" required>
              </div>
            </div>    
            <div class="col-md-2">
              <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" value="<?php echo $senha?>" required>
              </div>
            </div> 
            <div class="col-md-2">
              <div class="form-group">
                <label>&nbsp;</label><br/>
                <button type="submit" class="btn btn-success btn-block"><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Salvar</button>
              </div>
            </div>                                       
        </div>          
    </div>
  
    </form>  


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>