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
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(1)" placeholder="Search by user code.." title="Type user code">
    
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_record_modal">
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
            include "user_master_list.php";                    
        ?>
    </div>
</div>    

<!-- Bootstrap Modals -->
<!-- Modal - Add New Record -->
<div class="modal fade" id="add_record_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">เพิ่มข้อมูล :</h4>
            </div>

            <form class="form-horizontal" role="form" action="user_master_add.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>Employee List :</label>
                            <?php require_once "dtl_emp_list.php"; ?>
                        </div>

                        <div class="col-lg-4">
                            <label>Emp-Code:</label>
                            <p id="var1" class="form-control" disabled></p>
                        </div>
                        <div class="col-lg-2">
                            <label>Emp-Code:</label>
                            <p id="var2" class="form-control" disabled></p>
                        </div>
                        <div class="col-lg-3">
                            <label>Emp-Code:</label>
                            <p id="var3" class="form-control" disabled></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>e-Mail :</label>
                            <input type="email" required placeholder ="e-Mail" class="form-control" name="add_user_email" >
                        </div>
                        <div class="col-lg-3">
                            <label>User-Type :</label>
                            <select required class="form-control" name="add_user_type">
                                <option value="-">-</option>
                                <option value="U">User</option>
                                <option value="P">Power User</option>
                                <option value="A">Administrator</option>
                            </select>
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

<!-- Modal - Update Record -->
<div class="modal fade" id="update_record_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">ปรับปรุงข้อมูล :</h4>
            </div>

            <form class="form-horizontal" role="form" action="user_master_update.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>Employee List :</label>
                            <?php //require_once "dtl_emp_list.php"; ?>
                            <input type="hidden" class="form-control" id="paramupdate_emp_code" name="paramupdate_emp_code">
                        </div>
                        <div class="col-lg-4">
                            <label>Emp-Code:</label>                            
                            <input type="text" disabled class="form-control" id="update_emp_code" >
                        </div>
                        <div class="col-lg-2">
                            <label>Emp-Fname:</label>
                            <input type="text" disabled class="form-control" id="update_emp_tfname" >
                        </div>
                        <div class="col-lg-3">
                            <label>Emp-Lname:</label>
                            <input type="text" disabled class="form-control" id="update_emp_tlname" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>e-Mail :</label>
                            <input type="email" disabled class="form-control" id="update_user_email" >
                        </div>
                        <div class="col-lg-3">
                            <label>User-Type :</label>
                            <select class="form-control" id="update_user_type" name="update_user_type">
                                <option value="-">-</option>
                                <option value="U">User</option>
                                <option value="P">Power User</option>
                                <option value="A">Administrator</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Create-Date :</label>
                            <input type="date" disabled class="form-control" id="update_user_create_date" >
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

<!-- Modal - Delete Record -->
<div class="modal fade" id="delete_record_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">ลบข้อมูล :</h4>
            </div>

            <form class="form-horizontal" role="form" action="user_master_del.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>Employee List :</label>
                            <?php //require_once "dtl_emp_list.php"; ?>
                            <input type="hidden" class="form-control" id="paramdelete_emp_code" name="paramdelete_emp_code">
                        </div>
                        <div class="col-lg-4">
                            <label>Emp-Code:</label>                            
                            <input type="text" disabled class="form-control" id="delete_emp_code" >
                        </div>
                        <div class="col-lg-2">
                            <label>Emp-Fname:</label>
                            <input type="text" disabled class="form-control" id="delete_emp_tfname" >
                        </div>
                        <div class="col-lg-3">
                            <label>Emp-Lname:</label>
                            <input type="text" disabled class="form-control" id="delete_emp_tlname" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>e-Mail :</label>
                            <input type="email" disabled class="form-control" id="delete_user_email" >
                        </div>
                        <div class="col-lg-3">
                            <label>User-Type :</label>
                            <select disabled class="form-control" id="delete_user_type">
                                <option value="-">-</option>
                                <option value="U">User</option>
                                <option value="P">Power User</option>
                                <option value="A">Administrator</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Create-Date :</label>
                            <input type="date" disabled class="form-control" id="delete_user_create_date" >
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