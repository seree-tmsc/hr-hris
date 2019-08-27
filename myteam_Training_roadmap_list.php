<style>
        .dropdown-menu {
            min-width: 0px !important;
        }
</style>

<div class='table-responsive'>
    <table class='table table-bordered table-hover' id='myTable'>
        <thead>
            <tr class='info'>
            <th style='width:10%;' class='text-center'>Emp-code</th>
                        <th style='width:10%;' class='text-center'>Emp-name</th>
                        <th style='width:10%;' class='text-center'>Training-set</th>
                        <th style='width:10%;' class='text-center'>Module</th>
                        <th style='width:20%;' class='text-center'>Code-Course</th>
                        <th style='width:15%;' class='text-center'>Code-name</th>
                        <th style='width:30%;' class='text-center'>Training-Status</th>
            </tr>
        </thead>
        <tbody>

<?php
    //echo substr($condition, 2, strlen($condition)-2) . "<br>";
   
    //$strSql = "SELECT E.emp_code,E.emp_efname,E.job_business,E.job_department,E.job_position,E.job_grade,R.Module,R.Code_Course,R.Course_Content,R.Course_Name " ;
    //$strSql .= "FROM Emp_Main E INNER JOIN MAS_TRAINING_ROADMAP_NEW R ON E.job_department = R.DEP    " ;
    //$strSql .= "WHERE " . substr($condition, 2, strlen($condition)-2);    
    //$strSql .= "GROUP BY E.emp_code,E.emp_efname,E.job_business,E.job_department,E.job_position,E.job_grade,R.code_Course,R.Course_Content,R.Course_Name,R.Module" ;   
    $strSql = "SELECT emp_code,emp_fname,Training_set,Module,Code_Course,Code_Name,Training_Status " ;
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
                        <td class='text-center'><?php echo $ds['emp_code']; ?></td>
                        <td class='text-center'><?php echo $ds['emp_fname']; ?></td>
                        <td class='text-center'><?php echo $ds['Training_set']; ?></td>
                        <td class='text-center'><?php echo $ds['Module']; ?></td>
                        <td class='text-center'><?php echo $ds['Code_Course']; ?></td>
                        <td class='text-center'><?php echo $ds['Code_Name']; ?></td>
                        <td class='text-center'><?php echo $ds['Training_Status']; ?></td>   
            </tr>
<?php
        }
    }
?>
        </tbody>
    </table>
</div>