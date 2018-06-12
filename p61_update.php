<?php  
    if (isset($_POST['btn_cancel']))
    {
        header("Location: p61.php");
    }
    else
    { 
        try
        {
            /*
            echo $_POST['paramu_emp_code'] . "<br>";
            echo $_POST['edit_emp_file_name'] . "<br>";
            */
            echo "images/pic_" . $_POST['paramu_emp_code'] . ".jpg" . "<br>";
            unlink("images/pic_" . $_POST['paramu_emp_code'] . ".jpg");
            
            $_FILES["edit_emp_file_name2"]["name"] = "pic_" . $_POST['paramu_emp_code'] . ".jpg";
            // Copy/Upload CSV
            move_uploaded_file($_FILES["edit_emp_file_name2"]["tmp_name"], "images/".$_FILES["edit_emp_file_name2"]["name"]);            

            require_once('db_Conn.php');
            $strSql = "UPDATE MAS_Users_ID SET ";
            $strSql .= "emp_user_type='" . $_POST['edit_emp_user_type'] . "' ,"; 
            $strSql .= "emp_file_name='" . "images/" . $_FILES["edit_emp_file_name2"]["name"] . "' "; 
            $strSql .= "WHERE emp_code='" . $_POST['paramu_emp_code'] . "' ";
            //echo $strSql."<br>";
            
            $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
            $statement->execute();  
            $nRecCount = $statement->rowCount();
            //echo $nRecCount . "<br>";

            if ($nRecCount >0)
            {
                echo "<script>
                        alert('Update data complete!');
                        window.location.href='p61.php';
                    </script>";
            }
            else
            {
                echo "<script> 
                        alert('Warning! Cannot update data!'); 
                        window.location.href='p61.php'; 
                </script>";
            }
            
        }
        catch(PDOException $e)
        {
            echo "<script> 
                    alert('Error!" . substr($e->getMessage(),70,105) . " '); 
                    window.location.href='p61.php'; 
                </script>";
        }
    }
?>