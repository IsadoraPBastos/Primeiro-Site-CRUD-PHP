<?php
	$host = "localhost"; 			
	$user = "root"; 
	$pass = ""; 
	$banco = "bancoinfo";
		
	$conexao = @mysqli_connect($host, $user, $pass, $banco) 
	or die ("Problemas com a conex�o do Banco de Dados");
?>
