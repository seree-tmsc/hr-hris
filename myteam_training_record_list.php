<style>
        .dropdown-menu {
            min-width: 0px !important;
        }
</style>

<div class='table-responsive'>
    <table class='table table-bordered table-hover' id='myTable'>
        <thead>
            <tr class='info'>
            <th style='width:40%;' class='text-center'>Emp-code</th>
                        <th style='width:40%;' class='text-center'>Emp-Name</th>
                        <th style='width:40%;' class='text-center'>Training-set</th>
                        <th style='width:40%;' class='text-center'>Module</th>
                        <th style='width:60%;' class='text-center'>Code-Course</th>
                        <th style='width:15%;' class='text-center'>Code-Name</th>
                        <th style='width:60%;' class='text-center'>Training-Status</th>
                        <th style='width:10%;' class='text-center'>Status</th>
                        <th style='width:10%;' class='text-center'>Start-Date</th>
                        <th style='width:10%;' class='text-center'>End-Date</th>
                        <th style='width:10%;' class='text-center'>Training-Day</th>
                        <th style='width:10%;' class='text-center'>Institute</th>
                        <th style='width:10%;' class='text-center'>Location</th>
                        <th style='width:10%;' class='text-center'>Type-Course</th>
                        <th style='width:10%;' class='text-center'>Year</th>
                        <th style='width:10%;' class='text-center'>Cost</th>
            </tr>
        </thead>
        <tbody>

<?php
    //echo substr($condition, 2, strlen($condition)-2) . "<br>";

    //$strSql = "SELECT *, E.emp_code as 'Emp_Code' " ;
    //$strSql .= "FROM Emp_Main E INNER JOIN MAS_Training_Record R ON E.Emp_Code = R.Emp_ID INNER JOIN MAS_Training_Course ON R.Code_Course = MAS_Training_Course.Course_Code  " ;
    //$strSql .= "WHERE " . substr($condition, 2, strlen($condition)-2);    
    //$strSql .= "ORDER BY R.Emp_ID" ;
    $strSql = "SELECT emp_code,emp_fname,Training_set,Module,Code_Course,Code_Name,Training_Status,status,start_date,end_date,training_day,institute,location,type_course,year,cost " ;
    $strSql .= "FROM MAS_TRAINING_ROADMAP_GENERATE " ;
    $strSql .= "WHERE " . substr($condition, 2, strlen($condition)-2);
    $strSql .= "ORDER BY emp_code " ;
    //echo $strSql . "<br>";

    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo "Record Count = " . $nRecCount ."<br>";

    if ($nRecCount >0)    
    {
        while ($ds = $statement->fetch(PDO::FETCH_NAMED))
        {            
?> 
            <tr>
            <td class='t    ext-center'><?php echo $ds['emp_code']; ?></td>
                        <td class='text-center'><?php echo $ds['emp_fname']; ?></td>
                        <td class='text-center'><?php echo $ds['Training_set']; ?></td>
                        <td class='text-center'><?php echo $ds['Module']; ?></td>
                        <td class='text-center'><?php echo $ds['Code_Course']; ?></td>
                        <td class='text-center'><?php echo $ds['Code_Name']; ?></td>
                        <td class='text-center'><?php echo $ds['Training_Status']; ?></td>
                        <td class='text-center'><?php echo $ds['status']; ?></td>
                        <td class='text-center'><?php echo $ds['start_date']; ?></td>
                        <td class='text-center'><?php echo $ds['end_date']; ?></td>
                        <td class='text-center'><?php echo $ds['training_day']; ?></td>
                        <td class='text-center'><?php echo $ds['institute']; ?></td>
                        <td class='text-center'><?php echo $ds['location']; ?></td>
                        <td class='text-center'><?php echo $ds['type_course']; ?></td>
                        <td class='text-center'><?php echo $ds['year']; ?></td>
                        <td class='text-center'><?php echo $ds['cost']; ?></td>          
            </tr>
<?php
        }
    }
?>
        </tbody>
    </table>
</div>
