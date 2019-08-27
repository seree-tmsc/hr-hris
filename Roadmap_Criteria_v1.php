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
                        <h1 class = "panel-title">Criteria Roadmap By User</h1>
                    </div> <!-- PANEL HEADER -->
                    <!-- PANEL BODY -->
                    <div class="panel-body">
                        <!-- FORM -->
                        <form action="Training_Roadmap_list1.php" method="post">
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
                            <div class="form-group">
                            <label>Select Employee :</label>
                                <select class="form-control" name="Select_By_Emp">
                                    <option value=""><--Please Select User--></option>
                                    <?php
                                        //$strDefault = "OC-002";
                                        require_once('include/db_Conn.php');
                                        $strSql = "Select * From Emp_Main Order by emp_code ";
                                        //$strSql .= "where job_department='" . $_POST["Select_By_DEPT"] . "' ";

                                        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                                        $statement->execute();  
                                        $nRecCount = $statement->rowCount();
                                        echo $strSql;
                                        while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                                        {
                                            ?>
                                            <option value="<?php echo $ds["emp_code"];?>"><?php echo $ds["emp_code"]." - ".$ds["emp_efname"];?></option>
                                            <?php
                                        }
                                        ?>                     
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

    