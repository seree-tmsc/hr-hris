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
            include "MAS_Training_Roadmap_list.php";                    
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
            </div>
            <form class="form-horizontal" role="form" action="MAS_Training_Roadmap_add.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label>BIZ:</label>
                            <select class="form-control" name="Select_By_BUSI">
                                    <Option value="BIZ">BIZ</option>
                                    <option value="IR">IR</option>
                                    <option value="MCI">MCI</option>
                                    <option value="SCM">SCM</option>
                                    <option value="TECH">TECH</option>
                                    <option value="UU">UU</option>
                            </select>     
                        </div>
                        <div class="col-lg-2">
                            <label>DEP:</label>
                            <select class="form-control" name="Select_By_DEPT">
                                    <Option value="ACC">ACC</option>
                                    <option value="HR">HR</option>
                                    <option value="IT">IT</option>
                                    <option value="ENG">ENG</option>
                                    <option value="MCI">MCI</option>
                                    <option value="MGT">MGT</option>
                                    <option value="PD-Plan">PD-Plan</option>
                                    <option value="PRO">PRO</option>
                                    <option value="PUR">PUR</option>
                                    <option value="PUR">R&D</option>
                                    <option value="PUR">SAL</option>
                                    <option value="PUR">SHE&Q</option>
                                    <option value="PUR">WH</option>                  
                            </select>    
                        </div>
                        <div class="col-lg-2">
                            <label>SEC:</label>
                            <select class="form-control" name="Select_By_SEC">
                                    <Option value="ACC">ACC</option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="ALL">ALL</option>
                                    <option value="ENG">ENG</option>
                                    <option value="ERP">ERP</option>
                                    <option value="HRM">HRM</option>
                                    <option value="HROD">HROD</option>
                                    <option value="IR">IR</option>
                                    <option value="IRS">IRS</option>
                                    <option value="IRW">IRW</option>
                                    <option value="MAIN">MAIN</option>
                                    <option value="OFF">OFF</option>
                                    <option value="PUR">PUR</option>      
                                    <option value="QA">QA</option>
                                    <option value="QC">QC</option>  
                                    <option value="SAL">SAL</option>  
                                    <option value="SAL-CO">SAL-CO</option>  
                                    <option value="SHE">SHE</option>  
                                    <option value="SYS">SYS</option>  
                                    <option value="SDEV">System development</option>  
                                    <option value="ULI">Utility</option>  
                                    <option value="UU">UU</option>    
                            </select>    
                        </div>
                        <div class="col-lg-2">
                            <label>TASK:</label>
                            <input autofocus type="text" require class="form-control" name="paramTASK">
                        </div>
                    </div>
                    <div class="form-group">                        
                        <div class="col-lg-2">
                            <label>Module:</label>
                            <select class="form-control" name="Select_By_module">
                                    <Option value="Basic Skill">Basic Skill</option>
                                    <option value="Core-Competency Skill">Core-Competency Skill</option>
                                    <option value="Functional-Competency Skill">Functional-Competency Skill</option>
                                    <option value="Leadership Skill(Managerial Competency)">Leadership Skill(Managerial Competency)</option>
                                    <option value="SHE & Q Skill">SHE & Q Skill</option>
                                    <option value="Technical Skill(Job Family)">Technical Skill(Job Family)</option>
                            </select>    
                        </div>
                        <div class="col-lg-3">
                            <label>Code Course:</label>
                            <input autofocus type="text" require class="form-control" name="paramCodeCourse">
                        </div>
                        <div class="col-lg-3">
                            <label>Course Content:</label>
                            <input autofocus type="text" require class="form-control" name="paramCourseContent">
                        </div>
                        <div class="col-lg-3">
                            <label>Course Name:</label>
                            <input autofocus type="text" require class="form-control" name="paramCourseName">
                        </div>
                    </div>
                    <div class="form-group">                        
                        <div class="col-lg-2">
                            <label>Position:</label>
                            <input autofocus type="text" require class="form-control" name="paramPosition">
                        </div>
                        <div class="col-lg-3">
                            <label>JG:</label>
                            <input autofocus type="text" require class="form-control" name="paramJG">
                        </div>
                        <div class="col-lg-3">
                            <label>Type:</label>
                            <input autofocus type="text" require class="form-control" name="paramType">
                        </div>
                        <div class="col-lg-3">
                            <label>Instructor:</label>
                            <input autofocus type="text" require class="form-control" name="paramInstructor">
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
                <h4 class="modal-title" id="myModalLabel">Update Record</h4>
                <br>
            </div>
            <form class="form-horizontal" role="form" action="MAS_Training_Roadmap_Update.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        
                        <div class="col-lg-2">
                            <label>BUSINESS:</label>
                            <input type="text" class="form-control" id="update_BIZ" name="paramupdate_BIZ" > 
                        </div>
                        <div class="col-lg-2">
                            <label>DEPARTMENT:</label>
                            <input type="text" class="form-control" id="update_DEP" name="paramupdate_DEP" >
                        </div>
                        <div class="col-lg-3">
                            <label>SECTION:</label>
                            <input type="text" class="form-control" id="update_SEC" name="paramupdate_SEC" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>TASK:</label>
                            <input type="text" class="form-control" id="update_Task" name="paramupdate_Task" >
                        </div>
                        <div class="col-lg-2">
                            <label>Module:</label>
                            <input type="text" class="form-control" id="update_Module" name="paramupdate_Module" >
                        </div>
                        <div class="col-lg-3">
                            <label>Code Course:</label>
                            <input type="text" class="form-control" id="update_CodeCourse" name="paramupdate_CodeCourse" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Course Content:</label>
                            <input type="text" class="form-control" id="update_CourseContent" name="paramupdate_CourseContent" >
                        </div>
                        <div class="col-lg-2">
                            <label>Course Name:</label>
                            <input type="text" class="form-control" id="update_CourseName" name="paramupdate_CourseName" >
                        </div>
                        <div class="col-lg-3">
                            <label>Position:</label>
                            <input type="text" class="form-control" id="update_Position" name="paramupdate_Position" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>JG:</label>
                            <input type="text" class="form-control" id="update_JG" name="paramupdate_JG" >
                        </div>
                        <div class="col-lg-2">
                            <label>TYPE:</label>
                            <input type="text" class="form-control" id="update_Type" name="paramupdate_Type" >
                        </div>
                        <div class="col-lg-3">
                            <label>Instructor:</label>
                            <input type="text" class="form-control" id="update_Instructor" name="paramupdate_Instructor" >
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
            </div>
            <form class="form-horizontal" role="form" action="MAS_Training_Roadmap_del.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Business:</label>
                            <input type="text" class="form-control" id="delete_BIZ" name="paramdelete_BIZ" readonly>
                        </div>
                        <div class="col-lg-2">
                            <label>Department:</label>
                            <input type="text" class="form-control" id="delete_DEP" name="paramdelete_DEP" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label>Section:</label>
                            <input type="text" class="form-control" id="delete_SEC" name="paramdelete_SEC" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>TASK:</label>
                            <input type="text" class="form-control" id="delete_TASK" name="paramdelete_TASK" readonly>
                        </div>
                        <div class="col-lg-2">
                            <label>Module:</label>
                            <input type="text" class="form-control" id="delete_Module" name="paramdelete_Module" readonly>
                        </div>
                        <div class="col-lg-3">
                            <label>Code Course:</label>
                            <input type="text" class="form-control" id="delete_CodeCourse" name="paramdelete_CodeCourse" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Course Content:</label>
                            <input type="text" class="form-control" id="delete_CourseContent" name="paramdelete_CourseContent" readonly>
                        </div>
                        <div class="col-lg-2">
                            <label>Course Name:</label>
                            <input type="text" class="form-control" id="delete_CourseName" name="paramdelete_CourseName" readonly>
                        </div>
                        <div class="col-lg-3">
                            <label>Position:</label>
                            <input type="text" class="form-control" id="delete_Position" name="paramdelete_Position" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>JG:</label>
                            <input type="text" class="form-control" id="delete_JG" name="paramdelete_JG" readonly>
                        </div>
                        <div class="col-lg-2">
                            <label>Type:</label>
                            <input type="text" class="form-control" id="delete_Type" name="paramdelete_Type" readonly>
                        </div>
                        <div class="col-lg-3">
                            <label>Instructor:</label>
                            <input type="text" class="form-control" id="delete_Instructor" name="paramdelete_Instructor" readonly>
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
