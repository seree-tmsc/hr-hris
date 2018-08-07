<!DOCTYPE html>
<html lang="en">
<head>
    
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TMSC HRIS Ver 1.0</title>
    
<!-- Bootstrap -->
<link rel="stylesheet" href="../vendors/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../vendors/jquery-3.2.1/jquery-3.2.1.min.js"></script>
<script src="../vendors/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

<!-- awesom icon -->
<link rel="stylesheet" href="../vendors/font-awesome-4.7.0/css/font-awesome.min.css">

<!-- Morris Charts JavaScript -->
<link rel="stylesheet" href="../vendors/morris.js-0.5.1/morris.css">
<script src="../vendors/morris.js-0.5.1/morris.min.js"></script>
<script src="../vendors/raphael/raphael.min.js"></script>

<!-- Bootside menu -->
<link rel="stylesheet" href="../vendors/BootSideMenu/css/BootSideMenu.css">
<script src="../vendors/BootSideMenu/js/BootSideMenu.js"></script>

<!-- my -->
<link rel="stylesheet" href="../vendors/my/css/my.css">
<script src="../vendors/my/js/my.js" type="text/javascript"></script>

<!-- calendar -->
<link type="text/css" href="../vendors/jquery.calendars.package-2.1.0/css/jquery.calendars.picker.css" rel="stylesheet"/>
<script type="text/javascript" src="../vendors/jquery.calendars.package-2.1.0/js/jquery.plugin.js"></script>
<script type="text/javascript" src="../vendors/jquery.calendars.package-2.1.0/js/jquery.calendars.js"></script>
<script type="text/javascript" src="../vendors/jquery.calendars.package-2.1.0/js/jquery.calendars.plus.js"></script>
<script type="text/javascript" src="../vendors/jquery.calendars.package-2.1.0/js/jquery.calendars.picker.min.js"></script>
<script type="text/javascript" src="../vendors/jquery.calendars.package-2.1.0/js/jquery.calendars.picker-th.js"></script>
<script type="text/javascript" src="../vendors/jquery.calendars.package-2.1.0/js/jquery.calendars.thai.js"></script>
<script type="text/javascript" src="../vendors/jquery.calendars.package-2.1.0/js/jquery.calendars-th.js"></script>
<script type="text/javascript" src="../vendors/jquery.calendars.package-2.1.0/js/jquery.calendars.thai-th.js"></script>

<script type="text/javascript">
    $(function() {
        $('#mydate1').calendarsPicker({calendar: $.calendars.instance('thai','th')});
        $('#mydate2').calendarsPicker({calendar: $.calendars.instance('thai','th')});

        $('#update_emp_birth_date').calendarsPicker({calendar: $.calendars.instance('thai','th')});
        $('#update_job_working_date').calendarsPicker({calendar: $.calendars.instance('thai','th')});
    });
</script>
   
