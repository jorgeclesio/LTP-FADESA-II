<head>
</head>
<form action="form.php" method="POST" enctype="multipart/form-data">

<input type="file"  name="arquivo">
<input type="submit" name="submit">
</form>
<?php
IF($_POST['submit']){ //
$nome = $_FILES['arquivo']['name'];
$tipo = $_FILES['arquivo']['type'];
$size = $_FILES['arquivo']['size'];
$tmp = $_FILES['arquivo']['tmp_name'];
$dir='img/'.$nome;
move_uploaded_file($tmp,$dir);

echo $nome."<br>";
echo $tipo."<br>";
echo $size."<br>";
echo $tmp."<br>";
}

//echo time() .'<br>';

//echo md5('lenicio.jpg'); //Cripitografia de dado
?>