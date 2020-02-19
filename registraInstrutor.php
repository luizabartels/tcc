<?php

session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'academia';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
mysqli_error($con); 
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['registrar']))
{
    $_SESSION['reginstrutor'] = TRUE;

    $_SESSION['instrutor_nome'] = $_POST['nome_instrutor'];
    $_SESSION['instrutor_identidade'] = $_POST['idt_instrutor'];
    $_SESSION['instrutor_cpf'] = $_POST['cpf_instrutor'];
    $_SESSION['instrutor_atividade'] = $_POST['atvd_instrutor'];
    
    header('Location: confirmaReginstrutor.php');
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
		<nav style = "background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: 40px;">
			<span class="navbar-brand mb-0 h1">RECEPÇÃO - CADASTRO DE INSTRUTORES</span>
		</nav>
        
		<div style = "width: auto; background-color: black; margin: 60px auto; align-content: center;"
                     class="container">
            
            
            <form method="POST">
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">NOME</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: 18px; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "nome_instrutor" 
                            placeholder = "Digite aqui..." 
                            id = "nome_instrutor" required>
                </div>

                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">IDENTIDADE</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: 18px; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "idt_instrutor" 
                            placeholder = "Digite aqui..." 
                            id = "idt_instrutor" required>
                </div>

                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">CPF</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: 18px; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "cpf_instrutor" 
                            placeholder = "Digite aqui..." 
                            id = "cpf_instrutor" required>
                </div>

                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">ATIVIDADES</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: 18px; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "atvd_instrutor" 
                            placeholder = "Digite aqui..." 
                            id = "atvd_instrutor" required>
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