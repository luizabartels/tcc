<?php

session_start();

require_once('extra/classes/bd.class.php');
require('extra/classes/cliente.class.php');
banco_mysql::conn();
$cliente = new Cliente();

require_once __DIR__ . '/extra/libs/vendor/autoload.php';

if (isset($_REQUEST['inadimplentes']))
{
	$cont = count($cliente -> listaInadimplentes());

	$html = "<html>
				  <body>
					<table width='500' border='1' align='center' cellpadding='5' cellspacing='0'>
					  <tr>
						<td width='165' align='center'>MATRÍCULA</td>
						<td width='165' align='center'>NOME</td>
						<td width='165' align='center'>IDENTIDADE</td>
						<td width='165' align='center'>CPF</td>
						<td width='165' align='center'>ENDEREÇO</td>
						<td width='165' align='center'>PLANO</td>
						<td width='165' align='center'>ÚLTIMO PAGAMENTO</td>
						<td width='165' align='center'>PRÓXIMO PAGAMENTO</td>";

	for ($i = 0; $i < $cont; $i++)
	{
			$html .=  "<tr>
								<td width='165' colspan='1'>" .$cliente -> listaInadimplentes()[$i][0]. "</td>
								<td width='165' colspan='1'>" .$cliente -> listaInadimplentes()[$i][1]. "</td>
								<td width='165' colspan='1'>" .$cliente -> listaInadimplentes()[$i][2]."</td>
								<td width='165' colspan='1'>" .$cliente -> listaInadimplentes()[$i][3]. "</td>
								<td width='165' colspan='1'>" .$cliente -> listaInadimplentes()[$i][4]. "</td>
								<td width='165' colspan='1'>" .$cliente -> listaInadimplentes()[$i][5]. "</td>
								<td width='165' colspan='1'>" .$cliente -> listaInadimplentes()[$i][6]. "</td>
								<td width='165' colspan='1'>" .$cliente -> listaInadimplentes()[$i][7]. "</td>
							</tr>";		
	}

	$html .= "</table></body></html>";


	$mpdf = new \Mpdf\Mpdf();
	$mpdf -> AddPage('L');
	$mpdf->WriteHTML($html);
	$mpdf->Output();
}

if (isset($_REQUEST['pagamento']))
{
	$cont = count($cliente -> listaPagamento());

	$html = "<html>
				  <body>
					<table width='500' border='1' align='center' cellpadding='5' cellspacing='0'>
					  <tr>
						<td width='165' align='center'>MATRÍCULA</td>
						<td width='165' align='center'>NOME</td>
						<td width='165' align='center'>IDENTIDADE</td>
						<td width='165' align='center'>CPF</td>
						<td width='165' align='center'>ENDEREÇO</td>
						<td width='165' align='center'>PLANO</td>
						<td width='165' align='center'>ÚLTIMO PAGAMENTO</td>
						<td width='165' align='center'>PRÓXIMO PAGAMENTO</td>";

	for ($i = 0; $i < $cont; $i++)
	{
			$html .=  "<tr>
								<td width='165' colspan='1'>" .$cliente -> listaPagamento()[$i][0]. "</td>
								<td width='165' colspan='1'>" .$cliente -> listaPagamento()[$i][1]. "</td>
								<td width='165' colspan='1'>" .$cliente -> listaPagamento()[$i][2]."</td>
								<td width='165' colspan='1'>" .$cliente -> listaPagamento()[$i][3]. "</td>
								<td width='165' colspan='1'>" .$cliente -> listaPagamento()[$i][4]. "</td>
								<td width='165' colspan='1'>" .$cliente -> listaPagamento()[$i][5]. "</td>
								<td width='165' colspan='1'>" .$cliente -> listaPagamento()[$i][6]. "</td>
								<td width='165' colspan='1'>" .$cliente -> listaPagamento()[$i][7]. "</td>
							</tr>";		
	}

	$html .= "</table></body></html>";


	$mpdf = new \Mpdf\Mpdf();
	$mpdf -> AddPage('L');
	$mpdf->WriteHTML($html);
	$mpdf->Output();
}

