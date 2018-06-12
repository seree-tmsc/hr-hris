<?php 
    function check_field_number($objCurrentRecord, $dbName){
        $nValue=0;
        switch ($dbName)
        {                
            case 'MAS_Performance':
                if (sizeof($objCurrentRecord) == 6) {$nValue = 1;}
                else {$nValue = 0;}
                break;
            case 'MAS_Promotion':
                if (sizeof($objCurrentRecord) == 8) {$nValue = 1;}
                else {$nValue = 0;}                    
                break;
            case 'MAS_Users_ID':
                if (sizeof($objCurrentRecord) == 4){$nValue = 1;}
                else{$nValue = 0;} 
                break;
        }
        return $nValue;
    }

    function check_field_name($objCurrentRecord, $dbName){
        $nValue=0;
        switch ($dbName)
        {                
            case 'MAS_Performance':
                if ($objCurrentRecord[0] == 'emp_code' && $objCurrentRecord[1] == 'year' && 
                    $objCurrentRecord[2] == 'kpi' && $objCurrentRecord[3] == 'com' && 
                    $objCurrentRecord[4] == 'tot' && $objCurrentRecord[5] == 'grade')
                {$nValue = 1;}
                else {$nValue = 0;}    
                break;  
            case 'MAS_Promotion':
                if ($objCurrentRecord[0] == 'emp_code' && $objCurrentRecord[1] == 'year' && 
                    $objCurrentRecord[2] == 'from_jg' && $objCurrentRecord[3] == 'from_pos' && $objCurrentRecord[4] == 'from_dep' && 
                    $objCurrentRecord[5] == 'to_jg' && $objCurrentRecord[6] == 'to_pos' && $objCurrentRecord[7] == 'to_dep')
                {$nValue = 1;}
                else {$nValue = 0;}                    
                break;
            case 'MAS_Users_ID':
                if ($objCurrentRecord[0] == 'emp_code' && $objCurrentRecord[1] == 'email' && 
                    $objCurrentRecord[2] == 'pwd' && $objCurrentRecord[3] == 'type')
                {$nValue = 1;}
                else {$nValue = 0;} 
                break;
        }
        return $nValue;
    }

    function check_data_type($objCurrentRecord, $dbName){
        $nValue=0;
        switch ($dbName)
        {                
            case 'MAS_Performance':
                if (!empty($objCurrentRecord[0]) && !empty($objCurrentRecord[1]) && 
                    is_numeric($objCurrentRecord[2]) && is_numeric($objCurrentRecord[3]) && 
                    is_numeric($objCurrentRecord[4]) && !empty($objCurrentRecord[5]))
                {$nValue = 1;}
                else {$nValue = 0;}      
                /*
                echo "step31=" . $nValue . "<br>" ;
                echo var_dump(is_numeric($objCurrentRecord[2])) . "<br>";
                echo var_dump(is_numeric($objCurrentRecord[3])) . "<br>";
                echo var_dump(is_numeric($objCurrentRecord[4])) . "<br>";
                */
                break;
            case 'MAS_Promotion':
                if (!empty($objCurrentRecord[0]) && !empty($objCurrentRecord[1]) && 
                    !empty($objCurrentRecord[2]) && !empty($objCurrentRecord[3]) && 
                    !empty($objCurrentRecord[4]) && !empty($objCurrentRecord[5]) && 
                    !empty($objCurrentRecord[6]) && !empty($objCurrentRecord[7]))
                {$nValue = 1;}
                else {$nValue = 0;}                    
                break;
            case 'MAS_Users_ID':
                if (!empty($objCurrentRecord[0]) && !empty($objCurrentRecord[1]) && 
                    !empty($objCurrentRecord[2]) && !empty($objCurrentRecord[3]))
                {$nValue = 1;}
                else {$nValue = 0;} 
                break;
        }        
        return $nValue;
    }

    function check_data_validation($objCurrentRecord, $dbName){
        $nValue=0;
        switch ($dbName)
        {                
            case 'MAS_Performance':
                //echo $objCurrentRecord[5] . "<br>" ;
                //echo strlen($objCurrentRecord[5]) . "<br>" ;
                if ($objCurrentRecord[5]=='F' || $objCurrentRecord[5]=='N' || $objCurrentRecord[5]=='S' || $objCurrentRecord[5]=='A' || $objCurrentRecord[5]=='O')
                    {$nValue = 1;}
                else { $nValue = 0;
                }                
                break;
            case 'MAS_Promotion':
                if ($objCurrentRecord[2]== 'JG7' || $objCurrentRecord[2]== 'JG8' || $objCurrentRecord[2]== 'JG9' || 
                    $objCurrentRecord[2]== 'JG10' || $objCurrentRecord[2]== 'JG11' || $objCurrentRecord[2]== 'JG12' || 
                    $objCurrentRecord[2]== 'JG13' || $objCurrentRecord[2]== 'JG14' || $objCurrentRecord[2]== 'JG15' || $objCurrentRecord[2]== 'JG16')

                    if ($objCurrentRecord[5]== 'JG7' || $objCurrentRecord[5]== 'JG8' || $objCurrentRecord[5]== 'JG9' || 
                        $objCurrentRecord[5]== 'JG10' || $objCurrentRecord[5]== 'JG11' || $objCurrentRecord[5]== 'JG12' || 
                        $objCurrentRecord[5]== 'JG13' || $objCurrentRecord[5]== 'JG14' || $objCurrentRecord[5]== 'JG15' || $objCurrentRecord[5]== 'JG16')
                        {$nValue = 1;}
                    else {$nValue = 0;
                    }                
                else {$nValue = 0;
                }
                break;
            case 'MAS_Users_ID':
                if ($objCurrentRecord[3] == 'U' || $objCurrentRecord[3] == 'P' || $objCurrentRecord[3] == 'A')
                    {$nValue = 1;}
                else {$nValue = 0;
                } 
                break;
        }
        return $nValue;
    }

    try
    {
        include('db_Conn.php');
        $objCSV = fopen($_POST["param_csvFileName"], "r");        
                 
        $strSql = "";
        $lFlag1 = 0;
        $lFlag2 = 0;
        $lFlag3 = 0;
        $lFlag4 = 0;
        $nRecNo = 0;

        while (($objArr = fgetcsv($objCSV, 500, ",",'"')) !== FALSE)
        {
            $nRecNo += 1;

            if ($nRecNo == 1)
            {
                $lFlag1 = check_field_number($objArr, $_POST['param_dbName']);                
                $lFlag2 = check_field_name($objArr, $_POST['param_dbName']);                
            }
            else
            {
                $lFlag3 = check_data_type($objArr, $_POST['param_dbName']);                
                $lFlag4 = check_data_validation($objArr, $_POST['param_dbName']);                
            }
            
            if ($nRecNo > 1)
            {
                if ($lFlag1 && $lFlag2 && $lFlag3 && $lFlag4)
                {
                    switch ($_POST['param_dbName'])
                    {                
                        case 'MAS_Performance':
                            $strSql = "INSERT INTO MAS_Performance VALUES(";
                            $strSql .= "'".$objArr[0]."',";
                            $strSql .= "'".$objArr[1]."',";
                            $strSql .= "".$objArr[2].",";
                            $strSql .= "".$objArr[3].",";
                            $strSql .= "".$objArr[4].",";
                            $strSql .= "'".$objArr[5]."',";
                            $strSql .= "'" . date("Y-m-d H:i:s") . "')";
                            break;
                        case 'MAS_Promotion':
                            $strSql = "INSERT INTO MAS_Promotion VALUES(";
                            $strSql .= "'".$objArr[0]."',";
                            $strSql .= "'".$objArr[1]."',";
                            $strSql .= "'".$objArr[2]."',";
                            $strSql .= "'".$objArr[3]."',";
                            $strSql .= "'".$objArr[4]."',";
                            $strSql .= "'".$objArr[5]."',";
                            $strSql .= "'".$objArr[6]."',";
                            $strSql .= "'".$objArr[7]."',";
                            $strSql .= "'" . date("Y-m-d H:i:s") . "')";
                            break;
                        case 'MAS_Users_ID':
                            $strSql = "INSERT INTO MAS_Users_ID VALUES(";
                            $strSql .= "'".$objArr[0]."',";
                            $strSql .= "'".$objArr[1]."',";                    
                            $strSql .= "cast('" . $objArr[2] . "' as binary)" . ",";
                            $strSql .= "'".$objArr[3]."',";                    
                            $strSql .= "'" . date("Y-m-d") . "')";
                            break;
                    }
    
                    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                    $statement->execute();  
                    $nRecCount = $statement->rowCount();
                    //echo "Number of data = " . $nRecCount . " records <br>";                    
                }
                else
                {
                    fclose($objCSV);
                    echo "<script> 
                            alert('Error CSV file error... Record # " . ($nRecNo-1) . "'); 
                            window.location.href='admin_p101.php'; 
                        </script>";
                }
            }
            
        }
        
        fclose($objCSV);
        echo "<script> 
                alert('Add data complete / Total = " . ($nRecNo-1) . " records '); 
                window.location.href='admin_p101.php'; 
            </script>";
        
    }
    catch(PDOException $e)
    {
        echo "<script> 
                alert('Error!" . substr($e->getMessage(),0,90) . " / Record No. " . ($nRecNo-1) . " '); 
                window.location.href='admin_p101.php'; 
            </script>";
    }
?>