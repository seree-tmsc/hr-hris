<?php  
    if (isset($_POST['btn_cancel']))
    {
        header("Location: p61.php");
    }
    else
    { 
        try
        {            
            //echo $_POST['paramupdate_emp_code'] . "<br>";            

            if (isset($_POST['paramupdate_upload']))
            {
                //echo "images/pic_" . $_POST['paramu_emp_code'] . ".jpg" . "<br>";
                //unlink("images/pic_" . $_POST['paramu_emp_code'] . ".jpg");                
                $_FILES["paramupdate_attachment"]["name"] = "pic_" . $_POST['paramupdate_emp_code'] . ".jpg";
                // Copy/Upload CSV
                move_uploaded_file($_FILES["paramupdate_attachment"]["tmp_name"], "images/".$_FILES["paramupdate_attachment"]["name"]);            
            }

            require_once('include/db_Conn.php');
            $strSql = "UPDATE MAS_doctor_treatment SET ";
            $strSql .= "amount=" . $_POST['paramupdate_amount'] . " ";
            $strSql .= "WHERE auto_number='" . $_POST['paramupdate_auto_no'] . "' ";
            //echo $strSql."<br>";
            
            $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
            $statement->execute();  
            $nRecCount = $statement->rowCount();
            //echo $nRecCount . "<br>";

            if ($nRecCount >0)
            {
                echo "<script>
                        alert('Update data complete!');
                        window.location.href='admin_p41.php';
                    </script>";
            }
            else
            {
                echo "<script> 
                        alert('Warning! Cannot update data!'); 
                        window.location.href='admin_p41.php'; 
                </script>";
            }            
        }
        catch(PDOException $e)
        {
            echo "<script> 
                    alert('Error!" . substr($e->getMessage(),70,105) . " '); 
                    window.location.href='admin_p41.php'; 
                </script>";
        }
    }
?>