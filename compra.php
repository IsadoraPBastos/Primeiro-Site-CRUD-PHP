<?php
session_start();
include_once('conexao.php'); ?>

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
    <title>Compra de um produto</title>
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
    background-color: #1f1f1f;
  }
  a{
    color: white;
  }
  u{
	color: #eb5454;
  }
  h1{
    color: #eb5454;
    background-color: #1f1f1f;
  }
  input{
    color: black;
  }
  .dropdown-menu{
    --bs-dropdown-bg: #1f1f1f;
    --bs-dropdown-border-color: white;
    border-radius: 10px;
    --bs-dropdown-link-hover-bg: #303030;
  }
  #image{
    border-radius: 50px;
    border: solid 4px #eb5454;
  }
  #image:hover{
    border: solid 4px #f57676;
  }
  #caixa{
    background-color: #383737;
    border-radius: 50px;
    padding: 15px;
  }
  #inputGroupSelect01 {
    border-radius: 10px;
  }
  option{
    color: black;
  }
  option:hover{
    color: #f57676;
  }
</style>

<?php
$query = mysqli_query($conexao,"select * from produtos");
$dados=mysqli_fetch_array($query);

$preco = $_SESSION['preco'];
$descricao = $_SESSION['descricao'];
$id = $_SESSION['idproduto'];
$estoque = $_SESSION['qtd_estoque'];
$tamanho = $_SESSION['tamanho'];
$imagem = $_SESSION['imagem'];



?>

<nav class="navbar navbar-expand-md navbar-dark" >
<div class="container-xl">

  <?php
  if (isset($_SESSION["logado"]))  {
    $queryC = mysqli_query($conexao,"select * from clientes");
    $idC = $_SESSION['idcliente'];
    $selectC = "SELECT * FROM clientes where idcliente ='$idC'";
    $resultC = mysqli_query($conexao, $selectC);
    $dadosC = mysqli_fetch_array($resultC);?>
    <a class="nav-link" href="produtos.php"> Olá, <?php echo $dadosC['nome']; ?><a>
  <?php  

  if(isset($_POST["finalizar"])) { 

  $idcli = $_SESSION['idcliente'];
  $cpf = $dadosC['cpf'];
  $qtd_compra = $_POST['opcoes'];
  $data = date('Y/m/d');

  $sql = "INSERT INTO registros (idregistro,idprod,qtd_compra,data_ped,idcli,cpf) VALUES 
  (null, '$id', '$qtd_compra', '$data', '$idcli', '$cpf');";
  echo $sql;
  $result = mysqli_query($conexao, $sql); 
  
    if($result!=null) {
        mysqli_close($conexao);
      }
      header('location:produtos.php?');
  }
}
  
if(!isset($_SESSION["logado"])) {
  header('location:login.php?');
}

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
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class='nav-item dropdown' >
        <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
          Categorias</a>
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

<form method="post" action="compra.php">
<div class="container">
	<div class="row justify-content-md-center">
	  <div class="col-md-auto">    
      <div class="my-4 mb-1">
			<h1>Finalizar a compra do seguinte item:</h1>
      </div>		
	  </div>
<div class="row justify-content-center mt-5">
		<div class="col-md-auto"> 
			<?php echo "<center><img src='imagens/$imagem' width='280px' class='img-fluid' id='image'></center>"; ?> 
		</div>			
		<div class="col-md-auto" id="caixa"> 
			<div style="background-color: #383737;">
				<h3><u><b style="color: #eb5454;">Informações</b></u></h3>
			</div>
      <div class="mt-4 mb-3" style="background-color: #383737;">
				<?php echo "<b>Nome: </b>".$descricao.""; ?>
			</div>
			<div class="mb-3" style="background-color: #383737;">
				<?php echo "<b>Preço:</b> R$".$preco."<h>,00 </h>"; ?>
			</div>
			<div class="mb-3" style="background-color: #383737;">
				<?php echo "<b>Tamanho: </b>".$tamanho."<h>cm</h>"; ?>
			</div>
			<div class="mb-3" style="background-color: #383737;">
				<?php echo "<b>Quantidade disponível: </b>".$estoque.""; ?>
			</div>
      <div class="input-group" style="background-color: #383737;">
        <div class="mr-2" style="background-color: #383737;">
          <h><b>Quantidade: </b></h>
			  </div>
        <form method="post" action="compra.php">
        <div class="container w-50" style="background-color: #383737;">
        <select class="form-select form-select-sm" id="inputGroupSelect01" name="opcoes">
          <option selected value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option> 
          </div>
  </select>
</div>
		</div>	
	</div>
</div>
</div>
<div class="container">
	<div class="row justify-content-md-center mt-5">
		<div class="col-md-auto mb-2"> 
		<div><a href="produtos.php?"><input class="btn btn-danger" type="submit" value="Finalizar" name="finalizar"></a></div>
		</div></form>
		<div class="col-md-auto mb-2"> 
		<div><a href="produtos.php?" class="btn btn-danger">Cancelar</a></div>
	</div>
</div>
<?php





?>
