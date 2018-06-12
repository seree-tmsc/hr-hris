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

            require_once('include/db_Conn.php');

            $strSql = "UPDATE Mas_Users_Id SET ";
            $strSql .= "user_type='" . $_POST["update_user_type"] . "' "; 
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
                        window.location.href='admin_p12.php';
                    </script>";
            }
            else
            {
                echo "<script> 
                        alert('Warning! Cannot update data!'); 
                        window.location.href='admin_p12.php'; 
                    </script>";
            }
            
        }
        catch(PDOException $e)
        {
            echo "<script> 
                    alert('Error!" . substr($e->getMessage(),70,105) . " '); 
                    window.location.href='admin_p12.php'; 
                </script>";
        }
    }
?>