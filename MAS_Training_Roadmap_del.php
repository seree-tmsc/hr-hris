<?php
    try
    {
        include('include/db_Conn.php');        
        $strSql = "DELETE FROM MAS_TRAINING_ROADMAP_NEW ";
        $strSql .= "WHERE BIZ='" . $_POST["paramdelete_BIZ"] . "' ";
        $strSql .= "AND DEP='" . $_POST["paramdelete_DEP"] . "' AND SEC='" . $_POST["paramdelete_SEC"] . "' ";
        //echo $strSql . "<br>";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();
        $nRecCount = $statement->rowCount();
        //echo "Number of data = " . $nRecCount . " records <br>";

        if ($nRecCount >0)
        {
            echo "<script> 
                    alert('Delete data complete!'); 
                    window.location.href='admin_pMRoadmap.php'; 
                </script>";
            //Redirect browser
            //header("Location: p61.php");
        }
        else
        {
            echo "<script> 
                    alert('Warning! Cannot delete data!'); 
                    window.location.href='admin_pMRoadmap.php'; 
                </script>";
        }        
    }
    catch(PDOException $e)
    {        
        echo $e->getMessage();        
    }
?>