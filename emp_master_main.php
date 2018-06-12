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
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(0)" placeholder="Search by user code.." title="Type user code">
    
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
            include "emp_master_list.php";                    
        ?>
    </div>
</div>    

<!-- Bootstrap Modals -->
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

            <form class="form-horizontal" role="form" action="emp_master_add.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>ข้อมูลส่วนบุคคล : *</label>
                            <input type="text" required placeholder ="รหัสพนักงาน" class="form-control" name="add_emp_code" >
                        </div>
                        <div class="col-lg-2">  
                            <label>&nbsp;</label>                
                            <select required class="form-control" name="add_emp_ttitle">
                                <option value="นาย">นาย</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="ชื่อ" class="form-control" name="add_emp_tfname" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="นามสกุล" class="form-control" name="add_emp_tlname" >
                        </div>
                        <div class="col-lg-4">
                            <label>&nbsp;</label>                                
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
                                        <input type="file" name="add_emp_picture" required accept="image/png, image/jpeg, image/gif"/> <!-- rename it -->
                                    </div>
                                </span>
                            </div>
                            <!-- /input-group image-preview [TO HERE]-->
                        </div>                           
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <input type="text" required placeholder ="ชื่อเล่น" class="form-control" name="add_emp_nname" >
                        </div>
                        <div class="col-lg-2">                                 
                            <select required placeholder ="Title" class="form-control" name="add_emp_etitle">
                                <option value="MR">MR.</option>
                                <option value="MS">MS.</option>
                                <option value="MRS">MRS.</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <input type="text" required placeholder ="First Name" class="form-control" name="add_emp_efname" >
                        </div>
                        <div class="col-lg-2">
                            <input type="text" required placeholder ="Last Name" class="form-control" name="add_emp_elname" >
                        </div> 
                    </div>
                    <div class="form-group">                                                   
                        <div class="col-lg-3">
                            <input type="text" required placeholder ="เลขบัตรประจำตัวประชาชน" class="form-control" name="add_emp_id_no" maxlength="13">
                        </div>
                        <div class="col-lg-2">                                
                            <input type="text" required placeholder ="วันเกิด" class="form-control" name="mydate1" id="mydate1" >
                        </div>
                        <div class="col-lg-2">
                            <input type="text" required placeholder ="โทรศัพท์มือถือ" class="form-control" name="add_emp_mobile_no" maxlength="10">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>ข้อมูลหน่วยงาน : *</label>
                            <select required class="form-control" name="add_job_business">
                                <option value="-">-</option>
                                <option value="IR">1.IR</option>
                                <option value="UU">2.UU</option>
                                <option value="TECH">3.TECH</option>
                                <option value="SCM">4.SCM</option>
                                <option value="BIZ">5.BIZ</option>
                                <option value="MGT">6.MGT</option>
                            </select>                                        
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <select required class="form-control" name="add_job_department">
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
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <select required class="form-control" name="add_job_location">
                                <option value="-">-</option>
                                <option value="FAC">FAC</option>
                                <option value="OFF">OFF</option>
                            </select>                     
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="ตำแหน่ง" class="form-control" name="add_job_position" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>                            
                            <select required class="form-control" name="add_job_grade">
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
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="วันที่เริ่มงาน" class="form-control" name="mydate2" id="mydate2" >
                        </div>
                        <br>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>ที่อยู่ปัจจุบัน :</label>
                            <input type="text" placeholder ="เลขที่ ตรอก/ซอย" class="form-control" name="add_addr_no" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" placeholder ="ถนน" class="form-control" name="add_addr_road" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" placeholder ="ตำบล" class="form-control" name="add_addr_area" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" placeholder ="อำเภอ" class="form-control" name="add_addr_district" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" placeholder ="จังหวัด" class="form-control" name="add_addr_province" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" placeholder ="รหัสไปรษณีย์" class="form-control" name="add_addr_postal_code" maxlength="5">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-lg-2">  
                            <label> การศึกษา :</label>                               
                            <select  placeholder ="Title" class="form-control" name="add_edu_level1">
                                <option value="-">-</option>
                                <option value="PHD">ป.เอก</option>
                                <option value="MS">ป.โท</option>
                                <option value="BC">ป.ตรี</option>
                                <option value="H">ปวส.</option>
                                <option value="L">ปวช.</option>
                                <option value="M">มัธยมศึกษา</option>
                                <option value="P">ประถมศึกษา</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text"  placeholder ="วุฒิการศึกษา" class="form-control" name="add_edu_detail1" >
                        </div>
                        <div class="col-lg-3">
                            <label>&nbsp;</label>
                            <input type="text"  placeholder ="สถาบัน" class="form-control" name="add_edu_institute1" >
                        </div>
                        <div class="col-lg-3">
                            <label>&nbsp;</label>
                            <input type="text"  placeholder ="คณะ" class="form-control" name="add_edu_faculty1" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text"  placeholder ="สาขา/วิชาเอก" class="form-control" name="add_edu_major1" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-2">
                            <input type="text"  placeholder ="ปีที่จบ" class="form-control" name="add_edu_graduated_year1" maxlength="4">
                        </div>
                        <div class="col-lg-2">
                            <input type="text"  placeholder ="เกรด" class="form-control" name="add_edu_grade1" maxlength="5">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">                                                          
                            <select  placeholder ="Title" class="form-control" name="add_edu_level2">
                                <option value="-">-</option>
                                <option value="PHD">ป.เอก</option>
                                <option value="MS">ป.โท</option>
                                <option value="BC">ป.ตรี</option>
                                <option value="H">ปวส.</option>
                                <option value="L">ปวช.</option>
                                <option value="M">มัธยมศึกษา</option>
                                <option value="P">ประถมศึกษา</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            
                            <input type="text"  placeholder ="วุฒิการศึกษา" class="form-control" name="add_edu_detail2" >
                        </div>
                        <div class="col-lg-3">
                            
                            <input type="text"  placeholder ="สถาบัน" class="form-control" name="add_edu_institute2" >
                        </div>
                        <div class="col-lg-3">
                            
                            <input type="text"  placeholder ="คณะ" class="form-control" name="add_edu_faculty2" >
                        </div>
                        <div class="col-lg-2">
                            
                            <input type="text"  placeholder ="สาขา/วิชาเอก" class="form-control" name="add_edu_major2" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-2">
                            <input type="text"  placeholder ="ปีที่จบ" class="form-control" name="add_edu_graduated_year2" maxlength="4" >
                        </div>
                        <div class="col-lg-2">
                            <input type="text"  placeholder ="เกรด" class="form-control" name="add_edu_grade2" maxlength="5">
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

