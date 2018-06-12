<?php
    $emp_list = $_POST["param_emp_list"];
    $pos = strpos($emp_list, '/');
    $length = strlen ($emp_list);
    $aElement = array();
    while($pos > 0) 
    {
        array_push($aElement,substr($emp_list,0,$pos));
        $emp_list = substr($emp_list,$pos+1,$length-$pos);
        $length = strlen ($emp_list);
        $pos = strpos($emp_list, '/');
    }
    array_push($aElement,$emp_list);
    //echo sizeof($aElement);
    //echo $aElement[0] . $aElement[1] . $aElement[2];

    try
    {
         /*
        echo $_FILES["add_emp_file_name"]["name"] . "<br>";
        echo $_FILES["add_emp_file_name"]["type"] . "<br>";
        echo $_FILES["add_emp_file_name"]["size"] . "<br>";
        echo $_FILES["add_emp_file_name"]["tmp_name"] . "<br>";
        echo $_FILES["add_emp_file_name"]["error"] . "<br>";
        */
        
        $_FILES["add_emp_file_name"]["name"] = "pic_" . $aElement[0] . ".jpg";
        // Copy/Upload CSV
        move_uploaded_file($_FILES["add_emp_file_name"]["tmp_name"], "images/".$_FILES["add_emp_file_name"]["name"]);

        require_once('db_Conn.php');
        
        $strSql = "INSERT INTO MAS_Users_ID(emp_code, emp_email, emp_pwd, emp_user_type, emp_file_name, ent_date) ";
        $strSql .= "VALUES(";
        $strSql .= "'" . $aElement[0] . "',";
        $strSql .= "'" .  $_POST["add_emp_email"] . "',";
        $strSql .= "cast('" . $_POST["add_emp_password"] . "' as binary),";
        $strSql .= "'" . $_POST["sel_user_type"] . "',";
        $strSql .= "'" . "images/" . $_FILES["add_emp_file_name"]["name"] . "',";
        $strSql .= "'" . date("Y/m/d") . "')";
        //echo $strSql . "<br>";
        
        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $statement->execute();  
        $nRecCount = $statement->rowCount();
        //echo "Number of data = " . $nRecCount . " records <br>";

        if ($nRecCount >0)
        {
            echo "<script> 
                    alert('Add data complete!'); 
                    window.location.href='p61.php'; 
                </script>";
        }
        else
        {
            echo "<script> 
                    alert('Warning! Cannot add data!'); 
                    window.location.href='p61.php'; 
                </script>";
        }
        
    }
    catch(PDOException $e)
    {
        echo "<script> 
                alert('Error!" . substr($e->getMessage(),0,105) . " '); 
                window.location.href='p61.php'; 
            </script>";
    }
    
?>