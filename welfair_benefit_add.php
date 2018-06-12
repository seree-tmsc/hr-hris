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
        
        $_FILES["add_attachment"]["name"] = "doctor_" . $aElement[0] . "_". date("Y_m_d") . "_line" . $_POST["add_line_item"] . ".pdf";
        // Copy/Upload CSV
        move_uploaded_file($_FILES["add_attachment"]["tmp_name"], "images/".$_FILES["add_attachment"]["name"]);

        require_once('include/db_Conn.php');
        
        $strSql = "INSERT INTO MAS_doctor_treatment(ent_date, wd_date, emp_code, line_item, detail_item, amount, attachment) ";
        $strSql .= "VALUES(";                
        $strSql .= "'" . date("Y/m/d") . "',";
        $strSql .= "'" . date('Y/m/d',strtotime($_POST["add_wd_date"])) . "',";        
        $strSql .= "'" . $aElement[0] . "',";
        $strSql .= "" . $_POST["add_line_item"] . ",";
        $strSql .= "'" . $_POST["add_sel_detail_item"] . "',";
        $strSql .= "" . $_POST["add_amount"] . ",";
        $strSql .= "'" . "images/" . $_FILES["add_attachment"]["name"] . "') ";        
        echo $strSql . "<br>";
                
        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $statement->execute();  
        $nRecCount = $statement->rowCount();
        //echo "Number of data = " . $nRecCount . " records <br>";

        if ($nRecCount >0)
        {
            echo "<script> 
                    alert('Add data complete!'); 
                    window.location.href='admin_p41.php'; 
                </script>";
        }
        else
        {
            echo "<script> 
                    alert('Warning! Cannot add data!'); 
                    window.location.href='admin_p41.php'; 
                </script>";
        }
        
    }
    catch(PDOException $e)
    {
        echo "<script> 
                alert('Error!" . substr($e->getMessage(),0,105) . " '); 
                window.location.href='admin_p41.php'; 
            </script>";
    }
    
?>