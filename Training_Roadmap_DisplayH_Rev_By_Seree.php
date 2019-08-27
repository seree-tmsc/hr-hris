<div class="row">
    <div class="col-lg-12 col-md-12">
        <h3 align="center">
            <font color="Green">
                Training Roadmap Data
            </font>
        </h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="form-inline">
            Search By: 
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(2)" placeholder="Module ..." title="Input Module">

            Search By: 
            <input type="text" class="form-control" id="myInput2" onkeyup="Func_Search2(3)" placeholder="Code course ..." title="Input Code course">

        <!--</div>  -->
        <!--<div class="pull-right">-->
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
                <th width="5%" class='text-center'>No.</th>
                <th width="15%" class='text-center'>Training-Set</th>
                <th width="20%" class='text-center'>Module</th>
                <th width="15%" class='text-center'>Code-Course</th>
                <th width="40%" class='text-center'>Code-Name</th>
               
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
    $strSql .= "FROM MAS_TRAINING_ROADMAP_GENERATE " ;
    $strSql .= "WHERE emp_code='". $param_emp_code . "' ";
    $strSql .= "ORDER BY Module, Code_Course ";
    //echo $strSql . "<br>";
    
    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();    
    //echo "Record Count = " . $nRecCount ."<br>";

    $nI =1;
    if ($nRecCount >0)
    /* echo "Record Count = " . $nRecCount ."<br>";   */
    {
        while ($ds = $statement->fetch(PDO::FETCH_NAMED))
        {
?> 
            <tr>
                <td class='text-center'><?php echo $nI; ?></td>
                <td><?php echo $ds['Training_set']; ?></td>
                <td><?php echo $ds['Module']; ?></td>
                <td><?php echo $ds['Code_Course']; ?></td>
                <td><?php echo $ds['Code_Name']; ?></td>
               
            </tr>
<?php
            $nI++;
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
                $strSql .= "FROM MAS_TRAINING_ROADMAP_GENERATE " ;
                $strSql .= "WHERE emp_code='". $param_emp_code . "' ";
                $strSql .= "ORDER BY Module, Code_Course ";
                
                //echo $strSql . "<br>";
                
                $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                $statement->execute();  
                $nRecCount = $statement->rowCount();
                //echo "Record Count = " . $nRecCount ."<br>";

                if ($nRecCount >0)
                {
                    $dataArray = array();
                    $rowArray = array("Training_set", "Module", "Code_Course", "Code_Name");
                    array_push($dataArray, $rowArray);
                    while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                    {
                        //echo $ds["emp_code"] . "<br>";
                        $rowArray = array($ds["Training_set"], 
                                        $ds["Module"], 
                                        $ds["Code_Course"], 
                                        $ds["Code_Name"]);        
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
