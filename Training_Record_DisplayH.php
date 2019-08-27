<h3 align="center"><font color="Green">Training History Data</font></h3>
        <div class='table-responsive'>
            <table class='table table-bordered table-hover' id='myTable' style='width:100%;' align="center">
                <thead>
                    <tr class='info'>
                        <th style='width:40%;' class='text-center'>Emp-Code</th>
                        <th style='width:40%;' class='text-center'>Emp_Name</th>
                        <th style='width:40%;' class='text-center'>Training-Set</th>
                        <th style='width:60%;' class='text-center'>Module</th>
                        <th style='width:15%;' class='text-center'>Code-Course</th>
                        <th style='width:60%;' class='text-center'>Code-Name</th>
                        <th style='width:10%;' class='text-center'>Training-Status</th>
                        <th style='width:10%;' class='text-center'>Start-Date</th>
                        <th style='width:10%;' class='text-center'>End-Date</th>
                        <th style='width:10%;' class='text-center'>Training_Day</th>
                        <th style='width:10%;' class='text-center'>Institute</th>
                        <th style='width:10%;' class='text-center'>Location</th>
                        <th style='width:10%;' class='text-center'>Type-Course</th>
                        <th style='width:10%;' class='text-center'>Year</th>
                        <th style='width:10%;' class='text-center'>Cost</th>
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
    //echo "USER = " . $param_emp_email . "<br>";
    /*----------------------------------*/
    /*--- Query User Information ---*/
    /*----------------------------------*/   
    include_once('include/db_Conn.php');   
    //$strSql = "SELECT * " ;
    //$strSql .= "FROM MAS_Training_Record INNER JOIN MAS_Training_Course ON MAS_Training_Record.Code_Course = MAS_Training_Course.Course_Code " ;
    $strSql = "SELECT emp_code,emp_fname,Training_set,Module,Code_Course,Code_Name,Training_Status,start_date,end_date,training_day,institute,location,type_course,year,cost " ;
    $strSql .= "FROM MAS_TRAINING_ROADMAP_GENERATE " ;
    $strSql .= "WHERE emp_code='". $param_emp_code . "' and Training_Status='1' ";
    $strSql .= "ORDER BY start_date ";
    //echo $strSql . "<br>";
    
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
                            <td class='text-center'><?php echo $ds['emp_code']; ?></td>
                            <td class='text-center'><?php echo $ds['emp_fname']; ?></td>
                            <td class='text-center'><?php echo $ds['Training_set']; ?></td>
                            <td class='text-center'><?php echo $ds['Module']; ?></td>
                            <td class='text-center'><?php echo $ds['Code_Course']; ?></td>
                            <td class='text-center'><?php echo $ds['Code_Name']; ?></td>
                            <td class='text-center'><?php echo $ds['Training_Status']; ?></td>
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
                $strSql = "SELECT emp_code,emp_fname,Training_set,Module,Code_Course,Code_Name,Training_Status,start_date,end_date,training_day,institute,location,type_course,year,cost " ;
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
                    $rowArray = array("emp_code", "emp_fname", "Training_set", "Module", "Code_Course", "Code_name", "Training_Status", "start_date", "end_date", "training_day", "institute", "location", "type_course", "year", "cost");
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
                                        $ds["Training_Status"], 
                                        $ds["start_date"], 
                                        $ds["end_date"], 
                                        $ds["training_day"], 
                                        $ds["institute"], 
                                        $ds["location"], 
                                        $ds["type_course"], 
                                        $ds["year"], 
                                        $ds["cost"]);        
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


