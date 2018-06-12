<?php
//echo $_POST["add_performance_tot"] . "<br>";
//echo $_POST["add_performance_grade"] . "<br>";

$emp_list = $_POST["param_emp_list"];
$pos = strpos($emp_list, '/');
$length = strlen ($emp_list);
$aElement = array();
while($pos > 0) 
{
    array_push($aElement,substr($emp_list,0,$pos));
    $emp_list = substr($emp_list,$pos+1,$length-$pos);
    $length = strlen ($emp_list);
    $pos = strpos($emp_list, '/');
}
array_push($aElement,$emp_list);

try
{
    include('include/db_Conn.php');

    $strSql = "INSERT INTO MAS_Performance ";
    $strSql .= "VALUES(";
    $strSql .= "'" . $aElement[0] . "',";
    $strSql .= "'" . $_POST["add_performance_year"] . "',";
    $strSql .= "" . $_POST["add_performance_kpi"] . ",";
    $strSql .= "" . $_POST["add_performance_com"] . ",";
    $strSql .= "" . $_POST["add_performance_tot"] . ",";
    $strSql .= "'" . $_POST["add_performance_grade"] . "',";
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
                window.location.href='admin_p21.php'; 
            </script>";   
    }
    else
    {        
        echo "<script> 
                alert('Warning! Cannot add data!'); 
                window.location.href='admin_p21.php'; 
            </script>";            
    }
}
catch(PDOException $e)
{
    echo "<script> 
            alert('Error!" . substr($e->getMessage(),0,105) . " '); 
            window.location.href='admin_p21.php'; 
        </script>";
}

?>