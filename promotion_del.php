<?php
    try
    {
        include('include/db_Conn.php');        
        $strSql = "DELETE FROM Mas_Promotion ";
        $strSql .= "WHERE Emp_Code='" . $_POST["paramdelete_emp_code"] . "' ";
        $strSql .= "AND promotion_year='" . $_POST["paramdelete_promotion_year"] . "' ";
        //echo $strSql . "<br>";
        
        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();
        $nRecCount = $statement->rowCount();
        //echo "Number of data = " . $nRecCount . " records <br>";

        if ($nRecCount >0)
        {
            echo "<script> 
                    alert('Delete data complete!'); 
                    window.location.href='admin_p22_criteria.php'; 
                </script>";
        }
        else
        {
            echo "<script> 
                    alert('Warning! Cannot delete data!'); 
                    window.location.href='admin_p22_criteria.php'; 
                </script>";
        }
        
    }
    catch(PDOException $e)
    {        
        echo $e->getMessage();        
    }
?>