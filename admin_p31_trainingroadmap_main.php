<!-- Content Section -->
<div class="row">
    <div class="col-md-12">
        <div class="form-inline">
            
            <!--Search : 
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(2)" placeholder="Search by Sec..." title="Type Sec">  -->

            Search : 
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(4)" placeholder="Search by Module..." title="Type Module"> 
    
            Search : 
            <input type="text" class="form-control" id="myInput2" onkeyup="Func_Search2(5)" placeholder="Search by Code Course..." title="Type Code Course"> 

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
            include "admin_p31_trainingroadmap_list.php";                    
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

            <form class="form-horizontal" role="form" action="admin_p31_trainingroadmap_add.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>ข้อมูลส่วนบุคคล : *</label>
                            <input type="text" required placeholder ="Business" class="form-control" name="add_biz" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="Department" class="form-control" name="add_dep" >
                        </div>
                        <div class="col-lg-2">  
                            <label>&nbsp;</label>                
                            <input type="text" required placeholder ="Section" class="form-control" name="add_sec" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="Task" class="form-control" name="add_task" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="Module" class="form-control" name="add_module" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="Code_Course" class="form-control" name="add_codecourse" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="Course_Content" class="form-control" name="add_coursecontent" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <input type="text" required placeholder ="Course_Name" class="form-control" name="add_coursename" >
                        </div>
                        <div class="col-lg-2">                                 
                            <input type="text" required placeholder ="Position" class="form-control" name="add_position" >  
                        </div>
                        <div class="col-lg-2">
                            <input type="text" required placeholder ="JG" class="form-control" name="add_JG" >
                        </div>
                        <div class="col-lg-2">
                            <input type="text" required placeholder ="Type" class="form-control" name="add_type" >
                        </div> 
                    </div>
                    <div class="form-group">                                                   
                        <div class="col-lg-3">
                            <input type="text" required placeholder ="Instructor" class="form-control" name="add_instructor" >
                        </div>
                        <div class="col-lg-3">
                            <input type="text" required placeholder ="Status_Training" class="form-control" name="add_statustraining" >
                        </div>
                    </div>
                    <br>
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

            <form class="form-horizontal" role="form" action="admin_p31_trainingroadmap_update.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>ข้อมูลส่วนบุคคล : *</label>
                            <input type="text" class="form-control" name="update_biz" id="update_biz" >
                            <input type="hidden" class="form-control" name="paramupdate_biz" id="paramupdate_biz" > 
                        </div>
                        <div class="col-lg-3">
                            <label>DEP</label>
                            <input type="text" required class="form-control" name="update_dep" id="update_dep" >
                        </div>
                        <div class="col-lg-2">  
                        <label>SEC</label>
                            <input type="text" required class="form-control" name="update_sec" id="update_sec" >
                        </div>
                        <div class="col-lg-3">
                            <label>TASK</label>
                            <input type="text" required class="form-control" name="update_task" id="update_task" >
                        </div>
                        <div class="col-lg-5">
                            <label>Moodule</label>
                            <input type="text" required class="form-control" name="update_module" id="update_module" >
                        </div>
        
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Code-Course</label>
                            <input type="text" required class="form-control" name="update_codecourse" id="update_codecourse" >
                            <input type="hidden" class="form-control" name="paramupdate_codecourse" id="paramupdate_codecourse" >
                        </div>
                        <div class="col-lg-2">
                            <label>Course-Content</label>                                 
                            <input type="text" required class="form-control" name="update_coursecontent" id="update_coursecontent" >
                        </div>
                        <div class="col-lg-3">
                            <label>Course-name</label>
                            <input type="text" required class="form-control" name="update_coursename" id="update_coursename" >
                        </div>
                        <div class="col-lg-3">
                            <label>Position</label>
                            <input type="text" required class="form-control" name="update_position" id="update_position" >
                        </div>
                    </div>
                    <div class="form-group">   
                        <div class="col-lg-2">
                            <label>Job Grade</label>
                            <input type="text" required class="form-control" name="update_JG" id="update_JG" >
                        </div>
                        <div class="col-lg-3">
                            <label>Job-Task</label>
                            <input type="text" required class="form-control" name="update_type" id="update_type" >
                        </div>
                        <div class="col-lg-2">
                            <label>Position</label>
                            <input type="text" required class="form-control" name="update_instructor" id="update_instructor" >
                        </div>
                        <div class="col-lg-3">
                            <label>Site</label>
                            <input type="text" required class="form-control" name="update_statustraining" id="update_statustraining" >
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
<div class="modal fade" id="delete_record_modal1" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">ลบข้อมูล :</h3>
            </div>

            <form class="form-horizontal" role="form" action="admin_p31_trainingroadmap_del.php" onclick="confirmation()" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label>ข้อมูลส่วนบุคคล :</label>
                                    <input type="text" class="form-control" id="delete_biz" name="delete_biz">
                                </div>
                                <div class="col-lg-3">  
                                    <label>DEP</label>   
                                    <input type="text" disabled class="form-control" id="delete_dep" >
                                </div>
                                <div class="col-lg-3">
                                    <label>SEC</label>
                                    <input type="text" class="form-control" id="delete_sec" name="delete_sec">
                                </div>
                                <div class="col-lg-3">
                                    <label>TASK</label>
                                    <input type="text" disabled class="form-control" id="delete_task" >
                                </div>                    
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label>Module</label>
                                    <input type="text" disabled class="form-control" id="delete_Module" >
                                </div>
                                <div class="col-lg-3">
                                    <label>Code-Course</label>                              
                                    <input type="text" class="form-control" id="delete_codecourse" name="delete_codecourse">
                                </div>
                                <div class="col-lg-3">
                                    <label>Course-Content</label>
                                    <input type="text" disabled class="form-control" id="delete_coursecontent" >
                                </div>
                                <div class="col-lg-3">
                                    <label>Course-Name</label>
                                    <input type="text" disabled class="form-control" id="delete_coursename" >
                                </div> 
                            </div>
                            <div class="form-group">                                                   
                                <div class="col-lg-2">
                                    <label>Position</label>
                                    <input type="text" disabled class="form-control" id="delete_position" >
                                </div>
                                <div class="col-lg-2">
                                    <label>JG</label>          
                                    <input type="text" disabled class="form-control" id="delete_JG" >
                                </div>
                                <div class="col-lg-2">
                                    <label>Type</label>
                                    <input type="text" disabled class="form-control" id="delete_type" >
                                </div>
                                <div class="col-lg-2">
                                    <label>Instructor</label>
                                    <input type="text" disabled class="form-control" id="delete_instructor" >
                                </div>
                                <div class="col-lg-2">
                                    <label>Status-Training</label>
                                    <input type="text" disabled class="form-control" id="delete_statustraining" >
                                </div>
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
                    echo "DEP : " . $_POST['selDept'] . "<br>";

                    //$strSql = "SELECT * ";
                    //$strSql .= "FROM Emp_Main ";
                    //$strSql .= "ORDER BY job_department, emp_code ";

                    $strSql = "SELECT T.*, E.job_department, E.job_position ";
                    $strSql .= "FROM MAS_TRAINING_ROADMAP_NEW AS T INNER JOIN Emp_main AS E ON T.DEP = E.job_department and T.Position = E.job_position ";
                    $strSql .= "ORDER BY SEC ";

                }
                else
                {
                    echo "DEP : " . $_POST['selDept'] . " / Position : " . $_POST['selPos'] . "<br>";

                    $strSql = "SELECT * ";
                    $strSql .= "FROM MAS_TRAINING_ROADMAP_NEW ";
                    $strSql .= "WHERE DEP='" . $_POST['selDept'] . "' ";
                   
                    if($_POST['selPos'] != 'ALL')
                    {
                        $strSql .= "AND Position='" . $_POST['selPos'] . "' ";
                    }
                    else
                    {
                        $strSql .= "ORDER BY SEC ";
                    }

                }

                $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                $statement->execute();  
                $nRecCount = $statement->rowCount();

                if ($nRecCount >0)
                {
                    $dataArray = array();
                    $rowArray = array("Biz", "Dep", "Sec", "Task", "Module", "Code_Course", "Course_Content",
                                "Course_Name", "Position");
                    array_push($dataArray, $rowArray);
                    while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                    {
                        //echo $ds["emp_code"] . "<br>";
                        $rowArray = array($ds["BIZ"], 
                                        $ds["DEP"], 
                                        $ds["SEC"], 
                                        $ds["TASK"], 
                                        $ds["Module"], 
                                        $ds["Code_Course"], 
                                        $ds["Course_Content"],
                                        $ds["Course_Name"],
                                        $ds["Position"]);
                        array_push($dataArray, $rowArray);
                    }

                    $fileName = "tmpRoadmapData.csv";
                    $fp = fopen('tmpRoadmapData.csv', 'w');
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