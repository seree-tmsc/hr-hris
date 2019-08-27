<!-- Content Section -->
<div class="row">
    <div class="col-md-12">
        <div class="form-inline">
            Search : 
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(0)" placeholder="Search by emp code..." title="Emp code">

            Search : 
            <input type="text" class="form-control" id="myInput2" onkeyup="Func_Search2(3)" placeholder="Search by Module..." title="Type Module">

            Search : 
            <input type="text" class="form-control" id="myInput3" onkeyup="Func_Search3(5)" placeholder="Search by Course name..." title="Type Course name">
    
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
            include "admin_p32_trainingrecord_list.php";                    
        ?>
    </div>
</div>    

<!-- Bootstrap Modals -------->
<!-- Modal - Add New Record -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">เพิ่มข้อมูล :</h3>
            </div>

            <form class="form-horizontal" role="form" action="admin_p32_trainingrecord_add.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>ข้อมูลส่วนบุคคล : *</label>
                            <input type="text" required placeholder ="รหัสพนักงาน" class="form-control" name="add_emp_code" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="ชื่อ-นามสกุล" class="form-control" name="add_name_surname" >
                        </div>
                        <div class="col-lg-2">  
                            <label>&nbsp;</label>                
                            <select required class="form-control" name="add_ttitle">
                                <option value="นาย">นาย</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="ชื่อ(ไทย)" class="form-control" name="add_nameth" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="นามสกุล(ไทย)" class="form-control" name="add_surnameth" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="ชื่อ(ENG)" class="form-control" name="add_nameeng" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="นามสกุล(ENG)" class="form-control" name="add_surnameeng" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <input type="text" required placeholder ="Business" class="form-control" name="add_business" >
                        </div>
                        <div class="col-lg-2">                                 
                            <input type="text" required placeholder ="Dept" class="form-control" name="add_dept" >  
                        </div>
                        <div class="col-lg-2">
                            <input type="text" required placeholder ="Section" class="form-control" name="add_section" >
                        </div>
                        <div class="col-lg-2">
                            <input type="text" required placeholder ="Job_Task" class="form-control" name="add_job_task" >
                        </div> 
                    </div>
                    <div class="form-group">                                                   
                        <div class="col-lg-3">
                            <input type="text" required placeholder ="Position" class="form-control" name="add_position" >
                        </div>
                        <div class="col-lg-3">
                            <input type="text" required placeholder ="Site" class="form-control" name="add_site" >
                        </div>
                        <div class="col-lg-2">                                
                            <input type="text" required placeholder ="Join_Date" class="form-control" name="mydate1" id="mydate1" >
                        </div>
                        <div class="col-lg-3">
                            <input type="text" required placeholder ="Status" class="form-control" name="add_status" >
                        </div>
                        <div class="col-lg-2">                                
                            <input type="text" required placeholder ="Start_Date" class="form-control" name="mydate2" id="mydate2" >
                        </div>
                        <div class="col-lg-2">                                
                            <input type="text" required placeholder ="End_Date" class="form-control" name="mydate3" id="mydate3" >
                        </div>
                        <div class="col-lg-3">
                            <input type="text" required placeholder ="Time" class="form-control" name="add_emp_time" >
                        </div>
                    </div>
                    <div class="form-group">                                                   
                        <div class="col-lg-3">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="จำนวนวัน" class="form-control" name="add_duration" >
                        </div>
                        <div class="col-lg-2">                                
                            <!--<input type="text" required placeholder ="ศาสนา" class="form-control" name="add_religion">-->
                            <select required placeholder ="Module" class="form-control" name="add_module">
                                <option value="Competency">Competency</option>
                                <option value="Technical Skill">Technical Skill</option>
                                <option value="Leadership Skill">Leadership Skill</option>
                                <option value="Safety">Safety</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="Code_Course" class="form-control" name="add_code_course" >  
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="Course_name" class="form-control" name="add_course_name" >  
                        </div>
                    </div>
                    <br>
                    <div class="form-group">        
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" placeholder ="Institute" class="form-control" name="add_institute" required>
                        </div>

                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" placeholder ="Location" class="form-control" name="add_location" required>
                        </div>

                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <select required class="form-control" name="add_type_course">
                                <option value="-">-</option>
                                <option value="INT">INT</option>
                                <option value="EXT">EXT</option>
                            </select>                     
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="Year" class="form-control" name="add_Year" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="Cost" class="form-control" name="add_cost" >
                        </div>
                        <br>
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
<div class="modal fade" id="update_record_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">ปรับปรุงข้อมูล :</h3>
            </div>

            <form class="form-horizontal" role="form" action="admin_p32_trainingrecord_update.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>ข้อมูลส่วนบุคคล : *</label>
                            <input type="text" disabled class="form-control" name="update_emp_code" id="update_emp_code" >
                            <input type="hidden" class="form-control" name="paramupdate_emp_code" id="paramupdate_emp_code" >
                        </div>
                        <div class="col-lg-3">
                            <label>Name-Surname</label>
                            <input type="text" required class="form-control" name="update_name_surname" id="update_name_surname" >
                        </div>
                        <div class="col-lg-2">  
                            <label>Title</label>                
                            <select required class="form-control" name="update_title" id="update_title">
                                <option value="นาย">นาย</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Name-TH</label>
                            <input type="text" required class="form-control" name="update_nameth" id="update_nameth" >
                        </div>
                        <div class="col-lg-3">
                            <label>Surname-TH</label>
                            <input type="text" required class="form-control" name="update_surnameth" id="update_surnameth" >
                        </div>
                        <div class="col-lg-3">
                            <label>Firstname-ENG</label>
                            <input type="text" required class="form-control" name="update_firstnameeng" id="update_firstnameeng" >
                        </div>
                        <div class="col-lg-3">
                            <label>Lastname-ENG</label>                                 
                            <input type="text" required class="form-control" name="update_lastnameeng" id="update_lastnameeng" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>Business</label>
                            <input type="text" required class="form-control" name="update_business" id="update_business" >
                        </div>
                        <div class="col-lg-2">
                            <label>Department</label>
                            <input type="text" required class="form-control" name="update_dept" id="update_dept" >
                        </div>
                        <div class="col-lg-2">
                            <label>Job-Section</label>
                            <input type="text" required class="form-control" name="update_section" id="update_section" >
                        </div>
                        <div class="col-lg-3">
                            <label>Job-Task</label>
                            <input type="text" required class="form-control" name="update_jobtask" id="update_jobtask" >
                        </div>
                    </div>
                    <div class="form-group">                                                   
                        
                        <div class="col-lg-2">
                            <label>Position</label>
                            <input type="text" required class="form-control" name="update_position" id="update_position" >
                        </div>
                        <div class="col-lg-3">
                            <label>Site</label>
                            <input type="text" required class="form-control" name="update_site" id="update_site" >
                        </div>
                        <div class="col-lg-3">
                            <label>Join Date</label>                               
                            <input type="text" class="form-control" name="update_joindate" id="update_joindate">
                        </div>
                        <div class="col-lg-3">
                            <label>Status</label>
                            <input type="text" required class="form-control" name="update_status" id="update_status" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>Start Date</label>                               
                            <input type="text" class="form-control" name="update_startdate" id="update_startdate">
                        </div>
                        <div class="col-lg-2">
                            <label>End Date</label>                               
                            <input type="text" class="form-control" name="update_enddate" id="update_enddate">
                        </div>
                        <div class="col-lg-2">
                            <label>Time</label>
                            <input type="text" class="form-control" name="update_time" id="update_time">
                        </div>
                        <div class="col-lg-2">
                            <label>Duration</label>
                            <input type="text" class="form-control" name="update_duration" id="update_duration">
                        </div>
                        <div class="col-lg-2">
                            <label>Module</label>
                            <select class="form-control" name="update_module" id="update_module">
                                <option value="Competency">Competency</option>
                                <option value="Technical Skill">Technical Skill</option>
                                <option value="Leadership Skill">Leadership Skill</option>
                                <option value="Safety">Safety</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Code Course</label>
                            <input type="text" class="form-control" name="update_codecourse" id="update_codecourse">
                        </div>
                        <div class="col-lg-2">
                            <label>Course name</label>
                            <input type="text" class="form-control" name="update_coursename" id="update_coursename">
                        </div>
                        <div class="col-lg-2">
                            <label>Institute</label>
                            <input type="text" class="form-control" name="update_institute" id="update_institute">
                        </div>
                        <div class="col-lg-2">
                            <label>Location</label>
                            <input type="text" class="form-control" name="update_location" id="update_location">
                        </div>
                        <div class="col-lg-2">
                            <label>Type course</label>
                            <input type="text" class="form-control" name="update_typecourse" id="update_typecourse">
                        </div>
                        <div class="col-lg-2">
                            <label>Year</label>
                            <input type="text" class="form-control" name="update_year" id="update_year">
                        </div>
                        <div class="col-lg-2">
                            <label>Cost</label>
                            <input type="text" class="form-control" name="update_cost" id="update_cost">
                        </div>
                        <br>
                    </div>
                    <br>        
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
<div class="modal fade" id="delete_record_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">ลบข้อมูล :</h3>
            </div>

            <form class="form-horizontal" role="form" action="admin_p32_trainingrecord_del.php" onclick="confirmation()" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label>ข้อมูลส่วนบุคคล :</label>
                                    <input type="text" class="form-control" id="delete_emp_code" name="delete_emp_code">
                                </div>
                                <div class="col-lg-3">  
                                    <label>Name-Surname</label>   
                                    <input type="text" disabled class="form-control" id="delete_name_surname" >
                                </div>
                                <div class="col-lg-3">
                                    <label>Title</label>
                                    <input type="text" disabled  class="form-control" id="delete_title" >
                                </div>
                                <div class="col-lg-3">
                                    <label>Name-TH</label>
                                    <input type="text" disabled class="form-control" id="delete_nameth" >
                                </div>                    
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label>Surname-TH</label>
                                    <input type="text" disabled class="form-control" id="delete_surnameth" >
                                </div>
                                <div class="col-lg-3">
                                    <label>Firstname-ENG</label>                              
                                    <input type="text" disabled class="form-control" id="delete_firstname_eng" >
                                </div>
                                <div class="col-lg-3">
                                    <label>Lastname-ENG</label>
                                    <input type="text" disabled class="form-control" id="delete_lastname_eng" >
                                </div>
                                <div class="col-lg-3">
                                    <label>Business</label>
                                    <input type="text" disabled class="form-control" id="delete_business" >
                                </div> 
                            </div>
                            <div class="form-group">                                                   
                                <div class="col-lg-4">
                                    <label>Dept</label>
                                    <input type="text" disabled class="form-control" id="delete_dept" >
                                </div>
                                <div class="col-lg-2">
                                    <label>Section</label>          
                                    <input type="text" disabled class="form-control" id="delete_section" >
                                </div>
                                <div class="col-lg-2">
                                    <label>Job-Task</label>
                                    <input type="text" disabled class="form-control" id="delete_jobtask" >
                                </div>
                                <div class="col-lg-2">
                                    <label>Position</label>
                                    <input type="text" disabled class="form-control" id="delete_position" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="col-lg-2">
                                    <label>Site</label>
                                    <input type="text" disabled class="form-control" id="delete_site" >               
                                </div>
                                <div class="col-lg-2">
                                    <label>Join-date</label>
                                    <input type="text" disabled class="form-control" id="delete_joindate" >            
                                </div>
                                <div class="col-lg-2">
                                    <label>status</label>
                                    <input type="text" disabled class="form-control" id="delete_status" >
                                </div>
                                <div class="col-lg-2">
                                    <label>Start-date</label>
                                    <input type="text" disabled class="form-control" id="delete_startdate" >
                                </div>
                                <div class="col-lg-2">
                                    <label>End-date</label>
                                    <input type="text" disabled class="form-control" id="delete_enddate" >
                                </div>
                                <div class="col-lg-2">
                                    <label>Time</label>                               
                                    <input type="text" disabled class="form-control" id="delete_time" >
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="col-lg-2">
                                    <label>Duration</label>
                                    <input type="text" disabled class="form-control" id="delete_duration" >               
                                </div>
                                <div class="col-lg-2">
                                    <label>Module</label>
                                    <input type="text" disabled class="form-control" id="delete_module" >            
                                </div>
                                <div class="col-lg-2">
                                    <label>Code-Course</label>
                                    <input type="text" disabled class="form-control" id="delete_code_course" >
                                </div>
                                <div class="col-lg-2">
                                    <label>Course-name</label>
                                    <input type="text" disabled class="form-control" id="delete_course_name" >
                                </div>
                                <div class="col-lg-2">
                                    <label>Institute</label>
                                    <input type="text" disabled class="form-control" id="delete_institute" >
                                </div>
                                <div class="col-lg-2">
                                    <label>Location</label>                               
                                    <input type="text" disabled class="form-control" id="delete_location" >
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="col-lg-2">
                                    <label>Type-Course</label>
                                    <input type="text" disabled class="form-control" id="delete_typecourse" >               
                                </div>
                                <div class="col-lg-2">
                                    <label>Year</label>
                                    <input type="text" disabled class="form-control" id="delete_year" >            
                                </div>
                                <div class="col-lg-2">
                                    <label>Cost</label>
                                    <input type="text" disabled class="form-control" id="delete_cost" >
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
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

                if( $_POST['selDept'] == 'ALL')
                {
                    echo "Department : " . $_POST['selDept'] . "<br>";

                    //$strSql = "SELECT * ";
                    //$strSql .= "FROM Emp_Main ";
                    //$strSql .= "ORDER BY job_department, emp_code ";

                    $strSql = "SELECT T.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
                    $strSql .= "FROM MAS_TRAINING_RECORD_NEW T ";
                    $strSql .= "JOIN Emp_Main E ON T.emp_code = E.emp_code ";
                    $strSql .= "ORDER BY T.Emp_Code ";
                    echo $strSql . "<br>";
                    
                }
                else IF ($_POST['selEmp'])
                {

                    //echo "select dept=" . $_POST['selDept'] . " / postion = " . $_POST['selPos'] ." / employee = ALL";

                    $strSql = "SELECT T.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
                    $strSql .= "FROM MAS_TRAINING_RECORD_NEW T ";
                    $strSql .= "JOIN Emp_Main E ON T.emp_code = E.emp_code ";
                    $strSql .= "WHERE E.job_department ='" .  $_POST['selDept'] . "' ";
                    $strSql .= "AND E.job_position ='" .  $_POST['selPos'] . "'  ";
                    $strSql .= "AND E.emp_code ='" .  $_POST['selEmp'] . "'  ";
                    $strSql .= "ORDER BY T.Emp_Code ";
                    echo $strSql . "<br>"; 

                }
                else 
                {
                    //echo "select dept=" . $_POST['selDept'] . " / postion = " . $_POST['selPos'] ." / employee = " . $_POST['selEmp'];

                    $strSql = "SELECT T.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'e+mp_tlname'";
                    $strSql .= "FROM MAS_TRAINING_RECORD_NEW T ";
                    $strSql .= "JOIN Emp_Main E ON T.emp_code = E.emp_code ";
                    $strSql .= "WHERE E.emp_code ='" .  $_POST['selEmp'] . "' ";
                    $strSql .= "ORDER BY T.Emp_Code ";
                    echo $strSql . "<br>";
                }

                $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                $statement->execute();  
                $nRecCount = $statement->rowCount();

                if ($nRecCount >0)
                {
                    $dataArray = array();
                    $rowArray = array("Emp_Code", "Name_Surname", "Position", "Module", "Code_Course", "Course_name", "Institute",
                                "Location", "Type_Course", "Start_Date", "End_Date", "Duration", "Year");
                    array_push($dataArray, $rowArray);
                    while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                    {
                        //echo $ds["emp_code"] . "<br>";
                        $rowArray = array($ds["Emp_Code"], 
                                        $ds["Name_Surname"], 
                                        $ds["Position"], 
                                        $ds["Module"], 
                                        $ds["Code_Course"], 
                                        $ds["Course_name"], 
                                        $ds["Institute"],
                                        $ds["Location"],
                                        $ds["Type_Course"],
                                        date('Y-m-d', strtotime($ds["Start_Date"])),
                                        date('Y-m-d', strtotime($ds["End_Date"])),
                                        $ds["Duration"],
                                        $ds["Year"]);
                        array_push($dataArray, $rowArray);
                    }

                    $fileName = "tmpTrainingRecordData.csv";
                    $fp = fopen('tmpTrainingRecordData.csv', 'w');
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