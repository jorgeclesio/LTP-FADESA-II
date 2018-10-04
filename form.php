<form action="form.php" method="POST" enctype="multipart/form-data">
	<input type="file"  name="arquivo"><br>
	<input type="text" name="local" placeholder="Local"><br>
	<input type="submit" name="submit" >
</form>
<?php  
$conexao = mysqli_connect ('localhost','root','','upload')
or die ('Erro na conexão');

IF($_POST['submit']){ //Verificação de ENvio
$local=$_POST['local'];
$nome = $_FILES['arquivo']['name']; //NOmedo Arquivo
$nomenovo=time().$nome;
$tamanho = $_FILES['arquivo']['size']; //Tamanho em Bytes
$tipo = $_FILES['arquivo']['type']; //Tipo do arquivos
$tmp = $_FILES['arquivo']['tmp_name']; //Local temporário

echo $local ."<br>";
echo $nome."<br>";
echo $tamanho."<br>";
echo $tmp."<br>";

$dir='imgg/'.$nomenovo;
if($tipo<>'image/jpg'){ //Verifica o tipo de arquivo
	if($tamanho>10){
	move_uploaded_file($tmp,$dir); //Mover Arquivo
	echo "<img src='imgg/$nomenovo' width='200px'>";
	$sql="INSERT INTO imagens (diretorio,tamanho) values ('$dir','$tamanho')";
	mysqli_query($conexao,$sql);
	} else {
			echo "<br>Arquivo acima de 30 mil bytes..."; 
			}
} else {echo"Não é uma JPEG";}
} 

// Final da verificação de envio.

//echo time() .'<br>';
//echo md5('lenicio.jpg'); //Cripitografia de dado
?>
