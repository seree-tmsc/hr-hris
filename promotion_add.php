<?php
//echo $_POST["paramadd_emp_code"] . "<br>";

try
{
    include('include/db_Conn.php');

    $strSql = "INSERT INTO MAS_Promotion ";
    $strSql .= "VALUES(";    
    $strSql .= "'" . $_POST["paramadd_emp_code"] . "',";
    $strSql .= "'" . $_POST["paramadd_promotion_year"] . "',";
    $strSql .= "1,";
    $strSql .= "'" . $_POST["paramadd_promotion_from_jg"] . "',";
    $strSql .= "'" . $_POST["paramadd_promotion_from_pos"] . "',";
    $strSql .= "'" . $_POST["paramadd_promotion_from_dep"] . "',";
    $strSql .= "'" . $_POST["paramadd_promotion_to_jg"] . "',";
    $strSql .= "'" . $_POST["paramadd_promotion_to_pos"] . "',";
    $strSql .= "'" . $_POST["paramadd_promotion_to_dep"] . "',";
    $strSql .= "'" . date("Y-m-d H:i:s") . "')";
    //echo $strSql . "<br>";
    
    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo $nRecCount . "<br>";

    if ($nRecCount >0)
    {
        echo "<script> 
                alert('Add data complete!'); 
                window.location.href='admin_p22_criteria.php'; 
            </script>";   
    }
    else
    {        
        echo "<script> 
                alert('Warning! Cannot add data!'); 
                window.location.href='admin_p22_criteria.php'; 
            </script>";            
    }

}
catch(PDOException $e)
{
    echo "<script> 
            alert('Error!" . substr($e->getMessage(),0,105) . " '); 
            window.location.href='admin_p22_criteria.php'; 
        </script>";
}

?>