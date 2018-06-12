<!-- Content Section -->

<!-- ROW AREA #1 -->
<div class="row">
    <div class="col-md-12">
        <!--<p></p>-->
    </div>
</div>

<!-- ROW AREA #2 -->
<div class="row">
    <div class="col-md-12">
        <div class="form-inline">
            Search : 
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(0)" placeholder="Search by user names.." title="Type user name">
    
            <div class="pull-right">
                <!--
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">
                    <span class="glyphicon glyphicon-plus"></span> 
                    Add
                </button>
                -->
                <button class="btn btn-success" onclick="javascript:showModalAdd()">
                    <span class="glyphicon glyphicon-plus"></span> 
                    Add
                </button>                
            </div>
        </div>
    </div>
</div>

<!-- ROW AREA #3 -->
<div class="row">
    <div class="col-md-12">
        <p></p>
        <!--<h5>User Data:</h5>-->
        <?php include "promotion_list.php"; ?>
    </div>
</div>    

<!-- BOOTSTRAP MODAL -->
<!-- MODAL - ADD New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add New Record</h4>
            </div>

            <form class="form-horizontal" role="form" action="promotion_add.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-5">
                            <label>Employee-List:</label>
                            <?php require_once "dtl_emp_list_all_emp_data.php"; ?>
                        </div>
                        <div class="col-lg-2">
                            <label>Emp-Code:</label>
                            <p id="var1" class="form-control" disabled></p>
                            <input type="hidden" id="add_emp_code" name="paramadd_emp_code">
                        </div>
                        <div class="col-lg-2">
                            <label>First-Name:</label>
                            <p id="var2" class="form-control" disabled></p>
                        </div>
                        <div class="col-lg-3">
                            <label>Last-Name:</label>
                            <p id="var3" class="form-control" disabled></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Year:</label>
                            <select readonly class="form-control" name="paramadd_promotion_year">                                    
                                <option value="<?php echo date('Y')?>"><?php echo date('Y')?></option>                                    
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>&nbsp;</label>
                            <input type="text" disabled class="form-control" value="Promotion-From:">
                        </div>
                        <div class="col-lg-2">
                            <label>Current-JG:</label>
                            <p id="var4" class="form-control" disabled></p>
                            <input type="hidden" id="add_promotion_from_jg" name="paramadd_promotion_from_jg">
                        </div>
                        <div class="col-lg-3">
                            <label>Curent-Position:</label>
                            <p id="var5" class="form-control" disabled></p>
                            <input type="hidden" id="add_promotion_from_pos" name="paramadd_promotion_from_pos">
                        </div>
                        <div class="col-lg-2">
                            <label>Current-Dept:</label>
                            <p id="var6" class="form-control" disabled></p>
                            <input type="hidden" id="add_promotion_from_dep" name="paramadd_promotion_from_dep">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>&nbsp;</label>                            
                        </div>
                        <div class="col-lg-3">
                            <label>&nbsp;</label>
                            <input type="text" disabled class="form-control" value="Promotion-To:">
                        </div>
                        <div class="col-lg-2">
                            <label>New-JG:</label>
                            <select required class="form-control" name="paramadd_promotion_to_jg">
                                <option value="-">-</option>
                                <option value="JG7">JG 7</option>
                                <option value="JG8">JG 8</option>
                                <option value="JG9">JG 9</option>
                                <option value="JG10">JG 10</option>
                                <option value="JG11">JG 11</option>
                                <option value="JG12">JG 12</option>
                                <option value="JG13">JG 13</option>
                                <option value="JG14">JG 14</option>
                                <option value="JG15">JG 15</option>
                                <option value="JG16">JG 16</option>                                
                            </select>                            
                        </div>
                        <div class="col-lg-3">
                            <label>New-Position:</label>
                            <input type="text" required class="form-control" name="paramadd_promotion_to_pos">
                        </div>
                        <div class="col-lg-2">
                            <label>New-Dept:</label>                            
                            <select  class="form-control" name="paramadd_promotion_to_dep">
                                <option value="-">-</option>
                                <option value="RD">R&D</option>
                                <option value="SALES">SAL</option>
                                <option value="ENG">ENG</option>
                                <option value="PRO">PRO</option>
                                <option value="PD-PLAN">PD-PLAN</option>
                                <option value="PUR">PUR</option>
                                <option value="WH">WH</option>
                                <option value="ACC">ACC</option>
                                <option value="HR">HR</option>
                                <option value="IT">IT</option>
                                <option value="MCI">MCI</option>
                                <option value="MGT">MGT</option>
                                <option value="SHEQ">SHE&Q</option>
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

