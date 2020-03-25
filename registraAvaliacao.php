<?php

session_start();

if (!isset($_SESSION['Recepcao'])) {
	header('Location: pgRecepcao.php');
	exit();
}

require_once('extra/classes/bd.class.php');
require('extra/classes/cliente.class.php');
banco_mysql::conn();
$cliente = new Cliente();

if (isset($_POST['registrar']))
{
    date_default_timezone_set('America/Sao_Paulo');
    
    $_SESSION['regavaliacao'] = TRUE;

    $_SESSION['matricula'] = $_POST['matricula_aluno'];
    $rawdate = htmlentities($_POST['data_aluno']);
    $date = date('Y-m-d', strtotime($rawdate));
    $_SESSION['data'] = $date;
    $_SESSION['hora'] = $_POST['hora_aluno'];
    $_SESSION['nome'] = $cliente -> selecionaDadosCliente($_POST['matricula_aluno'])[1];
 
    header('Location: confirmaMarcacaoAvaliacao.php');
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
        ::placeholder { color: #bfbfbf; }

        .input-group-text{ 
                        color: black;
                        height: 40px; 
                        background-color: transparent; 
                        border-radius: 10px;
                        border-color: transparent;
                        align-content: center; 
                        font-family: Bahnschrift SemiBold;
                        font-size: 40px;
                        margin-top: 5px;
                        }
        .input-group-text-ferias{ 
                        color: black;
                        height: 40px; 
                        background-color: transparent; 
                        border-radius: 10px;
                        border-color: transparent;
                        align-content: center; 
                        font-family: Bahnschrift SemiBold;
                        font-size: 30px;
                        margin-top: 5px;
                        }
        .input-group-prepend{
                        background-color: #FFC000;
                        width: 140px; 
                        border-radius: 10px; 
                        text-align: center;
                        align-content: center;
                        font-size: 40px;
                        height: 50px;
                        margin-top: 5px;
                        }
        
    </style>
    <body style = "background-color: black;">
		<nav style = "background-color: #FFC000;
					 font-family: Bahnschrift SemiBold;
					 text-align: center;
					 font-size: auto;" >
			<span class="navbar-brand mb-0 h1">RECEPÇÃO - AGENDAMENTO DE AVALIAÇÃO</span>
		</nav>
        
		<div style = "width: auto;
                      background-color: black;
                      margin: 60px auto;
                      align-content: center;"
             class="container">

             <form method="POST">
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">MATRÍCULA</span>
                    </div>
                    <input type = "text" 
                            style = "
                                    font-family: Bahnschrift;
                                    font-size: 100%;
                                    width: 50%;
                                    height: 50px;
                                    border: 1px solid #ffffff;
                                    margin: 5px 5px 5px 5px;
                                    padding: 0 10px;
                                    border-radius: 10px;"
                            class="form-control" name = "matricula_aluno" placeholder = "Digite aqui..." id = "matricula_aluno" required>
                </div>
            
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">DATA</span>
                    </div>
                    <input type = "date" 
                            style = "
                                    font-family: Bahnschrift;
                                    font-size: 100%;
                                    width: 50%;
                                    height: 50px;
                                    border: 1px solid #ffffff;
                                    margin: 5px 5px 5px 5px;
                                    padding: 0 10px;
                                    border-radius: 10px;"
                            class="form-control" name = "data_aluno" id = "data_aluno" required>
                </div>

                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">HORA</span>
                    </div>
                    <input type = "time" 
                            style = "
                                    font-family: Bahnschrift;
                                    font-size: 100%;
                                    width: 50%;
                                    height: 50px;
                                    border: 1px solid #ffffff;
                                    margin: 5px 5px 5px 5px;
                                    padding: 0 10px;
                                    border-radius: 10px;"
                            class="form-control" name = "hora_aluno" id = "hora_aluno" required>
                </div>
            

            <div style = "width: 400px;
						background-color: #FFC000;
						margin: 40px auto;
						border-radius: 30px;"
				class="container">
			<div class="row justify-content-center">
            <input type = "submit" 
                    name = "registrar"
                    value = "REGISTRAR"
                    style = "border-color: transparent; width: 250px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; font-size: 30px; border-radius: 15px;">
        </div>
        </form>
    <body>
</html>