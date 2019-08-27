<?php
    /*
    echo $_POST['dept'];
    echo $_POST['pos'];
    echo $_POST['emp'];
    echo $_POST['module1'];
    */
        
    require_once('include/db_Conn.php');
    $strSql = "SELECT Code_Course ";
    $strSql .= "FROM MAS_TRAINING_RECORD_NEW ";
    $strSql .= "WHERE Emp_Code ='" . $_POST['emp'] . "' AND Module ='" . $_POST['module1'] . "' " ;
    $strSql .= "GROUP BY Code_Course ";
    $strSql .= "ORDER BY Code_Course ";
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
            $cValueTemp = $ds['Code_Course'];
            $cKeyTemp = $ds['Code_Course'];
            $json[$cKeyTemp] = $cValueTemp;
        }
        echo json_encode($json);
    }
?>