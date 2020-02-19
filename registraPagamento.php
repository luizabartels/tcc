<?php

session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'academia';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

mysqli_error($con); 

if (isset($_POST['registrar']))
{
    date_default_timezone_set('America/Sao_Paulo');
    
    $_SESSION['regpagamento'] = TRUE;

    $matricula = $_POST['matricula_aluno'];

    $_SESSION['matricula'] = $_POST['matricula_aluno'];
    $_SESSION['iferias'] = $_POST['inicio_ferias'];
    $_SESSION['fferias'] = $_POST['fim_ferias'];

    $rawdate = htmlentities($_POST['pagamento_aluno']);
    $date = date('Y-m-d', strtotime($rawdate));
    $_SESSION['pagamento'] = $date;
   
    $ppagamento = \DateTime::createFromFormat("Y-m-d", $date);
    

    $sql = "SELECT plano FROM alunos WHERE matricula = $matricula";
    if($result = mysqli_query($con, $sql))
    {
     if(mysqli_num_rows($result) > 0)
     {
        while($row = mysqli_fetch_array($result))
        {
         $plano = $row['plano'];
         $_SESSION['plano'] = $plano;
        }
     }
    }

    if(strcmp($plano,"Mensal") == 0)
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