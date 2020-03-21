<?php
session_start();

if (isset($_POST['registrar']))
{
    date_default_timezone_set('America/Sao_Paulo');

    $_SESSION['regdigital'] = TRUE;

    $_SESSION['aluno_matricula'] = $_POST['aluno_matricula'];
    
    header('Location: confirmaDigital.php');
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
    <body style = "background-color: black; overflow: auto;">
		<nav style = "background-color: #FFC000; font-family: Bahnschrift SemiBold; text-align: center; font-size: 40px;">
			<span class="navbar-brand mb-0 h1">RECEPÇÃO - CADASTRO DE DIGITAL</span>
		</nav>
        
		<div style = "width: auto; background-color: black; margin: 60px auto; align-content: center;"
                     class="container">
            
            <form method = "POST">
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">MATRÍCULA</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: auto; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "aluno_matricula" 
                            placeholder = "Digite aqui..." 
                            id = "aluno_matricula" required>
                </div>

                <div style = "width: 400px;
						background-color: #FFC000;
						margin: 100px auto;
						border-radius: 30px;"
				class="container">
			<div class="row justify-content-center">
            <input type = "submit" 
                    name = "registrar"
                    value = "CADASTRAR DIGITAL"
                    style = "border-color: transparent; width: 250px; height: 100px; background-color: #FFC000; font-family: Bahnschrift SemiBold; font-size: 25px; border-radius: 15px;">
        </div>
        </form>
        
    <body>
</html>