<!-- Content Section -->
<div class="row">
    <div class="col-md-12">
        <div class="form-inline">
            Search : 
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(0)" placeholder="Search by employee code..." title="Type employee code">
    
            <div class="pull-right">
                <button class="btn btn-info" data-toggle="modal" data-target="#export_modal">
                    <span class="fa fa-cloud-download"></span> 
                    Export To CSV File
                </button>
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">
                    <span class="glyphicon glyphicon-plus"></span> 
                    Add
                </button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p></p>
        <!--<h5>User Data:</h5>-->
        <?php
            include "performance_list.php";                    
        ?>
    </div>
</div>        

<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add New Record</h4>
                <br>
                <div class="col-lg-12">
                    <p>Definition:</p>
                    <p>Grade: O = Outstanding [score >= 95%] / 
                    A = Above Standard [95% > score >= 85%] / 
                    S = Standard [85% > score >= 75%] / 
                    N = Need Imprvement [75% > score >= 65%] /
                    F = Fail [score < 65%]</p>
                </div>
            </div>
            <form class="form-horizontal" role="form" action="performance_add.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label>Employee-List:</label>
                            <?php require_once "dtl_emp_list.php"; ?>
                        </div>
                        <div class="col-lg-2">
                            <label>Emp-Code:</label>
                            <p id="var1" class="form-control" disabled></p>
                        </div>
                        <div class="col-lg-2">
                            <label>First-Name:</label>
                            <p id="var2" class="form-control" disabled></p>
                        </div>
                        <div class="col-lg-4">
                            <label>Last-Name:</label>
                            <p id="var3" class="form-control" disabled></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Year:</label>
                            <select readonly class="form-control" name="add_performance_year">                                    
                                <option value="<?php echo date('Y')?>"><?php echo date('Y')?></option>                                    
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>KPI (%):</label>
                            <input type="number" required placeholder ="KPI Score" class="form-control" id="add_performance_kpi" name="add_performance_kpi" 
                            onchange="Func_AddValue('add_performance_kpi','add_performance_com','nTotal','cGrade','#add_performance_tot','#add_performance_grade')">
                        </div>
                        <div class="col-lg-3">
                            <label>Competency (%):</label>
                            <input type="number" required placeholder ="Competency Score" class="form-control" id="add_performance_com" name="add_performance_com" 
                            onchange="Func_AddValue('add_performance_kpi','add_performance_com','nTotal','cGrade','#add_performance_tot','#add_performance_grade')">
                        </div>
                        <div class="col-lg-3">
                            <label>Total Score (%):</label>                                
                            <p id="nTotal" class="form-control" readonly></p>
                            <input type="hidden" id='add_performance_tot' name='add_performance_tot'>
                        </div>
                        <div class="col-lg-2">
                            <label>Grade:</label>
                            <p id="cGrade" class="form-control" readonly></p>
                            <input type="hidden" id='add_performance_grade' name='add_performance_grade'>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">                        
                    <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<!-- Bootstrap Modals ------->
<!-- Modal - Update Record -->
<div class="modal fade" id="update_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Update Record</h4>
                <br>
                <div class="col-lg-12">
                    <p>Definition:</p>
                    <p>Grade: O = Outstanding [score >= 95%] / 
                    A = Above Standard [95% > score >= 85%] / 
                    S = Standard [85% > score >= 75%] / 
                    N = Need Imprvement [75% > score >= 65%] /
                    F = Fail [score < 65%]</p>
                </div>
            </div>
            <form class="form-horizontal" role="form" action="performance_update.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label>Employee-List:</label>
                            <?php require_once "dtl_emp_list.php"; ?>
                        </div>
                        <div class="col-lg-2">
                            <label>Emp-Code:</label>
                            <input type="text" class="form-control" id="update_emp_code" name="paramupdate_emp_code" readonly>
                        </div>
                        <div class="col-lg-2">
                            <label>First-Name:</label>
                            <input type="text" class="form-control" id="update_emp_tfname" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label>Last-Name:</label>
                            <input type="text" class="form-control" id="update_emp_tlname" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Year:</label>
                            <input type="text" class="form-control" id="update_performance_year" name="paramupdate_performance_year" readonly>
                        </div>
                        <div class="col-lg-2">
                            <label>KPI (%):</label>
                            <input type="number" required class="form-control" id="update_performance_kpi" name="paramupdate_performance_kpi" 
                            onchange="Func_AddValue('update_performance_kpi','update_performance_com','updateTotal','updateGrade','#update_performance_tot','#update_performance_grade')">
                        </div>
                        <div class="col-lg-3">
                            <label>Competency (%):</label>
                            <input type="number" required class="form-control" id="update_performance_com" name="paramupdate_performance_com" 
                            onchange="Func_AddValue('update_performance_kpi','update_performance_com','updateTotal','updateGrade','#update_performance_tot','#update_performance_grade')">
                        </div>
                        <div class="col-lg-3">
                            <label>Total Score (%):</label>                                
                            <p id="updateTotal" name="paramupdate_performance_tot" class="form-control" readonly></p>
                            <input type="hidden" id='update_performance_tot' name='paramupdate_performance_tot'>
                        </div>
                        <div class="col-lg-2">
                            <label>Grade:</label>
                            <p id="updateGrade" name="paramupdate_performance_grade" class="form-control" readonly></p>
                            <input type="hidden" id='update_performance_grade' name='paramupdate_performance_grade'>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">                        
                    <button type="submit" class="btn btn-success">ปรับปรุงข้อมูล</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<!-- Bootstrap Modals ------->