<script type="text/javascript">
    function showModalUpdate_emp_master(argument1,argument2,argument3,argument4,argument5,argument6,
    argument7,argument8,argument9,argument10,argument11,argument12,argument13,argument14,
    argument15,argument16,argument17,argument18,argument19,argument20,argument21,argument22,
    argument23,argument24,argument25,argument26,argument27,argument28,argument29,argument30,
    argument31,argument32,argument33,argument34,argument35,argument36,argument37,argument38)
    {
        $('#paramupdate_emp_code').val(argument1);
        $('#update_emp_code').val(argument1);
        $('#update_emp_ttitle').val(argument2);
        $('#update_emp_tfname').val(argument3);
        $('#update_emp_tlname').val(argument4);
        $('#update_emp_etitle').val(argument5);
        $('#update_emp_efname').val(argument6);
        $('#update_emp_elname').val(argument7);
        $('#update_emp_nname').val(argument8);
        $('#update_emp_id_no').val(argument9);
        $('#update_emp_birth_date').val(argument10);
        $('#update_emp_mobile_no').val(argument11);

        $('#update_emp_picture').attr('src',argument12);
        $('#paramupdate_emp_picture').attr('src',argument12);

        $('#update_job_business').val(argument13);
        $('#update_job_department').val(argument14);
        $('#update_job_location').val(argument15);
        $('#update_job_grade').val(argument16);
        $('#update_job_position').val(argument17);
        $('#update_job_working_date').val(argument18);

        $('#update_addr_no').val(argument19);
        $('#update_addr_road').val(argument20);
        $('#update_addr_area').val(argument21);
        $('#update_addr_district').val(argument22);
        $('#update_addr_province').val(argument23);
        $('#update_addr_postal_code').val(argument24);

        $('#update_edu_level1').val(argument25);
        $('#update_edu_detail1').val(argument26);
        $('#update_edu_institute1').val(argument27);
        $('#update_edu_faculty1').val(argument28);
        $('#update_edu_major1').val(argument29);
        $('#update_edu_grade1').val(argument30);
        $('#update_edu_graduated_year1').val(argument31);

        $('#update_edu_level2').val(argument32);
        $('#update_edu_detail2').val(argument33);
        $('#update_edu_institute2').val(argument34);
        $('#update_edu_faculty2').val(argument35);
        $('#update_edu_major2').val(argument36);
        $('#update_edu_grade2').val(argument37);
        $('#update_edu_graduated_year2').val(argument38);
        
        // show modal
        $('#update_record_modal').modal('show');
        //document.getElementById("edit_Fname").innerHTML = A;
    }

    function showModalDelete_emp_master(argument1,argument2,argument3,argument4,argument5,argument6,
    argument7,argument8,argument9,argument10,argument11,argument12,argument13,argument14,
    argument15,argument16,argument17,argument18)
    {
        // alert('function showModalEdit');
        /*
        var A =argument1;
        var B =argument2;
        var C =argument3;
        var D =argument4;
        */

        // set value to modal            
        $('#delete_emp_code').val(argument1);
        $('#delete_emp_ttitle').val(argument2);
        $('#delete_emp_tfname').val(argument3);
        $('#delete_emp_tlname').val(argument4);
        $('#delete_emp_etitle').val(argument5);
        $('#delete_emp_efname').val(argument6);
        $('#delete_emp_elname').val(argument7);
        $('#delete_emp_nname').val(argument8);
        $('#delete_emp_id_no').val(argument9);
        $('#delete_emp_birth_date').val(argument10);
        $('#delete_emp_mobile_no').val(argument11);

        $('#delete_emp_picture').attr('src',argument12);

        $('#delete_job_business').val(argument13);
        $('#delete_job_department').val(argument14);
        $('#delete_job_section').val(argument15);
        $('#delete_job_grade').val(argument16);
        $('#delete_job_position').val(argument17);
        $('#delete_job_working_date').val(argument18);

        // show modal
        $('#delete_record_modal').modal('show');
        //document.getElementById("edit_Fname").innerHTML = A;
    }
</script></head>

<body class="bg-dark">
    <!-- Begin Body page -->
    <div class="container">

        <!-- Begin Static navbar -->
        <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="images/tmsc-new-logo-128.png" alt="" width="86">
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="p11.php">
                        <span class="fa fa-user-circle fa-lg"></span>
                        Main Page
                    </a>                            
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class='fa fa-user-circle-o fa-lg'></span> 
                        Login as ... 
                        seree@tmsc.co.th 
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>                                
                            <a href="#" data-toggle="modal" data-target="#chgpasswordModal">
                                <span class='fa fa-pencil-square-o fa-lg'></span> 
                                Change Password
                            </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>                                
                            <a href="#" data-toggle="modal" data-target="#logoutModal">
                                <span class="fa fa-sign-out fa-lg"></span> 
                                logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>        <!-- End Static navbar -->

        <!-- Begin content page-->
        <div class="row">
            <!-------------------- -->
            <!-- coluimn #1 3 unit -->
            <!-------------------- -->
            <div class="col-lg-3 col-md-6">                        
                <div class='panel panel-primary text-center'><div class='panel-heading'>Picture</div><div class='panel-body'><img src='images/pic_OC-002.jpg         ?v=20180804131217' height='196' width='128'> </div></div>
