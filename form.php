<head>
</head>
<form action="form.php" method="POST" enctype="multipart/form-data">

<input type="file"  name="arquivo">
<input type="submit" name="submit">
</form>
<?php
IF($_POST['submit']){ //Verificação de ENvio
$local=$_POST['local'];
$nome = $_FILES['arquivo']['name']; //NOmedo Arquivo
$tamanho = $_FILES['arquivo']['size']; //Tamanho em Bytes
$tipo = $_FILES['arquivo']['type']; //Tipo do arquivos
$tmp = $_FILES['arquivo']['tmp_name']; //Local temporário

echo $local ."<br>";
echo $nome."<br>";
echo $tamanho."<br>";
echo $tmp."<br>";
echo $tipo;

$dir='imgg/'.$nome;
if($tipo<>'image/gif'){ //Verifica o tipo de arquivo
	if($tamanho<37000){
	move_uploaded_file($tmp,$dir); //Mover Arquivo
	} else {
			echo "<br>Arquivo acima de 30 mil bytes..."; 
			}
} else {echo"Não é uma JPEG";}
} // Final da verificação de envio.

//echo time() .'<br>';
//echo md5('lenicio.jpg'); //Cripitografia de dado
?>
