<?php
    include_once('chk_Session.php');
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
    <?php require_once("library.php"); ?>
    <?php //require_once("library_modal_emp_master.php"); ?>
    <style>    
        /*-------------------------------- */
        /* Css for datetimepicker on modal */
        /*-------------------------------- */
        /*
        .calendars-popup {
            z-index: 1151;
        } 
        */   
    </style>
</head>

<body class="bg-dark">

    <!-- Begin Body page -->
    <div class="container">

        <!-- Begin Static navbar -->
        <?php require_once("menu_navbar.php"); ?>
        <!-- End Static navbar -->

        <!-- Begin content page-->
        <div class="row">
            <!-------------------- -->
            <!-- coluimn #1 12 unit -->
            <!-------------------- -->
            <?php
                $param_emp_email=$_SESSION["ses_email"];
                require_once("import_main.php");
            ?>
        </div>        
        <!-- End content page -->
    </div>
    <!-- End Body page -->

    <!--Test Begin left slide menu -->
    <?php
        if(strtoupper($_SESSION["ses_user_type"]) == 'A')
        {
            echo "<div id='left_slide'>";
            require_once("menu_admin.php");
            echo "</div>";            
        }
    ?>
    <!--/Test End left slide menu -->

    <!-- Logout Modal-->
    <?php require_once("modal_logout.php"); ?>

    <!-- Change Password Modal-->
    <?php require_once("modal_chgpassword.php"); ?>
</body>
</html>

<?php
    }
?>