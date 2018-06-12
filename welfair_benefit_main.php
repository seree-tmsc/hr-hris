<div class="row">
    <div class="col-md-12">
        <div class="form-inline">
            Search : 
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(3)" placeholder="Search by user code.." title="Type user code">
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
            include "welfair_benefit_list.php";
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
            </div>

            <div class="modal-body">
                <div class="panel panel-default">
                    <!--
                    <div class="panel-heading">
                        <h3 class="panel-title">Input Form</h3>
                    </div>
                    -->

                    <form action="welfair_benefit_add.php" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Emp-List:</label>
                                    <?php require_once "dtl_emp_list.php"; ?>
                                </div>
                                <div class="form-group">
                                    <label>Emp-Code:</label>
                                    <p id="var1" class="form-control" disabled></p>
                                </div>
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <p id="var2" class="form-control" disabled></p>
                                </div>
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <p id="var3" class="form-control" disabled></p>
                                </div>                                    
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Enter Date:</label>
                                    <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Date:</label>
                                    <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>" name="add_wd_date">
                                </div>                                
                                <div class="form-group">
                                    <label>Line:</label>
                                    <input type="number" required class="form-control" value="1" name="add_line_item" >
                                </div>
                                <div class="form-group">
                                    <label>Detail:</label>
                                    <select class="form-control" name="add_sel_detail_item">
                                        <option value="ค่ารักษาพยาบาล">ค่ารักษาพยาบาล</option>                                            
                                    </select>                                        
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Amount:</label>
                                    <input type="number" required class="form-control" name="add_amount">
                                </div>
                                <!--
                                <div class="form-group">
                                    <label>Upload File:</label>
                                    <input type="file" accept="application/pdf" required class="form-control" name="add_attachment">
                                </div>
                                -->
                                <div class="form-group">
                                    <label>Reference:</label>
                                    <!-- HTNML for bootstrap-inputtype -->
                                    <!-- image-preview-filename input [CUT FROM HERE]-->                                    
                                    <div class="input-group image-preview">                                        
                                        <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                        <span class="input-group-btn">
                                            <!-- image-preview-clear button -->                                            
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <!-- image-preview-input -->                                            
                                            <div class="btn btn-default image-preview-input">                                                
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>                                                
                                                <input type="file" name="add_attachment" required accept="application/pdf"/> <!-- rename it -->
                                            </div>
                                        </span>
                                    </div>
                                    <!-- /input-group image-preview [TO HERE]-->
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <div align="right">                            
                                <button type="submit" class="btn btn-success">
                                    Submit
                                </button>
                                <button type="cancel" class="btn btn-danger" data-dismiss="modal">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!--
            <div class="modal-footer">                    
            </div>
            -->
        </div>
    </div>
</div>


