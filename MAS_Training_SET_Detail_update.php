<?php
    /*
    echo $_POST["paramupdate_performance_tot"] . "<br>";
    echo $_POST["paramupdate_performance_grade"] . "<br>";
    */
    
    if (isset($_POST['no']))
    {
        header("Location: admin_pMSet_D.php");
    }
    else
    {
        try
        {            
            require_once('include/db_Conn.php');

            $strSql = "UPDATE MAS_TRAINING_SET_DETAIL SET ";
            $strSql .= "TrainingSET=" . $_POST["paramupdate_TrainSet"] . ", "; 
            $strSql .= "Code_Course=" . $_POST["paramupdate_CodeCourse"] . ", "; 
            $strSql .= "Skill=" . $_POST["paramupdate_Skill"] . ", "; 
            $strSql .= "Course_Name='" . $_POST["paramupdate_CourseName"] . "' "; 
            $strSql .= "WHERE TrainingSET='" . $_POST['paramupdate_TrainSet'] . "' ";
            echo $strSql."<br>";
            
            $statement = $conn->prepare($strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
            $statement->execute();  
            $nRecCount = $statement->rowCount();
            //echo $nRecCount . "<br>";

            if ($nRecCount >0)
            {
                echo "<script>
                        alert('Update data complete!');
                        window.location.href='admin_pMSet_D.php';
                    </script>";
            }
            else
            {
                echo "<script> 
                        alert('Warning! Cannot update data!'); 
                        window.location.href='admin_pMSet_D.php'; 
                    </script>";
            }
            
        }
        catch(PDOException $e)
        {
            echo "<script> 
                    alert('Error!" . substr($e->getMessage(),70,105) . " '); 
                    window.location.href='admin_pMSet_D.php'; 
                </script>";
        }
    }    
?>