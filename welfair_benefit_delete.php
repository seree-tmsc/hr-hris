<?php
    if (isset($_POST['btn_cancel']))
    {
        header("Location: p51.php");
    }
    else
    {
        try
        {
            //echo $_POST['paramd_emp_code'] . "<br>";

            include('include/db_Conn.php');       
            $strSql = "DELETE FROM MAS_doctor_treatment ";
            $strSql .= "WHERE auto_number=" . $_POST["paramdelete_auto_no"] . " ";
            //echo $strSql . "<br>";

            $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
            $statement->execute();
            $nRecCount = $statement->rowCount();
            //echo "Number of data = " . $nRecCount . " records <br>";
    
            if ($nRecCount >0)
            {
                echo "<script> 
                        alert('Delete data complete!'); 
                        window.location.href='admin_p41.php'; 
                    </script>";
                //Redirect browser
                //header("Location: p61.php");
            }
            else
            {
                echo "<script> 
                        alert('Warning! Cannot delete data!'); 
                        window.location.href='admin_p41.php'; 
                    </script>";
            }
            
        }
        catch(PDOException $e)
        {        
            echo $e->getMessage();        
        }
    }

?>