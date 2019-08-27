<?php
 require_once("include/library.php");
 //echo $_GET['paramEMP'];
 //echo $_GET['paramName'];
?>
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
                        <h1 class = "panel-title">Add Detail</h1>
                    </div> <!-- PANEL HEADER -->
                    <!-- PANEL BODY -->
                    <div class="panel-body">
                        <!-- FORM -->
                        <form action="" method="post">
                        <div class="form-group">
                            <div class="col-lg-2" align="left">
                                <label>รหัสพนักงาน</label>
                                <input type="text" readonly class="form-control" value="<?php echo $paramEMP; ?>" > 
                            </div>
                            <div class="col-lg-2" align="left">  
                                <label>ชื่อ-นามสกุล</label>
                                <input type="text" readonly class="form-control" value="<?php echo $paramName; ?>" >
                            </div>
                            <div class="col-lg-3" align="left">    
                                <label>ชื่อ</label>
                                <input type="text" readonly class="form-control" value="<?php echo $emp_tfname; ?>" >
                            </div>
                            <div class="col-lg-5" align="left">
                                <label>นามสกุล</label>                
                                <input type="text" readonly class="form-control" value="<?php echo $emp_tlname; ?>" >
                            </div>
                        </div>

                            
                            
                            
                            
                            
                            
                            
                            <div class="form-group">
                                <label>Select BUSINESS :</label>
                                <select class="form-control" name="Select_By_BUSI">
                                    <Option value="BIZ">BIZ</option>
                                    <option value="IR">IR</option>
                                    <option value="MCI">MCI</option>
                                    <option value="SCM">SCM</option>
                                    <option value="TECH">TECH</option>
                                    <option value="UU">UU</option>
                                </select>     
                            </div>
                            <div class="form-group">
                                <label>Select Department :</label>
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
                                    <option value="R&D">R&D</option>
                                    <option value="SAL">SAL</option>
                                    <option value="SHE&Q">SHE&Q</option>
                                    <option value="WH">WH</option>                  
                                </select>                                
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

    