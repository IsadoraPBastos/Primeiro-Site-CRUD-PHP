<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="..bootstrap/node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="..bootstrap/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Cadastro</title>
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
    height: 100vh;
  }
</style>

<div class="container" id="container">
    <div class="row align-items-center justify-content-md-center" id="container">
        <div class="col-md-auto">
            <div class="p-5" id="caixa">
                <div class="mb-5">
                    <h1><strong>Insira os seguintes dados: </strong></h1>
                </div>
                <form method="get" action="cadastro.php" style="background-color: #eb5454;">
                    <table class="login-caixa" align=center>
                        <thead>
                            <tr>
                                <td><div class="mb-2" style="background-color: #eb5454;">Nome: </div></td>
                                <td><input type="text" name="nome" placeholder="Nome" required="required"></td>
                            </tr>
                            <tr>
                                <td><div class="mb-2" style="background-color: #eb5454;">Email:  </div></td>
                                <td><input type="text" name="email" placeholder="Email" required="required"></td>
                            </tr>
                            <tr>
                                <td><div class="mb-2" style="background-color: #eb5454;">Senha:  </div></td>
                                <td><input type="password" name="senha" placeholder="Senha" required="required"></td>
                            </tr>
                            <tr>
                                <td><div class="mb-2" style="background-color: #eb5454;">CPF: </div></td>
                                <td><input type="text" name="cpf" placeholder="CPF" required="required"></td>
                            </tr>
                            <tr>
                                <td><div class="mb-2" style="background-color: #eb5454;">CEP: </div></td>
                                <td><input type="text" name="cep" placeholder="CEP" required="required"></td>
                            </tr>   
                            <tr align=center>
                                <td><div class="mx-1 mt-5" style="background-color: #eb5454;"><a href="insere.php"><input class="btn btn-danger" type="submit" value="Cadastrar"></input></div></td></form>
                                <td><div class="mx-1 mt-5" style="background-color: #eb5454;"><a href="login.php?" class="botaocadastro btn btn-danger">Voltar</a></div></td>
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
if (isset ($_GET["nome"]) && isset ($_GET["email"]) && isset ($_GET["senha"]) && isset ($_GET["cpf"]) && isset ($_GET["cep"])) {
    
    $nome = $_GET["nome"];
    $email = $_GET["email"];
    $senha = $_GET["senha"];
    $cep = $_GET["cep"];
    $cpf = $_GET["cpf"];

    $senha_cripto = password_hash($senha, PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO clientes (idcliente, nome, email, senha, cep, cpf, logado, statuss) VALUES 
        (null, '$nome', '$email', '$senha_cripto','$cep', '$cpf','S','ativo');";
        $result = mysqli_query($conexao,$sql);

        if($result!=null) 
        {
            mysqli_close($conexao);
            echo "<script>alert('Os dados foram inseridos');</script>";
        }              
    header ("Location: login.php");       
}

?>


</body>

</html>