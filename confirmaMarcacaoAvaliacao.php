<?php
session_start();

if (!isset($_SESSION['regavaliacao'])) {
	header('Location: registraAvaliacao.php');
	exit();
}

require_once('extra/classes/bd.class.php');
require('extra/classes/cliente.class.php');
banco_mysql::conn();
$cliente = new Cliente();

	$cliente -> $aluno_matricula = $_SESSION['matricula'];
	$cliente -> $aluno_dfisio = $_SESSION['data'];
	$cliente -> $aluno_hfisio = $_SESSION['hora'];
	$cliente -> $aluno_nome = $_SESSION['nome'];

if (isset($_REQUEST['registrar']))
{
	$cliente -> agendamentoAvaliacao($cliente -> $aluno_matricula, $cliente -> $aluno_dfisio, $cliente -> $aluno_hfisio);
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
					 font-size: auto;" >
			<span class="navbar-brand mb-0 h1">AGENDAMENTO DE AVALIAÇÃO - CONFIRMAÇÃO</span>
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
						<td style = "font-family: Bahnschrift SemiBold;">Aluno:</td>
						<td><?=$nome?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Matrícula:</td>
						<td><?=$matricula?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Data:</td>
						<td><?=$data?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Hora:</td>
						<td><?=$hora?></td>
					</tr>
                    <tr>
						<td></td>
						<td></td>
					</tr>
				</table>
        </div>
		<div class="container">
		<div style = "margin: -30px; width: auto" class="row justify-content-center">
			<button style = "margin-right: 30px; width: 250px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: 30px; border-radius: 15px;"
                    type="button"
                    onclick = "window.location.href='registraAluno.php'"
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