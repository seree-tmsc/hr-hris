<?php
    /*
    echo $_POST["paramupdate_performance_tot"] . "<br>";
    echo $_POST["paramupdate_performance_grade"] . "<br>";
    */
    
    if (isset($_POST['no']))
    {
        header("Location: admin_pMSet.php");
    }
    else
    {
        try
        {            
            require_once('include/db_Conn.php');

            /*$strSql = "UPDATE MAS_TRAINING_SET_MASTER SET ";
            $strSql .= "BIZ=" . $_POST["paramupdate_BIZ"] . ", "; 
            $strSql .= "DEP=" . $_POST["paramupdate_DEP"] . ", "; 
            $strSql .= "SEC=" . $_POST["paramupdate_SEC"] . ", "; 
            $strSql .= "TASK=" . $_POST["paramupdate_Task"] . ", "; 
            $strSql .= "Position=" . $_POST["paramupdate_Position"] . ", "; 
            $strSql .= "TrainingSet='" . $_POST["paramupdate_TrainingSET"] . "' "; 
            $strSql .= "WHERE BIZ='" . $_POST['paramupdate_BIZ'] . "' and DEP='" . $_POST['paramupdate_DEP'] . "' and SEC='" . $_POST['paramupdate_SEC'] . "' and Position='" . $_POST['paramupdate_Position'] . "' ";*/
            
            $strSql = "UPDATE MAS_TRAINING_SET_MASTER SET ";
            $strSql .= "TrainingSet='" . $_POST["paramupdate_TrainingSET"] . "' "; 
            $strSql .= "WHERE BIZ='" . $_POST['paramupdate_BIZ'] . "' and DEP='" . $_POST['paramupdate_DEP'] . "' and SEC='" . $_POST['paramupdate_SEC'] . "' and Position='" . $_POST['paramupdate_Position'] . "' ";    
            echo $strSql."<br>";
            
            $statement = $conn->prepare($strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
            $statement->execute();  
            $nRecCount = $statement->rowCount();
            //echo $nRecCount . "<br>";

            if ($nRecCount >0)
            {
                /*echo "<script>
                        alert('Update data complete!');
                        window.location.href='admin_pMSet.php';
                    </script>";*/
            }
            else
            {
               /* echo "<script> 
                        alert('Warning! Cannot update data!'); 
                        window.location.href='admin_pMSet.php'; 
                    </script>";*/
            }
            
        }
        catch(PDOException $e)
        {
           /* echo "<script> 
                    alert('Error!" . substr($e->getMessage(),70,105) . " '); 
                    window.location.href='admin_pMSet.php'; 
                </script>";*/
        }
    }    
?>