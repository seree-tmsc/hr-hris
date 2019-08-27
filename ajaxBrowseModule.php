<?php
    /*
    echo $_POST['dept'];
    echo $_POST['pos'];
    echo $_POST['emp'];
    */
    
    require_once('include/db_Conn.php');
    $strSql = "SELECT Module ";
    $strSql .= "FROM MAS_TRAINING_RECORD_NEW ";
    $strSql .= "WHERE Emp_Code ='" . $_POST['emp'] . "' " ;
    $strSql .= "GROUP BY Module ";
    $strSql .= "ORDER BY Module ";
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
            $cValueTemp = $ds['Module'];
            $cKeyTemp = $ds['Module'];
            $json[$cKeyTemp] = $cValueTemp;
        }
        echo json_encode($json);
    }
?>