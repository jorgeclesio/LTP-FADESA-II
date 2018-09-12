<?php 
require 'conexao.php'; //requerendo conexao

$usuario=$_POST['usuario'];
$senha=$_POST['senha'];


$sql="SELECT * FROM usuario
 WHERE usuario='$usuario' and 
 senha ='$senha'";
 
 
$resultado=mysqli_query($conexao,$sql);
$num_r = mysqli_num_rows($resultado); //conta resultado
$dados=mysqli_fetch_array($resultado);

IF($num_r==1){
	//Sessão
	// session_start();
	// $_SESSION['i'] = $dados['id'];
	// $_SESSION['u'] = $dados['usuario'];
	// $_SESSION['s'] = $dados['senha'];
	// $_SESSION['t'] = $dados['tipo'];
	// $_SESSION['a'] = $dados['id_aluno'];
	
	setcookie('i',$dados['id']);
	setcookie('u',$dados['usuario'],time()+5);
	setcookie('s',$dados['senha']);
	setcookie('t',$dados['tipo']);
	setcookie('a',$dados['id_aluno']);

header('location: index.php'); //redireciona para o INDEX
} ELSE IF ($num_r<1) {
	
	echo "Usuário incorrento.";
	header('location: login.php'); //redireciona para o LOGIN
	}




?>