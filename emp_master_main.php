<!-- Content Section -->
<div class="row">
    <div class="col-md-12">
        <div class="form-inline">
            Search : 
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(0)" placeholder="Search by employee code..." title="Type employee code">
    
            <div class="pull-right">
                <button class="btn btn-info" data-toggle="modal" data-target="#export_modal">
                    <span class="fa fa-cloud-download"></span> 
                    Export To CSV File
                </button>
                
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
            include "emp_master_list.php";                    
        ?>
    </div>
</div>    

<!-- Bootstrap Modals -------->
<!-- Modal - Add New Record -->
<div class="modal fade" id="add_record_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" style="color:green;">เพิ่มข้อมูล :</h3>
            </div>

            <form class="form-horizontal" role="form" action="emp_master_add.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- ส่วนที่ 1 ข้อมูลส่วนบุคคล -->
                    <div class="col-lg-12">
                        <h5 style="text-align:right;">ข้อมูลส่วนบุคคล : *</h5>
                    </div>
                    <!-- แถวที่ 1.1 -->
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
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
                        <div class="col-lg-3">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="ชื่อ" class="form-control" name="add_emp_tfname" >
                        </div>
                        <div class="col-lg-5">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="นามสกุล" class="form-control" name="add_emp_tlname" >
                        </div>                        
                    </div>
                    <!-- แถวที่ 1.2-->
                    <div class="form-group">
                        <div class="col-lg-2">
                            <input type="text" required placeholder ="ชื่อเล่น" class="form-control" name="add_emp_nname" >
                        </div>
                        <div class="col-lg-2">                                 
                            <select required placeholder ="Title" class="form-control" name="add_emp_etitle">
                                <option value="MR.">MR.</option>
                                <option value="MISS.">MISS.</option>
                                <option value="MRS.">MRS.</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" required placeholder ="First Name" class="form-control" name="add_emp_efname" >
                        </div>
                        <div class="col-lg-5">
                            <input type="text" required placeholder ="Last Name" class="form-control" name="add_emp_elname" >
                        </div> 
                    </div>
                    <!-- แถวที่ 1.3 -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <input type="text" required placeholder ="เลขบัตรประจำตัวประชาชน" class="form-control" name="add_emp_id_no" maxlength="13">
                        </div>
                        <div class="col-lg-3">                                
                            <input type="text" required placeholder ="วันเกิด" class="form-control" name="mydate1" id="mydate1" >
                        </div>
                        <div class="col-lg-3">
                            <input type="text" required placeholder ="โทรศัพท์มือถือ" class="form-control" name="add_emp_mobile_no" maxlength="10">
                        </div>
                        <div class="col-lg-3">
                            <input type="text" required placeholder ="เบอร์ติดต่อ กรณีฉุกเฉิน" class="form-control" name="add_emp_emergency_mobile_no" maxlength="13">
                        </div>
                    </div>
                    <!-- แถวที่ 1.4 -->
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>ศาสนา</label>
                            <select required class="form-control" name="add_emp_religion">
                                <option value="พุทธ">พุทธ</option>
                                <option value="คริสต์">คริสต์</option>
                                <option value="อิสลาม">อิสลาม</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>สถานะการสมรส</label>
                            <select required class="form-control" name="add_emp_current_status">
                                <option value="โสด">โสด</option>
                                <option value="สมรส">สมรส</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>กรุ๊ปเลือด</label>
                            <select required class="form-control" name="add_emp_blood_type">                            
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>                        
                        <div class="col-lg-6">
                            <label>รูปภาพ</label>
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
                    <hr>                    
                    <!-- ส่วนที่ 2 ที่อยู่ปัจจุบัน -->
                    <div class="col-lg-12">
                        <h5 style="text-align:right;">ที่อยู่ปัจจุบัน :</h5>
                    </div>
                    <!-- แถวที่ 2.1  -->
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label>&nbsp;</label>
                            <input type="text" placeholder ="เลขที่ ตรอก/ซอย" class="form-control" name="add_addr_no" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" placeholder ="หมู่ที่" class="form-control" name="add_addr_moo" >
                        </div>
                        <div class="col-lg-3">
                            <label>&nbsp;</label>
                            <input type="text" placeholder ="ถนน" class="form-control" name="add_addr_road" >
                        </div>
                        <div class="col-lg-3">
                            <label>&nbsp;</label>
                            <input type="text" placeholder ="ตำบล" class="form-control" name="add_addr_area" >
                        </div>
                    </div>
                    <!-- แถวที่ 2.1  -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <input type="text" placeholder ="อำเภอ" class="form-control" name="add_addr_district" >
                        </div>
                        <div class="col-lg-3">
                            <input type="text" placeholder ="จังหวัด" class="form-control" name="add_addr_province" >
                        </div>
                        <div class="col-lg-2">
                            <input type="text" placeholder ="รหัสไปรษณีย์" class="form-control" name="add_addr_postal_code" maxlength="5">
                        </div>
                    </div>
                    <hr>
                    <!-- ส่วนที่ 3 การศึกษา -->
                    <div class="col-lg-12">
                        <h5 style="text-align:right;">ข้อมูลการศึกษา :</h5>
                    </div>
                    <!-- แถวที่ 3.1  -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>ระดับการศึกษา</label>
                            <select  placeholder ="Title" class="form-control" name="add_edu_level1">
                                <option value="Primary School">ประถมศึกษา</option>
                                <option value="Junior High School">มัธยมศึกษาตอนต้น</option>
                                <option value="Senior High School">มัธยมศึกษาตอนปลาย</option>
                                <option value="Vocational Certificate">ปวช.</option>
                                <option value="High Vocatinal Certificate">ปวส.</option>
                                <option value="Bachelor Degree">ปริญญาตรี</option>
                                <option value="Master Degree">ปริญญาโท</option>
                                <option value="Doctoral Degree">ปริญญาเอก</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text"  placeholder ="วุฒิการศึกษา" class="form-control" name="add_edu_detail1" >
                        </div>
                        <div class="col-lg-4">
                            <label>&nbsp;</label>
                            <input type="text"  placeholder ="สถาบันการศึกษา" class="form-control" name="add_edu_institute1" >
                        </div>
                        <div class="col-lg-3">
                            <label>&nbsp;</label>
                            <input type="text"  placeholder ="คณะ" class="form-control" name="add_edu_faculty1" >
                        </div>                        
                    </div>
                    <!-- แถวที่ 3.2  -->
                    <div class="form-group">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-3">
                            <input type="text"  placeholder ="สาขา/วิชาเอก" class="form-control" name="add_edu_major1" >
                        </div>
                        <div class="col-lg-2">
                            <input type="text"  placeholder ="ปีที่จบการศึกษา" class="form-control" name="add_edu_graduated_year1" maxlength="4">
                        </div>
                        <div class="col-lg-2">
                            <input type="text"  placeholder ="เกรด" class="form-control" name="add_edu_grade1" maxlength="5">
                        </div>
                    </div>
                    <!-- แถวที่ 3.3  -->
                    <div class="form-group">
                        <div class="col-lg-3">                                                          
                            <select  placeholder ="Title" class="form-control" name="add_edu_level2">
                                <option value="Primary School">ประถมศึกษา</option>
                                <option value="Junior High School">มัธยมศึกษาตอนต้น</option>
                                <option value="Senior High School">มัธยมศึกษาตอนปลาย</option>
                                <option value="Vocational Certificate">ปวช.</option>
                                <option value="High Vocatinal Certificate">ปวส.</option>
                                <option value="Bachelor Degree">ปริญญาตรี</option>
                                <option value="Master Degree">ปริญญาโท</option>
                                <option value="Doctoral Degree">ปริญญาเอก</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <input type="text"  placeholder ="วุฒิการศึกษา" class="form-control" name="add_edu_detail2" >
                        </div>
                        <div class="col-lg-4">
                            <input type="text"  placeholder ="สถาบันการศึกษา" class="form-control" name="add_edu_institute2" >
                        </div>
                        <div class="col-lg-3">
                            <input type="text"  placeholder ="คณะ" class="form-control" name="add_edu_faculty2" >
                        </div>
                    </div>
                    <!-- แถวที่ 3.4  -->
                    <div class="form-group">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-3">
                            <input type="text"  placeholder ="สาขา/วิชาเอก" class="form-control" name="add_edu_major2" >
                        </div>
                        <div class="col-lg-2">
                            <input type="text"  placeholder ="ปีที่จบ" class="form-control" name="add_edu_graduated_year2" maxlength="4" >
                        </div>
                        <div class="col-lg-2">
                            <input type="text"  placeholder ="เกรด" class="form-control" name="add_edu_grade2" maxlength="5">
                        </div>
                    </div>
                    <hr>
                    <!-- ส่วนที่ 4 ตำแหน่งงาน -->
                    <div class="col-lg-12">
                        <h5 style="text-align:right;">ข้อมูลตำแหน่งงาน : *</h5>
                    </div>
                    <!--  แถวที่ 4.1 -->
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Business</label>
                            <select  class="form-control" name="add_job_business" id="add_job_business">
                                <option value="BIZ">BIZ</option>                                
                                <option value="IR">IR</option>                                
                                <option value="MCI">MCI</option>
                                <option value="MGT">MGT</option>
                                <option value="SCM">SCM</option>                                
                                <option value="TECH">TECH</option>                                
                                <option value="UU">UU</option>
                            </select>                                        
                        </div>
                        <div class="col-lg-2">
                            <label>Department</label>
                            <select  class="form-control" name="add_job_department" id="add_job_department">
                                <option value="ACC">ACC</option>
                                <option value="ENG">ENG</option>
                                <option value="HR">HR</option>
                                <option value="IT">IT</option>
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
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" placeholder ="Job Section" class="form-control" name="add_job_section" required>
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" placeholder ="Job Task" class="form-control" name="add_job_task" required>
                        </div>
                        <div class="col-lg-2">
                            <label>Location</label>
                            <select required class="form-control" name="add_job_location">
                                <option value="FAC">FAC</option>
                                <option value="OFF">OFF</option>
                            </select>                     
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="Job Position" class="form-control" name="add_job_position" >
                        </div>                        
                    </div>
                    <!--  แถวที่ 4.2 -->
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Job Grade</label>
                            <select required class="form-control" name="add_job_grade">
                                <option value="7">JG 7</option>
                                <option value="8">JG 8</option>
                                <option value="9">JG 9</option>
                                <option value="10">JG 10</option>
                                <option value="11">JG 11</option>
                                <option value="12">JG 12</option>
                                <option value="13">JG 13</option>
                                <option value="14">JG 14</option>
                                <option value="15">JG 15</option>
                                <option value="16">JG 16</option>                                
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <input type="text" required placeholder ="Start W-Date" class="form-control" name="mydate2" id="mydate2" >
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap Modals ------->
<!-- Modal - Update Record -->
<div class="modal fade" id="update_record_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" style="color:skyblue;">ปรับปรุงข้อมูล :</h3>
            </div>

            <form class="form-horizontal" role="form" action="emp_master_update.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- ส่วนที่ 1 ข้อมูลส่วนบุคคล -->
                    <div class="col-lg-12">
                        <h5 style="text-align:right;">ข้อมูลส่วนบุคคล : *</h5>
                    </div>
                    <!-- แถวที่ 1.1 -->
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>รหัสพนักงาน</label>
                            <input type="text" disabled class="form-control" name="update_emp_code" id="update_emp_code" >
                            <input type="hidden" class="form-control" name="paramupdate_emp_code" id="paramupdate_emp_code" >
                        </div>
                        <div class="col-lg-2">  
                            <label>คำนำหน้า</label>
                            <select required class="form-control" name="update_emp_ttitle" id="update_emp_ttitle">
                                <option value="นาย">นาย</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>ชื่อ</label>
                            <input type="text" required class="form-control" name="update_emp_tfname" id="update_emp_tfname" >
                        </div>
                        <div class="col-lg-5">
                            <label>นามสกุล</label>
                            <input type="text" required class="form-control" name="update_emp_tlname" id="update_emp_tlname" >
                        </div>
                        
                    </div>
                    <!-- แถวที่ 1.2 -->
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>ชื่อเล่น</label>
                            <input type="text" required class="form-control" name="update_emp_nname" id="update_emp_nname" >
                        </div>
                        <div class="col-lg-2">
                            <label>&nbsp;</label>
                            <select class="form-control" name="update_emp_etitle" id="update_emp_etitle">
                                <option value="MR.">MR.</option>
                                <option value="MISS.">MISS.</option>
                                <option value="MRS.">MRS.</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>&nbsp;</label>
                            <input type="text" required class="form-control" name="update_emp_efname" id="update_emp_efname" >
                        </div>
                        <div class="col-lg-5">
                            <label>&nbsp;</label>
                            <input type="text" required class="form-control" name="update_emp_elname" id="update_emp_elname" >
                        </div>
                        <!--
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name='update_emp_picture'>
                            <img src='update_emp_picture?v=<?php //echo date("YmdHis");?>' id="update_emp_picture" width='32' height='48'>
                        </div>
                        -->
                    </div>
                    <!-- แถวที่ 1.3 -->
                    <div class="form-group">                                                   
                        <div class="col-lg-3">
                            <label>เลขบัตรประจำตัวประชาชน</label>
                            <input type="text" required class="form-control" name="update_emp_id_no" id="update_emp_id_no" maxlength="13">
                        </div>
                        <div class="col-lg-3">
                            <label>วันเกิด</label>
                            <input type="text" required class="form-control" name="update_emp_birth_date" id="update_emp_birth_date" >
                        </div>
                        <div class="col-lg-3">
                            <label>โทรศัพท์</label>
                            <input type="text" required class="form-control" name="update_emp_mobile_no" id="update_emp_mobile_no" maxlength="12">
                        </div>
                        <div class="col-lg-3">
                            <label>เบอร์ติดต่อ กรณีฉุกเฉิน</label>
                            <input type="text" required class="form-control" name="update_emp_emergency_mobile_no" id='update_emp_emergency_mobile_no' maxlength="12">
                        </div>
                    </div>
                    <!-- แถวที่ 1.4 -->
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>ศาสนา</label>
                            <select class="form-control" name="update_emp_religion" id='update_emp_religion'>
                                <option value="พุทธ">พุทธ</option>
                                <option value="คริสต์">คริสต์</option>
                                <option value="อิสลาม">อิสลาม</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>สถานะการสมรส</label>
                            <select class="form-control" name="update_emp_current_status" id="update_emp_current_status">
                                <option value="โสด">โสด</option>
                                <option value="สมรส">สมรส</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>กรุ๊ปเลือด</label>
                            <select class="form-control" name="update_emp_blood_type" id="update_emp_blood_type">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>                        
                        </div>
                        <div class="col-lg-4">
                            <label>รูปภาพ</label>
                            <input type="text" class="form-control" name='update_emp_picture' id='update_emp_picture' disabled>
                        </div>
                        <div class="col-lg-2">
                            <img src='paramupdate_emp_picture?v=<?php //echo date("YmdHis");?>' id="paramupdate_emp_picture" width='32' height='48'>
                        </div>
                    </div>
                    <hr>
                    <!-- ส่วนที่ 2 ที่อยู่ปัจจุบัน -->
                    <div class="col-lg-12">
                        <h5 style="text-align:right;">ที่อยู่ปัจจุบัน :</h5>
                    </div>
                    <!-- แถวที่ 2.1 -->
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label>เลขที่ ตรอก/ซอย</label>
                            <input type="text" class="form-control" name="update_addr_no" id="update_addr_no" >
                        </div>
                        <div class="col-lg-2">
                            <label>หมู่ที่</label>
                            <input type="text" class="form-control" name="update_addr_moo" id="update_addr_moo" >
                        </div>
                        <div class="col-lg-3">
                            <label>ถนน</label>
                            <input type="text" class="form-control" name="update_addr_road" id="update_addr_road" >
                        </div>
                        <div class="col-lg-3">
                            <label>ตำบล/แขวง</label>
                            <input type="text" class="form-control" name="update_addr_area" id="update_addr_area" >
                        </div>                        
                    </div>
                    <!-- แถวที่ 2.2 -->
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>อำเภอ/เขต</label>
                            <input type="text" class="form-control" name="update_addr_district" id="update_addr_district" >
                        </div>
                        <div class="col-lg-3">
                            <label>จังหวัด</label>
                            <input type="text" class="form-control" name="update_addr_province" id="update_addr_province" >
                        </div>
                        <div class="col-lg-2">
                            <label>รหัสไปรษณีย์</label>
                            <input type="text" class="form-control" name="update_addr_postal_code" id="update_addr_postal_code" maxlength="5" >
                        </div>
                    </div>
                    <hr>
                    <!-- ส่วนที่ 3 ข้อมูลการศึกษา -->
                    <div class="col-lg-12">
                        <h5 style="text-align:right;">ข้อมูลการศึกษา :</h5>
                    </div>
                    <!-- แถวที่ 3.1 -->
                    <div class="form-group">
                        <div class="col-lg-3">  
                            <label>ระดับการศึกษา</label>
                            <select class="form-control" name="update_edu_level1" id="update_edu_level1">
                                <option value="Primary School">ประถมศึกษา</option>
                                <option value="Junior High School">มัธยมศึกษาตอนต้น</option>
                                <option value="Senior High School">มัธยมศึกษาตอนปลาย</option>
                                <option value="Vocational Certificate">ปวช.</option>
                                <option value="High Vocatinal Certificate">ปวส.</option>
                                <option value="Bachelor Degree">ปริญญาตรี</option>
                                <option value="Master Degree">ปริญญาโท</option>
                                <option value="Doctoral Degree">ปริญญาเอก</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>วุฒิการศึกษา</label>
                            <input type="text" class="form-control" name="update_edu_detail1" id="update_edu_detail1" >
                        </div>
                        <div class="col-lg-4">
                            <label>สถาบันการศึกษา</label>
                            <input type="text" class="form-control" name="update_edu_institute1" id="update_edu_institute1" >
                        </div>
                        <div class="col-lg-3">
                            <label>คณะ</label>
                            <input type="text" class="form-control" name="update_edu_faculty1" id="update_edu_faculty1" >
                        </div>                        
                    </div>
                    <!-- แถวที่ 3.2 -->
                    <div class="form-group">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-3">
                            <label>สาขา/วิชาเอก</label>
                            <input type="text" class="form-control" name="update_edu_major1" id="update_edu_major1" >
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
                    <!-- แถวที่ 3.3 -->
                    <div class="form-group">
                        <div class="col-lg-3">  
                            <label>&nbsp;</label>                
                            <select  class="form-control" name="update_edu_level2" id="update_edu_level2">
                                <option value="Primary School">ประถมศึกษา</option>
                                <option value="Junior High School">มัธยมศึกษาตอนต้น</option>
                                <option value="Senior High School">มัธยมศึกษาตอนปลาย</option>
                                <option value="Vocational Certificate">ปวช.</option>
                                <option value="High Vocatinal Certificate">ปวส.</option>
                                <option value="Bachelor Degree">ปริญญาตรี</option>
                                <option value="Master Degree">ปริญญาโท</option>
                                <option value="Doctoral Degree">ปริญญาเอก</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>วุฒิการศึกษา</label>
                            <input type="text" class="form-control" name="update_edu_detail2" id="update_edu_detail2" >
                        </div>
                        <div class="col-lg-4">
                            <label>สถาบันการศึกษา</label>
                            <input type="text" class="form-control" name="update_edu_institute2" id="update_edu_institute2" >
                        </div>
                        <div class="col-lg-3">
                            <label>คณะ</label>
                            <input type="text" class="form-control" name="update_edu_faculty2" id="update_edu_faculty2" >
                        </div>
                    </div>
                    <!-- แถวที่ 3.4 -->
                    <div class="form-group">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-3">
                            <label>สาขา/วิชาเอก</label>
                            <input type="text"  laceholder ="สาขา/วิชาเอก" class="form-control" name="update_edu_major2" id="update_edu_major2" >
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
                    <hr>
                    <!-- ส่วนที่ 4 ข้อมูลตำแหน่งงาน -->
                    <div class="col-lg-12">
                        <h5 style="text-align:right;">ข้อมูลตำแหน่งงาน : *</h5>
                    </div>
                    <!-- แถวที่ 4.1 -->
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Business</label>
                            <select required class="form-control" name="update_job_business" id="update_job_business">
                                <option value="BIZ">BIZ</option>
                                <option value="IR">IR</option>
                                <option value="MCI">MCI</option>
                                <option value="MGT">MGT</option>
                                <option value="SCM">SCM</option>
                                <option value="TECH">TECH</option>
                                <option value="UU">UU</option>
                            </select>                                        
                        </div>
                        <div class="col-lg-2">
                            <label>Department</label>
                            <select required class="form-control" name="update_job_department" id="update_job_department">
                                <option value="ACC">ACC</option>
                                <option value="ENG">ENG</option>
                                <option value="HR">HR</option>
                                <option value="IT">IT</option>
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
                        <div class="col-lg-2">
                            <label>Job Section</label>
                            <input type="text" class="form-control" name="update_job_section" id="update_job_section">
                        </div>
                        <div class="col-lg-2">
                            <label>Job Task</label>
                            <input type="text" class="form-control" name="update_job_task" id="update_job_task">
                        </div>
                        <div class="col-lg-2">
                            <label>Location</label>
                            <select  class="form-control" name="update_job_location" id="update_job_location">
                                <option value="WG">WG</option>
                                <option value="OFF">OFF</option>
                            </select>                     
                        </div>
                        <div class="col-lg-2">
                            <label>Job Position</label>
                            <input type="text" class="form-control" name="update_job_position" id="update_job_position">
                        </div>
                    </div>
                    <!-- แถวที่ 4.1 -->
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label>Job Grade</label>
                            <select required class="form-control" name="update_job_grade" id="update_job_grade">
                                <option value="7">JG 7</option>
                                <option value="8">JG 8</option>
                                <option value="9">JG 9</option>
                                <option value="10">JG 10</option>
                                <option value="11">JG 11</option>
                                <option value="12">JG 12</option>
                                <option value="13">JG 13</option>
                                <option value="14">JG 14</option>
                                <option value="15">JG 15</option>
                                <option value="16">JG 16</option>                                
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>Start w-Date</label>
                            <input type="text" class="form-control" name="update_job_working_date" id="update_job_working_date">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap Modals ------->
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
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap Modals ------------>
<!-- Modal - Export To CSV File -->
<div class="modal fade" id="export_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Generate CSV File</h4>
            </div>
            <div class="modal-body">

            <?php
                include_once('include/db_Conn.php');

                if( $_POST['selDept'] == 'ALL')
                {
                    echo "Department : " . $_POST['selDept'] . "<br>";

                    $strSql = "SELECT * ";
                    $strSql .= "FROM Emp_Main ";
                    $strSql .= "ORDER BY job_department, emp_code ";
                }
                else
                {
                    echo "Department : " . $_POST['selDept'] . " / Position : " . $_POST['selPos'] . "<br>";

                    $strSql = "SELECT * ";
                    $strSql .= "FROM Emp_Main ";
                    $strSql .= "WHERE job_department='" . $_POST['selDept'] . "' ";
                    if($_POST['selPos'] != 'ALL')
                    {
                        $strSql .= "AND job_position='" . $_POST['selPos'] . "' ";
                    }
                    else
                    {
                        $strSql .= "ORDER BY emp_code ";
                    }
                }

                $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                $statement->execute();  
                $nRecCount = $statement->rowCount();

                if ($nRecCount >0)
                {
                    $dataArray = array();
                    $rowArray = array("Code", "T-Title", "T-FName", "T-LName", "E-Title", "E-FName", "E-LName",
                                "NName", "ID-NO", "Birth-Date", "Mobile-No", "Emergency-Mobile-No", "Religion", "Current-Status", "Blood-Group",
                                "Biz", "Dep", "Sec", "Task", "Loc", "JG", "Pos", "Working-Date", 
                                "Addr-no","Addr-noo","Addr-road","Addr-area","Addr-district","Addr-province","Addr-postal-code",
                                "edu-level1", "edu-detail1", "edu-institute1", "edu-faculty1", "edu-major1", "edu-grade1", "edu-graduated-year1");
                    array_push($dataArray, $rowArray);
                    while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                    {
                        //echo $ds["emp_code"] . "<br>";
                        $rowArray = array($ds["emp_code"], 
                                        $ds["emp_ttitle"], 
                                        $ds["emp_tfname"], 
                                        $ds["emp_tlname"], 
                                        $ds["emp_etitle"], 
                                        $ds["emp_efname"], 
                                        $ds["emp_elname"],
                                        $ds["emp_nname"],
                                        $ds["emp_id_no"],
                                        date('Y-m-d', strtotime($ds["emp_birth_date"])),
                                        $ds["emp_mobile_no"],
                                        $ds["emp_emergency_mobile_no"],
                                        $ds["emp_religion"],
                                        $ds["emp_current_status"],
                                        $ds["emp_blood_type"],

                                        $ds["job_business"],
                                        $ds["job_department"],
                                        $ds["job_section"],
                                        $ds["job_task"],
                                        $ds["job_location"],
                                        $ds["job_grade"],
                                        $ds["job_position"],
                                        $ds["job_working_date"],

                                        $ds["addr_no"],
                                        $ds["addr_moo"],
                                        $ds["addr_road"],
                                        $ds["addr_area"],
                                        $ds["addr_district"],
                                        $ds["addr_province"],
                                        $ds["addr_postal_code"],

                                        $ds["edu_level1"],
                                        $ds["edu_detail1"],
                                        $ds["edu_institute1"],
                                        $ds["edu_faculty1"],
                                        $ds["edu_major1"],
                                        $ds["edu_grade1"],
                                        $ds["edu_graduated_year1"],

                                        $ds["edu_level2"],
                                        $ds["edu_detail2"],
                                        $ds["edu_institute2"],
                                        $ds["edu_faculty2"],
                                        $ds["edu_major2"],
                                        $ds["edu_grade2"],
                                        $ds["edu_graduated_year2"]);
                        array_push($dataArray, $rowArray);
                    }

                    $fileName = "tmpEmployeeData.csv";
                    $fp = fopen('tmpEmployeeData.csv', 'w');
                    //for support Thai 
                    fputs($fp,(chr(0xEF).chr(0xBB).chr(0xBF)));

                    foreach ($dataArray as $fields) {
                        fputcsv($fp, $fields);        
                    }

                    fclose($fp);
                    echo "<br>Generate CSV File Done.<br><a href=$fileName>Download</a>";
                }
                else
                {

                }
            ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>