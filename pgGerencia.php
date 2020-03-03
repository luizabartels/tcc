<?php

session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'academia';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

mysqli_error($con);

require_once __DIR__ . '/vendor/autoload.php';

$cont = -1;
$matricula = array();
$nome = array();
$identidade = array();
$cpf = array();
$endereco = array();
$plano = array();
$pagamento = array();
$ppagamento = array();

if (isset($_REQUEST['inadimplentes']))
{
	$sql = "SELECT nome, matricula, identidade, cpf, endereco, plano, pagamento, ppagamento FROM alunos ORDER BY ppagamento";

	date_default_timezone_set('America/Sao_Paulo');
	$data_atual = new DateTime();
	$data_atual = date_format($data_atual, 'Y-m-d');
	$data_atual = strtotime(str_replace('-','/', $data_atual));
	
	if($result = mysqli_query($con, $sql))
	{
		if(mysqli_num_rows($result) > 0)
		{
		while($row = mysqli_fetch_array($result))
		{
			$prpagamento = $row['ppagamento'];
			$prpagamento = strtotime(str_replace('-','/', $prpagamento));
			$dif_data = ($data_atual - $prpagamento)/86400;

			if($dif_data >= 0)
			{
				$cont++;

				$ppagamento[$cont] = $row['ppagamento'];
				$ppagamento[$cont] = strtotime(str_replace('-','/', $ppagamento[$cont]));
			
				$matricula[$cont] = $row['matricula'];
				$nome[$cont] = $row["nome"];
				$identidade[$cont] = $row["identidade"];
				$cpf[$cont] = $row["cpf"];
				$endereco[$cont] = $row["endereco"];
				$plano[$cont] = $row["plano"];
				$pagamento[$cont] = $row["pagamento"];
				$ppagamento[$cont] = date('d-m-Y', $ppagamento[$cont]);
			}
			
		}
	}
	}
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

	for ($i = 0; $i <= $cont; $i++ )
	{
		

			$html .=  "<tr>
								<td width='165' colspan='1'>" .$matricula[$i]. "</td>
								<td width='165' colspan='1'>" .$nome[$i]. "</td>
								<td width='165' colspan='1'>" .$identidade[$i]. "</td>
								<td width='165' colspan='1'>" .$cpf[$i]. "</td>
								<td width='165' colspan='1'>" .$endereco[$i]. "</td>
								<td width='165' colspan='1'>" .$plano[$i]. "</td>
								<td width='165' colspan='1'>" .$pagamento[$i]. "</td>
								<td width='165' colspan='1'>" .$ppagamento[$i]. "</td>
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
	$sql = "SELECT nome, matricula, identidade, cpf, endereco, plano, pagamento, ppagamento FROM alunos ORDER BY ppagamento";

	if($result = mysqli_query($con, $sql))
	{
		if(mysqli_num_rows($result) > 0)
		{
		while($row = mysqli_fetch_array($result))
		{
			$cont++;

			$ppagamento[$cont] = $row['ppagamento'];
			$ppagamento[$cont] = strtotime(str_replace('-','/', $ppagamento[$cont]));
		
			$matricula[$cont] = $row['matricula'];
			$nome[$cont] = $row["nome"];
			$identidade[$cont] = $row["identidade"];
			$cpf[$cont] = $row["cpf"];
			$endereco[$cont] = $row["endereco"];
			$plano[$cont] = $row["plano"];
			$pagamento[$cont] = $row["pagamento"];
			$ppagamento[$cont] = date('d-m-Y', $ppagamento[$cont]);
		}
	}
	}

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

	for ($i = 0; $i <= $cont; $i++ )
	{
		

			$html .=  "<tr>
								<td width='165' colspan='1'>" .$matricula[$i]. "</td>
								<td width='165' colspan='1'>" .$nome[$i]. "</td>
								<td width='165' colspan='1'>" .$identidade[$i]. "</td>
								<td width='165' colspan='1'>" .$cpf[$i]. "</td>
								<td width='165' colspan='1'>" .$endereco[$i]. "</td>
								<td width='165' colspan='1'>" .$plano[$i]. "</td>
								<td width='165' colspan='1'>" .$pagamento[$i]. "</td>
								<td width='165' colspan='1'>" .$ppagamento[$i]. "</td>
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
	$sql = "SELECT nome, matricula, identidade, cpf, endereco, plano, pagamento, ppagamento FROM alunos ORDER BY nome ASC";

	if($result = mysqli_query($con, $sql))
	{
		if(mysqli_num_rows($result) > 0)
		{
		while($row = mysqli_fetch_array($result))
		{
			$cont++;

			$ppagamento[$cont] = $row['ppagamento'];
			$ppagamento[$cont] = strtotime(str_replace('-','/', $ppagamento[$cont]));
		
			$matricula[$cont] = $row['matricula'];
			$nome[$cont] = $row["nome"];
			$identidade[$cont] = $row["identidade"];
			$cpf[$cont] = $row["cpf"];
			$endereco[$cont] = $row["endereco"];
			$plano[$cont] = $row["plano"];
			$pagamento[$cont] = $row["pagamento"];
			$ppagamento[$cont] = date('d-m-Y', $ppagamento[$cont]);
		}
	}
	}

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

	for ($i = 0; $i <= $cont; $i++ )
	{
		

			$html .=  "<tr>
								<td width='165' colspan='1'>" .$matricula[$i]. "</td>
								<td width='165' colspan='1'>" .$nome[$i]. "</td>
								<td width='165' colspan='1'>" .$identidade[$i]. "</td>
								<td width='165' colspan='1'>" .$cpf[$i]. "</td>
								<td width='165' colspan='1'>" .$endereco[$i]. "</td>
								<td width='165' colspan='1'>" .$plano[$i]. "</td>
								<td width='165' colspan='1'>" .$pagamento[$i]. "</td>
								<td width='165' colspan='1'>" .$ppagamento[$i]. "</td>
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