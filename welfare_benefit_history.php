<?php
    //echo "USER = " . $param_emp_email . "<br>";

    /*----------------------------------*/
    /*--- Query User Information ---*/
    /*----------------------------------*/
    include_once('include/db_Conn.php');   
    $strSql = "SELECT * " ;
    $strSql .= "FROM MAS_doctor_treatment " ;
    $strSql .= "WHERE emp_code='". $param_emp_code . "' ";
    $strSql .= "ORDER BY wd_date ";
    //echo $strSql . "<br>";
    
    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo "Record Count = " . $nRecCount ."<br>";

    if ($nRecCount >0)
    {
?>        
        <h3 align="center"><font color="red">Wellfare Benefit History Data</font></h3>

        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <div class="form-inline">
                    Search : 
                    <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(0)" placeholder="Search by year.." title="Type year">
                    <div class="pull-right">
                        <button class="btn btn-success" data-toggle="modal" data-target="#export_modal">
                            <span class="fa fa-cloud-download"></span> 
                            Download CSV File
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
            </div>
        </div>
        <br>

        <div class='table-responsive'>
            <table class='table table-bordered table-hover' id='myTable' style='width:85%;' align="center">
                <thead>
                    <tr class='info'>
                        <th style='width:10%;' class='text-center'>Year</th>
                        <th style='width:20%;' class='text-center'>Date</th>
                        <th style='width:10%;' class='text-center'>Line</th>
                        <th style='width:30%;' class='text-center'>Detail</th>
                        <th style='width:20%;' class='text-center'>Amount</th>
                        <th style='width:10%;' class='text-center'>Attachment</th>
                    </tr>
                </thead>
                <tbody>

<?php
                    $nLoop = 0;
                    $myArray = array();
                    while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                    {
                        //echo $ds["emp_code"] . "<br>";
                        $RowArray = array($ds["wd_date"], $ds["line_item"], $ds["detail_item"], $ds["amount"]);
                        array_push($myArray, $RowArray);
?> 
                        <tr>
                            <td class='text-center'><?php echo substr($ds['wd_date'],0,4); ?></td>
                            <td class='text-center'><?php echo date('d-M-Y', strtotime($ds['wd_date'])); ?></td>
                            <td class='text-center'><?php echo $ds['line_item']; ?></td>
                            <td class='text-center'><?php echo $ds['detail_item']; ?></td>
                            <td class='text-center'><?php echo $ds['amount']; ?></td>
                            <td class='text-center'><a href="<?php echo $ds['attachment']; ?>" target="_blank">Click</a></td>
                        </tr>
<?php
                    }
                    $myJSON = json_encode($myArray);
        echo "</tbody>";
        echo "</table>";
        echo "</div>";

        echo "<div class='row'>";
        
        echo "<div class='col-md-1'>";
        echo "</div>";

        echo "<div class='col-md-10'>";
        echo "<div class='form-inline'>";        
        echo "<a href='include/exportArrToCsv.php?param1=$myJSON' target='_blank'>Export to CSV File</a>";
        /*
        echo "<a href='exportArrToCsv.php?param1=$myJSON' 
                onclick='window.open('exportArrToCsv.php?param1=$myJSON', 'name', 'width=500' , 'height=500'); 
                return false;' target='_blank'>Share this
            </a>";
        */

        echo "</div>";
        echo "</div>";
        
        echo "<div class='col-md-1'>";
        echo "</div>";
        
        echo "</div>";
    }
    else
    {
        echo "No data";
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
                $strSql = "SELECT * " ;
                $strSql .= "FROM MAS_doctor_treatment " ;
                $strSql .= "WHERE emp_code='". $param_emp_code . "' ";
                $strSql .= "ORDER BY wd_date ";
                //echo $strSql . "<br>";
                
                $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                $statement->execute();  
                $nRecCount = $statement->rowCount();
                //echo "Record Count = " . $nRecCount ."<br>";

                if ($nRecCount >0)
                {
                    $dataArray = array();
                    $rowArray = array("Withdraw_Date", "Line", "Detail", "Amount");
                    array_push($dataArray, $rowArray);
                    while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                    {
                        //echo $ds["emp_code"] . "<br>";
                        $rowArray = array($ds["wd_date"], $ds["line_item"], $ds["detail_item"], $ds["amount"]);
                        array_push($dataArray, $rowArray);
                    }

                    $fileName = "tmpfile.csv";
                    $fp = fopen('tmpfile.csv', 'w');
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