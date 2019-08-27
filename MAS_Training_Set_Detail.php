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
            include "MAS_Training_Set_Detail_list.php";                    
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
            <form class="form-horizontal" role="form" action="MAS_Training_SET_Detail_add.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>TrainingSET:</label>
                            <input autofocus type="text" require class="form-control"  name="paramTrainingSet">   
                        </div>
                        <div class="col-lg-6">
                            <label>CODE COURSE:</label>
                            <input autofocus type="text" require class="form-control" name="paramCode_Course">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>SKILL:</label>
                            <input autofocus type="text" require class="form-control" name="paramSkill">
                        </div>
                        <div class="col-lg-6">
                            <label>COURSE NAME:</label>
                            <input autofocus type="text" require class="form-control" name="paramCourse_Name">
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
            <form class="form-horizontal" role="form" action="MAS_Training_SET_Detail_Update.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        
                        <div class="col-lg-2">
                            <label>Training SET:</label>
                            <input type="text" class="form-control" id="update_TrainSet" name="paramupdate_TrainSet">
                        </div>
                        <div class="col-lg-2">
                            <label>Code Course:</label>
                            <input type="text" class="form-control" id="update_CodeCourse" name="paramupdate_CodeCourse">
                        </div>
                        <div class="col-lg-3">
                            <label>Skill:</label>
                            <input type="text" class="form-control" id="update_Skill" name="paramupdate_Skill">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Course Name:</label>
                            <input type="text" class="form-control" id="update_CourseName" name="paramupdate_CourseName">
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
            <form class="form-horizontal" role="form" action="MAS_Training_SET_del.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Training SET:</label>
                            <input type="text" class="form-control" id="delete_TrainSET" name="paramdelete_TrainSET" readonly>
                        </div>
                        <div class="col-lg-2">
                            <label>Code Course:</label>
                            <input type="text" class="form-control" id="delete_CodeCourse" name="paramdelete_CodeCourse" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label>Skill:</label>
                            <input type="text" class="form-control" id="delete_Skill" name="paramdelete_Skill" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Course name:</label>
                            <input type="text" class="form-control" id="delete_CourseName" name="paramdelete_CourseName" readonly>
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
