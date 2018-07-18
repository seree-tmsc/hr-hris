<!-- Content Section -->
<div class="row">
    <div class="col-md-12">
        <!--<p></p>-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-inline">
            Search : 
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(0)" placeholder="Search by user names.." title="Type user name">

            <div class="pull-left">
                <button class="btn btn-success" data-toggle="modal" data-target="#CriteriaModal">
                    <span class="glyphicon glyphicon-plus"></span> 
                    SELECT CRITERIA
                </button>
            </div>

            <div class="pull-right">
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
            include "Training_Record_List.php";                    
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
                <h4 class="modal-title" id="myModalLabel">Add Training Record</h4>
                <br>
                <div class="col-lg-12">
                   
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
                            <label>Dept:</label>
                            <select class="form-control" name="sel_Dept">
                                            <option value="A">ACC</option>
                                            <option value="E">EN</option>
                                            <option value="EN">ENG</option>
                                            <option value="H">HR</option>
                                            <option value="I">IT</option>
                                            <option value="M">MGT</option>
                                            <option value="P">PD-PLAN</option>
                                            <option value="PR">PRO</option>
                                            <option value="R">R&D</option>
                                            <option value="S">SHE</option>
                                            <option value="SH">SHE-Q</option>
                                            <option value="W">WH</option>
                                            
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>Position:</label>
                            <select class="form-control" name="sel_Posi">
                                            <option value="AC">Ac</option>
                                            <option value="AD">Advisor</option>
                                            <option value="AM">AM</option>
                                            <option value="C">C</option>
                                            <option value="CH">Chemist</option>
                                            <option value="CHI">Chief</option>
                                            <option value="DA">DAI</option>
                                            <option value="DI">DIR</option>
                                            <option value="F">Foreman</option>
                                            <option value="M">MGR</option>
                                            <option value="OP">OPr</option>
                                            <option value="SM">SMG</option>
                                            <option value="SP">Specialist</option>
                                            <option value="Sro">Sr.Opr</option>
                                            <option value="Srt">Sr.Staff</option>
                                            <option value="SrC">Sr.Chemist</option>
                                            <option value="SrS">Sr.Staff</option>
                                            <option value="St">Staff</option>                                           
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Site:</label>
                            <select class="form-control" name="sel_Site">
                                            <option value="W">WG</option>
                                            <option value="S">SL</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Join-Date:</label>
                            <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>">
                        </div>
                        <div class="col-lg-2">
                            <label>Status:</label>
                            <select class="form-control" name="sel_Status">
                                            <option value="A">Active</option>
                                            <option value="R">Resign</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>start-Date:</label>
                            <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>">
                        </div>
                        <div class="col-lg-2">
                            <label>End-Date:</label>
                            <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>">
                        </div>
                        <div class="col-lg-3">
                            <label>Time:</label>
                            <Input autofocus type="text" require class="form-control" name="paramStatus">
                        </div>
                        <div class="col-lg-3">
                            <label>Training-Day:</label>
                            <Input autofocus type="text" require class="form-control" name="paramStatus">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label>Course-Name:</label>
                            <Input autofocus type="text" require class="form-control" name="paramStatus">
                        </div> 
                        <div class="col-lg-6">
                            <label>Institute:</label>
                            <Input autofocus type="text" require class="form-control" name="paramStatus">
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label>Location:</label>
                            <Input autofocus type="text" require class="form-control" name="paramStatus">
                        </div> 
                        <div class="col-lg-2">
                            <label>Type-Course:</label>
                            <select class="form-control" name="sel_TypeC">
                                            <option value="E">EXT</option>
                                            <option value="I">INT</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>Year:</label>
                            <Input autofocus type="text" require class="form-control" name="paramStatus">
                        </div>
                        <div class="col-lg-2">
                            <label>Cost:</label>
                            <Input autofocus type="text" require class="form-control" name="paramStatus">
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

<div class="modal fade" id="update_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Update Training Record</h4>
                <br>
                <div class="col-lg-12">

                </div>
            </div>
            <form class="form-horizontal" role="form" action="Training_Record_update.php" method="post">
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
