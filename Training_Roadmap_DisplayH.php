<?php
    //echo "USER = " . $param_emp_email . "<br>";
    /*----------------------------------*/
    /*--- Query User Information ---*/
    /*----------------------------------*/
    include_once('include/db_Conn.php');  
    $strSql = "SELECT emp_code,emp_efname,Job_business,job_department,job_grade,job_position " ;
    $strSql .= "FROM Emp_Main " ;
    $strSql .= "WHERE emp_code='". $param_emp_code . "' ";
    $strSql .= "ORDER BY emp_code ";
    /*echo $strSql . "<br>";*/
    
    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    /*echo "Record Count = " . $nRecCount ."<br>";*/   
    $ds = $statement->fetch(PDO::FETCH_NAMED);

    if ($nRecCount == 1)
    {
    /*echo $ds["Job_business"] . "<br>";
    echo $ds["job_department"] . "<br>";
    echo $ds["job_grade"] . "<br>";
    echo $ds["job_position"] . "<br>"; */

?>        
        <h3 align="center"><font color="Green">Training Roadmap Data</font></h3>
        <div class='table-responsive'>
            <table class='table table-bordered table-hover' id='myTable' style='width:100%;' align="center">
                <thead>
                    <tr class='info'>                
                        <th style='width:20%;' class='text-center'>Module_Name </th>
                        <th style='width:30%;' class='text-center'>Course_Code</th>
                        <th style='width:80%;' class='text-center'>Course_Detail</th>
                        <th style='width:25%;' class='text-center'>Course_Type</th>
                        <th style='width:25%;' class='text-center'>Position</th>
                    </tr>
                </thead>
                <tbody>

<?php
             include('include/db_Conn.php');

             $Sql = "SELECT * " ;
             $Sql .= "FROM MAS_Training_Roadmap INNER JOIN MAS_Training_Course ON MAS_Training_Roadmap.Code_Course = MAS_Training_Course.Course_Code " ;
             $Sql .= "WHERE Job_business='". $ds["Job_business"] . "' and Job_department='". $ds["job_department"] ."' and Position ='". $ds["job_position"] ."' and JG='". $ds["job_grade"] ."' ";
            /* echo $Sql . "<br>";*/
             
             $statement = $conn->prepare( $Sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
             $statement->execute();  
             $nRecCount = $statement->rowCount();


                    while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                    { 
?> 
                        <tr>
                            <td class='text-center'><?php echo $ds['Module_Name']; ?></td>
                            <td class='text-center'><?php echo $ds['Course_Code']; ?></td>
                            <td class='text-center'><?php echo $ds['Course_Detail']; ?></td>
                            <td class='text-center'><?php echo $ds['Course_Type']; ?></td>
                            <td class='text-center'><?php echo $ds['Position']; ?></td>
                        </tr>
<?php
                    }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    }
    else
    {
        echo "No data";
    }
?>