<!-- Bootstrap Modals -->
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

            <form class="form-horizontal" role="form" action="emp_master_update.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>ข้อมูลส่วนบุคคล : *</label>
                            <input type="text" disabled class="form-control" name="update_emp_code" id="update_emp_code" >
                            <input type="hidden" class="form-control" name="paramupdate_emp_code" id="paramupdate_emp_code" >
                        </div>
                        <div class="col-lg-2">  
                            <label>&nbsp;</label>                
                            <select required class="form-control" name="update_emp_ttitle" id="update_emp_ttitle">
                                <option value="นาย">นาย</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required class="form-control" name="update_emp_tfname" id="update_emp_tfname" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required class="form-control" name="update_emp_tlname" id="update_emp_tlname" >
                        </div>
                        <div class="col-lg-4">
                            <label>&nbsp;</label>                                
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
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="paramupdate_emp_picture" /> <!-- rename it -->
                                    </div>
                                </span>
                            </div>
                            <!-- /input-group image-preview [TO HERE]-->
                        </div>                           
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <input type="text" required class="form-control" name="update_emp_nname" id="update_emp_nname" >
                        </div>
                        <div class="col-lg-2">                                 
                            <select required placeholder ="Title" class="form-control" name="update_emp_etitle" id="update_emp_etitle">
                                <option value="MR">MR.</option>
                                <option value="MS">MS.</option>
                                <option value="MRS">MRS.</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <input type="text" required class="form-control" name="update_emp_efname" id="update_emp_efname" >
                        </div>
                        <div class="col-lg-2">
                            <input type="text" required class="form-control" name="update_emp_elname" id="update_emp_elname" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>        
                            <label><input type="checkbox" value="1" name="paramupdate_upload">Upload Pic.</label>                    
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>        
                            <img src='update_emp_picture?v=<?php echo date("YmdHis");?>' id="update_emp_picture" width='32' height='48'>                    
                        </div>
                    </div>
                    <div class="form-group">                                                   
                        <div class="col-lg-3">
                            <label>เลขบัตรประจำตัวประชาชน</label>
                            <input type="text" required class="form-control" name="update_emp_id_no" id="update_emp_id_no" maxlength="13">
                        </div>
                        <div class="col-lg-2">
                            <label>วันเกิด</label>                  
                            <input type="text" required class="form-control" name="update_emp_birth_date" id="update_emp_birth_date" >
                        </div>
                        <div class="col-lg-2">
                            <label>โทรศัพท์</label>
                            <input type="text" required class="form-control" name="update_emp_mobile_no" id="update_emp_mobile_no" maxlength="10">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>ข้อมูลหน่วยงาน : *</label>
                            <select  class="form-control" name="update_job_business" id="update_job_business">
                                <option value="-">-</option>
                                <option value="IR">1.IR</option>
                                <option value="UU">2.UU</option>
                                <option value="TECH">3.TECH</option>
                                <option value="SCM">4.SCM</option>
                                <option value="BIZ">5.BIZ</option>
                                <option value="MGT">6.MGT</option>
                            </select>                                        
                        </div>
                        <div class="col-lg-2">
                            <label>แผนก</label>
                            <select  class="form-control" name="update_job_department" id="update_job_department">
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
                        <div class="col-lg-2">
                            <label>สังกัด</label>
                            <select  class="form-control" name="update_job_location" id="update_job_location">
                                <option value="-">-</option>
                                <option value="FAC">FAC</option>
                                <option value="OFF">OFF</option>
                            </select>                     
                        </div>
                        <div class="col-lg-2">
                            <label>ตำแหน่ง</label>
                            <input type="text" class="form-control" name="update_job_position" id="update_job_position">
                        </div>
                        <div class="col-lg-2">
                            <label>Job Grade</label>
                            <select required class="form-control" name="update_job_grade" id="update_job_grade">
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
                        <div class="col-lg-2">
                            <label>วันที่เริ่มงาน</label>                               
                            <input type="text" class="form-control" name="update_job_working_date" id="update_job_working_date">
                        </div>
                        <br>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>ที่อยู่ปัจจุบัน :</label>
                            <input type="text" class="form-control" name="update_addr_no" id="update_addr_no" >
                        </div>
                        <div class="col-lg-2">
                            <label>ถนน</label>
                            <input type="text" class="form-control" name="update_addr_road" id="update_addr_road" >
                        </div>
                        <div class="col-lg-2">
                            <label>ตำบล/แขวง</label>
                            <input type="text" class="form-control" name="update_addr_area" id="update_addr_area" >
                        </div>
                        <div class="col-lg-2">
                            <label>อำเภอ/เขต</label>
                            <input type="text" class="form-control" name="update_addr_district" id="update_addr_district" >
                        </div>
                        <div class="col-lg-2">
                            <label>จังหวัด</label>
                            <input type="text" class="form-control" name="update_addr_province" id="update_addr_province" >
                        </div>
                        <div class="col-lg-2">
                            <label>รหัสไปรษณีย์</label>
                            <input type="text" class="form-control" name="update_addr_postal_code" id="update_addr_postal_code" maxlength="5" >
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-lg-2">  
                            <label> การศึกษา :</label>                               
                            <select  placeholder ="Title" class="form-control" name="update_edu_level1" id="update_edu_level1">
                                <option value="-">-</option>
                                <option value="PHD">ป.เอก</option>
                                <option value="MS">ป.โท</option>
                                <option value="BC">ป.ตรี</option>
                                <option value="H">ปวส.</option>
                                <option value="L">ปวช.</option>
                                <option value="M">มัธยมศึกษา</option>
                                <option value="P">ประถมศึกษา</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>วุฒิการศึกษา</label>
                            <input type="text" class="form-control" name="update_edu_detail1" id="update_edu_detail1" >
                        </div>
                        <div class="col-lg-3">
                            <label>สถาบัน</label>
                            <input type="text" class="form-control" name="update_edu_institute1" id="update_edu_institute1" >
                        </div>
                        <div class="col-lg-3">
                            <label>คณะ</label>>
                            <input type="text" class="form-control" name="update_edu_faculty1" id="update_edu_faculty1" >
                        </div>
                        <div class="col-lg-2">
                            <label>วิชาเอก</label>
                            <input type="text" class="form-control" name="update_edu_major1" id="update_edu_major1" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-2">
                            <label>ปีที่จบ</label>
                            <input type="text" class="form-control" name="update_edu_graduated_year1" id="update_edu_graduated_year1" maxlength="4">
                        </div>
                        <div class="col-lg-2">
                            <label>เกรด</label>
                            <input type="text" class="form-control" name="update_edu_grade1" id="update_edu_grade1" maxlength="4">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">  
                            <label>&nbsp;</label>                
                            <select  placeholder ="Title" class="form-control" name="update_edu_level2" id="update_edu_level2">
                                <option value="-">-</option>
                                <option value="PHD">ป.เอก</option>
                                <option value="MS">ป.โท</option>
                                <option value="BC">ป.ตรี</option>
                                <option value="H">ปวส.</option>
                                <option value="L">ปวช.</option>
                                <option value="M">มัธยมศึกษา</option>
                                <option value="P">ประถมศึกษา</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>วุฒิการศึกษา</label>
                            <input type="text" class="form-control" name="update_edu_detail2" id="update_edu_detail2" >
                        </div>
                        <div class="col-lg-3">
                            <label>สถาบัน</label>
                            <input type="text" class="form-control" name="update_edu_institute2" id="update_edu_institute2" >
                        </div>
                        <div class="col-lg-3">
                            <label>คณะ</label>
                            <input type="text" class="form-control" name="update_edu_faculty2" id="update_edu_faculty2" >
                        </div>
                        <div class="col-lg-2">
                            <label>วิชาเอก</label>
                            <input type="text"  laceholder ="สาขา/วิชาเอก" class="form-control" name="update_edu_major2" id="update_edu_major2" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-2">
                            <label>ปีที่จบ</label>
                            <input type="text" class="form-control" name="update_edu_graduated_year2" id="update_edu_graduated_year2" maxlength="4">
                        </div>
                        <div class="col-lg-2">
                            <label>เกรด</label>
                            <input type="text" class="form-control" name="update_edu_grade2" id="update_edu_grade2" maxlength="4">
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

