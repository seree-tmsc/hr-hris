<?php
    //echo "USER = " . $param_emp_email . "<br>";

    /*----------------------------------*/
    /*--- Query User Information ---*/
    /*----------------------------------*/
    include_once('include/db_Conn.php');   
    $strSql = "SELECT *,Year(job_working_date)+543 " ;
    $strSql .= "FROM Emp_Main " ;
    $strSql .= "WHERE emp_code='". $param_emp_code . "' ";
    //echo $strSql . "<br>";

    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo "Record Count = " . $nRecCount ."<br>";

    if ($nRecCount == 1)
    {
        $ds = $statement->fetch(PDO::FETCH_NAMED);
        $emp_code = $ds['emp_code'];
        $emp_ttitle = $ds['emp_ttitle'];
        $emp_tfname = $ds['emp_tfname'];
        $emp_tlname = $ds['emp_tlname'];
        $emp_nname = $ds['emp_nname'];
        $emp_etitle = $ds['emp_etitle'];
        $emp_efname = $ds['emp_efname'];
        $emp_elname = $ds['emp_elname'];
        $emp_id_no = $ds['emp_id_no'];   

        $BirthDate = new DateTime($ds['emp_birth_date']);
        $tmpDate = $BirthDate->format('Y')+543 . "/".$BirthDate->format('m') . "/". $BirthDate->format('d');
        $BirthDate = new DateTime($tmpDate);
        $emp_birth_date = $BirthDate;
        
        $emp_mobile_no = $ds['emp_mobile_no'];
        
        $job_business = $ds['job_business'];
        $job_department = $ds['job_department'];
        $job_location = $ds['job_location'];
        $job_grade = $ds['job_grade'];
        $job_position = $ds['job_position'];

        $WorkingDate = new DateTime($ds['job_working_date']);
        $tmpDate = $WorkingDate->format('Y')+543 . "/".$WorkingDate->format('m') . "/". $WorkingDate->format('d');
        $WorkingDate = new DateTime($tmpDate);
        $job_working_date = $WorkingDate;

        $addr_no = $ds['addr_no'];
        $addr_road = $ds['addr_road'];
        $addr_area = $ds['addr_area'];
        $addr_district = $ds['addr_district'];
        $addr_province = $ds['addr_province'];
        $addr_postal_code = $ds['addr_postal_code'];

        $edu_level1 = $ds['edu_level1'];
        $edu_detail1 = $ds['edu_detail1'];
        $edu_institute1 = $ds['edu_institute1'];
        $edu_faculty1 = $ds['edu_faculty1'];
        $edu_major1 = $ds['edu_major1'];
        $edu_grade1 = $ds['edu_grade1'];
        $edu_graduated_year1 = $ds['edu_graduated_year1'];

        $edu_level2 = $ds['edu_level2'];
        $edu_detail2 = $ds['edu_detail2'];
        $edu_institute2 = $ds['edu_institute2'];
        $edu_faculty2 = $ds['edu_faculty2'];
        $edu_major2 = $ds['edu_major2'];
        $edu_grade2 = $ds['edu_grade2'];
        $edu_graduated_year2 = $ds['edu_graduated_year2'];
    }
    else
    {
        echo "<script> 
                alert('Error! There are more than 1 record!'); 
                window.location.href='p11.php'; 
            </script>";        
    }
?>

<div class="panel panel-red">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-user-circle fa-fw"></i> My Profile</h3>                    
    </div>

    <div class="panel-body text-center">
        <!-- Header1 -->
        <div class="form-group">
            <div class="col-lg-12">
                <br>
                <label><font color="red">ข้อมูลส่วนบุคคล :</font></label>
            </div>
        </div>            

        <div class="form-group">
            <div class="col-lg-2" align="left">
                <label>รหัสพนักงาน</label>
                <input type="text" readonly class="form-control" value="<?php echo $emp_code; ?>" >
            </div>
            <div class="col-lg-2" align="left">  
                <label>คำนำหน้า</label>
                <input type="text" readonly class="form-control" value="<?php echo $emp_ttitle; ?>" >
            </div>
            <div class="col-lg-2" align="left">    
                <label>ชื่อ</label>
                <input type="text" readonly class="form-control" value="<?php echo $emp_tfname; ?>" >
            </div>
            <div class="col-lg-4" align="left">
                <label>นามสกุล</label>                
                <input type="text" readonly class="form-control" value="<?php echo $emp_tlname; ?>" >
            </div>
            <div class="col-lg-2" align="left">
                <label>ชื่อเล่น</label>
                <input type="text" readonly class="form-control" value="<?php echo $emp_nname; ?>" >
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-2">
                <label>&nbsp;</label>
            </div>
            <div class="col-lg-2" align="left">
                <label>Title</label>
                <input type="text" readonly class="form-control" value="<?php echo $emp_etitle; ?>" >
            </div>
            <div class="col-lg-2" align="left">
                <label>First-Name</label>
                <input type="text" readonly class="form-control" value="<?php echo $emp_efname; ?>" >
            </div>
            <div class="col-lg-4" align="left">
                <label>Last-Name</label>
                <input type="text" readonly class="form-control" value="<?php echo $emp_elname; ?>" >
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-lg-4">
                <label>&nbsp;</label>
            </div>
            <div class="col-md-3" align="left">
                <label>เลขบัตรประจำตัวประชาชน</label>
                <input type="text" readonly class="form-control" value="<?php echo $emp_id_no; ?>" >
            </div>
            <div class="col-md-2" align="left">
                <label>วันเกิด</label>
                <input type="text" readonly class="form-control" value="<?php echo $emp_birth_date->format('d/m/Y'); ?>">
            </div>
            <div class="col-md-3" align="left">
                <label>โทรศัพท์</label>
                <input type="text" readonly class="form-control" value="<?php echo $emp_mobile_no; ?>" >
            </div>            
        </div>
        
        <!-- Header2 -->
        <div class="form-group">
            <div class="col-lg-12">
                <br>
                <br>
                <label><font color="red">ข้อมูลหน่วยงาน :</font></label>
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
                <input type="text" readonly class="form-control" value="<?php echo $job_working_date->format('d/m/Y'); ?>" >
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
            <div class="col-lg-2" align="left">
                <label>วุฒิการศึกษา</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_detail1;?>">
            </div>
            <div class="col-lg-4" align="left">
                <label>สถาบัน</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_institute1;?>">
            </div>
            <div class="col-lg-4" align="left">
                <label>คณะ</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_faculty1;?>">
            </div>
        </div>

        <div class="form-group">
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
            <div class="col-lg-2" align="left">
                <label>วุฒิการศึกษา</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_detail2;?>">
            </div>
            <div class="col-lg-4" align="left">
                <label>สถาบัน</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_institute2;?>">
            </div>
            <div class="col-lg-4" align="left">
                <label>คณะ</label>
                <input type="text" readonly class="form-control" value="<?php echo $edu_faculty2;?>">
            </div>
        </div>

        <div class="form-group">
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