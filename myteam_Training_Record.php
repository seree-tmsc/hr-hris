<h3 align="center"><font color="red">My Team TRAINING RECORD Data</font></h3>

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

            $business_condition = "E.job_business = '" . substr($tmpmyteam, 1, strpos($tmpmyteam,',')-1) . "' ";
            $department_condition = "E.job_department = '" . substr($tmpmyteam, strpos($tmpmyteam,',')+1, strpos($tmpmyteam,']') - strpos($tmpmyteam,',') - 1) . "' ";
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
                    $dataArray = array();
                    $rowArray = array("Emp_ID", "Name_Surname", "Module_Name", "Code_Course", "Course_Detail", "Institute", "Location", "Type_Course", "Start_Date", "End_Date", "Training_Day", "Year", "Cost");
                    array_push($dataArray, $rowArray);
                    while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                    {
                        //echo $ds["emp_code"] . "<br>";
                        $rowArray = array($ds["Emp_ID"], 
                                        $ds["Name_Surname"], 
                                        $ds["Module_Name"], 
                                        $ds["Code_Course"], 
                                        $ds["Course_Detail"], 
                                        $ds["Institute"], 
                                        $ds["Location"],
                                        $ds["Type_Course"],
                                        $ds["Start_Date"],
                                        $ds["End_Date"],
                                        $ds["Training_Day"],
                                        $ds["Year"],
                                        $ds["Cost"]);
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