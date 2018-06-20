<?php
//echo $_POST["mydate1"] . "<br>";
//echo substr($_POST["mydate1"],6,4)."/".substr($_POST["mydate1"],3,2)."/".substr($_POST["mydate1"],0,2) . "<br>";
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

    $strSql = "INSERT INTO Mas_Users_Id ";
    $strSql .= "VALUES(";
    $strSql .= "'" . $aElement[0] . "',";
    $strSql .= "'" . $_POST["add_user_email"] . "',";
    $strSql .= "cast('" . $aElement[0] . "@1234' as binary)" . ",";
    $strSql .= "'" . $_POST["add_user_type"] . "',";
    $strSql .= "'" . date("Y/m/d") . "', '') ";
    echo $strSql . "<br>";

    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo $nRecCount . "<br>";
    if ($nRecCount >0)
    {
        echo "<script> 
                alert('Add data complete!'); 
                window.location.href='admin_p12.php'; 
            </script>";   
    }
    else
    {        
        echo "<script> 
                alert('Warning! Cannot add data!'); 
                window.location.href='admin_p12.php'; 
            </script>";            
    }
}
catch(PDOException $e)
{
    echo "<script> 
            alert('Error!" . substr($e->getMessage(),0,105) . " '); 
            window.location.href='admin_p12.php'; 
        </script>";
}

?>