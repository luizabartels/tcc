<?php
    $command = escapeshellcmd('python hello.py');
    $output = shell_exec($command);
    echo $output;
?>