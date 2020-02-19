<?php    
    //echo $_POST["paramupdate_promotion_to_jg"] . "<br>";    
    
    if (isset($_POST['no']))
    {
        header("Location: admin_p22.php");
    }
    else
    {
        try
        {            
            require_once('include/db_Conn.php');

            $strSql = "UPDATE Mas_Promotion SET ";
            $strSql .= "promotion_to_jg='" . $_POST["paramupdate_promotion_to_jg"] . "', "; 
            $strSql .= "promotion_to_pos='" . $_POST["paramupdate_promotion_to_pos"] . "', "; 
            $strSql .= "promotion_to_dep='" . $_POST["paramupdate_promotion_to_dep"] . "' ";
            $strSql .= "WHERE emp_code='" . $_POST['paramupdate_emp_code'] . "' ";
            $strSql .= "AND promotion_year='" . $_POST['paramupdate_promotion_year'] . "' ";
            //echo $strSql."<br>";
                        
            $statement = $conn->prepare($strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
            $statement->execute();  
            $nRecCount = $statement->rowCount();
            //echo $nRecCount . "<br>";

            if ($nRecCount >0)
            {
                echo "<script>
                        alert('Update data complete!');
                        window.location.href='admin_p22_criteria.php';
                    </script>";
            }
            else
            {
                echo "<script> 
                        alert('Warning! Cannot update data!'); 
                        window.location.href='admin_p22_criteria.php'; 
                    </script>";
            }
            
        }
        catch(PDOException $e)
        {
            echo "<script> 
                    alert('Error!" . substr($e->getMessage(),70,105) . " '); 
                    window.location.href='admin_p22_criteria.php'; 
                </script>";
        }
    }    
?>