<!-- Modal - Update Record -->
<div class="modal fade" id="modal_for_update" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Update detail :</h4>
            </div>

            <form class="form-horizontal" role="form" action="Training_Roadmap_Update_Detail.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="paramupdate_emp_code" name="paramupdate_emp_code">

                        <div class="col-lg-4">
                            <label>Emp-Code:</label>                            
                            <input type="text" disabled class="form-control" id="update_emp_code" >
                        </div>
                        <div class="col-lg-4">
                            <label>Emp-Fname:</label>
                            <input type="text" disabled class="form-control" id="update_emp_name" >
                        </div>
                        <div class="col-lg-4">
                            <label>Training Set :</label>
                            <input type="text" disabled class="form-control" id="update_training_set" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-4">
                            <label>Module :</label>
                            <input type="text" disabled class="form-control" id="update_module" >
                        </div>
                        <input type="hidden" class="form-control" id="paramupdate_course_code" name="paramupdate_course_code">
                        <div class="col-lg-4">
                            <label>Course Code :</label>
                            <input type="text" disabled class="form-control" id="update_course_code" >
                        </div>
                        <div class="col-lg-4">
                            <label>Course Name :</label>
                            <input type="text" disabled class="form-control" id="update_course_name" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-4">
                            <label>Start Date :</label>
                            <input type="date" class="form-control" id="update_start_date" name="update_start_date">
                        </div>
                        <div class="col-lg-4">
                            <label>End Date :</label>
                            <input type="date" class="form-control" id="update_end_date" name="update_end_date">
                        </div>
                        <div class="col-lg-4">
                            <label>Training Day :</label>
                            <input type="text" class="form-control" id="update_training_day" name="update_training_day">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label>Institute :</label>
                            <input type="text" class="form-control" id="update_institute" name="update_institute">
                        </div>
                        <div class="col-lg-6">
                            <label>Location :</label>
                            <input type="text" class="form-control" id="update_location" name="update_location">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label>Site :</label>
                            <input type="text" class="form-control" id="update_site" name="update_site">
                        </div>
                        <div class="col-lg-4">
                            <label>Status :</label>
                            <input type="text" class="form-control" id="update_Status" name="update_Status">
                        </div>
                        <div class="col-lg-4">
                            <label>Type Course :</label>
                            <input type="text" class="form-control" id="update_typecourse" name="update_typecourse">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>Year :</label>
                            <input type="text" class="form-control" id="update_year" name="update_year">
                        </div>
                        <div class="col-lg-3">
                            <label>Cost :</label>
                            <input type="text" class="form-control" id="update_cost" name="update_cost">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">SAVE</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">CANCEL</button>
                </div>
            </form>
        </div>
    </div>
</div>