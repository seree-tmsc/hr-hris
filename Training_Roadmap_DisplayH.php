<?php
    //echo "USER = " . $param_emp_email . "<br>";
    /*----------------------------------*/
    /*--- Query User Information ---*/
    /*----------------------------------*/
    include_once('include/db_Conn.php');  
    $strSql = "SELECT emp_code,emp_efname,Job_business,job_department,job_grade,job_position,job_section " ;
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
                        <th style='width:10%;' class='text-center'>Emp-Code </th>
                        <th style='width:10%;' class='text-center'>Emp-Name</th>
                        <th style='width:20%;' class='text-center'>Training-Set</th>
                        <th style='width:15%;' class='text-center'>Module</th>
                        <th style='width:25%;' class='text-center'>Code-Course</th>
                        <th style='width:30%;' class='text-center'>Code-Name</th>
                        <th style='width:15%;' class='text-center'>Training-Status</th>
                    </tr>   
                </thead>
                <tbody>

        <div class="row">
            <div class="pull-right">                
                <button class="btn btn-success" data-toggle="modal" data-target="#export_modal">
                    <span class="fa fa-cloud-download"></span> 
                    Download CSV File
                </button>                
            </div>
        </div>



<?php
             include('include/db_Conn.php');

             /* $Sql = "SELECT * " ;
             $Sql .= "FROM MAS_Training_Roadmap INNER JOIN MAS_Training_Course ON MAS_Training_Roadmap.Code_Course = MAS_Training_Course.Course_Code " ;
             $Sql .= "WHERE Job_business='". $ds["Job_business"] . "' and Job_department='". $ds["job_department"] ."' and Position ='". $ds["job_position"] ."' and JG='". $ds["job_grade"] ."' ";
             echo $Sql . "<br>";  */

             //$Sql = "SELECT MAS_TRAINING_SET_MASTER.BIZ,MAS_TRAINING_SET_MASTER.DEP,MAS_TRAINING_SET_MASTER.SEC,MAS_TRAINING_SET_MASTER.TASK,MAS_TRAINING_SET_MASTER.Position,MAS_TRAINING_SET_MASTER.TrainingSET,MAS_TRAINING_SET_DETAIL.Code_Course,MAS_TRAINING_SET_DETAIL.Skill,MAS_TRAINING_SET_DETAIL.Course_Name " ;
             //$Sql .= "FROM MAS_TRAINING_SET_MASTER INNER JOIN MAS_TRAINING_SET_DETAIL ON MAS_TRAINING_SET_MASTER.TrainingSET = MAS_TRAINING_SET_DETAIL.TrainingSET " ;
             //$Sql .= "WHERE BIZ='". $ds["Job_business"] . "' and DEP='". $ds["job_department"] ."' and Position ='". $ds["job_position"] ."' and SEC = '". $ds["job_section"] ."' ";
             $Sql = "SELECT emp_code,emp_fname,Training_set,Module,Code_Course,Code_Name,Training_Status ";
             $Sql .= "FROM MAS_TRAINING_ROADMAP_GENERATE ";
             $Sql .= "WHERE BIZ='". $ds["Job_business"] . "' and DEP='". $ds["job_department"] ."' and Position ='". $ds["job_position"] ."' and SEC = '". $ds["job_section"] ."' ";
             //echo $Sql . "<br>";

             $statement = $conn->prepare( $Sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
             $statement->execute();  
             $nRecCount = $statement->rowCount();

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
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    }
    else
    {
        echo "No data";
    }
?>

<!-- Export to Excel -->
<div class="modal fade" id="export_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Generate CSV file</h4>
            </div>
            <div class="modal-body">
<?php
                
                include_once('include/db_Conn.php');   
                $strSql = "SELECT emp_code,emp_fname,Training_set,Module,Code_Course,Code_Name,Training_Status " ;
                $strSql .= "FROM MAS_TRAINING_ROADMAP_GENERATE " ;
                $strSql .= "WHERE emp_code='". $param_emp_code . "' and Training_Status='1' ";
                $strSql .= "ORDER BY emp_code ";
                
                //echo $strSql . "<br>";
                
                $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                $statement->execute();  
                $nRecCount = $statement->rowCount();
                //echo "Record Count = " . $nRecCount ."<br>";

                if ($nRecCount >0)
                {
                    $dataArray = array();
                    $rowArray = array("emp_code", "emp_fname", "Training_set", "Module", "Code_Course", "Code_name", "Training_Status");
                    array_push($dataArray, $rowArray);
                    while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                    {
                        //echo $ds["emp_code"] . "<br>";
                        $rowArray = array($ds["emp_code"], 
                                        $ds["emp_fname"], 
                                        $ds["Training_set"], 
                                        $ds["Module"], 
                                        $ds["Code_Course"], 
                                        $ds["Code_Name"], 
                                        $ds["Training_Status"]);        
                        array_push($dataArray, $rowArray);
                    }

                    $fileName = "tmpTrainingRoadmap.csv";
                    $fp = fopen('tmpTrainingRoadmap.csv', 'w');
                    //for support Thai 
                    fputs($fp,(chr(0xEF).chr(0xBB).chr(0xBF)));

                    foreach ($dataArray as $fields) {
                        fputcsv($fp, $fields);        
                    }

                    fclose($fp);
                    echo "<br>Generate CSV file done.<br><a href=$fileName>Download</a>";
                }
                else
                {

                }
                
?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


