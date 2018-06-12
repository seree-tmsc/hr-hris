<?php
    $srv = 'SEREE-PC17\SQLEXPRESS';
    $usr = 'sa';
    $pwd = 'password@1';
    $db = 'web_training';

    $conn = new PDO("sqlsrv:server=$srv; Database=$db", $usr, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>