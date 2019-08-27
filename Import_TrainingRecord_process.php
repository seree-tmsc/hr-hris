<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php require_once("include/library.php"); ?>    
</head>

<?php
    function Insert_History_Using($emp_code, $emp_fname, $Training_set, $Module, $Code_Course, $Code_Name, $Training_Status, $Biz, $Dep, $Sec, $Task, $Position, $site, $status, $start_date, $end_date, $training_day, $institute, $Status, $Start_Date, $End_Date, $time, $Training_Day, $Course_name, $Institute, $location, $type_course, $year, $cost) 
    {
        try
        {
            include('include/db_Conn.php');
            
            $strSql = "INSERT INTO MAS_TRAINING_ROADMAP_GENERATE (emp_code, emp_fname, Training_set, Module, Code_Course, Code_Name, Training_Status, Biz, Dep, Sec, Task, Position, site, status, start_date, end_date, training_day, institute, Status, Start_Date, End_Date, time, Training_Day, Course_name, Institute, location, type_course, year, cost) ";
            $strSql .= "VALUES(";
            $strSql .= "'" . $emp_code . "',";
            $strSql .= "'" . $emp_fname . "',";
            $strSql .= "'" . $Training_set . "',";
            $strSql .= "'" . $Module . "',";
            $strSql .= "'" . $Code_Course . "',";
            $strSql .= "'" . $Code_Name . "',";
            $strSql .= "'" . $Training_Status . "',";
            $strSql .= "'" . $Biz . "',";
            $strSql .= "'" . $Dep . "',";
            $strSql .= "'" . $Sec . "',";
            $strSql .= "'" . $Task . "',";
            $strSql .= "'" . $Position . "',";
            $strSql .= "'" . $site . "',";
            $strSql .= "'" . $start_date . "',";
            $strSql .= "'" . $end_date . "',";
            $strSql .= "'" . $training_day . "',";
            $strSql .= "'" . $institute . "',";
            $strSql .= "'" . $location . "',";
            $strSql .= "'" . $type_course . "',";
            $strSql .= "'" . $year . "',";
            $strSql .= "'" . $cost . "',";
            $strSql .= "" . 1 . ")";
            //echo $strSql . "<br>";
        
            $statement = $conn->prepare($strSql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $statement->execute();
            //$result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $nRecCount = $statement->rowCount();            
            
            if ($nRecCount <0)
            {   
                /*             
                echo "<script>
                        alert('Warning! Cannot add data!');
                        window.location.href='p11.php';
                    </script>";
                */
                //echo "Cannot insert into History_Using ...!";
            }
            else
            {
                /*             
                echo "<script>
                        alert('Warning! Cannot add data!');
                        window.location.href='p11.php';
                    </script>";
                */
                //echo "Insert into History_Using complete ...!";
            }
        }
        catch(PDOException $e)
        {      
            echo $e->getMessage();
            /*
            echo "<script> 
                    alert('Error!" . substr($e->getMessage(),0,105) . " '); 
                    window.location.href='p11.php'; 
                </script>";
            */            
        }
    }
?>

<body>
    <div class="container">
        <br>                    
        <div class="panel panel-info">
            <div class="panel-heading">
                <?php echo "Upload Training Record data - File name is " . $_FILES["param_fileCSV"]["name"]; ?>
                <div class="pull-right">
                    
                </div>
            </div>

            <div class="panel-body">
                <label>Process 1. Upload to temps folder </label>
                <br>
                <?php
                    $lProcess1 = 0;
                    $lProcess2 = 0;
                    $lProcess3 = 0;
                    $lProcess3_1 = 0;
                    $lProcess3_2 = 0;
                    $lProcess3_3 = 0;
                    $lProcess3_4 = 0;
                    $lProcess3_5 = 1;
                    $lProcess4 = 0;
                    $lProcess5 = 0;
                    $lProcess6 = 0;
                    $lProcess7 = 0;
                    $lProcess8 = 0;
                    $lData_Type = 0; 

                    try
                    {
                        move_uploaded_file($_FILES["param_fileCSV"]["tmp_name"], "temps/".$_FILES["param_fileCSV"]["name"]);
                        $lProcess1 = 1;
                        echo "Pass" . "<br><br>";
                    }
                    catch(PDOException $e)
                    {
                        $lProcess1 = 0;
                        echo $e->getMessage();
                    }        

                    if ($lProcess1 == 1)
                    {
                        echo "<label>Process 2. Check Number of Column</label>";
                        echo "<br>";
                        try
                        {               
                            $objCSV = fopen("temps/" . $_FILES["param_fileCSV"]["name"], "r");
                            if (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE)
                            {
                                if (sizeof($objArr) !== 22)
                                {
                                    $lProcess2 = 0;
                                    echo "<h7 style='color:red'>";
                                    echo "!!! Error number of columns must be 22 columns, but number of columns = " . sizeof($objArr) . "</h7>" . "<br>";                                        
                                    echo "<br>";
                                }
                                else
                                {
                                    $lProcess2 = 1;
                                    echo "Correct number of columns = " . sizeof($objArr) . "<br>";                    
                                    echo "<br>";
                                }
                            }
                            fclose($objCSV);
                        }
                        catch(PDOException $e)
                        {
                            $lProcess2 = 0;
                            echo $e->getMessage();
                        }  
                    }

                    if (($lProcess1 == 1) && ($lProcess2 == 1))
                    {
                        echo "<label>Process 3. Check Column Name</label>";
                        echo "<br>";
                        try
                        {                                       
                            $objCSV = fopen("temps/" . $_FILES["param_fileCSV"]["name"], "r");
                            if (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE)
                            {
                                foreach ($objArr as $key => $value)
                                {                                       
                                    if (($key+1) == 1)
                                    {                                                                                
                                        if (strpos($value,'emp_code') < 0)
                                        {
                                            $lProcess3_1 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column A must be 'emp_code', but name of column A is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_1 = 1;
                                            echo "Correct name of column A is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 2)                                     
                                    {
                                        // echo $value ."<br>";
                                        // echo strlen($value) . "<br>";

                                        if ($value !== 'emp_fname')
                                        {
                                            $lProcess3_2 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column B must be 'emp_fname', but name of column B is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_2 = 1;
                                            echo "Correct name of column B is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 3)                                     
                                    {
                                        if ($value !== 'Training_set')
                                        {
                                            $lProcess3_3 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column C must be 'Training_set', but name of column C is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_3 = 1;
                                            echo "Correct name of column C is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 4)                                     
                                    {
                                        if ($value !== 'Module')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column D must be 'Module', but name of column D is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column D is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 5)                                     
                                    {
                                        if ($value !== 'Code_Course')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column E must be 'Code_Course', but name of column E is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column E is '" . $value . "' <br>";                                       
                                        }
                                    }

                                    elseif (($key+1) == 6)                                     
                                    {
                                        if ($value !== 'Code_Name')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column F must be 'Code_Name', but name of column F is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column F is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 7)                                     
                                    {
                                        if ($value !== 'Training_Status')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column G must be 'Training_Status', but name of column G is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column G is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 8)                                     
                                    {
                                        if ($value !== 'Biz')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column H must be 'Biz', but name of column H is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column H is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 9)                                     
                                    {
                                        if ($value !== 'Dep')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column I must be 'Dep', but name of column I is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column I is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 10)                                     
                                    {
                                        if ($value !== 'Sec')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column J must be 'Sec', but name of column J is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column J is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 11)                                     
                                    {
                                        if ($value !== 'Task')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column K must be 'Task', but name of column K is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column K is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 12)                                     
                                    {
                                        if ($value !== 'Position')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column L must be 'Position', but name of column L is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column L is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 13)                                     
                                    {
                                        if ($value !== 'site')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column M must be 'site', but name of column M is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column M is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 14)                                     
                                    {
                                        if ($value !== 'status')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column N must be 'status', but name of column N is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column N is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 15)                                     
                                    {
                                        if ($value !== 'start_date')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column O must be 'start_date', but name of column O is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column O is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 16)                                     
                                    {
                                        if ($value !== 'end_date')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column P must be 'end_date', but name of column P is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column P is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 17)                                     
                                    {
                                        if ($value !== 'training_day')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column Q must be 'training_day', but name of column Q is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column Q is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 18)                                     
                                    {
                                        if ($value !== 'institute')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column R must be 'institute', but name of column R is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column R is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 19)                                     
                                    {
                                        if ($value !== 'location')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column S must be 'location', but name of column S is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column S is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 20)                                     
                                    {
                                        if ($value !== 'type_course')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column T must be 'type_course', but name of column T is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column T is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 21)                                     
                                    {
                                        if ($value !== 'year')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column U must be 'year', but name of column U is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column U is '" . $value . "' <br>";                                       
                                        }
                                    }
                                    elseif (($key+1) == 22)                                     
                                    {
                                        if ($value !== 'cost')
                                        {
                                            $lProcess3_4 = 0;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error name of column U must be 'cost', but name of column U is '" . $value . "'" . "</h7>" . "<br>";                                        
                                        }
                                        else
                                        {
                                            $lProcess3_4 = 1;
                                            echo "Correct name of column U is '" . $value . "' <br>";                                       
                                        }
                                    }
                                }
                                echo "<br>";
                            }
                            fclose($objCSV);     
                            if (($lProcess3_1 == 1) && ($lProcess3_2 == 1) && ($lProcess3_3 == 1) && ($lProcess3_4 == 1) && ($lProcess3_5 == 1))           
                            {
                                $lProcess3 = 1;
                            }
                            else
                            {
                                $lProcess3 = 0;
                            }

                        }
                        catch(PDOException $e)
                        {
                            $lProcess3 = 0;
                            echo $e->getMessage();
                        }  
        
                    }

                    if (($lProcess1 == 1) && ($lProcess2 == 1) && ($lProcess3 == 1))
                    {
                        try
                        {
                            $nCurRec_No = 0;
                            $lData_Type = 0; 
                            echo "<label>Process 4. Check Data Type</label>";
                            echo "<br>";
                            require_once('include/db_Conn.php');
                            $objCSV = fopen("temps/" . $_FILES["param_fileCSV"]["name"], "r");
                                                        
                            while (($objArr = fgetcsv($objCSV, 10000, ",")) !== FALSE)
                            {
                                $nCurRec_No = $nCurRec_No + 1;
                                foreach ($objArr as $key => $value)
                                {
                                    if ($key == 0)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column A / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column A / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }
                                    else if ($key == 1)
                                    {
                                        if ($nCurRec_No > 1)
                                        {
                                            if ((is_numeric($value)) && ($nCurRec_No > 1))
                                            {
                                                $lData_Type += 1;
                                                echo "<h7 style='color:red'>";
                                                echo "!!! Error on line " . $nCurRec_No .  " - column B / data not string [ ". $value ." ] </h7>" . "<br>";
                                            }
                                            if (($value == "") && ($nCurRec_No > 1))
                                            {
                                                $lData_Type += 1;
                                                echo "<h7 style='color:red'>";
                                                echo "!!! Error on line " . $nCurRec_No .  " - column B / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                            }
                                        }
                                    }   
                                    else if ($key == 2)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column C / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column C / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 3)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column D / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column D / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 4)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column E / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column E / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 5)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column F / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column F / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 6)
                                    {
                                        if ($nCurRec_No > 1)
                                        {
                                            if (($value == "1") || ($value == "0") || ($value == ""))
                                            {                                         
                                            }
                                            else
                                            {
                                                $lData_Type += 1;
                                                echo "<h7 style='color:red'>";
                                                echo "!!! Error on line " . $nCurRec_No .  " - column G / data must be '1' or '0'  or ''  but data is [ ". $value ." ] </h7>" . "<br>";
                                            }   
                                        }
                                    }   
                                    else if ($key == 7)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column H / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column H / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 8)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column I / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column I / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 9)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column J / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column J / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 10)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column K / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column K / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 11)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column L / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column L / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 12)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column M / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column M / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 13)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column N / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column N / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 14)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column O / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column O / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 15)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column P / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column P / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 16)
                                    {
                                        if ((floatval((string)$value) == 0) && ((string)$value <> "0") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column Q / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column Q / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 17)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column R / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column R / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 18)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column S / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column S / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 19)
                                    {
                                        if ((is_numeric($value)) && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column T / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column T / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 20)
                                    {
                                        if ((floatval((string)$value) == 0) && ((string)$value <> "0") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column U / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column U / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                    else if ($key == 21)
                                    {
                                        if ((floatval((string)$value) == 0) && ((string)$value <> "0") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column V / data not string [ ". $value ." ] </h7>" . "<br>";
                                        }
                                        if (($value == "") && ($nCurRec_No > 1))
                                        {
                                            $lData_Type += 1;
                                            echo "<h7 style='color:red'>";
                                            echo "!!! Error on line " . $nCurRec_No .  " - column V / data is blank [ ". $value ." ] </h7>" . "<br>";    
                                        }
                                    }   
                                
                                }
                            }
                            fclose($objCSV);

                            if($lData_Type > 0)
                            {                    
                                $lProcess4 = 0;
                                echo "<h7 style='color:red'>";
                                echo "   *** Finished Process 4 with error [ " . $lData_Type . " errors ] *** " . "</h7>" . "<br>";
                                echo "<br>";
                            }
                            else
                            {                  
                                $lProcess4 = 1;  
                                echo "<h7 style='color:green'>";
                                echo "   *** Finished Process 4 complete *** " . "</h7>" . "<br>";
                                echo "<br>";
                            }
                        }
                        catch(PDOException $e)
                        {
                            $lProcess4 = 0;
                            echo $e->getMessage();
                        }
                    }


                    if (($lProcess1 == 1) && ($lProcess2 == 1) && ($lProcess3 == 1) && ($lProcess4 == 1))
                    {
                        echo "<label>Process 6. Upload data to temporary customer master data </label>";
                        echo "<br>";

                        $emp_code = "";
                        $emp_fname ="";
                        $Training_set ="";
                        $Module ="";
                        $Code_Course ="";
                        $Code_Name ="";
                        $Training_Status = "";
                        $Biz = "";
                        $Dep ="";
                        $Sec ="";
                        $Task ="";
                        $Position ="";
                        $site ="";
                        $status ="";
                        $start_date ="";
                        $end_date ="";
                        $training_day ="";
                        $institute ="";
                        $location ="";
                        $type_course ="";
                        $year ="";
                        $cost ="";


                        try
                        {
                            require_once('include/db_Conn.php');
                            $objCSV = fopen("temps/" . $_FILES["param_fileCSV"]["name"], "r");
                                                        
                            $nCurRec_No = 0;
                            while (($objArr = fgetcsv($objCSV, 10000, ",")) !== FALSE)
                            {
                                $nCurRec_No = $nCurRec_No + 1;
                                foreach ($objArr as $key => $value)
                                {
                                    if ($nCurRec_No > 1)
                                    {
                                        if ($key == 0)
                                        {
                                            $emp_code = $value;
                                        }
                                        else if ($key == 1)
                                        {
                                            $emp_fname = $value;
                                        }
                                        else if ($key == 2)
                                        {
                                            $Training_set = $value;
                                        }
                                        else if ($key == 3)
                                        {
                                            $Module = $value;
                                        }
                                        else if ($key == 4)
                                        {
                                            $Code_Course = $value;
                                        }
                                        else if ($key == 5)
                                        {
                                            $Code_Name = $value;
                                        }
                                        else if ($key == 6)
                                        {
                                            $Training_Status = $value;
                                        }
                                        else if ($key == 7)
                                        {
                                            $Biz = $value;
                                        }
                                        else if ($key == 8)
                                        {
                                            $Dep = $value;
                                        }
                                        else if ($key == 9)
                                        {
                                            $Sec = $value;
                                        }
                                        else if ($key == 10)
                                        {
                                            $Task = $value;
                                        }
                                        else if ($key == 11)
                                        {
                                            $Position = $value;
                                        }
                                        else if ($key == 12)
                                        {
                                            $site = $value;
                                        }
                                        else if ($key == 13)
                                        {
                                            $status = $value;
                                        }
                                        else if ($key == 14)
                                        {
                                            $start_date = $value;
                                        }
                                        else if ($key == 15)
                                        {
                                            $end_date = $value;
                                        }
                                        else if ($key == 16)
                                        {
                                            $training_day = $value;
                                        }
                                        else if ($key == 17)
                                        {
                                            $institute = $value;
                                        }
                                        else if ($key == 18)
                                        {
                                            $location = $value;
                                        }
                                        else if ($key == 19)
                                        {
                                            $type_course = $value;
                                        }
                                        else if ($key == 20)
                                        {
                                            $year = $value;
                                        }
                                        else if ($key == 21)
                                        {
                                            $cost = $value;
                                        }
                                    }
                                }
                                if ($nCurRec_No > 1)
                                {
                                    //echo $nCurRec_No . " " . $sCM_Addr . "  " . $sDis_Channel . " " . $sCM_Sort . " " . $sCM_Data_Type . "<br>";
                                    $status_Training = '1';
                                    $strSql = "INSERT INTO MAS_TRAINING_ROADMAP_GENERATE (emp_code, emp_fname, Training_set, Module, Code_Course, Code_Name, Training_Status, Biz, Dep, Sec, Task, Position, site, status, start_date, end_date, training_day, institute, location, type_course, year, cost) ";
                                    $strSql .= "VALUES(";
                                    $strSql .= "'" . $emp_code . "',";
                                    $strSql .= "'" . $emp_fname . "',";
                                    $strSql .= "'" . $Training_set . "',";
                                    $strSql .= "'" . $Module . "',";
                                    $strSql .= "'" . $Code_Course . "',";
                                    $strSql .= "'" . $Code_Name . "',";
                                    $strSql .= "'" . $Training_Status . "',";
                                    $strSql .= "'" . $Biz . "',";
                                    $strSql .= "'" . $Dep . "',";
                                    $strSql .= "'" . $Sec . "',";
                                    $strSql .= "'" . $Task . "',";
                                    $strSql .= "'" . $Position . "',";
                                    $strSql .= "'" . $site . "',";
                                    $strSql .= "'" . $status . "',";
                                    $strSql .= "'" . $start_date . "',";
                                    $strSql .= "'" . $end_date . "',";
                                    $strSql .= "'" . $training_day . "',";
                                    $strSql .= "'" . $institute . "',";
                                    $strSql .= "'" . $location . "',";
                                    $strSql .= "'" . $type_course . "',";
                                    $strSql .= "'" . $year . "',";
                                    $strSql .= "'" . $cost . "')";
                                    echo $strSql . "<br>";
                            
                                    $statement = $conn->prepare($strSql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                                    $statement->execute();

                                }
                            }
                            fclose($objCSV);

                            $lProcess6 = 1;
                            echo "Pass" . "<br><br>";
                        }
                        catch(PDOException $e)
                        {      
                            $lProcess6 = 0;
                            echo $e->getMessage();
                        }
                    }

                  
                   
                    /*
                    echo "lProcess1 = " . $lProcess1;
                    echo "<br>";
                    echo "lProcess2 = " . $lProcess2;
                    echo "<br>";
                    echo "lProcess3_1 = " . $lProcess3_1;
                    echo "<br>";
                    echo "lProcess3_2 = " . $lProcess3_2;
                    echo "<br>";
                    echo "lProcess3_3 = " . $lProcess3_3;
                    echo "<br>";
                    echo "lProcess3_4 = " . $lProcess3_4;
                    echo "<br>";
                    echo "lProcess3_5 = " . $lProcess3_5;
                    echo "<br>";
                    echo "lProcess3 = " . $lProcess3;
                    echo "<br>";
                    echo "lProcess4 = " . $lProcess4;
                    echo "<br>";
                    echo "lProcess5 = " . $lProcess5;
                    echo "<br>";
                    echo "lProcess6 = " . $lProcess6;
                    echo "<br>";
                    echo "lProcess7 = " . $lProcess7;
                    echo "<br>";
                    echo "lProcess8 = " . $lProcess8;
                    echo "<br>";
                    */
                ?>  

            </div>
        </div>

        <button type="submit" style="float: right; margin:2px;" class="btn btn-success" 
            onclick ="javascript:window.location.href='pMain.php';return false;">
            Main Page
        </button>    
    </div>
</body>
</html>
