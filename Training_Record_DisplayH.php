<h3 align="center"><font color="Green">Training History Data</font></h3>
        <div class='table-responsive'>
            <table class='table table-bordered table-hover' id='myTable' style='width:100%;' align="center">
                <thead>
                    <tr class='info'>
                        <th style='width:40%;' class='text-center'>Emp_ID</th>
                        <th style='width:40%;' class='text-center'>Module_Name</th>
                        <th style='width:40%;' class='text-center'>Code_Course</th>
                        <th style='width:60%;' class='text-center'>Course_Detail</th>
                        <th style='width:15%;' class='text-center'>Institute</th>
                        <th style='width:60%;' class='text-center'>Location</th>
                        <th style='width:10%;' class='text-center'>Type_Course</th>
                        <th style='width:10%;' class='text-center'>Start_Date</th>
                        <th style='width:10%;' class='text-center'>End_Date</th>
                        <th style='width:10%;' class='text-center'>Training_Day</th>
                        <th style='width:10%;' class='text-center'>Year</th>
                        <th style='width:10%;' class='text-center'>Cost</th>
                    </tr>
                </thead>
                <tbody>
<?php
    //echo "USER = " . $param_emp_email . "<br>";
    /*----------------------------------*/
    /*--- Query User Information ---*/
    /*----------------------------------*/   
    include_once('include/db_Conn.php');   
    $strSql = "SELECT * " ;
    $strSql .= "FROM MAS_Training_Record INNER JOIN MAS_Training_Course ON MAS_Training_Record.Code_Course = MAS_Training_Course.Course_Code " ;
    $strSql .= "WHERE Emp_ID='". $param_emp_code . "' ";
    /*$strSql .= "WHERE Emp_ID='MU-019' ";*/
    $strSql .= "ORDER BY Emp_ID ";
    /*echo $strSql . "<br>";*/
    
    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    /*$ds = $statement->fetch(PDO::FETCH_NAMED);*/
    //echo "Record Count = " . $nRecCount ."<br>";   
?>        
<?php    
                if ($nRecCount >0)
                /* echo "Record Count = " . $nRecCount ."<br>";   */
                {
                    while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                    
                    { 
?> 
                       
                        <tr>
                            <td class='text-center'><?php echo $ds['Emp_ID']; ?></td>
                            <td class='text-center'><?php echo $ds['Module_Name']; ?></td>
                            <td class='text-center'><?php echo $ds['Code_Course']; ?></td>
                            <td class='text-center'><?php echo $ds['Course_Detail']; ?></td>
                            <td class='text-center'><?php echo $ds['Institute']; ?></td>
                            <td class='text-center'><?php echo $ds['Location']; ?></td>
                            <td class='text-center'><?php echo $ds['Type_Course']; ?></td>
                            <td class='text-center'><?php echo $ds['Start_Date']; ?></td>
                            <td class='text-center'><?php echo $ds['End_Date']; ?></td>
                            <td class='text-center'><?php echo $ds['Training_Day']; ?></td>
                            <td class='text-center'><?php echo $ds['Year']; ?></td>
                            <td class='text-center'><?php echo $ds['Cost']; ?></td>
                        </tr>
<?php
                    }
                
                }                   
?>
        </tbody>
    </table>
</div>