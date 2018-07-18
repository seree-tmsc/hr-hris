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
    <?php require_once("include/library_modal_emp_master.php"); ?>
</head>

<body class="bg-dark">
    <!-- Begin Body page -->
    <div class="container">

        <!-- Begin Static navbar -->
        <?php require_once("include/menu_navbar.php"); ?>
        <!-- End Static navbar -->

        <!-- Begin content page-->
        <div class="row">
            <!-------------------- -->
            <!-- coluimn #1 3 unit -->
            <!-------------------- -->
            <div class="col-lg-3 col-md-6">                        
                <?php require_once("include/menu_user.php"); ?>
            </div>

            <!-------------------- -->
            <!-- coluimn #2 8 unit -->
            <!-------------------- -->
            <div class="col-lg-9 col-md-6">            
                <div class="user" align="center">
                    <?php require_once("include/label_header.php"); ?>
                </div>                
                <?php 
                    $param_emp_code=$_SESSION["ses_emp_code"];
                    require_once("Training_Record_DisplayH.php"); 
                ?>
            </div>
        </div>        
        <!-- End content page -->
    </div>
    <!-- End Body page -->

    <!-- Left slide menu -->
    <?php
        if(strtoupper($_SESSION["ses_user_type"]) == 'A')
        {
            echo "<div id='left_slide'>";
            require_once("include/menu_admin.php");
            echo "</div>";            
        }
    ?>
    <!-- End Left slide menu -->

    <!-- Logout Modal-->
    <?php require_once("include/modal_logout.php"); ?>

    <!-- Change Password Modal-->
    <?php require_once("include/modal_chgpassword.php"); ?>


</body>
</html>

<?php
    }
?>