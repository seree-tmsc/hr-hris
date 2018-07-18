<?php
    include_once('include/chk_Session.php');
    if($user_email == "")
    {
        echo "<script> 
                alert('Warning! Please Login!'); 
                window.location.href='login.php'; 
            </script>";
    }
    else
    {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("include/library.php"); ?>
</head>

<!--<body class="bg-dark">-->
<body>
    <!-- Begin Body page -->
    <div class="container">
        <!-- Begin content page-->
        <div class="row">
            <!-------------------- -->
            <!-- coluimn #1 3 unit -->
            <!-------------------- -->
            <br>
            <div class="col-lg-12">
                <div class='panel panel-primary'>
                    <div class='panel-heading text-center'>ข้อมูลส่วนบุคคล
                    </div>
                    <div class='panel-body'>
                        <div class='form-group'>
                            <div class='col-lg-3' align='center'>
                                <img src= <?php echo "'" . $_GET['var2'] . '?v=' . date('YmdHis') . "'" ?> height='196' width='128'>
                            </div>
                            <div class='col-lg-2' align='left'>
                                <label>รหัสพนักงาน</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var1']; ?>" >
                            </div>
                            <div class='col-lg-1' align='left'>
                                <label>คำนำหน้า</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var3']; ?>" >
                            </div>
                            <div class='col-lg-2' align='left'>
                                <label>ชื่อ</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var4']; ?>" >
                            </div>
                            <div class='col-lg-4' align='left'>
                                <label>นามสกุล</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var5']; ?>" >
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-lg-2' align='left'>
                                <label>ชื่อเล่น</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var9']; ?>" >
                            </div>
                            <div class='col-lg-1' align='left'>
                                <label>Title</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var6']; ?>" >
                            </div>
                            <div class='col-lg-2' align='left'>
                                <label>First Name</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var7']; ?>" >
                            </div>
                            <div class='col-lg-4' align='left'>
                                <label>Last Name</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var8']; ?>" >
                            </div>
                        </div>                        
                        <div class='form-group'>
                            <div class='col-lg-2' align='left'>
                                <label>&nbsp</label>                                
                            </div>
                            <div class='col-lg-2' align='left'>
                                <label>วันเกิด</label>
                                <input type="text" readonly class="form-control" value="<?php echo date('d/M/Y',strtotime($_GET['var11'])); ?>" >
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <br>
            <div class="col-lg-12">
                <div class='panel panel-primary'>
                    <div class='panel-heading text-center'>ข้อมูลหน่วยงาน
                    </div>
                    <div class='panel-body'>
                        <div class='form-group'>
                            <div class='col-lg-2' align='left'>
                                <label>BIZ</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var20']; ?>" >
                            </div>                            
                            <div class='col-lg-2' align='left'>
                                <label>แผนก</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var21']; ?>" >
                            </div>
                            <div class='col-lg-2' align='left'>
                                <label>สังกัด</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var22']; ?>" >
                            </div>
                            <div class='col-lg-2' align='left'>
                                <label>ตำแหน่ง</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var23']; ?>" >
                            </div>
                            <div class='col-lg-2' align='left'>
                                <label>Job Grade</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var24']; ?>" >
                            </div>
                            <div class='col-lg-2' align='left'>
                                <label>วันที่เริ่มงาน</label>
                                <input type="text" readonly class="form-control" value="<?php echo date('d/M/Y',strtotime($_GET['var25'])); ?>" >
                            </div>
                        </div>
                        <div class='form-group'>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <br>
            <div class="col-lg-12">
                <div class='panel panel-primary'>
                    <div class='panel-heading text-center'>ที่อยู่ปัจจุบัน
                    </div>
                    <div class='panel-body'>
                        <div class='form-group'>
                            <div class='col-lg-4' align='left'>
                                <label>เลขที่</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var30']; ?>" >
                            </div>
                            <div class='col-lg-8' align='left'>
                                <label>ถนน</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var31']; ?>" >
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-lg-3' align='left'>
                                <label>ตำบล</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var32']; ?>" >
                            </div>
                            <div class='col-lg-3' align='left'>
                                <label>อำเภอ</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var33']; ?>" >
                            </div>
                            <div class='col-lg-4' align='left'>
                                <label>จังหวัด</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var34']; ?>" >
                            </div>
                            <div class='col-lg-2' align='left'>
                                <label>รหัสไปรษณีย์</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var35']; ?>" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <br>
            <div class="col-lg-12">
                <div class='panel panel-primary'>
                    <div class='panel-heading text-center'>ประวัติการศึกษา-1
                    </div>
                    <div class='panel-body'>
                        <div class='form-group'>                            
                            <div class='col-lg-3' align='left'>
                                <label>ระดับการศึกษา</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var40']; ?>" >
                            </div>
                            <div class='col-lg-3' align='left'>
                                <label>วุฒิการศึกษา</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var41']; ?>" >
                            </div>
                            <div class='col-lg-6'>
                                <label>&nbsp</label>
                                <input type="text" readonly class="form-control" value="" >
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-lg-5' align='left'>
                                <label>สถาบัน</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var42']; ?>" >
                            </div>
                            <div class='col-lg-3' align='left'>
                                <label>คณะ</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var43']; ?>" >
                            </div>
                            <div class='col-lg-3' align='left'>
                                <label>วิชาเอก</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var44']; ?>" >
                            </div>
                            <div class='col-lg-1' align='left'>
                                <label>ปีที่จบ</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var45']; ?>" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <br>
            <div class="col-lg-12">
                <div class='panel panel-primary'>
                    <div class='panel-heading text-center'>ประวัติการศึกษา-2
                    </div>
                    <div class='panel-body'>
                        <div class='form-group'>                            
                            <div class='col-lg-3' align='left'>
                                <label>ระดับการศึกษา</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var46']; ?>" >
                            </div>
                            <div class='col-lg-3' align='left'>
                                <label>วุฒิการศึกษา</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var47']; ?>" >
                            </div>
                            <div class='col-lg-6'>
                                <label>&nbsp</label>
                                <input type="text" readonly class="form-control" value="" >
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-lg-5' align='left'>
                                <label>สถาบัน</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var48']; ?>" >
                            </div>
                            <div class='col-lg-3' align='left'>
                                <label>คณะ</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var49']; ?>" >
                            </div>
                            <div class='col-lg-3' align='left'>
                                <label>วิชาเอก</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var50']; ?>" >
                            </div>
                            <div class='col-lg-1' align='left'>
                                <label>ปีที่จบ</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var51']; ?>" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
        <?php
            /*
            $param_emp_code=$_GET['var1'];                                        
            require_once("performance_history.php");
            */
        ?>
        </div>
        <!-- End content page -->
    </div>
    <!-- End Body page -->
</body>
</html>

<?php
    }
?>