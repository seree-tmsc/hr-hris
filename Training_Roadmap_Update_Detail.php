<?php
    //echo date('Y-m-d',strtotime($_POST["update_start_date"])) . "<br>";

    require_once('include/db_Conn.php');
    $strSql = "UPDATE MAS_TRAINING_ROADMAP_GENERATE SET ";
    $strSql .= "start_date='" . date('Y-m-d',strtotime($_POST["update_start_date"])) . "',";
    $strSql .= "end_date='" . date('Y-m-d',strtotime($_POST["update_end_date"])) . "',";
    $strSql .= "training_day='" . $_POST['update_training_day'] . "', ";
    $strSql .= "institute='" . $_POST['update_institute'] . "', ";
    $strSql .= "location='" . $_POST['update_location'] . "', ";
    $strSql .= "site='" . $_POST['update_site'] . "', ";
    $strSql .= "status='" . $_POST['update_Status'] . "', ";
    $strSql .= "type_course='" . $_POST['update_typecourse'] . "', ";
    $strSql .= "year='" . $_POST['update_year'] . "', ";
    $strSql .= "cost='" . $_POST['update_cost'] . "' ";

    $strSql .= "WHERE emp_code='" . $_POST['paramupdate_emp_code'] . "' and Code_course='" . $_POST['paramupdate_course_code'] . "' ";
    echo $strSql . "<br>";
    
    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $statement->execute();  
    $nRecCount = $statement->rowCount();        

    echo "<script> alert('Update complete!'); window.reload(); </script>";    
    header("Refresh:0; url=Training_Roadmap_List_By_EmpCode.php?param1=" . $_POST['paramupdate_emp_code']);
?>     