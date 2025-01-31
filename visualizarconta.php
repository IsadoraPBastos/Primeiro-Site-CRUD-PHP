<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="..bootstrap/node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="..bootstrap/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="lojaprodutos.css">
    <title>Conta</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="bootstrap/js/bootstrap.bundle.min.js">

<?php
include_once('conexao.php');
$query = mysqli_query($conexao,"select * from clientes");
$id = $_SESSION['idcliente'];
$prod = "SELECT * FROM clientes where idcliente ='$id'";
$result = mysqli_query($conexao, $prod);
$dados = mysqli_fetch_array($result);

if (isset($_POST['excluir']))  {
  $excluir = "delete from clientes where idcliente = $id";
  $result = mysqli_query($conexao,$excluir);
  header ("Location: produtos.php?");
  session_destroy();
}
?>

<style>
  *{
    background-color: #1f1f1f;
    color: white;
  }
  body {
    background-color: #1f1f1f;
  }
  div{
    background-color: #1f1f1f;
  }
  tbody{
    color: white;
  }
  table{
    background-color: #1f1f1f;
    color: white;
  }
  a{
    color: white;
  }
  h1{
    color: #eb5454;
  }
  .dropdown-menu{
    --bs-dropdown-bg: #1f1f1f;
    --bs-dropdown-border-color: white;
    border-radius: 10px;
    --bs-dropdown-link-hover-bg: #303030;
  }
  #tabela{
    color: white;
  }
</style>

<?php
      if (isset($_GET["valorbusca"]))  {
        $produto = $_GET["valorbusca"];
        $selectP = "select * from produtos where descricao LIKE '%".$produto."%'";
  
        $_SESSION['produtobusca'] = $produto;
  
        $resultado = mysqli_query($conexao,$selectP);
  
        if($linha = mysqli_fetch_array($resultado)) {
            header ("Location: busca.php?pesquisa=".$produto);
        }
        else{
          header ("Location: busca.php?pesquisa=".$produto);
        }
      
        }
        ?>

<nav class="navbar navbar-dark navbar-expand-lg" >
<div class="container-xl">

  <?php
  if (isset($_SESSION["logado"]))  {
    $queryC = mysqli_query($conexao,"select * from clientes");
    $idC = $_SESSION['idcliente'];
    $selectC = "SELECT * FROM clientes where idcliente ='$idC'";
    $resultC = mysqli_query($conexao, $selectC);
    $dadosC = mysqli_fetch_array($resultC);?>
    <a class="nav-link" href="produtos.php?"> Olá, <?php echo $dadosC['nome']; ?></a>
  <?php  
  }
  if(!isset($_SESSION["logado"])) {?>
    <a class="navbar-brand" href="produtos.php?">Nossa Loja</a>
  <?php } 
    

  ?>
  

  <button class="navbar-toggler mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Categorias</a>
        <ul class='dropdown-menu'>        
        <li><a class='dropdown-item' id='dropdown' href='busca_categoria.php?categoria=Attack+On+Titan' style='color:white;'>Attack On Titan</a></li>        
        <li><a class='dropdown-item' href='busca_categoria.php?categoria=Boku+No+Hero+Academy' style='color:white;'>Boku No Hero Academy</a></li>        
        <li><a class='dropdown-item' href='busca_categoria.php?categoria=Dragon+Ball' style='color:white;'>Dragon Ball</a></li>
        <li><a class='dropdown-item' href='busca_categoria.php?categoria=Genshin' style='color:white;'>Genshin</a></li>        
        <li><a class='dropdown-item' href='busca_categoria.php?categoria=Jujutsu+Kaisen' style='color:white;'>Jujutsu Kaisen</a></li>
        <li><a class='dropdown-item' href='busca_categoria.php?categoria=Pokémon' style='color:white;'>Pokémon</a></li>
        <li><a class='dropdown-item' href='busca_categoria.php?categoria=Spy+X+Family' style='color:white;'>Spy x Family</a></li>
        <li><a class='dropdown-item' href='busca_categoria.php?categoria=Vocaloids' style='color:white;'>Vocaloids</a></li>
        <li><a class='dropdown-item' href='busca_categoria.php?categoria=Vtubers' style='color:white;'>Vtubers</a></li>
      </li>    
    </ul>
</div>

<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
<form class="form-inline my-2 my-lg-10" method="get">
  <div class="row">
  <div class="col"><input class="form-control mr-sm-10" type="search" placeholder="Pesquisar" aria-label="Search" name="valorbusca"></input></div>
  <div class="col"><a href='busca.php?'><input class="btn btn-outline-danger my-sm-0" type="submit" name="busca" value="Buscar"></input></a></div>
  </div>    
   </form>   
</div>


<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
        <?php
            if (isset($_SESSION["logado"]))  {?>
              <a class="nav-link" id="nav-link1" href="visualizarconta.php">Conta</a>
          <?php  
          }
          if(!isset($_SESSION["logado"])) {?>
            <a class="nav-link" href="login.php">Login</a>
          <?php } ?>
      
</ul>
</div>
  </div>
</nav>

<div class="container">
  <div class="row justify-content-md-center">
  <div class="col-md-auto">
    <div class="my-5">
      <h1> Informações da Conta </h1>
    </div>
  </div>
</div>
</div>

<table class="table table-bordered table-dark w-50 mb-5" align=center>
  <thead>
    <tr>
      <th scope="col">Nome: </th>
      <th scope="col"><?php echo $dados['nome']; ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Email: </th>
      <td><?php    echo $dados['email'];   ?></td>
    </tr>
    <tr>
      <th scope="row">Senha: </th>
      <td><?php $senha = $_SESSION['senha'];   echo $senha;    ?></td>
    </tr>    
    <tr>
      <th scope="row">CPF: </th>
      <td><?php    echo $dados['cpf'];   ?></td>
    </tr></output>
    <tr>
      <th scope="row">CEP: </th>
      <td><?php    echo $dados['cep'];   ?></td>
    </tr>
  </tbody>
</table>

<form method="post" action="visualizarconta.php">
<div class="container">
    <div class="row justify-content-md-center mb-4">
        <div class="col-md-auto mb-2">
            <a href="alterar.php"><button type="button" class="btn btn-danger">Alterar dados</button></a>
        </div>
        <div class="col-md-auto mb-2">
            <a href="sair.php"><button type="button" class="btn btn-danger">Deslogar</button></a>
        </div>

        <div class="col-md-auto mb-2">
            <a href="produtos.php"><input class='btn btn-danger' type='submit' value='Excluir' name='excluir'></input></a>
        </div>
        </form>
    </div>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <a href="produtos.php"><button type="button" class="btn btn-danger">Voltar</button></a>
        </div>
    </div>
</div>

<?php

