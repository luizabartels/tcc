<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'academia';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

mysqli_error($con); 

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_SESSION['reginstrutor'])) {
	header('Location: registraInstrutor.php');
	exit();
}
    $instrutor_nome = $_SESSION['instrutor_nome'];
    $instrutor_identidade = $_SESSION['instrutor_identidade'];
    $instrutor_cpf = $_SESSION['instrutor_cpf'];
    $instrutor_atividade = $_SESSION['instrutor_atividade'];

if (isset($_REQUEST['registrar']))
{
    //Adicionar comparação com itens do banco de dado.

    $sql = ("INSERT INTO `instrutores` (`nome`, `identidade`, `cpf`, `atividades`) VALUES ('$instrutor_nome', '$instrutor_identidade', '$instrutor_cpf', '$instrutor_atividade')");
    
    mysqli_query($con, $sql);

    header('Location: registraInstrutor.php');
}
?>

<DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
	<style>
	td
	{
		padding: 0px 0px 5px 0px;
		font-family: Bahnschrift Light;
        font-size: 20px;
	}
	</style>
    <body style = "background-color: black;">
		<nav style = "background-color: #FFC000;
					 font-family: Bahnschrift SemiBold;
					 text-align: center;
					 font-size: 40px;" >
			<span class="navbar-brand mb-0 h1">CADASTRO DE INSTRUTOR - CONFIRMAÇÃO</span>
		</nav>
        <div class = "container" style = "width: 600px;
                      background-color: #FFC000;
                      margin: 50px auto;
                      border-radius: 30px;">
                <table class="table table-borderless" style = "padding: 15px 20px 15px 20px;">
                    <tr>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Nome:</td>
						<td><?=$instrutor_nome?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Identidade:</td>
						<td><?=$instrutor_identidade?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">CPF:</td>
						<td><?=$instrutor_cpf?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Atividades:</td>
						<td><?=$instrutor_atividade?></td>
                    </tr>
						<td></td>
						<td></td>
					</tr>
				</table>
        </div>
		<div class="container">
		<div style = "margin: -30px; width: auto" class="row justify-content-center">
			<button style = "margin-right: 30px; width: 250px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: 30px; border-radius: 15px;"
                    type="button"
                    onclick = "window.location.href='registraInstrutor.php'"
                    class="btn">CORRIGIR</button>

            <form method="$_REQUEST">
            <input type = "submit" 
                    name = "registrar"
                    value = "CONFIRMAR"
                    style = "border-color: transparent; width: 250px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; font-size: 30px; border-radius: 15px;">
            </form>
		</div>
		</div>
    <body>
</html>