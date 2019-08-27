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

            require_once('include/db_Conn.php');

            $strSql = "UPDATE MAS_TRAINING_RECORD_NEW SET ";
            $strSql .= "Emp_Code='" . $_POST['paramupdate_emp_code'] . "' ,"; 
            $strSql .= "Name_Surname='" . $_POST['update_name_surname'] . "' ,"; 
            $strSql .= "Title='" . $_POST['update_title'] . "' ,"; 
            $strSql .= "Name_TH='" . $_POST['update_nameth'] . "' ,";
            $strSql .= "Surname_TH='" . $_POST['update_surnameth'] . "' ,"; 
            $strSql .= "Firstname_ENG='" . $_POST['update_firstnameeng'] . "' ,"; 
            $strSql .= "Lastname_ENG='" . $_POST['update_lastnameeng'] . "' ,";
            $strSql .= "Business='" . $_POST['update_business'] . "' ,";
            $strSql .= "Dept='" . $_POST['update_dept'] . "' ,";            
            $strSql .= "Section='" . $_POST['update_section'] . "' ,";
            
            $strSql .= "Job_Task='" . $_POST['update_jobtask'] . "' ,";
            $strSql .= "Position='" . $_POST['update_position'] . "' ,";
            $strSql .= "Site='" . $_POST['update_site'] . "' ,";
            //$strSql .= "Join_Date='" . (string)((int)substr($_POST["update_joindate"],6,4)-543)."/".substr($_POST["update_joindate"],3,2)."/".substr($_POST["update_joindate"],0,2) . "',";            
            $strSql .= "Join_Date='" . date('Y/m/d',strtotime($_POST["update_joindate"])) . "',";
            $strSql .= "Status='" . $_POST['update_status'] . "' ,";
            $strSql .= "Start_date='" . date('Y/m/d',strtotime($_POST["update_startdate"])) . "',";
            //$strSql .= "Start_date='" . (string)((int)substr($_POST["update_startdate"],6,4)-543)."/".substr($_POST["update_startdate"],3,2)."/".substr($_POST["update_startdate"],0,2) . "',";
            $strSql .= "End_date='" . date('Y/m/d',strtotime($_POST["update_enddate"])) . "',";
            //$strSql .= "End_date='" . (string)((int)substr($_POST["update_enddate"],6,4)-543)."/".substr($_POST["update_enddate"],3,2)."/".substr($_POST["update_enddate"],0,2) . "',";
            $strSql .= "Time='" . $_POST['update_time'] . "' ,";
            $strSql .= "Duration='" . $_POST['update_duration'] . "' ,";
            $strSql .= "Module='" . $_POST['update_module'] . "' ,";
            $strSql .= "Code_Course='" . $_POST['update_codecourse'] . "' ,";
            $strSql .= "Course_name='" . $_POST['update_coursename'] . "' ,";
            $strSql .= "Institute='" . $_POST['update_institute'] . "' ,";

            $strSql .= "Location='" . $_POST['update_location'] . "' ,";
            $strSql .= "Type_Course='" . $_POST['update_typecourse'] . "' ,";
            $strSql .= "Year='" . $_POST['update_year'] . "' ,";
            $strSql .= "Cost='" . $_POST['update_cost'] . "' ";

            $strSql .= "WHERE Emp_Code='" . $_POST['paramupdate_emp_code'] . "' ";
            echo $strSql."<br>";
                        
            $statement = $conn->prepare($strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
            $statement->execute();  
            $nRecCount = $statement->rowCount();
            //echo $nRecCount . "<br>";

            if ($nRecCount >0)
            {
                echo "<script>
                        alert('Update data complete!');
                        window.location.href='admin_p32_criteria.php';
                    </script>";
            }
            else
            {
                echo "<script> 
                        alert('Warning! Cannot update data!'); 
                        window.location.href='admin_p32_criteria.php'; 
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