<!-- Bootstrap Modals -->
<!-- Modal - Update Record/User -->    
<div class="modal fade" id="update_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Update Record</h4>
            </div>

            <div class="modal-body">
                <div class="panel panel-default">
                    <!--
                    <div class="panel-heading">
                        <h3 class="panel-title">Input Form</h3>
                    </div>
                    -->
                    <form action="welfair_benefit_update.php" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Emp-List:</label>
                                    <input type="text" disabled class="form-control">
                                </div> 
                                <div class="form-group">
                                    <!--<label>Emp-Code:</label>-->
                                    <input type="hidden"class="form-control" id="paramupdate_auto_no" name="paramupdate_auto_no">
                                </div>
                                <div class="form-group">
                                    <label>Emp-Code:</label>
                                    <input type="text" disabled class="form-control" name="paramupdate_emp_code" id="update_emp_code">
                                </div>
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input type="text" disabled class="form-control" id="update_emp_fname" >
                                </div>
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input type="text" disabled class="form-control" id="update_emp_lname" >
                                </div>                     
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Enter Date:</label>                                        
                                    <input type="date" class="form-control" id="update_ent_date" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Date:</label>                                        
                                    <input type="date" disabled class="form-control" name="paramupdate_wd_date" id="update_wd_date">
                                </div>                                                                                                                                   
                                <div class="form-group">
                                    <label>Line:</label>
                                    <input type="number" disabled class="form-control" name="paramupdate_line_item" id="update_line_item" >
                                </div>
                                <div class="form-group">
                                    <label>Detail:</label>
                                    <select class="form-control" name="update_sel_detail_item" disabled>
                                        <option value="ค่ารักษาพยาบาล">ค่ารักษาพยาบาล</option>                                            
                                    </select>                                        
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Amount:</label>
                                    <input type="number" class="form-control" name="paramupdate_amount" id="update_amount">
                                </div>                                
                                <div class="form-group">
                                    <label>Reference:</label>
                                    <input type="text" disabled class="form-control" id="update_attachment">
                                </div>
                                <div class="form-group">
                                    <label>New Reference:</label>
                                    <!-- HTNML for bootstrap-inputtype -->                                    
                                    <!-- image-preview-filename input [CUT FROM HERE]-->
                                    <div class="input-group image-preview">
                                        <input type="text" id="edit_emp_file_name" class="form-control image-preview-filename"> <!-- don't give a name === doesn't send on POST/GET -->
                                        <span class="input-group-btn">
                                            <!-- image-preview-clear button -->
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <!-- image-preview-input -->
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="paramupdate_attachment"/> <!-- rename it -->
                                            </div>
                                        </span>
                                    </div>
                                    <!-- /input-group image-preview [TO HERE]-->                                      
                                </div>
                                <div class="form-group">
                                    <label>&nbsp;</label>        
                                    <label><input type="checkbox" value="1" name="paramupdate_upload">Upload New Ref.</label>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <div align="right">                            
                                <button type="submit" class="btn btn-success" name="btn_submet">
                                    Update
                                </button>
                                <button type="cancel" class="btn btn-danger" name ="btn_cancel" data-dismiss="modal">
                                    Cancel
                                </button>                                    
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!--
            <div class="modal-footer">                    
            </div>
            -->
        </div>
    </div>
</div>


<!-- Bootstrap Modals -->
<!-- Modal - Delete Record/User -->    
<div class="modal fade" id="delete_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Delete Record</h4>
            </div>

            <div class="modal-body">
                <div class="panel panel-default">
                    <!--
                    <div class="panel-heading">
                        <h3 class="panel-title">Input Form</h3>
                    </div>
                    -->

                    <form action="welfair_benefit_delete.php" method="post">
                        <div class="panel-body">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Emp-List:</label>
                                    <input type="text" disabled class="form-control">
                                </div> 
                                <div class="form-group">
                                    <!--<label>Emp-Code:</label>-->
                                    <input type="hidden"class="form-control" id="paramdelete_auto_no" name="paramdelete_auto_no">
                                </div>
                                <div class="form-group">
                                    <label>Emp-Code:</label>
                                    <input type="text" disabled class="form-control" id="delete_emp_code">
                                </div>
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input type="text"  disabled class="form-control" id="delete_emp_fname">
                                </div>
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input type="text" disabled class="form-control" id="delete_emp_lname" >
                                </div>                     
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Enter Date:</label>                                        
                                    <input type="date" class="form-control" name="delete_ent_date" id="delete_ent_date" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Date:</label>                                        
                                    <input type="date" disabled class="form-control" name="delete_wd_date" id="delete_wd_date">
                                </div>                                                                                                                                   
                                <div class="form-group">
                                    <label>Line:</label>
                                    <input type="number" disabled class="form-control" name="delete_line_item" id="delete_line_item" >
                                </div>
                                <div class="form-group">
                                    <label>Detail:</label>
                                    <select class="form-control" name="delete_sel_detail_item" disabled>
                                        <option value="ค่ารักษาพยาบาล">ค่ารักษาพยาบาล</option>                                            
                                    </select>                                        
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Amount:</label>
                                    <input type="number" disabled class="form-control" name="delete_amount" id="delete_amount">
                                </div>                                
                                <div class="form-group">
                                    <label>Upload File:</label>
                                    <input type="text"  disabled class="form-control" id="delete_attachment">
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <div align="right">                            
                                <button type="submit" class="btn btn-success" name="btn_submet">
                                    Delete
                                </button>
                                <button type="cancel" class="btn btn-danger" name ="btn_cancel" data-dismiss="modal">
                                    Cancel
                                </button>
                                <!--onclick="onclick=window.location.href='p61.php'"-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!--
            <div class="modal-footer">                    
            </div>
            -->
        </div>
    </div>
</div>