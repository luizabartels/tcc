<?php

session_start();

require_once('extra/classes/bd.class.php');
require('extra/classes/cliente.class.php');
banco_mysql::conn();
$cliente = new Cliente();

if (isset($_POST['registrar']))
{
    date_default_timezone_set('America/Sao_Paulo');
    
    $_SESSION['regpagamento'] = TRUE;

    $_SESSION['matricula'] = $cliente -> selecionaDadosCliente($_POST['matricula_aluno'])[0];
    $_SESSION['plano'] = $cliente -> selecionaDadosCliente($_POST['matricula_aluno'])[5];
    $_SESSION['dferias'] = $cliente -> selecionaDadosCliente($_POST['matricula_aluno'])[6];
    $_SESSION['flagferias'] = $cliente -> selecionaDadosCliente($_POST['matricula_aluno'])[7];

    if ($_POST['inicio_ferias'] == NULL && $_POST['pagamento_aluno'] != NULL)
    {
        $_SESSION['iferias'] = NULL;
        $_SESSION['fferias'] = NULL;
        $_SESSION['flag'] = 1;
        
        $rawdate = htmlentities($_POST['pagamento_aluno']);
        $date = date('Y-m-d', strtotime($rawdate));
        $_SESSION['pagamento'] = $date;
        $ppagamento = \DateTime::createFromFormat("Y-m-d", $date);

        if(strcmp($_SESSION['plano'],"Mensal") == 0)
        {
            $ppagamento->add(new DateInterval('P30D'));
            $_SESSION['ppagamento'] = date_format($ppagamento, 'Y-m-d');
        }
        else
        {
            $ppagamento->add(new DateInterval('P365D'));
            $_SESSION['ppagamento'] = date_format($ppagamento, 'Y-m-d');
        }
        header('Location: confirmaPagamento.php');
    } //fim se não preencheu férias, independente do plano.
    else if ($_POST['pagamento_aluno'] == NULL && $_POST['inicio_ferias'] != NULL)
    {
        if (strcmp($_SESSION['plano'],"Mensal") != 0)
        {
            $_SESSION['flag'] = 2;
            $_SESSION['pagamento'] = $cliente -> selecionaDadosCliente($_POST['matricula_aluno'])[2];;
            $_SESSION['ppagamento'] = $cliente -> selecionaDadosCliente($_POST['matricula_aluno'])[3];;

            $_SESSION['iferias'] = $_POST['inicio_ferias'];
            $_SESSION['fferias'] = $_POST['fim_ferias'];

            header('Location: confirmaPagamento.php');
        }
        else echo '<script>alert("Usuário mensalista")</script>';
    } //fim se não preencheu pagamento, dependente do plano
    else if ($_POST['pagamento_aluno'] != NULL && $_POST['inicio_ferias'] != NULL)
    {
        if (strcmp($_SESSION['plano'],"Mensal") != 0)
        {
            $_SESSION['flag'] = 3;
            $_SESSION['iferias'] = $_POST['inicio_ferias'];
            $_SESSION['fferias'] = $_POST['fim_ferias'];

            $rawdate = htmlentities($_POST['pagamento_aluno']);
            $date = date('Y-m-d', strtotime($rawdate));
            $_SESSION['pagamento'] = $date;

            $ppagamento = \DateTime::createFromFormat("Y-m-d", $date);
            $ppagamento->add(new DateInterval('P365D'));
            $_SESSION['ppagamento'] = date_format($ppagamento, 'Y-m-d');

            header('Location: confirmaPagamento.php');
        }
        else echo '<script>alert("Usuário mensalista")</script>';
    } //fim se preencheu pagamento e férias, dependente do plano

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
					 font-size: 40px;" >
			<span class="navbar-brand mb-0 h1">RECEPÇÃO - PAGAMENTO</span>
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
                        <span class="input-group-text" id="inputGroup-sizing-lg">PAGAMENTO</span>
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
                            class="form-control" name = "pagamento_aluno" id = "pagamento_aluno">
                </div>
            

            <div style = "width: 400px;	height: 50px; background-color: #FFC000; margin: 10px auto; border-radius: 10px;"
				class="container">
			<div class="row justify-content-center">
            <span class="input-group-text-ferias" id="inputGroup-sizing-md">AGENDAMENTO DE FÉRIAS</span>
			</div>
            </div>
            
            <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">INÍCIO</span>
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
                           class="form-control" name = "inicio_ferias" id = "inicio_ferias">
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">FIM</span>
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
                           class="form-control" name = "fim_ferias" id = "fim_ferias">
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