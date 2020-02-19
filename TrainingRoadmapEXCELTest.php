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