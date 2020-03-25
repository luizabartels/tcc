<?php

session_start();

if (!isset($_SESSION['loggedinAluno'])) {
	header('Location: login.php');
	exit();
}

require_once('extra/classes/bd.class.php');
require('extra/classes/cliente.class.php');
banco_mysql::conn();
$cliente = new Cliente();
$dados_aluno = array();

$dados_aluno = $cliente -> selecionaDadosCliente($_SESSION['matricula']);

$cliente -> aluno_nome = $dados_aluno[0];
$cliente -> aluno_matricula = $dados_aluno[1];
$cliente -> aluno_pagamento = $dados_aluno[2];
$cliente -> aluno_ppagamento = $dados_aluno[3]; 
$cliente -> aluno_dfisio = $dados_aluno[4]; 
$cliente -> aluno_plano = $dados_aluno[5];

date_default_timezone_set('America/Sao_Paulo');
$data_atual = new DateTime();
$data_atual = date_format($data_atual, 'Y-m-d');
$data_atual = strtotime(str_replace('-','/', $data_atual));

$cliente -> aluno_dfisio = strtotime(str_replace('-','/', $cliente -> aluno_dfisio));
$dif_data = ($data_atual - $cliente -> aluno_dfisio)/(86400*30);

if ($dif_data > 6) $avaliacao = 'Marcar avaliação';
else $avaliacao = 'Avaliação em dia';

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
					 font-size: auto;
					 width: auto" >
			<span class="navbar-brand mb-0 h1">ALUNO - PERFIL</span>
		</nav>
        <div class = "container" style = "width: auto;
                      background-color: #FFC000;
                      margin: 50px auto;
                      border-radius: 30px;">
				<table class="table table-borderless" style = "padding: 15px 20px 15px 20px;">
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Nome:</td>
						<td><?=$cliente -> aluno_nome;?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Matrícula:</td>
						<td><?=$cliente -> aluno_matricula?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Plano de Pagamento:</td>
						<td><?=$cliente -> aluno_plano?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Próximo Pagamento:</td>
						<td><?=$cliente -> aluno_ppagamento?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Avaliação Fisioterápica:</td>
						<td><?=$avaliacao?></td>
					</tr>
					
				</table>
        </div>
		<div class="container">
		<div style = "margin: -30px; width: auto" class="row justify-content-center">
			<button style = "margin-right: 30px; width: 250px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: 30px; border-radius: 15px;"
                    type="button"
                    onclick = "window.location.href='registraPresenca.php'"
                    class="btn">REGISTRAR PRESENÇA</button>

			<button style = "margin-right: 30px; width: 250px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: 30px; border-radius: 15px;"
            	    type="button"
                    onclick = "window.location.href='historico.php'"
                    class="btn">HISTÓRICO</button>
		</div>
		</div>
    <body>
</html>
