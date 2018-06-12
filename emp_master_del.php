<?php
    //echo $_POST['delete_emp_code'] . "<br>";

    try
    {
        include('include/db_Conn.php');        
        $strSql = "DELETE FROM Emp_Main ";
        $strSql .= "WHERE Emp_Code='" . $_POST["delete_emp_code"] . "' ";
        echo $strSql . "<br>";
    
        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();

        $nRecCount = $statement->rowCount();
        //echo "Number of data = " . $nRecCount . " records <br>";

        if ($nRecCount >0)
        {
            echo "<script> 
                    alert('Delete data complete!'); 
                    window.location.href='admin_p11.php'; 
                </script>";
            //Redirect browser
            //header("Location: p61.php");
        }
        else
        {
            echo "<script> 
                    alert('Warning! Cannot delete data!'); 
                    window.location.href='admin_p11.php'; 
                </script>";
        }
    }
    catch(PDOException $e)
    {        
        echo $e->getMessage();        
    }
?>