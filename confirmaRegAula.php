<?php
session_start();

if (!isset($_SESSION['regaula'])) {
	header('Location: registraAula.php');
	exit();
}

require_once('extra/classes/bd.class.php');
require('extra/classes/aula.class.php');
banco_mysql::conn();
$aula = new Aulas();

	$aula -> aula = $_SESSION['nome_aula'];
	$aula -> inicio = $_SESSION['inicio_aula'];
	$aula -> fim = $_SESSION['fim_aula'];
	$aula -> dias = $_SESSION['dias_aula'];
	$aula -> instrutor = $_SESSION['instrutor_aula'];
	$aula -> sala = $_SESSION['sala_aula'];

if (isset($_REQUEST['registrar']))
{
	$dados = array($aula -> aula,
				  $aula -> inicio,
				  $aula -> fim,
				  $aula -> dias,
				  $aula -> instrutor,
				  $aula -> sala);
	
	if ($aula -> cadastraAula($dados)) echo '<script>alert("Aula cadastrada com sucesso")</script>';
    else echo '<script>alert("Problemas ao cadastrar aula. Tente novamente.")</script>';

	header('refresh:1; url=registraAula.php');
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
			<span class="navbar-brand mb-0 h1">CADASTRO DE AULA - CONFIRMAÇÃO</span>
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
						<td><?=$_SESSION['nome_aula']?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Início:</td>
						<td><?=$_SESSION['inicio_aula']?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Fim:</td>
						<td><?=$_SESSION['fim_aula']?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Dias:</td>
						<td><?=$_SESSION['dias_aula']?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Instrutor:</td>
						<td><?=$_SESSION['instrutor_aula']?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Sala:</td>
						<td><?=$_SESSION['sala_aula']?></td>
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