<!-- Modal - Delete Record -->
<div class="modal fade" id="delete_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Delete Record</h4>
                <br>
                <div class="col-lg-12">
                    <p>Definition:</p>
                    <p>Grade: O = Outstanding [score >= 95%] / 
                    A = Above Standard [95% > score >= 85%] / 
                    S = Standard [85% > score >= 75%] / 
                    N = Need Imprvement [75% > score >= 65%] /
                    F = Fail [score < 65%]</p>
                </div>
            </div>
            <form class="form-horizontal" role="form" action="performance_del.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label>Employee-List:</label>
                            <?php require_once "dtl_emp_list.php"; ?>
                        </div>
                        <div class="col-lg-2">
                            <label>Emp-Code:</label>
                            <input type="text" class="form-control" id="delete_emp_code" name="paramdelete_emp_code"readonly>
                        </div>
                        <div class="col-lg-2">
                            <label>First-Name:</label>
                            <input type="text" class="form-control" id="delete_emp_tfname" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label>Last-Name:</label>
                            <input type="text" class="form-control" id="delete_emp_tlname" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Year:</label>
                            <input type="text" class="form-control" id="delete_performance_year" name="paramdelete_performance_year" readonly>
                        </div>
                        <div class="col-lg-2">
                            <label>KPI (%):</label>
                            <input type="number" readonly class="form-control" id="delete_performance_kpi">
                        </div>
                        <div class="col-lg-3">
                            <label>Competency (%):</label>
                            <input type="number" readonly class="form-control" id="delete_performance_com">
                        </div>
                        <div class="col-lg-3">
                            <label>Total Score (%):</label>                                                            
                            <p id="deleteTotal" class="form-control" readonly></p>                            
                        </div>
                        <div class="col-lg-2">
                            <label>Grade:</label>
                            <p id="deleteGrade" class="form-control" readonly></p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">                        
                    <button type="submit" class="btn btn-success">ลบข้อมูล</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<!-- Bootstrap Modals ------------>
<!-- Modal - Export To CSV File -->
<div class="modal fade" id="export_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Generate CSV File</h4>
            </div>
            <div class="modal-body">

            <?php
                include_once('include/db_Conn.php');

                switch($_POST['selDept'])
                {
                    case "ALL":
                        echo "select dept=ALL";
        
                        $strSql = "SELECT P.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
                        $strSql .= "FROM MAS_Performance P ";
                        $strSql .= "JOIN Emp_Main E ON P.emp_code = E.emp_code ";
                        $strSql .= "ORDER BY P.Emp_Code ";
                        break;
        
                    default:
                        switch($_POST['selPos'])
                        {
                            case "ALL":
                                echo "Select Department=" . $_POST['selDept'] ." / Postion = ALL";
        
                                $strSql = "SELECT P.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
                                $strSql .= "FROM MAS_Performance P ";
                                $strSql .= "JOIN Emp_Main E ON P.emp_code = E.emp_code ";
                                $strSql .= "WHERE E.job_department ='" .  $_POST['selDept'] . "' ";
                                $strSql .= "ORDER BY P.Emp_Code ";
                                break;
        
                            default:
                                switch($_POST['selEmp'])
                                {
                                    case "ALL":
                                        echo "Select Department=" . $_POST['selDept'] . " / Postion = " . $_POST['selPos'] ." / Employee = ALL";
        
                                        $strSql = "SELECT P.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
                                        $strSql .= "FROM MAS_Performance P ";
                                        $strSql .= "JOIN Emp_Main E ON P.emp_code = E.emp_code ";
                                        $strSql .= "WHERE E.job_department ='" .  $_POST['selDept'] . "' ";
                                        $strSql .= "AND E.job_position ='" .  $_POST['selPos'] . "' ";
                                        $strSql .= "ORDER BY P.Emp_Code ";
                                        break;
        
                                    default:
                                        echo "Select Department=" . $_POST['selDept'] . " / Postion = " . $_POST['selPos'] ." / Employee = " . $_POST['selEmp'];
        
                                        $strSql = "SELECT P.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
                                        $strSql .= "FROM MAS_Performance P ";
                                        $strSql .= "JOIN Emp_Main E ON P.emp_code = E.emp_code ";
                                        $strSql .= "WHERE E.emp_code ='" .  $_POST['selEmp'] . "' ";
                                        $strSql .= "ORDER BY P.Emp_Code ";
                                        break;
                                }
                                break;
                        }
                        break;
                }

                $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                $statement->execute();  
                $nRecCount = $statement->rowCount();

                if ($nRecCount >0)
                {
                    $dataArray = array();
                    $rowArray = array("Employee_Code", "Thai_First_Name", "Thai_Last_Name", "Performance_Year", "KPI", "Competency", "Total", "Grade", "Enter_Date");
                    array_push($dataArray, $rowArray);
                    while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                    {
                        //echo $ds["emp_code"] . "<br>";
                        $rowArray = array($ds["emp_code"],
                                        $ds["emp_tfname"],
                                        $ds["emp_tlname"],
                                        $ds["performance_year"],
                                        $ds["performance_kpi"],
                                        $ds["performance_com"],
                                        $ds["performance_tot"],
                                        $ds["performance_grade"],
                                        date('Y-m-d', strtotime($ds["performance_ent_datetime"])));
                        array_push($dataArray, $rowArray);
                    }

                    $fileName = "tmpPerformanceData.csv";
                    $fp = fopen('tmpPerformanceData.csv', 'w');
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
            ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
