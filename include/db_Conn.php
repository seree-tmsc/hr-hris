<?php
    $srv = 'SEREE-PC17\TMSCSQLEXP1';
    $usr = 'sa';
    $pwd = 'password@1';
    $db = 'web_training';

    $conn = new PDO("sqlsrv:server=$srv; Database=$db", $usr, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>