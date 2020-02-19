<h3 align="center"><font color="red">My Team - Promotion Data</font></h3>
<hr>
<div class="row">
    <!--
    <div class="col-md-1">
    </div>
    -->
    <div class="col-md-12">
        <div class="form-inline">
            Search By Code : 
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(2)" placeholder="Employee Code..." title="Input Employee Code">
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
            require_once("myteam_promotion_list.php");
            echo "<h3>Complete!</h3>";
        }
        else
        {
            echo "No performance data of my data";
        }
    }
?>

<!-- modal  Download CSV File -->
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
                    $strSql = "SELECT *, E.emp_code as 'Emp_Code' " ;
                    $strSql .= "FROM MAS_Promotion P " ;
                    $strSql .= "JOIN Emp_Main E ON E.emp_code = P.emp_Code ";
                    $strSql .= "WHERE " . substr($condition, 2, strlen($condition)-2);
                    $strSql .= "ORDER BY P.promotion_year DESC, P.emp_code" ;
                    //echo $strSql . "<br>";
                    
                    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                    $statement->execute();  
                    $nRecCount = $statement->rowCount();
                    //echo "Record Count = " . $nRecCount ."<br>";
    
                    if ($nRecCount >0)
                    {
                        $dataArray = array();
                        $rowArray = array("Year", "Period", "Employee_Code", "Thai_First_Name", "Thai_Last_Name",
                                    "Promote_From_Jg", "Promote_From_Position", "Promote_From_Dept",
                                    "Promote_To_Jg", "Promote_To_Position", "Promote_To_Dept","Promote_Date" );
                        array_push($dataArray, $rowArray);
                        while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                        {
                            $rowArray = array($ds["promotion_year"],
                                            $ds["promotion_period"],
                                            $ds["emp_code"][0],
                                            $ds["emp_tfname"],
                                            $ds["emp_tlname"],
                                            $ds["promotion_from_jg"],
                                            $ds["promotion_from_pos"],
                                            $ds["promotion_from_dep"],
                                            $ds["promotion_to_jg"],
                                            $ds["promotion_to_pos"],
                                            $ds["promotion_to_dep"]);
                            array_push($dataArray, $rowArray);
                        }

                        $fileName = "tmpMyTeamPromotionData.csv";
                        $fp = fopen('tmpmyTeamPromotionData.csv', 'w');
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
        </div>
    </div>
</div>