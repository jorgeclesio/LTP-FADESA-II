<!DOCTYPE html>
<html lang="pt-br">
<meta charset="UTF-8">
<head>
	<!-- Aula7 Login -->
	<title>Login - Georreferenciamento</title>
	<link href="css/style_login.css" rel="stylesheet">
</head>
<body>

	<div class="tela_login">
		<forM  id="form_login" action="verificar_login.php" method="POST">
			<input  type="text" name="usuario" placeholder="Usuario" required/>
			<input type="password"  name="senha" placeholder="********" required="required"/>
			<input type="submit"/>
		</form>
	</div>
</body>