<div class="list-group">
    <a href="#myprofile_menu" class="list-group-item" data-toggle="collapse">
        1. My Profile
        <i class="fa fa-user-circle fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="myprofile_menu">
        <a href="p11.php" class="list-group-item">1.1 My Profile</a>
    </div>
    
    <a href="#hrinf_menu" class="list-group-item" data-toggle="collapse">
        2. HR Information History
        <i class="fa fa-folder-open fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="hrinf_menu">
        <a href="p21.php" class="list-group-item">2.1 Perfomance list</a>
        <a href="p22.php" class="list-group-item">2.2 Promotion list</a>        
    </div>

    <a href="#jd_menu" class="list-group-item" data-toggle="collapse">
        3. Job Description
        <i class="fa fa-address-card fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="jd_menu">
        <a href="#" class="list-group-item">3.1 Job Description</a>
    </div>

    <a href="#hradmin_menu" class="list-group-item" data-toggle="collapse">
        4. Admin
        <i class="fa fa-money fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="hradmin_menu">
        <a href="p41.php" class="list-group-item">4.1 Welfare & Benefit</a>
    </div>

    <a href="#ed_menu" class="list-group-item" data-toggle="collapse">
        5. Employee Development
        <i class="fa fa-graduation-cap fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="ed_menu">
        <a href="p51.php" class="list-group-item">5.1 Training Roadmap</a>  
        <a href="#" class="list-group-item">5.2 IDP</a>
        <a href="p53.php" class="list-group-item">5.3 Training Record</a>
        <a href="#" class="list-group-item">5.4 e-Learning</a>
    </div>

    <a href="#roadmap_menu" class="list-group-item" data-toggle="collapse">
        6. -
        <!--<i class="fa fa-line-chart fa-lg btn pull-right"></i>-->
    </a>
    <div class="list-group collapse" id="roadmap_menu">
        <!--<a href="#" class="list-group-item">6.1 Roadmap</a>-->
    </div>

    <a href="#pms_menu" class="list-group-item" data-toggle="collapse">
        7. PMS
        <i class="fa fa-thumbs-o-up fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="pms_menu">
        <a href="#" class="list-group-item">7.1 PMS</a>
    </div>

    <a href="#attendant_menu" class="list-group-item" data-toggle="collapse">
        8. Attendant
        <i class="fa fa-calendar fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="attendant_menu">
        <a href="#" class="list-group-item">8.1 Attendant</a>
    </div>

    <a href="#organization_menu" class="list-group-item" data-toggle="collapse">
        9. Organization
        <i class="fa fa-users fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="organization_menu">
        <a href="#" class="list-group-item">9.1 Organization</a>
    </div>

    <a href="#myteam_menu" class="list-group-item" data-toggle="collapse">
        10. My Team
        <i class="fa fa-user-plus fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="myteam_menu">
        <a href="pa1.php" class="list-group-item">10.1 My Team HR Information</a>
        <a href="pa2.php" class="list-group-item">10.2 My Team Performance</a>
        <a href="pa1.php" class="list-group-item">10.3 My Team Promotion</a>
        <a href="pa51.php" class="list-group-item">10.4 My Team Training Roadmap</a>
        <a href="pa53.php" class="list-group-item">10.5 My Team Training Record</a>
    </div>
</div>            </div>

            <!-------------------- -->
            <!-- coluimn #2 8 unit -->
            <!-------------------- -->
            <div class="col-lg-9 col-md-6">            
                <div class="user" align="center">
                    <img class="img-responsive" src="images/Banner 01.png" alt="Chania">
