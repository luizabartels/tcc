<?php
?>

<DOCTYPE html>
<html>
    <head>
    </head>
    <style>
    ::placeholder { color: #bfbfbf; }
    </style>
    <body style = "background-color: black; overflow: auto;">
        <div style = "width: 300px;
                      background-color: #FFC000;
                      margin: 150px auto;
                      border-radius: 30px;">
            <h1 style = 
                        "font-family: Bahnschrift Light; 
                        text-align: center;
                        color: black;
                        font-size: 40px;
                        padding: 30px 0 0px 0;">ACESSO</h1>
            <form style = "display: flex;
                           flex-wrap: wrap;
                           justify-content: center;"
                action = "autenticacao.php" method = "post">
                <input type = "text" 
                       style = "font-family: Bahnschrift;
                                text-align: center;
                                font-size: 18px;
                                width: 200px;
                                height: 50px;
                                border: 1px solid #ffffff;
                                margin-bottom: 20px;
                                padding: 0 15px;
                                border-radius: 10px;"
                       name = "matricula" placeholder = "Digite sua matrícula" id = "matricula" required>
            </form>
        </div>
    <body>
</html>