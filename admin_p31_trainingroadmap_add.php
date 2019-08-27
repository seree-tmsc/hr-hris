<?php
//echo $_POST["mydate1"] . "<br>";
//echo substr($_POST["mydate1"],6,4)."/".substr($_POST["mydate1"],3,2)."/".substr($_POST["mydate1"],0,2) . "<br>";

try
{
    include('include/db_Conn.php');

    $strSql = "INSERT INTO MAS_TRAINING_ROADMAP_NEW ";
    $strSql .= "VALUES(";
    $strSql .= "'" . $_POST["add_biz"] . "',";
    $strSql .= "'" . $_POST["add_dep"] . "',";
    $strSql .= "'" . $_POST["add_sec"] . "',";
    $strSql .= "'" . $_POST["add_task"] . "',";
    $strSql .= "'" . $_POST["add_module"] . "',";
    $strSql .= "'" . $_POST["add_codecourse"] . "',";
    $strSql .= "'" . $_POST["add_coursecontent"] . "',";
    $strSql .= "'" . $_POST["add_coursename"] . "',";
    $strSql .= "'" . $_POST["add_position"] . "',";
    $strSql .= "'" . $_POST["add_JG"] . "',";
    $strSql .= "'" . $_POST["add_type"] . "',";
    $strSql .= "'" . $_POST["add_instructor"] . "',";
    $strSql .= "'" . $_POST["add_statustraining"] . "')";  
    echo $strSql . "<br>";
        
    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo "Number of data = " . $nRecCount . " records <br>";

    if ($nRecCount >0)
    {
        echo "<script> 
                alert('Add data complete!'); 
                window.location.href='admin_p31.php'; 
            </script>";
    }
    else
    {        
        echo "<script> 
                alert('Warning! Cannot add data!'); 
                window.location.href='admin_p31.php'; 
            </script>";            
    }
    
}
catch(PDOException $e)
{
        echo "<script> 
            alert('Error!" . substr($e->getMessage(),0,105) . " '); 
            window.location.href='admin_p31_criteria.php'; 
        </script>";
}

?>