<!-- COTAINER  -->
<div class="container-fulid">
        <p></p>
        <!-- ROW  -->
        <div class="row">
            <!-- COLUMN  -->
            <div class="col-md-6 col-md-offset-3">
                <!-- PANEL -->
                <div class="panel panel-primary">
                    <!-- PANEL HEADER -->
                    <div class="panel-heading">
                        <h1 class = "panel-title">Training Roadmap Criteria</h1>
                    </div> <!-- PANEL HEADER -->
                    <!-- PANEL BODY -->
                    <div class="panel-body">
                        <!-- FORM -->
                        <form action="Training_Roadmap_list1.php" method="post">
                            <div class="form-group">
                                <div class="col-lg-4">
                                    <label>Employee-List:</label>
                                    <?php require_once "dlt_emp_list_roadmap.php"; ?>
                                </div>
                                <div class="col-lg-4">
                                    <label>Emp-Code:</label>
                                    <p id="var1" type="text" require class="form-control" name ='paramEmpcode'></p>
                                </div>
                                <div class="col-lg-4">
                                    <label>First-Name:</label>
                                    <p id="var2" class="form-control" name='paramName' disabled></p>
                                </div>
                                <div class="col-lg-4">
                                    <label>Business:</label>
                                    <p id="var3" class="form-control" name='paramBiz' disabled></p>
                                </div>
                                <div class="col-lg-4">
                                    <label>Department:</label>
                                    <p id="var4" class="form-control" name='paramDep' disabled></p>
                                </div>
                                <div class="col-lg-4">
                                    <label>Position:</label>
                                    <p id="var5" class="form-control" name='paramPosi' disabled></p>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success"
                                    onclick="target='_blank';">OK
                            <button type="cancel" class="btn btn-danger" 
                                    onclick="javascript:window.location='p11.php'; return false;">Cancel
                            </button>    
                        </form> <!-- FORM -->               
                    </div> <!-- PANEL BODY -->
                    <!-- PANEL FOOTER -->
                    <div class="panel-footer">
                        Panel Footer
                    </div> <!-- PANEL FOOTER --> 
                </div> <!-- PANEL -->
            </div> <!-- COLUMN  -->
        </div> <!-- ROW  -->
    </div> <!-- CONTAINER  -->