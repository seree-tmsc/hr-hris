<?php        
    require_once('include/db_Conn.php');
    $strSql = "UPDATE MAS_TRAINING_ROADMAP_GENERATE SET ";

    if(isset($_POST['ck']))
    {
        echo $_POST['ck'] . "<br>";
        $strSql .= "Training_Status=1 " ;
        //echo $strSql . "<br>";
    }
    else
    {
        echo "0" . "<br>";
        $strSql .= "Training_Status=0 " ;
        echo $strSql . "<br>";
    }
    $strSql .= "WHERE emp_code='" . $_GET['param1'] . "' and Code_course='" . $_GET['param2'] . "' ";    
    //echo $strSql . "<br>";
    
    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $statement->execute();  
    $nRecCount = $statement->rowCount();        

    //echo "<script> alert('Update complete!'); window.reload(); </script>";
    //echo "<script> alert('Update complete!'); window.close(); </script>";
   
    header("Refresh:0; url=Training_Roadmap_List_By_EmpCode.php?param1=" . $_GET["param1"]);
?>     