<!-- Bootstrap Modals -->
<!-- Modal - Delete Record -->    
<div class="modal fade" id="delete_record_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">ลบข้อมูล :</h3>
            </div>

            <form class="form-horizontal" role="form" action="emp_master_del.php" onclick="confirmation()" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label>ข้อมูลส่วนบุคคล :</label>
                                    <input type="text" class="form-control" id="delete_emp_code" name="delete_emp_code">
                                </div>
                                <div class="col-lg-3">  
                                    <label>คำนำหน้า</label>   
                                    <input type="text" disabled class="form-control" id="delete_emp_ttitle" >
                                </div>
                                <div class="col-lg-3">
                                    <label>ชื่อ</label>
                                    <input type="text" disabled  class="form-control" id="delete_emp_tfname" >
                                </div>
                                <div class="col-lg-3">
                                    <label>นามสกุล</label>
                                    <input type="text" disabled class="form-control" id="delete_emp_tlname" >
                                </div>                    
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <label>ชื่อเล่น</label>
                                    <input type="text" disabled class="form-control" id="delete_emp_nname" >
                                </div>
                                <div class="col-lg-3">
                                    <label>&nbsp;</label>                              
                                    <input type="text" disabled class="form-control" id="delete_emp_etitle" >
                                </div>
                                <div class="col-lg-3">
                                    <label>&nbsp;</label>
                                    <input type="text" disabled class="form-control" id="delete_emp_efname" >
                                </div>
                                <div class="col-lg-3">
                                    <label>&nbsp;</label>
                                    <input type="text" disabled class="form-control" id="delete_emp_elname" >
                                </div> 
                            </div>
                            <div class="form-group">                                                   
                                <div class="col-lg-4">
                                    <label>เลขที่บัตรประจำตัวประชาชน</label>
                                    <input type="text" disabled class="form-control" id="delete_emp_id_no" >
                                </div>
                                <div class="col-lg-2">
                                    <label>วันเกิด</label>          
                                    <input type="text" disabled class="form-control" id="delete_emp_birth_date" >
                                </div>
                                <div class="col-lg-2">
                                    <label>โทรศัพท์</label>
                                    <input type="text" disabled class="form-control" id="delete_emp_mobile_no" >
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <label>&nbsp;</label>        
                            <img src='delete_emp_picture' id="delete_emp_picture" width='128' height='192'>                        
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="col-lg-2">
                                    <label>หน่วยงาน</label>
                                    <input type="text" disabled class="form-control" id="delete_job_business" >               
                                </div>
                                <div class="col-lg-2">
                                    <label>แผนก</label>
                                    <input type="text" disabled class="form-control" id="delete_job_department" >            
                                </div>
                                <div class="col-lg-2">
                                    <label>สังกัด</label>
                                    <input type="text" disabled class="form-control" id="delete_job_location" >
                                </div>
                                <div class="col-lg-2">
                                    <label>ตำแหน่ง</label>
                                    <input type="text" disabled class="form-control" id="delete_job_position" >
                                </div>
                                <div class="col-lg-2">
                                    <label>Job Grade</label>
                                    <input type="text" disabled class="form-control" id="delete_job_grade" >
                                </div>
                                <div class="col-lg-2">
                                    <label>วันเริ่มงาน</label>                               
                                    <input type="text" disabled class="form-control" id="delete_job_working_date" >
                                </div>
                                <br>
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