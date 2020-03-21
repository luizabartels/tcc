<?php
session_start();
require_once('extra/classes/bd.class.php');
require('extra/classes/instrutor.class.php');
banco_mysql::conn();
$instrutor = new Instrutores();

if (!isset($_SESSION['reginstrutor'])) {
	header('Location: registraInstrutor.php');
	exit();
}
    $instrutor -> nome = $_SESSION['instrutor_nome'];
    $instrutor -> identidade = $_SESSION['instrutor_identidade'];
    $instrutor -> cpf = $_SESSION['instrutor_cpf'];
    $instrutor -> atividades = $_SESSION['instrutor_atividade'];

if (isset($_REQUEST['registrar']))
{
	$dados = array($instrutor -> nome,
				   $instrutor -> identidade,
				   $instrutor -> cpf,
				   $instrutor -> atividades);

	if ($instrutor -> cadastraInstrutor($dados)) echo '<script>alert("Instrutor cadastrado com sucesso")</script>';
    else echo '<script>alert("CPF repetido")</script>';

	header('refresh:1; url=registraInstrutor.php');
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
						<td><?=$_SESSION['instrutor_nome']?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Identidade:</td>
						<td><?=$_SESSION['instrutor_identidade']?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">CPF:</td>
						<td><?=$_SESSION['instrutor_cpf']?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Atividades:</td>
						<td><?=$_SESSION['instrutor_atividade']?></td>
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