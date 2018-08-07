<style>
        .dropdown-menu {
            min-width: 0px !important;
        }
</style>

<div class='table-responsive'>
    <table class='table table-bordered table-hover' id='myTable'>
        <thead>
            <tr class='info'>
            <th style='width:40%;' class='text-center'>Emp_ID</th>
                        <th style='width:40%;' class='text-center'>Name_Surname</th>
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
    //echo substr($condition, 2, strlen($condition)-2) . "<br>";

    $strSql = "SELECT *, E.emp_code as 'Emp_Code' " ;
    $strSql .= "FROM Emp_Main E INNER JOIN MAS_Training_Record R ON E.Emp_Code = R.Emp_ID INNER JOIN MAS_Training_Course ON R.Code_Course = MAS_Training_Course.Course_Code  " ;
    $strSql .= "WHERE " . substr($condition, 2, strlen($condition)-2);    
    $strSql .= "ORDER BY R.Emp_ID" ;
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
            <td class='text-center'><?php echo $ds['Emp_ID']; ?></td>
                        <td class='text-center'><?php echo $ds['Name_Surname']; ?></td>
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
