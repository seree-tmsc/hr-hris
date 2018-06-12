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

<body class="bg-dark">

    <!-- Begin Body page -->
    <div class="container">

        <!-- Begin content page-->
        <div class="row">
            <!-------------------- -->
            <!-- coluimn #1 3 unit -->
            <!-------------------- -->
            <!--
            <div class="col-lg-3 col-md-6">                        
                <?php //require_once("menu_user.php"); ?>
            </div>
            -->

            <!-------------------- -->
            <!-- coluimn #2 8 unit -->
            <!-------------------- -->
            <div class="col-lg-12 col-md-6">            
                <div class="user" align="center">
                    <?php //require_once("label_header.php"); ?>
                </div>                
                <?php                     
                    echo "Data of Employee Code = " . $_GET['var1'] . "<br>";
                    $param_emp_code=$_GET['var1'];                                        
                    require_once("performance_history.php");
                ?>
            </div>
        </div>        
        <!-- End content page -->
    </div>
    <!-- End Body page -->
</body>
</html>

<?php
    }
?>