<?php
//echo $_POST["mydate1"] . "<br>";
//echo substr($_POST["mydate1"],6,4)."/".substr($_POST["mydate1"],3,2)."/".substr($_POST["mydate1"],0,2) . "<br>";

try
{
    include('include/db_Conn.php');

    $strSql = "INSERT INTO MAS_TRAINING_RECORD_NEW ";
    $strSql .= "VALUES(";
    $strSql .= "'" . $_POST["add_emp_code"] . "',";
    $strSql .= "'" . $_POST["add_name_surname"] . "',";
    $strSql .= "'" . $_POST["add_ttitle"] . "',";
    $strSql .= "'" . $_POST["add_nameth"] . "',";
    $strSql .= "'" . $_POST["add_surnameth"] . "',";
    $strSql .= "'" . $_POST["add_nameeng"] . "',";
    $strSql .= "'" . $_POST["add_surnameeng"] . "',";
    $strSql .= "'" . $_POST["add_business"] . "',";
    $strSql .= "'" . $_POST["add_dept"] . "',";
    $strSql .= "'" . $_POST["add_section"] . "',";
    $strSql .= "'" . $_POST["add_job_task"] . "',";
    $strSql .= "'" . $_POST["add_position"] . "',";
    $strSql .= "'" . $_POST["add_site"] . "',";
    //$strSql .= "'" . (string)((int)substr($_POST["mydate1"],6,4)-543)."/".substr($_POST["mydate1"],3,2)."/".substr($_POST["mydate1"],0,2) . "',";
    $strSql .= "'" . date('Y/m/d',strtotime($_POST["mydate1"])) . "',";
    $strSql .= "'" . $_POST["add_status"] . "',";
    $strSql .= "'" . date('Y/m/d',strtotime($_POST["mydate2"])) . "',";
    $strSql .= "'" . date('Y/m/d',strtotime($_POST["mydate3"])) . "',";
    //$strSql .= "'" . (string)((int)substr($_POST["mydate2"],6,4)-543)."/".substr($_POST["mydate2"],3,2)."/".substr($_POST["mydate2"],0,2) . "',";
    //$strSql .= "'" . (string)((int)substr($_POST["mydate3"],6,4)-543)."/".substr($_POST["mydate3"],3,2)."/".substr($_POST["mydate3"],0,2) . "',";
    $strSql .= "'" . $_POST["add_emp_time"] . "',";
    $strSql .= "'" . $_POST["add_duration"] . "',";
    $strSql .= "'" . $_POST["add_module"] . "',";
    $strSql .= "'" . $_POST["add_code_course"] . "',";
    
    $strSql .= "'" . $_POST["add_course_name"] . "',";
    $strSql .= "'" . $_POST["add_institute"] . "',";
    $strSql .= "'" . $_POST["add_location"] . "',";
    $strSql .= "'" . $_POST["add_type_course"] . "',";
    $strSql .= "'" . $_POST["add_Year"] . "',";
    $strSql .= "'" . $_POST["add_cost"] . "' )";  
    echo $strSql . "<br>";
        
    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo "Number of data = " . $nRecCount . " records <br>";

    if ($nRecCount >0)
    {
        echo "<script> 
                alert('Add data complete!'); 
                window.location.href='admin_p32.php'; 
            </script>";
    }
    else
    {        
        echo "<script> 
                alert('Warning! Cannot add data!'); 
                window.location.href='admin_p32.php'; 
            </script>";            
    }
    
}
catch(PDOException $e)
{
    //echo "<script> 
    //        alert('Error!" . substr($e->getMessage(),0,105) . " '); 
    //        window.location.href='admin_p32_criteria.php'; 
    //    </script>";
}

?>