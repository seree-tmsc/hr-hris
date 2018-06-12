<?php
    if (isset($_POST['btn_cancel']))
    {
        header("Location: p61.php");
    }
    else
    {
        try
        {
            //echo $_POST['paramd_emp_code'] . "<br>";

            include('db_Conn.php');       
            $strSql = "DELETE FROM MAS_Users_ID ";
            $strSql .= "WHERE emp_code='" . $_POST["paramd_emp_code"] . "' ";
            //echo $strSql . "<br>";

            $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
            $statement->execute();
            $nRecCount = $statement->rowCount();
            //echo "Number of data = " . $nRecCount . " records <br>";
    
            if ($nRecCount >0)
            {
                echo "<script> 
                        alert('Delete data complete!'); 
                        window.location.href='p61.php'; 
                    </script>";
                //Redirect browser
                //header("Location: p61.php");
            }
            else
            {
                echo "<script> 
                        alert('Warning! Cannot delete data!'); 
                        window.location.href='p61.php'; 
                    </script>";
            }
            
        }
        catch(PDOException $e)
        {        
            echo $e->getMessage();        
        }
    }

?>