<p></p>                </div>                
                
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
                <input type="text" readonly class="form-control" value="OC-002" >
            </div>
            <div class="col-lg-2" align="left">  
                <label>คำนำหน้า</label>
                <input type="text" readonly class="form-control" value="นาย" >
            </div>
            <div class="col-lg-3" align="left">    
                <label>ชื่อ</label>
                <input type="text" readonly class="form-control" value="เสรี" >
            </div>
            <div class="col-lg-5" align="left">
                <label>นามสกุล</label>                
                <input type="text" readonly class="form-control" value="หงส์หาญณรงค์" >
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-2">
                <label>&nbsp;</label>
            </div>
            <div class="col-lg-2" align="left">
                <label>Title</label>
                <input type="text" readonly class="form-control" value="Mr." >
            </div>
            <div class="col-lg-3" align="left">
                <label>First-Name</label>
                <input type="text" readonly class="form-control" value="SAREE" >
            </div>
            <div class="col-lg-5" align="left">
                <label>Last-Name</label>
                <input type="text" readonly class="form-control" value="HONGHARNNARONG" >
            </div>
        </div>
        
        <div class="form-group">
            <!--
            <div class="col-lg-2">
                <label>&nbsp;</label>
            </div>
            -->
            <div class="col-lg-2" align="left">
                <label>ชื่อเล่น</label>
                <input type="text" readonly class="form-control" value="NULL" >
            </div>
            <div class="col-md-3" align="left">
                <label>เลขบัตรประจำตัวประชาชน</label>
                <input type="text" readonly class="form-control" value="1234567890123" >
            </div>
            <div class="col-md-2" align="left">
                <label>วันเกิด</label>
                <input type="text" readonly class="form-control" value="13/Apr/2511">
            </div>
            <div class="col-md-3" align="left">
                <label>โทรศัพท์</label>
                <input type="text" readonly class="form-control" value="NULL      " >
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
                <input type="text" readonly class="form-control" value="GN" >                                   
            </div>
            <div class="col-lg-2" align="left">
                <label>แผนก</label>
                <input type="text" readonly class="form-control" value="COM" >                                   
            </div>
            <div class="col-lg-2" align="left">
                <label>สังกัด</label>
                <input type="text" readonly class="form-control" value="OFF" >
            </div>
            <div class="col-lg-2" align="left">
                <label>ตำแหน่ง</label>
                <input type="text" readonly class="form-control" value="MGR" >
            </div>
            <div class="col-lg-2" align="left">
                <label>Job Grade</label>
                <input type="text" readonly class="form-control" value="JG-13" >
            </div>
            <div class="col-lg-2" align="left">
                <label>วันที่เริ่มงาน</label>
                <input type="text" readonly class="form-control" value="01/Oct/2536" >
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
                <input type="text" readonly class="form-control" value="1666/3  ">
            </div>
            <div class="col-lg-3" align="left">
                <label>ถนน</label>
                <input type="text" readonly class="form-control" value="เจริญกรุง ">
            </div>
            <div class="col-lg-4" align="left">
                <label>ตำบล/แขวง</label>
                <input type="text" readonly class="form-control" value="-">
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-4" align="left">
                <label>อำเภอ/เขต</label>
                <input type="text" readonly class="form-control" value="ยานนาวา">
            </div>
            <div class="col-lg-3" align="left">
                <label>จังหวัด</label>
                <input type="text" readonly class="form-control" value="กรุงเทพฯ">
            </div>
            <div class="col-lg-2" align="left">
                <label>รหัสไปรษณีย์</label>
                <input type="text" readonly class="form-control" value="">
            </div>
        </div>
        
        <!-- Header4 -->
        <div class="form-group">
            <div class="col-lg-12">
                <br><br>
                <label><font color="red">ประวัติการศึกษา-1 :</font></label>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-2" align="left">  
                <label>ระดับการศึกษา</label>
                <input type="text" readonly class="form-control" value="ปริญญาตรี">
            </div>
            <div class="col-lg-4" align="left">
                <label>วุฒิการศึกษา</label>
                <input type="text" readonly class="form-control" value="Science (Mathematics)">
            </div>
            <div class="col-lg-6" align="left">
                <label>สถาบัน</label>
                <input type="text" readonly class="form-control" value="King Mongkut's University of Technology Thonburi">
            </div>            
        </div>

        <div class="form-group">
            <div class="col-lg-4" align="left">
                <label>คณะ</label>
                <input type="text" readonly class="form-control" value="">
            </div>
            <div class="col-lg-4" align="left">
                <label>วิชาเอก</label>
                <input type="text" readonly class="form-control" value="">
            </div>
            <div class="col-lg-2" align="left">
                <label>ปีที่จบ</label>
                <input type="text" readonly class="form-control" value="">
            </div>
            <div class="col-lg-2" align="left">
                <label>เกรด</label>
                <input type="text" readonly class="form-control" value="">
            </div>
        </div>

        <!--
        <div class="form-group">
            <div class="col-lg-12">                                
                <label>&nbsp;</label>
            </div>
        </div> 
        -->

        <!-- Header5 -->
        <div class="form-group">
            <div class="col-lg-12">
                <br><br>
                <label><font color="red">ประวัติการศึกษา-2 :</font></label>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-lg-2" align="left">  
                <label>ระดับการศึกษา</label>
                <input type="text" readonly class="form-control" value="">
            </div>
            <div class="col-lg-4" align="left">
                <label>วุฒิการศึกษา</label>
                <input type="text" readonly class="form-control" value="">
            </div>
            <div class="col-lg-6" align="left">
                <label>สถาบัน</label>
                <input type="text" readonly class="form-control" value="">
            </div>            
        </div>

        <div class="form-group">
            <div class="col-lg-4" align="left">
                <label>คณะ</label>
                <input type="text" readonly class="form-control" value="">
            </div>
            <div class="col-lg-4" align="left">
                <label>วิชาเอก</label>
                <input type="text" readonly class="form-control" value="">
            </div>
            <div class="col-lg-2" align="left">
                <label>ปีที่จบ</label>
                <input type="text" readonly class="form-control" value="">
            </div>
            <div class="col-lg-2" align="left">
                <label>เกรด</label>
                <input type="text" readonly class="form-control" value="">
            </div>
        </div>        
    </div>
</div>            </div>
        </div>        
        <!-- End content page -->
    </div>
    <!-- End Body page -->

    <!-- Left slide menu -->
    <div id='left_slide'><div class="user">
    <!--<img src="images/tmsc-longlogo.png" alt="">-->
    <img src="images/admin.jfif" alt="">
</div>

