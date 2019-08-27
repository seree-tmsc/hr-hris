<?php
    /*
    echo $_POST["paramupdate_performance_tot"] . "<br>";
    echo $_POST["paramupdate_performance_grade"] . "<br>";
    */
    
    if (isset($_POST['no']))
    {
       /* header("Location: admin_p21.php");*/
    }
    else
    {
        try
        {            
            require_once('include/db_Conn.php');

            $strSql = "UPDATE MAS_TRAINING_ROADMAP_NEW SET ";
            $strSql .= "Status_Training='" . 1 . "' "; 
            $strSql .= "WHERE BIZ='" . $ds1['BIZ'] . "' and DEP='" . $ds1['1'] . "' and SEC='" . $ds1['2'] . "' and Position='" . $ds1['3'] . "' and Code_course='" . $ds1['4'] . "' ";
            echo $strSql."<br>";
            
            $statement = $conn->prepare($strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
            $statement->execute();  
            $nRecCount = $statement->rowCount();
            //echo $nRecCount . "<br>";

            if ($nRecCount >0)
            {
               /* echo "<script>
                        alert('Update data complete!');
                        window.location.href='admin_p21.php';
                    </script>";*/
            }
            else
            {
                /*echo "<script> 
                        alert('Warning! Cannot update data!'); 
                        window.location.href='admin_p21.php'; 
                    </script>";*/
            }
            
        }
        catch(PDOException $e)
        {
            echo "<script> 
                    alert('Error!" . substr($e->getMessage(),70,105) . " '); 
                    window.location.href='admin_p21.php'; 
                </script>";
        }
    }    
?>