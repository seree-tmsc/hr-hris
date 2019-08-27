<h3 align="center"><font color="green">My Team TRAINING RECORD Data</font></h5>

<div class="row">
    <!--
    <div class="col-md-1">
    </div>
    -->
    <div class="col-md-12">
        <div class="form-inline">
            Search : 
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(0)" placeholder="Search by Code..." title="Type department">
            <div class="pull-right">                
                <button class="btn btn-success" data-toggle="modal" data-target="#export_modal">
                    <span class="fa fa-cloud-download"></span> 
                    Download CSV File
                </button>                
            </div>
        </div>
    </div>
    <!--
    <div class="col-md-1">
    </div>
    -->
</div>
<br>

<?php
    /*----------------------------------*/
    /*--- Query My Team Information ---*/
    /*----------------------------------*/
    include_once('include/db_Conn.php');   
    $strSql = "SELECT * " ;
    $strSql .= "FROM MAS_Users_ID " ;
    $strSql .= "WHERE emp_code='". $param_emp_code . "' ";
    //echo $strSql . "<br>";
        
    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo "Record Count = " . $nRecCount ."<br>";
    
    if ($nRecCount == 1)
    {
        $ds = $statement->fetch(PDO::FETCH_NAMED);
        $tmpAllmyteam = $ds['user_myteam'];
        $business_condition = "";
        $departmnet_condition = "";
        $condition = "";
        //echo "user_myteam = " . $tmpAllmyteam . "<br>";

        while(strlen($tmpAllmyteam) != 0)
        {            
            $tmpmyteam = substr($tmpAllmyteam,0,strpos($tmpAllmyteam,';'));
            //echo strpos($tmpAllmyteam,';') . "<br>";
            //echo "myteam = " . $tmpmyteam . "<br>";

            $business_condition = "Biz = '" . substr($tmpmyteam, 1, strpos($tmpmyteam,',')-1) . "' ";
            $department_condition = "Dep = '" . substr($tmpmyteam, strpos($tmpmyteam,',')+1, strpos($tmpmyteam,']') - strpos($tmpmyteam,',') - 1) . "' ";
            $condition .= "OR (" . $business_condition . " AND " . $department_condition . ") ";
            //echo "codition = " . $condition . "<br>";

            $tmpAllmyteam = substr($tmpAllmyteam,strpos($tmpAllmyteam,';')+1,strlen($tmpAllmyteam));
            //echo "tmpAll = " . $tmpAllmyteam . "<br>";

        }

        if(strlen($condition) != 0)
        {
            require_once("myteam_Training_record_list.php");
        }
        else
        {
            echo "No information of my team data";
        }
    }
?>

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
                    $dataArray = array();
                    $rowArray = array("Emp_ID", "Name_Surname", "Module_Name", "Code_Course", "Course_Detail", "Institute", "Location", "Type_Course", "Start_Date", "End_Date", "Training_Day", "Year", "Cost");
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
                                        $ds["status"],
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

                    $fileName = "tmpTrainingRecord.csv";
                    $fp = fopen('tmpTrainingRecord.csv', 'w');
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