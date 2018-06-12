<?php
    /*
    echo $_POST["paramupdate_performance_tot"] . "<br>";
    echo $_POST["paramupdate_performance_grade"] . "<br>";
    */
    
    if (isset($_POST['no']))
    {
        header("Location: admin_p21.php");
    }
    else
    {
        try
        {            
            require_once('include/db_Conn.php');

            $strSql = "UPDATE Mas_Performance SET ";
            $strSql .= "performance_kpi=" . $_POST["paramupdate_performance_kpi"] . ", "; 
            $strSql .= "performance_com=" . $_POST["paramupdate_performance_com"] . ", "; 
            $strSql .= "performance_tot=" . $_POST["paramupdate_performance_tot"] . ", "; 
            $strSql .= "performance_grade='" . $_POST["paramupdate_performance_grade"] . "' "; 
            $strSql .= "WHERE emp_code='" . $_POST['paramupdate_emp_code'] . "' ";
            $strSql .= "AND performance_year='" . $_POST['paramupdate_performance_year'] . "' ";
            echo $strSql."<br>";
            
            $statement = $conn->prepare($strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
            $statement->execute();  
            $nRecCount = $statement->rowCount();
            //echo $nRecCount . "<br>";

            if ($nRecCount >0)
            {
                echo "<script>
                        alert('Update data complete!');
                        window.location.href='admin_p21.php';
                    </script>";
            }
            else
            {
                echo "<script> 
                        alert('Warning! Cannot update data!'); 
                        window.location.href='admin_p21.php'; 
                    </script>";
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