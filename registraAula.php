<?php
session_start();

if (isset($_POST['registrar']))
{
    $_SESSION['regaula'] = TRUE;

    $_SESSION['nome_aula'] = $_POST['nome_aula'];
    $_SESSION['inicio_aula'] = $_POST['inicio_aula'];
    $_SESSION['fim_aula'] = $_POST['fim_aula'];
    $_SESSION['dias_aula'] = $_POST['dias_aula'];
    $_SESSION['instrutor_aula'] = $_POST['instrutor_aula'];
    $_SESSION['sala_aula'] = $_POST['sala_aula'];
    
    header('Location: confirmaRegAula.php');
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
		<nav style = "background-color: #FFC000;
					 font-family: Bahnschrift SemiBold;
					 text-align: center;
					 font-size: 40px;" >
			<span class="navbar-brand mb-0 h1">RECEPÇÃO - CADASTRO DE AULAS</span>
		</nav>
        
		<div style = "width: auto;
                      background-color: black;
                      margin: 60px auto;
                      align-content: center;"
             class="container">
             <form method="POST">
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">AULA</span>
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
                            class="form-control" name = "nome_aula" placeholder = "Digite o nome da aula" id = "nome_aula" required>
                </div>
            
            <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">INÍCIO</span>
                    </div>
                    <input type="time" 
                           style = "
                                font-family: Bahnschrift;
                                font-size: 100%;
                                width: 50%;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin: 5px 5px 5px 5px;
                                padding: 0 10px;
                                border-radius: 10px;"
                           class="form-control" name = "inicio_aula" id = "inicio_aula" required>
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">FIM</span>
                    </div>
                    <input type="time"
                           style = "
                                font-family: Bahnschrift;
                                font-size: 100%;
                                width: 50%;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin: 5px 5px 5px 5px;
                                padding: 0 10px;
                                border-radius: 10px;"
                           class="form-control" name = "fim_aula" placeholder = "Digite aqui..." id = "fim_aula" required>
            </div>
            
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">DIAS</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: 100%; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "dias_aula" 
                            placeholder = "Ex.: Terça - Quinta" 
                            id = "dias_aula" required>
                </div>
            
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">INSTRUTOR</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: 100%; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "instrutor_aula" 
                            placeholder = "Digite o nome do professor..." 
                            id = "instrutor_aula" required>
                </div>
            
                <div class="input-group input-group-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">SALA</span>
                    </div>
                    <input type = "text" 
                            style = " font-family: Bahnschrift; font-size: 100%; width: 50%; height: 50px; border: 1px solid #ffffff; margin: 5px 5px 5px 5px; padding: 0 10px; border-radius: 10px;"
                            class="form-control" 
                            name = "sala_aula" 
                            placeholder = "Digite o número da sala..." 
                            id = "sala_aula" required>
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