<!-- BOOTSTRAP MODAL -->
<!-- MODAL - UPDATE Record/User -->
<div class="modal fade" id="update_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Update Record</h4>
            </div>

            <form class="form-horizontal" role="form" action="promotion_update.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-5">
                            <label>Employee-List:</label>                            
                        </div>
                        <div class="col-lg-2">
                            <label>Emp-Code:</label>                            
                            <input type="text" readonly class="form-control" id="update_emp_code" name="paramupdate_emp_code">
                        </div>
                        <div class="col-lg-2">
                            <label>First-Name:</label>                            
                            <input type="text" disabled class="form-control" id="update_emp_tfname">
                        </div>
                        <div class="col-lg-3">
                            <label>Last-Name:</label>
                            <input type="text" disabled class="form-control" id="update_emp_tlname">         
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Year:</label>
                            <select readonly class="form-control" id="update_promotion_year" name="paramupdate_promotion_year">
                                <option value="<?php echo date('Y')?>"><?php echo date('Y')?></option>                                    
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>&nbsp;</label>
                            <input type="text" disabled class="form-control" value="Promotion-From:">
                        </div>
                        <div class="col-lg-2">
                            <label>Current-JG:</label>                            
                            <input type="text" disabled class="form-control" id="update_promotion_from_jg" >
                        </div>
                        <div class="col-lg-3">
                            <label>Curent-Position:</label>                            
                            <input type="text" disabled class="form-control" id="update_promotion_from_pos" >
                        </div>
                        <div class="col-lg-2">
                            <label>Current-Dept:</label>                            
                            <input type="text" disabled class="form-control" id="update_promotion_from_dep">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>&nbsp;</label>                            
                        </div>
                        <div class="col-lg-3">
                            <label>&nbsp;</label>
                            <input type="text" disabled class="form-control" value="Promotion-To:">
                        </div>
                        <div class="col-lg-2">
                            <label>New-JG:</label>
                            <select required class="form-control" id ="update_promotion_to_jg" name="paramupdate_promotion_to_jg">
                                <option value="-">-</option>
                                <option value="JG7">JG 7</option>
                                <option value="JG8">JG 8</option>
                                <option value="JG9">JG 9</option>
                                <option value="JG10">JG 10</option>
                                <option value="JG11">JG 11</option>
                                <option value="JG12">JG 12</option>
                                <option value="JG13">JG 13</option>
                                <option value="JG14">JG 14</option>
                                <option value="JG15">JG 15</option>
                                <option value="JG16">JG 16</option>                                
                            </select>                            
                        </div>
                        <div class="col-lg-3">
                            <label>New-Position:</label>
                            <input type="text" required class="form-control" id ="update_promotion_to_pos" name="paramupdate_promotion_to_pos">
                        </div>
                        <div class="col-lg-2">
                            <label>New-Dept:</label>                            
                            <select  class="form-control" id ="update_promotion_to_dep" name="paramupdate_promotion_to_dep">
                                <option value="-">-</option>
                                <option value="RD">R&D</option>
                                <option value="SALES">SAL</option>
                                <option value="ENG">ENG</option>
                                <option value="PRO">PRO</option>
                                <option value="PD-PLAN">PD-PLAN</option>
                                <option value="PUR">PUR</option>
                                <option value="WH">WH</option>
                                <option value="ACC">ACC</option>
                                <option value="HR">HR</option>
                                <option value="IT">IT</option>
                                <option value="MCI">MCI</option>
                                <option value="MGT">MGT</option>
                                <option value="SHEQ">SHE&Q</option>
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

