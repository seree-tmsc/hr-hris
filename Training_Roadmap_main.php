<!-- Content Section -->
<div class="row">
    <div class="col-md-12">
        <!--<p></p>-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-inline">         
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
            include "Training_Roadmap_List.php"; 
        ?>
    </div>
</div>        

<!-- Bootstrap Modals -->
<!-- Modal - Select Criteria/User -->
<div class="modal fade" id="CriteriaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!--<h4 class="modal-title">Criteria</h4>  -->
                </div>

                <div class="modal-body">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">SELECT CRITERIA</h3>
                        </div>
                        <div class="panel-body">
                            <form action="Training_Roadmap_main.php" method="post">                                
                                <div class="row" >
                                <div class="col-md-6">
                                        <label>DEPARTMENT:<label>                                                                                 
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="Select_By_DEPT">
                                            <Option value="ACC">ACC</option>
                                            <option value="ENG">ENG</option>
                                            <option value="HR">HR</option>
                                            <option value="IT">IT</option>
                                            <option value="MN">MN</option>
                                            <option value="MN">MR</option>
                                            <option value="MN">PD-IRS</option>
                                            <option value="MN">PD-IRW</option>
                                            <option value="MN">PD-UTE</option>
                                            <option value="MN">PD-UU</option>
                                            <option value="MN">PN</option>
                                            <option value="MN">PUR</option>
                                            <option value="MN">QA</option>
                                            <option value="MN">QC</option>
                                            <option value="MN">R&D-IRS</option>
                                            <option value="MN">R&D-IRW</option>
                                            <option value="MN">R&D-UU</option>
                                            <option value="MN">SALE-IR</option>
                                            <option value="MN">SALE-UU</option>
                                            <option value="MN">SHE</option>
                                            <option value="MN">WH</option>
                                        </select>
                                    </div>                                    
                                </div>
                                <br>
                                <div class="row" >
                                    <div class="col-md-6">
                                        <label>MODULE:<label>                                                                                 
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="Select_By_MODULE">
                                            <Option value="Basic Skill">Basic Skill</option>
                                            <option value="TECH">TECHNICAL SKILL</option>
                                            <option value="COMPE">COMPETENCY SKILL</option>
                                            <option value="LEAD">LEADERSHIP SKILL</option>
                                            <option value="SAFE">SAFETY</option>
                                        </select>
                                    </div>                                  
                                </div>                                                           
             
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-success">
                                                Search
                                            </button>
                                            <button type="cancel" class="btn btn-danger">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <!--
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>                
                    <a class="btn btn-success" href="logout.php">Logout</a>
                    -->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->





