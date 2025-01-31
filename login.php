<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="..bootstrap/node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="..bootstrap/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="bootstrap/js/bootstrap.bundle.min.js">

<style>
    *{
    color: white;
  }
  body {
    background-color: #1f1f1f;
  }
  div{
    background-color: #1f1f1f;
  }
  form{
    background-color: white;
  }
  a{
    color: white;
  }
  h1{
    color: white;
    background-color: #eb5454;
  }
  input{
    color: black;
  }
  #caixa{
    background-color: #eb5454;
    border-radius: 40px;
  }
  #container{
    width: 100%;
    height: 80vh;
  }
  #loginerrado{
    background-color: #bf3434;
  }
</style>


<div class="container" id="container">
    <div class="row align-items-center justify-content-md-center" id="container">
        <div class="col-md-auto">
            <div class="p-5" id="caixa">
                <div class="mb-5">
                    <h1> Faça seu Login: </h1>
                </div>
                <form method="post" action="login.php" style="background-color: #eb5454;">
                    <table class="login-caixa" align=center>
                        <thead>
                            <tr>
                                <td align=center colspan=3><div class="mb-2" style="background-color: #eb5454;"><input name="email" placeholder="Email" type="text" required="required"></div></td>
                            </tr>
                            <tr>
                                <td align=center colspan=3><div class="mb-5" style="background-color: #eb5454;"><input name="senha" placeholder="Senha" type="password" required="required"></div></td>
                            </tr>
                            <tr>
                                <td><div class="mx-1" style="background-color: #eb5454;"><input class="botao-entrar btn btn-danger" type="submit" value="Entrar"></input></div></td></form>
                                <td><div class="mx-1" style="background-color: #eb5454;"><a href="cadastro.php" class="btn btn-danger">Criar Conta</a></div></td>
                                <td><div class="mx-1" style="background-color: #eb5454;"><a href="produtos.php?" class="btn btn-danger">Voltar</a></div></td>
                            </tr>    
                        </thead>
                    </table>
            </div>
        </div>
    </div>
</div>





<?php
session_start();
include_once('conexao.php');


    $query = mysqli_query($conexao,"select * from clientes");

    if(mysqli_num_rows(mysqli_query($conexao,"SELECT idcliente FROM clientes"))==0) 
    {
        mysqli_query($conexao,"ALTER TABLE `clientes` MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;");
        mysqli_query($conexao,"INSERT INTO clientes (nome,email,senha,cpf,cep,logado,statuss) values ('cliente1','cliente123@gmail.com',
        'cliente123','12345678910','123456789','S','ativo')");
        mysqli_close($conexao);
    }

if(isset($_POST["email"]) && isset($_POST["senha"])) { 
        if(!isset($_SESSION["logado"])) {

            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            $select = "SELECT * FROM clientes where email = '$email'";
            $info2 = @mysqli_query($conexao, $select); 
            $dados2 = mysqli_fetch_array($info2);	
            
            

            if($dados2!=null){
              if(password_verify($senha, $dados2['senha'])){

            
              $_SESSION['idcliente'] = $dados2['idcliente'];
              $_SESSION['nome'] = $dados2['nome'];
              $_SESSION['senha'] = $_POST['senha'];
              $_SESSION['logado'] = $dados2['logado'];                
               
				      header("location:produtos.php?");
            }

}
            else {
              ?><svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
              <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </symbol>
            </svg>
                <div class="alert" id="loginerrado" align=center>
                <svg class="bi flex-shrink-0 me-2" width="20" height="20" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><strong>Atenção!<br/> Login e/ou Senha inválida.</strong>
                </div>
              <?php   		
            }
            
              



		if (!$info2) { die('<b>Query Inválida: </b>' . mysqli_error($conexao)); }
           
    	$registro = mysqli_num_rows($info2);	

        
        }

    }
 //   }



 ?>
<div align=center>
<?php
    
?>
</div>
<?php
?>


