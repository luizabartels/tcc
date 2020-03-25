<?php
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'academia';
    
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if (isset($_REQUEST['registrar']))
    {
        //Adicionar comparação com itens do banco de dado.
    
        $sql = ("INSERT INTO `aula` (`id`, `aula`, `inicio`, `fim`, `dias`, `instrutor`, `sala`, `instrutores_id`) VALUES (NULL, 'Teste', '09:00', '10:00', 'Segunda', 'Teste', '5', '2')");
        
        mysqli_query($con, $sql);
    }

?>