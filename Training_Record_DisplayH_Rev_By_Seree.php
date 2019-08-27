<div class="row">
    <div class="col-lg-12 col-md-12">
        <h3 align="center">
            <font color="Green">
                Training History Data
            </font>
        </h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="form-inline">
            Search By: 
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(0)" placeholder="Module..." title="Input Module">

            Search By: 
            <input type="text" class="form-control" id="myInput2" onkeyup="Func_Search2(2)" placeholder="Code name..." title="Input Code name">

            Search By: 
            <input type="text" class="form-control" id="myInput3" onkeyup="Func_Search3(9)" placeholder="Year..." title="Input Year">
        </div>
        <br>
        <div class="pull-right">
            <button class="btn btn-success" data-toggle="modal" data-target="#export_modal">
                <span class="fa fa-cloud-download"></span> 
                Download CSV File
            </button>
        </div>
    </div>
</div>

<br>

<div class='table-responsive'>
    <table class='table table-bordered table-hover' id='myTable' style='width:100%;' align="center">
        <thead>
            <tr class='info'>
                <th class='text-center'>Module</th>
                <th class='text-center'>Code-Course</th>
                <th class='text-center'>Code-Name</th>
                <th class='text-center'>Institute</th>
                <th class='text-center'>Location</th>
                <th class='text-center'>Type-Course</th>
                <th class='text-center'>Start-Date</th>
                <th class='text-center'>End-Date</th>
                <th class='text-center'>Duration</th>
                <th class='text-center'>Year</th>
                
            </tr>
        </thead>
        <tbody>
                    
<?php
    //echo "USER = " . $param_emp_email . "<br>";
    /*----------------------------------*/
    /*--- Query User Information ---*/
    /*----------------------------------*/   
    include_once('include/db_Conn.php');       
    //$strSql = "SELECT * " ;
    //$strSql .= "FROM MAS_TRAINING_RECORD_NEW " ;
    //$strSql .= "WHERE emp_code='". $param_emp_code . "' and Training_Status='1' ";
    //$strSql .= "ORDER BY start_date ";

    $strSql = "SELECT * " ;
    $strSql .= "FROM MAS_TRAINING_RECORD_NEW " ;
    $strSql .= "WHERE emp_code='". $param_emp_code . "' ";
    $strSql .= "ORDER BY Year desc ";
    //echo $strSql . "<br>";
    
    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    /*$ds = $statement->fetch(PDO::FETCH_NAMED);*/
    //echo "Record Count = " . $nRecCount ."<br>";
    if ($nRecCount >0)
    /* echo "Record Count = " . $nRecCount ."<br>";   */
    {
        while ($ds = $statement->fetch(PDO::FETCH_NAMED))
        
        { 
?> 
                       
            <tr>
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
                //$strSql = "SELECT emp_code,emp_fname,Training_set,Module,Code_Course,Code_Name,Training_Status,start_date,end_date,training_day,institute,location,type_course,year,cost " ;
                //$strSql .= "FROM MAS_TRAINING_ROADMAP_GENERATE " ;
                //$strSql .= "WHERE emp_code='". $param_emp_code . "' and Training_Status='1' ";
                //$strSql .= "ORDER BY emp_code ";
                $strSql = "SELECT * " ;
                $strSql .= "FROM MAS_TRAINING_RECORD_NEW " ;
                $strSql .= "WHERE emp_code='". $param_emp_code . "' ";
                $strSql .= "ORDER BY start_date ";
                //echo $strSql . "<br>";
                
                $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                $statement->execute();  
                $nRecCount = $statement->rowCount();
                //echo "Record Count = " . $nRecCount ."<br>";

                if ($nRecCount >0)
                {
                    $dataArray = array();
                    $rowArray = array("Module", "Code_Course", "Course_name", "Institute", "Location", "Type_Course", "Start_Date", "End_Date", "Duration", "Year");
                    array_push($dataArray, $rowArray);
                    while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                    {
                        //echo $ds["emp_code"] . "<br>";
                        $rowArray = array($ds["Module"], 
                                        $ds["Code_Course"], 
                                        $ds["Course_name"], 
                                        $ds["Institute"], 
                                        $ds["Location"], 
                                        $ds["Type_Course"], 
                                        $ds["Start_Date"], 
                                        $ds["End_Date"], 
                                        $ds["Duration"],  
                                        $ds["Year"]);        
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