<div class="list-group">
    <a href="#admin_myprofile_menu" class="list-group-item" data-toggle="collapse">
        1. User Profile
        <i class="fa fa-user-circle fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="admin_myprofile_menu">
        <a href="admin_p11.php" class="list-group-item">1.1 User Profile</a>
        <a href="admin_p12.php" class="list-group-item">1.2 User Management</a>
    </div>
    
    <a href="#admin_hrinf_menu" class="list-group-item" data-toggle="collapse">
        2. HR Information History
        <i class="fa fa-folder-open fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="admin_hrinf_menu">
        <a href="admin_p21.php" class="list-group-item">2.1 Perfomance list</a>
        <a href="admin_p22.php" class="list-group-item">2.2 Promotion list</a>
    </div>

    <a href="#admin_jd_menu" class="list-group-item" data-toggle="collapse">
        3. Job Description
        <i class="fa fa-address-card fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="admin_jd_menu">
        <a href="#" class="list-group-item">3.1 Job Description</a>
    </div>

    <a href="#admin_hradmin_menu" class="list-group-item" data-toggle="collapse">
        4. Admin
        <i class="fa fa-money fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="admin_hradmin_menu">
        <a href="admin_p41.php" class="list-group-item">4.1 Welfare & Benefit</a>
    </div>

    <a href="#admin_ed_menu" class="list-group-item" data-toggle="collapse">
        5. Employee Development
        <i class="fa fa-graduation-cap fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="admin_ed_menu">        
        <a href="admin_53.php" class="list-group-item">5.1 Training Roadmap</a>
        <a href="#" class="list-group-item">5.2 IDP</a>
        <a href="admin_p53.php" class="list-group-item">5.3 Training Record</a>
        <a href="#" class="list-group-item">5.4 e-Learning</a>
    </div>

    <a href="#admin_roadmap_menu" class="list-group-item" data-toggle="collapse">
        6. -
        <!--<i class="fa fa-line-chart fa-lg btn pull-right"></i>-->
    </a>
    <div class="list-group collapse" id="admin_roadmap_menu">
        <!--<a href="#" class="list-group-item">6.1 Roadmap</a>-->
    </div>

    <a href="#admin_pms_menu" class="list-group-item" data-toggle="collapse">
        7. PMS
        <i class="fa fa-thumbs-o-up fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="admin_pms_menu">
        <a href="#" class="list-group-item">7.1 PMS</a>
    </div>

    <a href="#admin_attendant_menu" class="list-group-item" data-toggle="collapse">
        8. Attendant
        <i class="fa fa-calendar fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="admin_attendant_menu">
        <a href="#" class="list-group-item">8.1 Attendant</a>
    </div>

    <a href="#admin_organization_menu" class="list-group-item" data-toggle="collapse">
        9. Organization
        <i class="fa fa-users fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="admin_organization_menu">
        <a href="#" class="list-group-item">9.1 Organization</a>
    </div>

    <a href="#admin_tools_menu" class="list-group-item" data-toggle="collapse">
        10. Admin Tools
        <i class="fa fa-gears fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="admin_tools_menu">
        <a href="admin_p101.php" class="list-group-item">10.1 Import Data from Excel into DB</a>
    </div>
</div></div>    <!-- End Left slide menu -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Do you want to logout?</h4>
            </div>
            <div class="modal-body">
                <p>Click Logout button to close current session</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>                
                <a class="btn btn-success" href="logout.php">Logout</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <!-- Change Password Modal-->
    <div class="modal fade" id="chgpasswordModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Change password</h4>
            </div>

            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Input Form</h3>
                    </div>
                    <div class="panel-body">
                        <form action="chg_password.php" method="post">
                            <div class="col-lg-2 col-md-6">
                            </div>

                            <div class="col-lg-8 col-md-6">
                                <div class="form-group">
                                    <label>Current Password:</label>
                                    <input type="password"  name="param_curpwd" value="" placeholder="Current password" required autofocus class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>New Password:</label>
                                    <input type="password" name="param_newpwd" value="" placeholder="New password" required class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Confirm New Password:</label>
                                    <input type="password" name="param_confnewpwd" values ="" placeholder ="Confirm new password" required class="form-control" >                                    
                                </div>
                                <div align="right">
                                    <!--<input type="submit" name="btn_Login" value="Login" class="btn btn-success">-->
                                    <button type="button" name ="btn_cancel" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <!--<a class="btn btn-success" href="chgpassword.php">Submit</a>-->
                                    <!--<button type="submit" class="btn btn-success" data-dismiss="modal">Change Password</button>-->
                                    <input type="submit" name="btn_submit" value="Change Password" class="btn btn-success">
                                </div>                                
                            </div>

                            <div class="col-lg-2 col-md-6">                
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
</div><!-- /.modal --></body>
</html>

