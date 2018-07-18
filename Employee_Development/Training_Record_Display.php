
<div class="panel panel-red">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-user-circle fa-fw"></i> Trainging Records</h3>                    
    </div>

    <div class="panel-body text-center">
        <!-- Header1 -->
        <div class="form-group">
            <div class="col-lg-12">
                <br>
                <label><font color="red">Personal Information:</font></label>
            </div>
        </div>            

        <div class="form-group">
            <div class="col-lg-2" align="left">
                <label>รหัสพนักงาน</label>
                <input type="text" readonly class="form-control" value="<?php echo $_GET['var1']; ?>" >
            </div>
            <div class="col-lg-2" align="left">  
                <label>คำนำหน้า</label>
                <input type="text" readonly class="form-control" value="<?php echo $emp_ttitle; ?>" >
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
             
        <!-- Header2 -->
        <div class="form-group">
            <div class="col-lg-12">
                <br>
                <br>
                <label><font color="red">ข้อมูลการฝึกอบรม :</font></label>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-2" align="left">
                <label>SBU</label>
                <input type="text" readonly class="form-control" value="<?php echo $job_business; ?>" >                                   
            </div>
            <div class="col-lg-2" align="left">
                <label>แผนก</label>
                <input type="text" readonly class="form-control" value="<?php echo $job_department; ?>" >                                   
            </div>
            <div class="col-lg-2" align="left">
                <label>สังกัด</label>
                <input type="text" readonly class="form-control" value="<?php echo $job_location; ?>" >
            </div>
            <div class="col-lg-2" align="left">
                <label>ตำแหน่ง</label>
                <input type="text" readonly class="form-control" value="<?php echo $job_position; ?>" >
            </div>
            <div class="col-lg-2" align="left">
                <label>Job Grade</label>
                <input type="text" readonly class="form-control" value="<?php echo $job_grade; ?>" >
            </div>
            <div class="col-lg-2" align="left">
                <label>วันที่เริ่มงาน</label>
                <input type="text" readonly class="form-control" value="<?php echo $job_working_date->format('d/M/Y'); ?>" >
            </div>            
        </div>
        
        <!-- Header3 -->
        <div class="form-group">
            <div class="col-lg-12">
                <br><br>
                <label><font color="red">ที่อยู่ปัจจุบัน :</font></label>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-5" align="left">
                <label>เลขที่</label>
                <input type="text" readonly class="form-control" value="<?php echo $addr_no; ?>">
            </div>
            <div class="col-lg-3" align="left">
                <label>ถนน</label>
                <input type="text" readonly class="form-control" value="<?php echo $addr_road;?>">
            </div>
            <div class="col-lg-4" align="left">
                <label>ตำบล/แขวง</label>
                <input type="text" readonly class="form-control" value="<?php echo $addr_area;?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-4" align="left">
                <label>อำเภอ/เขต</label>
                <input type="text" readonly class="form-control" value="<?php echo $addr_district;?>">
            </div>
            <div class="col-lg-3" align="left">
                <label>จังหวัด</label>
                <input type="text" readonly class="form-control" value="<?php echo $addr_province;?>">
            </div>
            <div class="col-lg-2" align="left">
                <label>รหัสไปรษณีย์</label>
                <input type="text" readonly class="form-control" value="<?php echo $addr_postal_code;?>">
            </div>
        </div>
        
        <!-- Header4 -->
        <div class="form-group">
            <div class="col-lg-12">
                <br><br>
                <label><font color="red">ประวัติการศึกษา :</font></label>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-2" align="left">  
                <label>ระดับการศึกษา</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_level1;?>">
            </div>
            <div class="col-lg-4" align="left">
                <label>วุฒิการศึกษา</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_detail1;?>">
            </div>
            <div class="col-lg-6" align="left">
                <label>สถาบัน</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_institute1;?>">
            </div>            
        </div>

        <div class="form-group">
            <div class="col-lg-4" align="left">
                <label>คณะ</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_faculty1;?>">
            </div>
            <div class="col-lg-4" align="left">
                <label>วิชาเอก</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_major1;?>">
            </div>
            <div class="col-lg-2" align="left">
                <label>ปีที่จบ</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_graduated_year1;?>">
            </div>
            <div class="col-lg-2" align="left">
                <label>เกรด</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_grade1;?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-12">                                
                <label>&nbsp;</label>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-2" align="left">  
                <label>ระดับการศึกษา</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_level2;?>">
            </div>
            <div class="col-lg-4" align="left">
                <label>วุฒิการศึกษา</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_detail2;?>">
            </div>
            <div class="col-lg-6" align="left">
                <label>สถาบัน</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_institute2;?>">
            </div>            
        </div>

        <div class="form-group">
            <div class="col-lg-4" align="left">
                <label>คณะ</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_faculty2;?>">
            </div>
            <div class="col-lg-4" align="left">
                <label>วิชาเอก</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_major2;?>">
            </div>
            <div class="col-lg-2" align="left">
                <label>ปีที่จบ</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_graduated_year2;?>">
            </div>
            <div class="col-lg-2" align="left">
                <label>เกรด</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_grade2;?>">
            </div>
        </div>        
    </div>
</div>