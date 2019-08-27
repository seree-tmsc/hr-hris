<?php
    require_once('include/db_Conn.php');
    $strSql = "SELECT job_section ";
    $strSql .= "FROM Emp_Main ";
    $strSql .= "WHERE job_department ='" . $_POST['dept'] . "' " ;
    $strSql .= "AND job_position ='" . $_POST['pos'] . "' ";
    $strSql .= "GROUP BY job_section ";
    $strSql .= "ORDER BY job_section ";
    //echo $strSql . "<br>";

    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo $nRecCount . " records <br>";
        
    if ($nRecCount > 0)
    {
        $json = [];
        while($ds = $statement->fetch(PDO::FETCH_NAMED))
        {            
            $cValueTemp = $ds['job_section'];
            $cKeyTemp = $ds['job_section'];
            $json[$cKeyTemp] = $cValueTemp;
        }
        echo json_encode($json);
    }
?>