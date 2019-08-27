<?php
    /*
    echo  $_GET['dept'];
    */

    require_once('include/db_Conn.php');

    $strSql = "SELECT job_position ";
    $strSql .= "FROM Emp_Main ";
    $strSql .= "WHERE job_department ='" . $_GET['dept'] . "' ";
    $strSql .= "GROUP BY job_position ";
    $strSql .= "ORDER BY job_position ";
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
            $cValueTemp = $ds['job_position'];
            $cKeyTemp = $ds['job_position'];
            $json[$cKeyTemp] = $cValueTemp;
        }
        echo json_encode($json);
    }
?>