<!-- BOOTRAP MODAL -->
<!-- MODAL - DELETE Record/User -->
<div class="modal fade" id="delete_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Delete Record</h4>
            </div>

            <form class="form-horizontal" role="form" action="promotion_del.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-5">
                            <label>Employee-List:</label>                            
                        </div>
                        <div class="col-lg-2">
                            <label>Emp-Code:</label>                          
                            <input type="text" readonly class="form-control" id="delete_emp_code" name="paramdelete_emp_code">
                        </div>
                        <div class="col-lg-2">
                            <label>First-Name:</label>
                            <input type="text" disabled class="form-control" id="delete_emp_tfname" >
                        </div>
                        <div class="col-lg-3">
                            <label>Last-Name:</label>
                            <input type="text" disabled class="form-control" id="delete_emp_tlname" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Year:</label>
                            <input type="text" readonly class="form-control" id="delete_promotion_year" name="paramdelete_promotion_year">
                        </div>
                        <div class="col-lg-3">
                            <label>&nbsp;</label>
                            <input type="text" disabled class="form-control" value="Promotion-From:">
                        </div>
                        <div class="col-lg-2">
                            <label>Current-JG:</label>                            
                            <input type="text" disabled class="form-control" id="delete_promotion_from_jg">
                        </div>
                        <div class="col-lg-3">
                            <label>Curent-Position:</label>                            
                            <input type="text" disabled class="form-control" id="delete_promotion_from_pos" >
                        </div>
                        <div class="col-lg-2">
                            <label>Current-Dept:</label>                            
                            <input type="text" disabled class="form-control" id="delete_promotion_from_dep" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>&nbsp;</label>                            
                        </div>
                        <div class="col-lg-3">
                            <label>&nbsp;</label>
                            <input type="text" disabled class="form-control" value="Promotion-To:">
                        </div>
                        <div class="col-lg-2">
                            <label>New-JG:</label>
                            <select disabled class="form-control" id="delete_promotion_to_jg">
                                <option value="-">-</option>
                                <option value="JG7">JG 7</option>
                                <option value="JG8">JG 8</option>
                                <option value="JG9">JG 9</option>
                                <option value="JG10">JG 10</option>
                                <option value="JG11">JG 11</option>
                                <option value="JG12">JG 12</option>
                                <option value="JG13">JG 13</option>
                                <option value="JG14">JG 14</option>
                                <option value="JG15">JG 15</option>
                                <option value="JG16">JG 16</option>                                
                            </select>                            
                        </div>
                        <div class="col-lg-3">
                            <label>New-Position:</label>
                            <input type="text" disabled class="form-control" id="delete_promotion_to_pos">
                        </div>
                        <div class="col-lg-2">
                            <label>New-Dept:</label>                            
                            <select disabled class="form-control" id="delete_promotion_to_dep">
                                <option value="-">-</option>
                                <option value="RD">R&D</option>
                                <option value="SALES">SAL</option>
                                <option value="ENG">ENG</option>
                                <option value="PRO">PRO</option>
                                <option value="PD-PLAN">PD-PLAN</option>
                                <option value="PUR">PUR</option>
                                <option value="WH">WH</option>
                                <option value="ACC">ACC</option>
                                <option value="HR">HR</option>
                                <option value="IT">IT</option>
                                <option value="MCI">MCI</option>
                                <option value="MGT">MGT</option>
                                <option value="SHEQ">SHE&Q</option>
                            </select>                                        
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