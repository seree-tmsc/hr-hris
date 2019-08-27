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

            $strSql = "UPDATE MAS_TRAINING_ROADMAP_NEW SET ";
            $strSql .= "BIZ='" . $_POST['paramupdate_biz'] . "' ,"; 
            $strSql .= "DEP='" . $_POST['update_dep'] . "' ,"; 
            $strSql .= "SEC='" . $_POST['update_sec'] . "' ,"; 
            $strSql .= "TASK='" . $_POST['update_task'] . "' ,";
            $strSql .= "Module='" . $_POST['update_module'] . "' ,"; 
            $strSql .= "Code_Course='" . $_POST['update_codecourse'] . "' ,"; 
            $strSql .= "Course_Content='" . $_POST['update_coursecontent'] . "' ,";
            $strSql .= "Course_Name='" . $_POST['update_coursename'] . "' ,";
            $strSql .= "Position='" . $_POST['update_position'] . "' ,";            
            $strSql .= "JG='" . $_POST['update_JG'] . "' ,";
            $strSql .= "Type='" . $_POST['update_type'] . "' ,";
            $strSql .= "Instructor='" . $_POST['update_instructor'] . "' ,";
            $strSql .= "Status_Training='" . $_POST['update_statustraining'] . "' ";

            $strSql .= "WHERE Code_Course='" . $_POST['update_codecourse'] . "' ";
            echo $strSql."<br>";
                        
            $statement = $conn->prepare($strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
            $statement->execute();  
            $nRecCount = $statement->rowCount();
            //echo $nRecCount . "<br>";

            if ($nRecCount >0)
            {
                echo "<script>
                        alert('Update data complete!');
                        window.location.href='admin_p31_criteria.php';
                    </script>";
            }
            else
            {
                echo "<script> 
                        alert('Warning! Cannot update data!'); 
                        window.location.href='admin_p31_criteria.php'; 
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