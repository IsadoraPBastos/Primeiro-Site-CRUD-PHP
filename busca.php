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
    <title>Produtos</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="bootstrap/js/bootstrap.bundle.min.js">



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
  b {
    background-color: #383737;
  }
  h{
    background-color: #383737;
  }
  table{
    background-color: #1f1f1f;
    color: white;
  }
  a{
    color: white;
  }
  .dropdown-menu{
    --bs-dropdown-bg: #1f1f1f;
    --bs-dropdown-border-color: white;
    border-radius: 10px;
    --bs-dropdown-link-hover-bg: #303030;
  }
  h1{
    color: #e63030;
  }
  h1:hover{
    color: #eb5454;
  }
  .image{
    padding: 7px;
    border-radius: 30px;
    transition: 0.5s;
    background-color: #383737;
  }
  .image:hover{
    background-color: #e95e5e;
  }
  #caixa{
    border-radius: 30px;
  }
</style>

<nav class="navbar navbar-dark navbar-expand-lg" >
<div class="container-xl">

<?php
include_once('conexao.php');
  if (isset($_SESSION["logado"]))  {
    $queryC = mysqli_query($conexao,"select * from clientes");
    $idC = $_SESSION['idcliente'];
    $selectC = "SELECT * FROM clientes where idcliente ='$idC'";
    $resultC = mysqli_query($conexao, $selectC);
    $dadosC = mysqli_fetch_array($resultC);?>
    <a class="nav-link" href="produtos.php"> Olá, <?php echo $dadosC['nome']; ?></a>

    <?php    
    }
    if(!isset($_SESSION["logado"])) {?>
        <a class="navbar-brand" href="produtos.php">Nossa Loja</a>
      <?php } 
    
    $pesquisa = $_GET['pesquisa'];
    $prod = "SELECT * FROM produtos where descricao LIKE '%".$pesquisa."%'";
    $result = mysqli_query($conexao, $prod);
    
    if (isset($_GET["valorbusca"]))  {

        $produto = $_GET["valorbusca"];
    
        if($selectP = "select * from produtos where descricao LIKE '%".$produto."%'");
    
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
            <div class="col-md-auto my-4">
                <?php echo"<h1> Resultados para: $pesquisa</h1>" ?>
            </div>
            </div>
            </div>
<?php



?>
<div class="container">
  <div class="row row-cols-2 row-cols-md-4 g-5">
  <?php
  while($prod2 = mysqli_fetch_assoc($result)){
 
    $idprod = $prod2['idproduto'];
    $nome = $prod2['descricao'];
    $preco = $prod2['preco'];
    $estoque = $prod2['qtd_estoque'];
    $tamanho = $prod2['tamanho'];
    $imagem = $prod2['imagem'];?>

      <div class='col align-self-center'> 
        <?php echo "<center style='background-color: #383737;' id='caixa' class='py-4'><a href='verfoto.php?idproduto=$idprod&descricao=$nome&qtd_estoque=$estoque&tamanho=$tamanho&
      preco=$preco&imagem=$imagem'>"; ?>
      <img class='img-fluid image' <?php echo "src='imagens/{$prod2['imagem']}'" ?> width='180px'></img></a>
      <div class="w-100"></div>
      
      <?php
      echo "<b style='color: #eb5454;'>".$prod2['descricao']."
      </b><br><b>Preço:</b> R$".$prod2['preco']."<h>,00</h>";
      ?>
      </div> <?php } ?>
  </div>
</div>







