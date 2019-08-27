<?php
    try
    {        
        require_once("include/library.php");
        include('include/db_Conn.php');
       
        $strSql = "select E.emp_code,E.emp_efname,E.job_business,E.job_department,E.job_section,E.job_task,E.job_position,S.BIZ,S.DEP,S.SEC,S.TASK,S.Position,S.TrainingSET,D.Code_Course,D.Course_Name,D.Skill,D.Module ";
        $strSql .= "FROM Emp_Main AS E INNER JOIN MAS_TRAINING_SET_MASTER AS S ON E.job_business = S.BIZ and E.job_department = S.DEP and E.job_section = S.SEC and E.job_position = S.Position INNER JOIN MAS_TRAINING_SET_DETAIL AS D ON S.TrainingSET = D.TrainingSET ";
        $strSql .= "where job_business='" . $_POST['Select_By_BUSI'] . "' and DEP='" . $_POST['Select_By_DEPT'] . "'  and E.emp_code='" . $_POST['Select_By_Emp'] . "' ";
        $strSql .= "Order by emp_code ";
        echo $strSql . "<br>";        

        $statement = $conn->prepare($strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $statement->execute();  
        $nRecCount = $statement->rowCount();
        echo $nRecCount . "<br>";         
      
        $nCurRec = 0;

        if ($nRecCount >0)
        {            
            while ($ds = $statement->fetch(PDO::FETCH_NAMED)) 
            {
                $nCurRec += 1;
                //echo $nCurRec . "<br>";
                $strSql1 = "INSERT INTO MAS_TRAINING_ROADMAP_GENERATE(";
                $strSql1 .= "emp_code,";
                $strSql1 .= "emp_fname,";
                $strSql1 .= "Training_set,";
                $strSql1 .= "Module,";
                $strSql1 .= "Code_Course,";
                $strSql1 .= "Code_Name,";
                $strSql1 .= "Biz,Dep,";
                $strSql1 .= "Sec,";
                $strSql1 .= "Task,";
                $strSql1 .= "Position,";
                $strSql1 .= "Training_Status) ";
                $strSql1 .= "VALUES('" . $ds['emp_code'] . "',";
                $strSql1 .= "'" . $ds['emp_efname'] . "',";                
                $strSql1 .= "'" . $ds['TrainingSET'] . "',";
                $strSql1 .= "'" . $ds['Module'] . "',";
                $strSql1 .= "'" . $ds['Code_Course'] . "',";
                $strSql1 .= "'" . $ds['Course_Name'] . "',";
                $strSql1 .= "'" . $ds['BIZ'] . "',";
                $strSql1 .= "'" . $ds['DEP'] . "',";
                $strSql1 .= "'" . $ds['SEC'] . "',";
                $strSql1 .= "'" . $ds['TASK'] . "',";
                $strSql1 .= "'" . $ds['job_position'] . "',";
                $strSql1 .= "'0')";
                echo $strSql1 . "<br>";
                
                $statement1 = $conn->prepare( $strSql1, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                $statement1->execute();  
                $nRecCount = $statement1->rowCount();                
            }
            
            $strSql1 = "SELECT * " ; 
            $strSql1 .= "FROM MAS_TRAINING_ROADMAP_GENERATE " ;
            $strSql1 .= "ORDER BY emp_code ";
            $strSql1 . "<br>";
            //echo $strSql1 . "<br>";
    
            $statement1 = $conn->prepare( $strSql1, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
            $statement1->execute();  
            $nRecCount1 = $statement1->rowCount();            
            //echo $nRecCount1;

            if ($nRecCount1>0)
            {
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered table-hover' id='myTable'>";
                echo "<thead>";
                echo "<tr class='info'>";            
                echo "<th class='text-center'>emp-code</th>";
                echo "<th class='text-center'>emp-fname</th>";
                echo "<th class='text-center'>Training-Set</th>";
                echo "<th class='text-center'>Module</th>";
                echo "<th class='text-center'>Code-Course</th>";
                echo "<th class='text-center'>Course-Name</th>";
                echo "<th class='text-center'>Training_Status</th>";

                while ($ds1 = $statement1->fetch(PDO::FETCH_NAMED))
                {
                    echo "<tr>";                    
                    echo "<td>" . $ds1['emp_code'] . "</td>";
                    echo "<td>" . $ds1['emp_fname'] . "</td>";
                    echo "<td>" . $ds1['Training_set'] . "</td>";
                    echo "<td class='text-center'>" . $ds1['Module'] . "</td>";
                    echo "<td class='text-center'>" . $ds1['Code_Course'] . "</td>";
                    echo "<td class='text-center'>" . $ds1['Code_Name'] . "</td>";
                    if($ds1['Training_Status'] == '0')
                    {
                        echo "<td class='text-center'>" . "<input type='checkbox'>" . "</td>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    else
                    {
                        echo "<td class='text-center'>" . $ds1['Training_Status'] . "</td>";
                        echo "</td>";
                        echo "</tr>";
                    }                    
                }
            }
            else
            {
                echo "<script> 
                    alert('Error! ... No Data of MAS_TRAINING_ROADMAP_GENERATE ...'); 
                    window.close(); 
                </script>";
            }
        }
        else
        {
            echo "<script> 
                alert('Error! ... No Data of MAS_TRAINING_SET_MASTER or MAS_TRAINING_SET_DETAIL ...'); 
                window.close(); 
            </script>";
        }
    }
    catch(PDOException $e)
    {         
        echo "<script> 
                alert('Error!" . substr($e->getMessage(),0,105) . " '); 
                window.close(); 
            </script>";
    }
?>