<?php
    //echo $_POST['delete_codecourse'] . "<br>";

    try
    {
        include('include/db_Conn.php');        
        $strSql = "DELETE FROM MAS_TRAINING_ROADMAP_NEW ";
        $strSql .= "WHERE Code_Course='" . $_POST["delete_codecourse"] . "' AND SEC='" . $_POST["delete_sec"] . "' ";
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
            //echo "<script> 
            //        alert('Warning! Cannot delete data!'); 
            //        window.location.href='admin_p32_criteria.php'; 
            //    </script>";
        }
    }
    catch(PDOException $e)
    {        
        echo $e->getMessage();        
    }
?>