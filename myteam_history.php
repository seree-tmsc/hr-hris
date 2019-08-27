<h3 align="center"><font color="red">My Team - Employee Data</font></h3>

<div class="row">
    <!--
    <div class="col-md-1">
    </div>
    -->
    <div class="col-md-12">
        <div class="form-inline">
            Search By Department : 
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(1)" placeholder="Department ..." title="Input department">

            Search By Section : 
            <input type="text" class="form-control" id="myInput2" onkeyup="Func_Search2(2)" placeholder="Section ..." title="Input section">

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

        while(strlen($tmpAllmyteam) != 0)
        {            
            $tmpmyteam = substr($tmpAllmyteam,0,strpos($tmpAllmyteam,';'));
            $business_condition = "job_business = '" . substr($tmpmyteam, 1, strpos($tmpmyteam,',')-1) . "' ";
            //echo $business_condition . "<br>";

            if(stripos($tmpmyteam, ',') == strrpos($tmpmyteam, ',', 1))
            {
                $department_condition = "job_department = '" . substr($tmpmyteam, strpos($tmpmyteam,',')+1, strpos($tmpmyteam,']') - strpos($tmpmyteam,',')-1) . "' ";
                //echo $department_condition . "<br>";
                $condition .= "OR (" . $business_condition . " AND " . $department_condition . ") ";
            }
            else
            {                
                $department_condition = "job_department = '" . substr($tmpmyteam, stripos($tmpmyteam,',')+1, strrpos($tmpmyteam,',')-(stripos($tmpmyteam,',')+1)) . "' ";
                //echo $department_condition . "<br>";
                $section_condition = "job_section = '" . substr($tmpmyteam, strrpos($tmpmyteam, ',')+1, strpos($tmpmyteam,']') - strrpos($tmpmyteam,',')-1) . "' ";
                //echo $section_condition . "<br>";
                $condition .= "OR (" . $business_condition . " AND " . $department_condition . " AND " . $section_condition . ") ";
            }            
            //echo "condition = " . $condition . "<br>";

            $tmpAllmyteam = substr($tmpAllmyteam,strpos($tmpAllmyteam,';')+1,strlen($tmpAllmyteam));
        }        

        if(strlen($condition) != 0)
        {
            require_once("myteam_list.php");
        }
        else
        {
            echo "No employee data of my team";
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
                    if(strlen($condition) != 0)
                    {
                        include_once('include/db_Conn.php');
                        $strSql = "SELECT * " ;
                        $strSql .= "FROM Emp_Main " ;
                        $strSql .= "WHERE " . substr($condition, 2, strlen($condition)-2) . " ";
                        $strSql .= "ORDER BY emp_code" ;
                        //echo $strSql . "<br>";
                        
                        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                        $statement->execute();  
                        $nRecCount = $statement->rowCount();
                        //echo "Record Count = " . $nRecCount ."<br>";

                        if ($nRecCount >0)
                        {
                            $dataArray = array();
                            $rowArray = array("Code", "T-Title", "T-FName", "T-LName", "E-Title", "E-FName", "E-LName",
                                        "NName", "ID-NO", "Birth-Date", "Mobile-No", "Emergency-Mobile-No", "Religion", "Current-Status", "Blood-Group",
                                        "Biz", "Dep", "Sec", "Task", "Loc", "JG", "Pos", "Working-Date", 
                                        "Addr-no","Addr-noo","Addr-road","Addr-area","Addr-district","Addr-province","Addr-postal-code",
                                        "edu-level1", "edu-detail1", "edu-institute1", "edu-faculty1", "edu-major1", "edu-grade1", "edu-graduated-year1");
                            array_push($dataArray, $rowArray);
                            while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                            {
                                //echo $ds["emp_code"] . "<br>";
                                $rowArray = array($ds["emp_code"], 
                                                $ds["emp_ttitle"], 
                                                $ds["emp_tfname"], 
                                                $ds["emp_tlname"], 
                                                $ds["emp_etitle"], 
                                                $ds["emp_efname"], 
                                                $ds["emp_elname"],
                                                $ds["emp_nname"],
                                                $ds["emp_id_no"],
                                                date('Y-m-d', strtotime($ds["emp_birth_date"])),
                                                $ds["emp_mobile_no"],
                                                $ds["emp_emergency_mobile_no"],
                                                $ds["emp_religion"],
                                                $ds["emp_current_status"],
                                                $ds["emp_blood_type"],

                                                $ds["job_business"],
                                                $ds["job_department"],
                                                $ds["job_section"],
                                                $ds["job_task"],
                                                $ds["job_location"],
                                                $ds["job_grade"],
                                                $ds["job_position"],
                                                $ds["job_working_date"],

                                                $ds["addr_no"],
                                                $ds["addr_moo"],
                                                $ds["addr_road"],
                                                $ds["addr_area"],
                                                $ds["addr_district"],
                                                $ds["addr_province"],
                                                $ds["addr_postal_code"],

                                                $ds["edu_level1"],
                                                $ds["edu_detail1"],
                                                $ds["edu_institute1"],
                                                $ds["edu_faculty1"],
                                                $ds["edu_major1"],
                                                $ds["edu_grade1"],
                                                $ds["edu_graduated_year1"],

                                                $ds["edu_level2"],
                                                $ds["edu_detail2"],
                                                $ds["edu_institute2"],
                                                $ds["edu_faculty2"],
                                                $ds["edu_major2"],
                                                $ds["edu_grade2"],
                                                $ds["edu_graduated_year2"]);
                                array_push($dataArray, $rowArray);
                            }

                            $fileName = "tmpMyTeamEmployeeData.csv";
                            $fp = fopen('tmpMyTeamEmployeeData.csv', 'w');
                            //for support Thai 
                            fputs($fp,(chr(0xEF).chr(0xBB).chr(0xBF)));

                            foreach ($dataArray as $fields) {
                                fputcsv($fp, $fields);        
                            }

                            fclose($fp);
                            echo "<br>Generate CSV File Done.<br><a href=$fileName>Download</a>";
                        }
                        else
                        {
        
                        }
                    }
                ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->