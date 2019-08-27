<?php
    /*
    echo $_POST["paramupdate_performance_tot"] . "<br>";
    echo $_POST["paramupdate_performance_grade"] . "<br>";
    */
    
    if (isset($_POST['no']))
    {
        header("Location: admin_pMRoadmap.php");
    }
    else
    {
        try
        {            
            require_once('include/db_Conn.php');

            $strSql = "UPDATE MAS_TRAINING_ROADMAP_NEW SET ";
            $strSql .= "BIZ=" . $_POST["paramupdate_BIZ"] . ", "; 
            $strSql .= "DEP=" . $_POST["paramupdate_DEP"] . ", "; 
            $strSql .= "SEC=" . $_POST["paramupdate_SEC"] . ", "; 
            $strSql .= "TASK=" . $_POST["paramupdate_Task"] . ", "; 
            $strSql .= "Module=" . $_POST["paramupdate_Module"] . ", "; 
            $strSql .= "Code_Course=" . $_POST["paramupdate_CodeCourse"] . ", "; 
            $strSql .= "Course_Content=" . $_POST["paramupdate_CourseContent"] . ", "; 
            $strSql .= "Course_Name=" . $_POST["paramupdate_CourseName"] . ", "; 
            $strSql .= "Position=" . $_POST["paramupdate_Position"] . ", "; 
            $strSql .= "JG=" . $_POST["paramupdate_JG"] . ", "; 
            $strSql .= "Type=" . $_POST["paramupdate_Type"] . ", "; 
            $strSql .= "Instructor='" . $_POST["paramupdate_Instructor"] . "' "; 
            $strSql .= "WHERE BIZ='" . $_POST['paramupdate_BIZ'] . "' and DEP='" . $_POST['paramupdate_DEP'] . "' and SEC='" . $_POST['paramupdate_SEC'] . "' ";
            echo $strSql."<br>";
            
            $statement = $conn->prepare($strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
            $statement->execute();  
            $nRecCount = $statement->rowCount();
            //echo $nRecCount . "<br>";

            if ($nRecCount >0)
            {
                echo "<script>
                        alert('Update data complete!');
                        window.location.href='admin_pMRoadmap.php';
                    </script>";
            }
            else
            {
                echo "<script> 
                        alert('Warning! Cannot update data!'); 
                        window.location.href='admin_pMRoadmap.php'; 
                    </script>";
            }
            
        }
        catch(PDOException $e)
        {
            echo "<script> 
                    alert('Error!" . substr($e->getMessage(),70,105) . " '); 
                    window.location.href='admin_pMRoadmap.php'; 
                </script>";
        }
    }    
?>