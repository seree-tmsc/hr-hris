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
        if(strtoupper($_SESSION["ses_user_type"]) == 'A')
        {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("include/library.php"); ?>
    <?php require_once("include/library_modal_welfair_benefit.php"); ?>
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
            <!-- coluimn #1 12 unit -->
            <!-------------------- -->
            <?php
                $param_emp_email=$_SESSION["ses_email"];
                require_once("welfair_benefit_main.php"); 
            ?>
        </div>        
        <!-- End content page -->
    </div>
    <!-- End Body page -->

    <!--Test Begin left slide menu -->
    <?php
        if(strtoupper($_SESSION["ses_user_type"]) == 'A' OR strtoupper($_SESSION["ses_user_type"]) == 'P')
        {
            echo "<div id='left_slide'>";
            require_once("include/menu_admin.php");
            echo "</div>";            
        }
    ?>
    <!--/Test End left slide menu -->

    <!-- Logout Modal-->
    <?php require_once("include/modal_logout.php"); ?>

    <!-- Change Password Modal-->
    <?php require_once("include/modal_chgpassword.php"); ?>
</body>
</html>

<?php
        }
        else
        {
            echo "<script> 
                    alert('ERROR MESSAGE...! You do not have authorization to acces this menu.'); 
                    window.location.href='p11.php'; 
                </script>";
        }
    }
?>