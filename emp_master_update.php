<?php
    //echo $_POST['update_emp_birth_date'] . "<br>";

    if (isset($_POST['no']))
    {
        header("Location: admin_p11.php");
    }
    else
    {
        try
        {
            //echo $_POST['paramupdate_emp_code'] . "<br>";
            //echo $_FILES["paramupdate_emp_picture"]["name"] . "<br>";
            //echo $_POST['update_emp_ttitle'] . "<br>";
            //echo $_POST['paramupdate_upload'] . "<br>";
            //echo "images/pic_" . $_POST['paramu_emp_code'] . ".jpg" . "<br>";
            //unlink("images/pic_" . $_POST['paramu_emp_code'] . ".jpg");

            if (isset($_POST['paramupdate_upload']))
            {
                $_FILES["paramupdate_emp_picture"]["name"] = "pic_" . $_POST['paramupdate_emp_code'] . ".jpg";
                //echo $_FILES["paramupdate_emp_picture"]["name"] . "<br>";
                // Copy/Upload CSV
                move_uploaded_file($_FILES["paramupdate_emp_picture"]["tmp_name"], "images/".$_FILES["paramupdate_emp_picture"]["name"]);
                //$strSql .= "emp_picture='" . "images/" . $_FILES["paramupdate_emp_picture"]["name"] . "' "; 
            }
            else
            {
                //echo "0" . "<br>";
            }

            require_once('include/db_Conn.php');

            $strSql = "UPDATE Emp_Main SET ";
            $strSql .= "emp_ttitle='" . $_POST['update_emp_ttitle'] . "' ,"; 
            $strSql .= "emp_tfname='" . $_POST['update_emp_tfname'] . "' ,"; 
            $strSql .= "emp_tlname='" . $_POST['update_emp_tlname'] . "' ,";
            $strSql .= "emp_etitle='" . $_POST['update_emp_etitle'] . "' ,"; 
            $strSql .= "emp_efname='" . $_POST['update_emp_efname'] . "' ,"; 
            $strSql .= "emp_elname='" . $_POST['update_emp_elname'] . "' ,";
            $strSql .= "emp_nname='" . $_POST['update_emp_nname'] . "' ,";
            $strSql .= "emp_id_no='" . $_POST['update_emp_id_no'] . "' ,";            
            $strSql .= "emp_birth_date='" . (string)((int)substr($_POST["update_emp_birth_date"],6,4)-543)."/".substr($_POST["update_emp_birth_date"],3,2)."/".substr($_POST["update_emp_birth_date"],0,2) . "',";            
            $strSql .= "emp_mobile_no='" . $_POST['update_emp_mobile_no'] . "' ,";
            $strSql .= "emp_emergency_mobile_no='" . $_POST['update_emp_emergency_mobile_no'] . "' ,";

            $strSql .= "job_business='" . $_POST['update_job_business'] . "' ,";
            $strSql .= "job_department='" . $_POST['update_job_department'] . "' ,";
            $strSql .= "job_location='" . $_POST['update_job_location'] . "' ,";
            $strSql .= "job_grade='" . $_POST['update_job_grade'] . "' ,";
            $strSql .= "job_position='" . $_POST['update_job_position'] . "' ,";
            $strSql .= "job_working_date='" . (string)((int)substr($_POST["update_job_working_date"],6,4)-543)."/".substr($_POST["update_job_working_date"],3,2)."/".substr($_POST["update_job_working_date"],0,2) . "',";

            $strSql .= "addr_no='" . $_POST['update_addr_no'] . "' ,";
            $strSql .= "addr_road='" . $_POST['update_addr_road'] . "' ,";
            $strSql .= "addr_area='" . $_POST['update_addr_area'] . "' ,";
            $strSql .= "addr_district='" . $_POST['update_addr_district'] . "' ,";
            $strSql .= "addr_province='" . $_POST['update_addr_province'] . "' ,";
            $strSql .= "addr_postal_code='" . $_POST['update_addr_postal_code'] . "' ,";

            $strSql .= "edu_level1='" . $_POST['update_edu_level1'] . "' ,";
            $strSql .= "edu_detail1='" . $_POST['update_edu_detail1'] . "' ,";
            $strSql .= "edu_institute1='" . $_POST['update_edu_institute1'] . "' ,";
            $strSql .= "edu_faculty1='" . $_POST['update_edu_faculty1'] . "' ,";
            $strSql .= "edu_major1='" . $_POST['update_edu_major1'] . "' ,";
            $strSql .= "edu_grade1='" . $_POST['update_edu_grade1'] . "' ,";
            $strSql .= "edu_graduated_year1='" . $_POST['update_edu_graduated_year1'] . "', ";

            $strSql .= "edu_level2='" . $_POST['update_edu_level2'] . "' ,";
            $strSql .= "edu_detail2='" . $_POST['update_edu_detail2'] . "' ,";
            $strSql .= "edu_institute2='" . $_POST['update_edu_institute2'] . "' ,";
            $strSql .= "edu_faculty2='" . $_POST['update_edu_faculty2'] . "' ,";
            $strSql .= "edu_major2='" . $_POST['update_edu_major2'] . "' ,";
            $strSql .= "edu_grade2='" . $_POST['update_edu_grade2'] . "' ,";
            $strSql .= "edu_graduated_year2='" . $_POST['update_edu_graduated_year2'] . "' ";

            $strSql .= "WHERE emp_code='" . $_POST['paramupdate_emp_code'] . "' ";
            //echo $strSql."<br>";
                        
            $statement = $conn->prepare($strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
            $statement->execute();  
            $nRecCount = $statement->rowCount();
            //echo $nRecCount . "<br>";

            if ($nRecCount >0)
            {
                echo "<script>
                        alert('Update data complete!');
                        window.location.href='admin_p11_criteria.php';
                    </script>";
            }
            else
            {
                echo "<script> 
                        alert('Warning! Cannot update data!'); 
                        window.location.href='admin_p11_criteria.php'; 
                    </script>";
            }
            
        }
        catch(PDOException $e)
        {
            echo "<script> 
                    alert('Error!" . substr($e->getMessage(),70,105) . " '); 
                    window.location.href='admin_p11.php'; 
                </script>";
        }
    }
?>