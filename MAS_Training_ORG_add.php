<?php
//echo $_POST["add_performance_tot"] . "<br>";
//echo $_POST["add_performance_grade"] . "<br>";

/*$emp_list = $_POST["param_emp_list"];
$pos = strpos($emp_list, '/');
$length = strlen ($emp_list);*/
/*$aElement = array();
while($pos > 0) 
{
    array_push($aElement,substr($emp_list,0,$pos));
    $emp_list = substr($emp_list,$pos+1,$length-$pos);
    $length = strlen ($emp_list);
    $pos = strpos($emp_list, '/');
}
array_push($aElement,$emp_list);*/

try
{
    include('include/db_Conn.php');

    $strSql = "INSERT INTO MAS_TRAINING_ORG ";
    $strSql .= "VALUES(";
    $strSql .= "'" . $_POST["Select_By_BUSI"] . "',";
    $strSql .= "'" . $_POST["Select_By_DEPT"] . "',";
    $strSql .= "'" . $_POST["Select_By_SEC"] . "',";
    $strSql .= "'" . $_POST["paramTASK"] . "',";
    $strSql .= "'" . $_POST["paramPosition"] . "',";
    $strSql .= "'" . $_POST["Select_By_POSI"] . "')";
    echo $strSql . "<br>";

    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo $nRecCount . "<br>";

    if ($nRecCount >0)
    {
        echo "<script> 
                alert('Add data complete!'); 
                window.location.href='admin_pMSet.php'; 
            </script>";   
    }
    else
    {        
        echo "<script> 
                alert('Warning! Cannot add data!'); 
                window.location.href='admin_pMSet.php'; 
            </script>";            
    }
}
catch(PDOException $e)
{
    echo "<script> 
            alert('Error!" . substr($e->getMessage(),0,105) . " '); 
            window.location.href='admin_pMSet.php'; 
        </script>"; 
}

?>