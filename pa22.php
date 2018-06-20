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
        <!-- Begin content page-->
        <div class="row">
            <br>
            <div class="col-md-8 col-md-offset-2">
                <div class='panel panel-primary'>
                    <div class='panel-heading text-center'>ข้อมูลพนักงาน
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
                            <div class='col-lg-3' align='left'>
                                <label>ชื่อ</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var3']; ?>" >
                            </div>
                            <div class='col-lg-4' align='left'>
                                <label>นามสกุล</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var4']; ?>" >
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-lg-2' align='left'>
                                <label>รหัสพนักงาน</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var1']; ?>" >
                            </div>
                            <div class='col-lg-3' align='left'>
                                <label>ชื่อ</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var3']; ?>" >
                            </div>
                            <div class='col-lg-4' align='left'>
                                <label>นามสกุล</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var4']; ?>" >
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-lg-2' align='left'>
                                <label>รหัสพนักงาน</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var1']; ?>" >
                            </div>
                            <div class='col-lg-3' align='left'>
                                <label>ชื่อ</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var3']; ?>" >
                            </div>
                            <div class='col-lg-4' align='left'>
                                <label>นามสกุล</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var4']; ?>" >
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-lg-2' align='left'>
                                <label>รหัสพนักงาน</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var1']; ?>" >
                            </div>
                            <div class='col-lg-3' align='left'>
                                <label>ชื่อ</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var3']; ?>" >
                            </div>
                            <div class='col-lg-4' align='left'>
                                <label>นามสกุล</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var4']; ?>" >
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-lg-3' align='left'>
                                <label>รหัสพนักงาน</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var1']; ?>" >
                            </div>
                            <div class='col-lg-2' align='left'>
                                <label>รหัสพนักงาน</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var1']; ?>" >
                            </div>
                            <div class='col-lg-3' align='left'>
                                <label>ชื่อ</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var3']; ?>" >
                            </div>
                            <div class='col-lg-4' align='left'>
                                <label>นามสกุล</label>
                                <input type="text" readonly class="form-control" value="<?php echo $_GET['var4']; ?>" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
        <?php
            $param_emp_code=$_GET['var1'];
            require_once("promotion_history.php");
        ?>
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