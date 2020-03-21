<?php
session_start();

require_once('extra/classes/bd.class.php');
require('extra/classes/cliente.class.php');
banco_mysql::conn();
$cliente = new Cliente();

if (!isset($_SESSION['regaluno'])) 
{
	header('Location: registraAluno.php');
	exit();
}
	$cliente -> aluno_matricula = $_SESSION['aluno_matricula'];
	$cliente -> aluno_nome = $_SESSION['aluno_nome'];
	$cliente -> aluno_identidade = $_SESSION['aluno_identidade'];
	$cliente -> aluno_cpf = $_SESSION['aluno_cpf'];
	$cliente -> aluno_endereco = $_SESSION['aluno_endereco'];
	$cliente -> aluno_plano = $_SESSION['aluno_plano'];
	$cliente -> aluno_pagamento = $_SESSION['pagamento'];
	$cliente -> aluno_ppagamento = $_SESSION['ppagamento'];

if (isset($_REQUEST['registrar']))
{
	$dados = array($cliente -> aluno_matricula, 
				   $cliente -> aluno_nome, 
				   $cliente -> aluno_identidade, 
				   $cliente -> aluno_cpf, 
				   $cliente -> aluno_endereco, 
				   $cliente -> aluno_plano, 
				   $cliente -> aluno_pagamento, 
				   $cliente -> aluno_ppagamento);

    if ($cliente -> cadastrarUsuario($dados)) echo '<script>alert("Usuário cadastrado com sucesso")</script>';
    else echo '<script>alert("Matrícula ou CPF repetidos")</script>';

	header('refresh:1; url=registraAluno.php');
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
			<span class="navbar-brand mb-0 h1">CADASTRO DE ALUNO - CONFIRMAÇÃO</span>
		</nav>
        <div class = "container" style = "width: 600px;
                      background-color: #FFC000;
                      margin: 50px auto;
                      border-radius: 30px;">
                <table class="table table-borderless" style = "padding: 15px 20px 15px 20px;">
                    <tr>
						<td></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Nome:</td>
						<td><?=$cliente -> aluno_nome?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Matrícula:</td>
						<td><?=$cliente -> aluno_matricula?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Identidade:</td>
						<td><?=$cliente -> aluno_identidade?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">CPF:</td>
						<td><?=$cliente -> aluno_cpf?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Endereço:</td>
						<td><?=$cliente -> aluno_endereco?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Plano:</td>
						<td><?=$cliente -> aluno_plano?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Data de Pagamento:</td>
						<td><?=$cliente -> aluno_pagamento?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Renovação:</td>
						<td><?=$cliente -> aluno_ppagamento?></td>
                    </tr>
                    <tr>
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