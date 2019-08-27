<style>
        .dropdown-menu {
            min-width: 0px !important;
        }
</style>

<div class='table-responsive'>
    <table class='table table-bordered table-hover' id='myTable'>
        <thead>
            <tr class='info'>
                <th class='text-center' style='width:5%;'>Emp_Code.</th>
                <th class='text-center' style='width:5%;'>Name_Surname.</th>
                <th class='text-center' style='width:5%;'>Position.</th>
                <th class='text-center' style='width:5%;'>Module.</th>
                <th class='text-center' style='width:15%;'>Code_Course</th>
                <th style='width:20%;'>Course_name</th>
                <th style='width:20%;'>Institute</th>
                <th class='text-center' style='width:15%;'>Location</th>
                <th style='width:5%;'>Type_Course</th>       
                <th style='width:5%;'>Start_Date</th>       
                <th style='width:5%;'>End_Date</th>   
                <th style='width:5%;'>Duration</th>
                <th style='width:5%;'>Year</th>                           
                <!--<th class='text-center' style='width:10%;'>More</th> -->
        
            </tr>
        </thead>
        <tbody>

<?php
    //$strSql = "SELECT BIZ,DEP,SEC,Module,Code_Course,Course_Content,Course_Name,Position " ;
    //$strSql .= "FROM MAS_TRAINING_ROADMAP_NEW " ;

    $strSql = "SELECT T.*, E.job_department, E.job_position ";
    $strSql .= "FROM MAS_TRAINING_RECORD_NEW AS T INNER JOIN Emp_main AS E ON T.DEPt = E.job_department and T.Position = E.job_position and T.Section = E.job_section ";
    $strSql .= "WHERE " . substr($condition, 2, strlen($condition)-2);    
    //$strSql .= "ORDER BY SEC,Position,Code_Course" ;
    $strSql .= "ORDER BY start_date,job_business, job_department, emp_code" ;
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
            <td class='text-center'><?php echo $ds['Emp_Code']; ?></td>
                        <td class='text-center'><?php echo $ds['Name_Surname']; ?></td>
                        <td class='text-center'><?php echo $ds['Position']; ?></td>
                        <td class='text-center'><?php echo $ds['Module']; ?></td>
                        <td class='text-center'><?php echo $ds['Code_Course']; ?></td>
                        <td class='text-center'><?php echo $ds['Course_name']; ?></td>
                        <td class='text-center'><?php echo $ds['Institute']; ?></td>
                        <td class='text-center'><?php echo $ds['Location']; ?></td>
                        <td class='text-center'><?php echo $ds['Type_Course']; ?></td>
                        <td class='text-center'><?php echo $ds['Start_Date']; ?></td>
                        <td class='text-center'><?php echo $ds['End_Date']; ?></td>
                        <td class='text-center'><?php echo $ds['Duration']; ?></td>
                        <td class='text-center'><?php echo $ds['Year']; ?></td>   
                               
                <!--<td class='text-center'><a href="<?php //echo $ds['attachment']; ?>" target="_blank">Click</a></td>-->
            </tr>
<?php
        }
    }
?>
        </tbody>
    </table>
</div>
