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

<body>
    <!-- Begin Body page -->
    <div class="container">
        <div class="row">
            <br>
            <div class="col-lg-12">
                <div class='panel panel-primary'>
                    <div class='panel-heading text-center'>ข้อมูลส่วนบุคคล
                    </div>
                    <div class='panel-body'>
                        <div class='form-group'>
                            <div class='col-lg-3' align='center'>
                                <img src= <?php echo "'" . $_GET['var2'] . '?v=' . date('YmdHis') . "'" ?> width='128'>
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
                                <label>วันที่เริ่มงาน</label>
                                <input type="text" readonly class="form-control" value="<?php echo date('d/M/Y',strtotime($_GET['var12'])); ?>" >
                            </div>
                            <div class='col-lg-2' align='left'>
                                <label>Job-Grade</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var11']; ?>" >
                            </div>
                            <div class='col-lg-3' align='left'>
                                <label>ตำแหน่ง</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var10']; ?>" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?php
                    $param_emp_code=$_GET['var1'];
                    require_once("promotion_history.php");
                ?>
            </div>
        </div>
        <!-- End content page -->
    </div>
    <!-- End Body page -->

    <!--Test Begin left slide menu -->
    <?php
        /*
        if(strtoupper($_SESSION["ses_user_type"]) == 'A')
        {
            echo "<div id='left_slide'>";
            require_once("menu_admin.php");
            echo "</div>";            
        }
        */
    ?>
    <!--/Test End left slide menu -->

    <!-- Logout Modal-->
    <?php //require_once("modal_logout.php"); ?>

    <!-- Change Password Modal-->
    <?php //require_once("modal_chgpassword.php"); ?>

</body>
</html>

<?php
    }
?>