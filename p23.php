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
            <!-- coluimn #1 3 unit -->
            <!-------------------- -->
            <div class="col-lg-3 col-md-6">                        
                <?php require_once("menu_user.php"); ?>
            </div>

            <!-------------------- -->
            <!-- coluimn #2 8 unit -->
            <!-------------------- -->
            <div class="col-lg-9 col-md-6">            
                <div class="user" align="center">
                    <?php require_once("label_header.php"); ?>
                </div>                
                <?php 
                    $param_emp_email=$_SESSION["ses_email"];
                    require_once("training_history.php"); 
                ?>
            </div>
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
    <!--
    <script type="text/javascript">
        $(document).ready(function () {
            $('#left_slide').BootSideMenu({
                side: "left",
                pushBody:false,
                width: '360px',
            });
        });
    </script>
    -->
</body>
</html>

<?php
    }
?>