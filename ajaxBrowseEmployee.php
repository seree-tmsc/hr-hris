<?php
    //echo  $_GET['dept'] . " " .$_GET['pos'] . "<br>";

    require_once('include/db_Conn.php');

    $strSql = "SELECT emp_code, emp_efname ";
    $strSql .= "FROM Emp_Main ";
    $strSql .= "WHERE job_department ='" . $_GET['dept'] . "' ";
    $strSql .= "AND job_position ='" . $_GET['pos'] . "' ";    
    $strSql .= "ORDER BY emp_code ";
    //echo $strSql . "<br>";
    
    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo $nRecCount . " records <br>";
        
    if ($nRecCount >0)
    {
        $json = [];
        while($ds = $statement->fetch(PDO::FETCH_NAMED))
        {            
            $cValueTemp = $ds['emp_efname'];
            $cKeyTemp = $ds['emp_code'];
            $json[$cKeyTemp] = $cValueTemp;
        }
        echo json_encode($json);
    }
?>