<?php
//echo $_POST["mydate1"] . "<br>";
//echo substr($_POST["mydate1"],6,4)."/".substr($_POST["mydate1"],3,2)."/".substr($_POST["mydate1"],0,2) . "<br>";

try
{
    $_FILES["add_emp_picture"]["name"] = "pic_" . $_POST["add_emp_code"] . ".jpg";
    // Copy/Upload CSV
    move_uploaded_file($_FILES["add_emp_picture"]["tmp_name"], "images/".$_FILES["add_emp_picture"]["name"]);

    include('include/db_Conn.php');

    $strSql = "INSERT INTO Emp_Main ";
    $strSql .= "VALUES(";
    $strSql .= "'" . $_POST["add_emp_code"] . "',";
    $strSql .= "'" . $_POST["add_emp_etitle"] . "',";
    $strSql .= "'" . $_POST["add_emp_efname"] . "',";
    $strSql .= "'" . $_POST["add_emp_elname"] . "',";
    $strSql .= "'" . $_POST["add_emp_ttitle"] . "',";
    $strSql .= "'" . $_POST["add_emp_tfname"] . "',";
    $strSql .= "'" . $_POST["add_emp_tlname"] . "',";
    $strSql .= "'" . $_POST["add_emp_nname"] . "',";
    $strSql .= "'" . $_POST["add_emp_id_no"] . "',";
    $strSql .= "'" . (string)((int)substr($_POST["mydate1"],6,4)-543)."/".substr($_POST["mydate1"],3,2)."/".substr($_POST["mydate1"],0,2) . "',";
    $strSql .= "'" . $_POST["add_emp_mobile_no"] . "',";
    $strSql .= "'" . "images/" . $_FILES["add_emp_picture"]["name"] . "',";

    $strSql .= "'" . $_POST["add_job_business"] . "',";
    $strSql .= "'" . $_POST["add_job_department"] . "',";
    $strSql .= "'" . $_POST["add_job_location"] . "',";
    $strSql .= "'" . $_POST["add_job_grade"] . "',";
    $strSql .= "'" . $_POST["add_job_position"] . "',";
    $strSql .= "'" . (string)((int)substr($_POST["mydate2"],6,4)-543)."/".substr($_POST["mydate2"],3,2)."/".substr($_POST["mydate2"],0,2) . "',";

    $strSql .= "'" . $_POST["add_addr_no"] . "',";
    $strSql .= "'" . $_POST["add_addr_road"] . "',";
    $strSql .= "'" . $_POST["add_addr_area"] . "',";
    $strSql .= "'" . $_POST["add_addr_district"] . "',";
    $strSql .= "'" . $_POST["add_addr_province"] . "',";
    $strSql .= "'" . $_POST["add_addr_postal_code"] . "',";

    $strSql .= "'" . $_POST["add_edu_level1"] . "',";
    $strSql .= "'" . $_POST["add_edu_detail1"] . "',";
    $strSql .= "'" . $_POST["add_edu_institute1"] . "',";
    $strSql .= "'" . $_POST["add_edu_faculty1"] . "',";
    $strSql .= "'" . $_POST["add_edu_major1"] . "',";
    $strSql .= "'" . $_POST["add_edu_grade1"] . "',";
    $strSql .= "'" . $_POST["add_edu_graduated_year1"] . "',";

    $strSql .= "'" . $_POST["add_edu_level2"] . "',";
    $strSql .= "'" . $_POST["add_edu_detail2"] . "',";
    $strSql .= "'" . $_POST["add_edu_institute2"] . "',";
    $strSql .= "'" . $_POST["add_edu_faculty2"] . "',";
    $strSql .= "'" . $_POST["add_edu_major2"] . "',";
    $strSql .= "'" . $_POST["add_edu_grade2"] . "',";
    $strSql .= "'" . $_POST["add_edu_graduated_year2"] . "')";    
    //echo $strSql . "<br>";
        
    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo "Number of data = " . $nRecCount . " records <br>";

    if ($nRecCount >0)
    {
        echo "<script> 
                alert('Add data complete!'); 
                window.location.href='admin_p11.php'; 
            </script>";   
    }
    else
    {        
        echo "<script> 
                alert('Warning! Cannot add data!'); 
                window.location.href='admin_p11.php'; 
            </script>";            
    }
    
}
catch(PDOException $e)
{
    echo "<script> 
            alert('Error!" . substr($e->getMessage(),0,105) . " '); 
            window.location.href='admin_p11.php'; 
        </script>";
}

?>