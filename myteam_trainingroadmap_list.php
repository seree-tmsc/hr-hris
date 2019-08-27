<style>
        .dropdown-menu {
            min-width: 0px !important;
        }
</style>

<div class='table-responsive'>
    <table class='table table-bordered table-hover' id='myTable'>
        <thead>
            <tr class='info'>
                <th class='text-center' style='width:5%;'>Biz.</th>
                <th class='text-center' style='width:5%;'>Dept.</th>
                <th class='text-center' style='width:5%;'>Sec.</th>
                <th class='text-center' style='width:15%;'>Module</th>
                <th style='width:20%;'>Code Course</th>
                <th style='width:20%;'>Course Content</th>
                <th class='text-center' style='width:20%;'>course Name</th>
                <th style='width:10%;'>Position</th>                
                <!--<th class='text-center' style='width:10%;'>More</th>-->
        
            </tr>
        </thead>
        <tbody>
<?php
    //$strSql = "SELECT BIZ,DEP,SEC,Module,Code_Course,Course_Content,Course_Name,Position " ;
    //$strSql .= "FROM MAS_TRAINING_ROADMAP_NEW " ;

    //$strSql = "SELECT T.*, E.job_department, E.job_position ";
    //$strSql .= "FROM MAS_TRAINING_ROADMAP_NEW AS T INNER JOIN Emp_main AS E ON T.DEP = E.job_department and T.Position = E.job_position ";
    //$strSql .= "WHERE " . substr($condition, 2, strlen($condition)-2);    
    ///$strSql .= "ORDER BY SEC,Position,Code_Course" ;
    //$strSql .= "ORDER BY job_business, job_department, emp_code" ;

    $strSql = "SELECT T.*, E.job_department, E.job_position ";
    $strSql .= "FROM MAS_TRAINING_ROADMAP_NEW AS T INNER JOIN Emp_main AS E ON T.DEP = E.job_department and T.SEC = E.job_section and T.Position = E.job_position ";
    $strSql .= "WHERE " . substr($condition, 2, strlen($condition)-2);    
    //$strSql .= "ORDER BY SEC,Position,Code_Course" ;
    $strSql .= "ORDER BY job_business, job_department, emp_code" ;
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
            <td class='text-center'><?php echo $ds['BIZ']; ?></td>
                        <td class='text-center'><?php echo $ds['DEP']; ?></td>
                        <td class='text-center'><?php echo $ds['SEC']; ?></td>
                        <td class='text-center'><?php echo $ds['Module']; ?></td>
                        <td class='text-center'><?php echo $ds['Code_Course']; ?></td>
                        <td class='text-center'><?php echo $ds['Course_Content']; ?></td>
                        <td class='text-center'><?php echo $ds['Course_Name']; ?></td>
                        <td class='text-center'><?php echo $ds['Position']; ?></td>   
                               
                <!--<td class='text-center'><a href="<?php //echo $ds['attachment']; ?>" target="_blank">Click</a></td>-->
            </tr>
<?php
        }
    }
?>
        </tbody>
    </table>
</div>