if (isset($_REQUEST['alfabetico']))
{
	$cont = count($cliente -> listaAlfabetica());

	$html = "<html>
				  <body>
					<table width='500' border='1' align='center' cellpadding='5' cellspacing='0'>
					  <tr>
						<td width='165' align='center'>MATRÍCULA</td>
						<td width='165' align='center'>NOME</td>
						<td width='165' align='center'>IDENTIDADE</td>
						<td width='165' align='center'>CPF</td>
						<td width='165' align='center'>ENDEREÇO</td>
						<td width='165' align='center'>PLANO</td>
						<td width='165' align='center'>ÚLTIMO PAGAMENTO</td>
						<td width='165' align='center'>PRÓXIMO PAGAMENTO</td>";

	for ($i = 0; $i < $cont; $i++)
		{
				$html .=  "<tr>
									<td width='165' colspan='1'>" .$cliente -> listaAlfabetica()[$i][0]. "</td>
									<td width='165' colspan='1'>" .$cliente -> listaAlfabetica()[$i][1]. "</td>
									<td width='165' colspan='1'>" .$cliente -> listaAlfabetica()[$i][2]."</td>
									<td width='165' colspan='1'>" .$cliente -> listaAlfabetica()[$i][3]. "</td>
									<td width='165' colspan='1'>" .$cliente -> listaAlfabetica()[$i][4]. "</td>
									<td width='165' colspan='1'>" .$cliente -> listaAlfabetica()[$i][5]. "</td>
									<td width='165' colspan='1'>" .$cliente -> listaAlfabetica()[$i][6]. "</td>
									<td width='165' colspan='1'>" .$cliente -> listaAlfabetica()[$i][7]. "</td>
								</tr>";		
		}

	$html .= "</table></body></html>";


	$mpdf = new \Mpdf\Mpdf();
	$mpdf -> AddPage('L');
	$mpdf->WriteHTML($html);
	$mpdf->Output();
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
		color: #ffffff;
        font-size: 20px;
	}
	</style>
    <body style = "background-color: black;">
		<nav style = "background-color: #FFC000;
					 font-family: Bahnschrift SemiBold;
					 text-align: center;
					 font-size: 40px;" >
			<span class="navbar-brand mb-0 h1">GERÊNCIA - PÁGINA INICIAL</span>
		</nav>

		<div style = "width: 400px;
                      background-color: black;
                      margin: 60px auto;"
			 class="container">
			 <div style = "width: auto;
						background-color: #FFC000;
						margin: 10px auto;
						border-radius: 30px;"
				class="container">
			</div>
			<div style = "width: auto;
						background-color: #FFC000;
						margin: 30px auto;
						border-radius: 15px;"
				class="container">
			<div class="row justify-content-center" style = "height: 100px;">
            <form method="$_REQUEST">
            <input type = "submit" 
                    name = "alfabetico"
                    value = "LISTAR ALUNOS POR ORDEM ALFABÉTICA"
                    style = "border-color: transparent; width: auto; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; font-size: 18px; border-radius: 15px;">
            </form>
			</div>
			</div>
			<div style = "width: auto;
						background-color: #FFC000;
						margin: 30px auto;
						border-radius: 15px;"
				class="container">
            <div class="row justify-content-center" style = "height: 100px;">
            <form method="$_REQUEST">
				<input type = "submit" 
						name = "pagamento"
						value = "LISTAR ALUNOS POR PRÓXIMO PAGAMENTO"
						style = "border-color: transparent; width: auto; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; font-size: 18px; border-radius: 15px;">
			</form>
			</div>
			</div>
			<div style = "width: auto;
						background-color: #FFC000;
						margin: 30px auto;
						border-radius: 15px;"
				class="container">
            <div class="row justify-content-center" style = "height: 100px;">
            <form method="$_REQUEST">
				<input type = "submit" 
						name = "inadimplentes"
						value = "LISTAR ALUNOS INADIMPLENTES"
						style = "border-color: transparent; width: auto; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; font-size: 18px; border-radius: 15px;">
			</form>
			</div>
			</div>

		</div>
    <body>
</html>