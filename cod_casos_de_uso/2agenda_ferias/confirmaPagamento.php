<?php
session_start();

if (!isset($_SESSION['regpagamento'])) {
	header('Location: registraAula.php');
	exit();
}

require_once('extra/classes/bd.class.php');
require('extra/classes/cliente.class.php');
banco_mysql::conn();
$cliente = new Cliente();

	$cliente -> aluno_matricula = $_SESSION['matricula'];
	$cliente -> aluno_pagamento = $_SESSION['pagamento'];
	$cliente -> aluno_ppagamento = $_SESSION['ppagamento'];
	$cliente -> aluno_plano = $_SESSION['plano'];
	$cliente -> aluno_dferias = $_SESSION['dferias'];
	$cliente -> aluno_flagferias = $_SESSION['flagferias'];
	
    $iferias = $_SESSION['iferias'];
	$fferias = $_SESSION['fferias'];
	

	if ($iferias != NULL && $fferias != NULL)
	{
		$iferias = strtotime(str_replace('-','/', $iferias));
		$fferias = strtotime(str_replace('-','/', $fferias));
		$dif_data = ($fferias - $iferias)/86400;
	}


if (isset($_REQUEST['registrar']))
{
	if ($_SESSION['flag'] == 1) 
	{
		$cliente -> registraPagamento($cliente -> aluno_matricula, $cliente -> aluno_pagamento, $cliente -> aluno_ppagamento);
		$cliente -> aluno_dferias= 0;
		$cliente -> aluno_flagferias = 0;
		$cliente -> registraFerias($cliente -> aluno_matricula, $cliente -> aluno_dferias, $cliente -> aluno_ppagamento, $cliente -> aluno_flagferias);

		header('Location: registraPagamento.php');
	 }//só pagamento
	
	else if ($_SESSION['flag'] == 2)
	{
		if (($dif_data + $cliente -> aluno_dferias) <= 30 && $cliente -> aluno_flagferias < 3)
		{
			$cliente -> aluno_flagferias = $cliente -> aluno_flagferias + 1;

			$cliente -> aluno_dferias = $dif_data + $cliente -> aluno_dferias + 1;
			$val = strval($cliente -> aluno_dferias);
			$p = 'P';
			$d = 'D';

			$date = date('Y-m-d', strtotime($cliente -> aluno_ppagamento));
			$cliente -> aluno_ppagamento = \DateTime::createFromFormat("Y-m-d", $date);
			$cliente -> aluno_ppagamento ->add(new DateInterval($p.$val.$d));
			$cliente -> aluno_ppagamento = date_format($cliente -> aluno_ppagamento, 'Y-m-d');

			$cliente -> registraFerias($cliente -> aluno_matricula, $cliente -> aluno_dferias, $cliente -> aluno_ppagamento, $cliente -> aluno_flagferias);

			header('Location: registraPagamento.php');
		}
		else echo '<script>alert("cliente excedeu dias de férias ou parcelamento de dias.")</script>';
	} //só férias

	else if ($_SESSION['flag'] == 3)
	{
		$cliente -> registraPagamento($cliente -> aluno_matricula, $cliente -> aluno_pagamento, $cliente -> aluno_ppagamento);
		$cliente -> aluno_dferias= 0;
		$cliente -> aluno_flagferias = 0;
		$cliente -> registraFerias($cliente -> aluno_matricula, $cliente -> aluno_dferias, $cliente -> aluno_ppagamento, $cliente -> aluno_flagferias);

		if (($dif_data + $cliente -> aluno_dferias) <= 30 && $cliente -> aluno_flagferias < 3)
		{
			$cliente -> aluno_flagferias = $cliente -> aluno_flagferias + 1;

			$cliente -> aluno_dferias = $dif_data + $cliente -> aluno_dferias + 1;
			$val = strval($cliente -> aluno_dferias);
			$p = 'P';
			$d = 'D';

			$date = date('Y-m-d', strtotime($cliente -> aluno_ppagamento));
			$cliente -> aluno_ppagamento = \DateTime::createFromFormat("Y-m-d", $date);
			$cliente -> aluno_ppagamento ->add(new DateInterval($p.$val.$d));
			$cliente -> aluno_ppagamento = date_format($cliente -> aluno_ppagamento, 'Y-m-d');

			$cliente -> registraFerias($cliente -> aluno_matricula, $cliente -> aluno_dferias, $cliente -> aluno_ppagamento, $cliente -> aluno_flagferias);

			header('Location: registraPagamento.php');
		}
		else echo '<script>alert("cliente excedeu dias de férias ou parcelamento de dias.")</script>';
	} //férias e pagamento
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
						<td style = "font-family: Bahnschrift SemiBold;">Matrícula:</td>
						<td><?=$_SESSION['matricula']?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Plano:</td>
						<td><?=$_SESSION['plano']?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Data de pagamento:</td>
						<td><?=$_SESSION['pagamento']?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Próximo pagamento:</td>
						<td><?=$_SESSION['ppagamento']?></td>
					</tr>
					<tr>
						<td style = "font-family: Bahnschrift SemiBold;">Início de férias:</td>
						<td><?=$_SESSION['iferias']?></td>
                    </tr>
                    <tr>
						<td style = "font-family: Bahnschrift SemiBold;">Fim de férias:</td>
						<td><?=$_SESSION['fferias']?></td>
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
                    onclick = "window.location.href='registraPagamento.php'"
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