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
    <?php require_once("library_modal_training_record.php"); ?>
    <style>    
        /*-------------------------------- */
        /* Css for datetimepicker on modal */
        /*-------------------------------- */
        .calendars-popup {
            z-index: 1151;
        }    
    </style>


<!--TEST CRI-->
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

    <!-- Bootside menu -->
    <link rel="stylesheet" href="../vendors/BootSideMenu/css/BootSideMenu.css">
    <script src="../vendors/BootSideMenu/js/BootSideMenu.js"></script>

    <!-- datetimepicker -->
    <link rel="stylesheet" href="../datetimepicker/jquery.datetimepicker.min.css">
    <script src="../TOP_N_REPORT/jquery.datetimepicker.full.js"></script>

<!--TEST-->

</head>

<body class="bg-dark">

    <!-- Begin Body page -->
    <div class="container">

        <!-- Begin Static navbar -->
        <?php require_once("include/menu_navbar.php"); ?>
        <!-- End Static navbar -->

        <!-- Begin content page-->
       
        <!-- ลบออกไปเพื่อ TEST -->
     
        <!-- End content page -->
    </div>
    <!-- End Body page -->

    <!--Test Begin left slide menu -->
    <?php
        if(strtoupper($_SESSION["ses_user_type"]) == 'A')
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


<!-- Test Criteria-->
<div class="modal fade" id="CriteriaModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Criteria</h4>
                </div>

                <div class="modal-body">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Select Criteria</h3>
                        </div>
                        <div class="panel-body">
                            <form action="Training_Record_main.php" method="post">                                
                                <div class="row" >
                                    <div class="col-md-3">
                                        <label>From Date:<label>                                                                                 
                                    </div>
                                    <div class="col-md-3">
                                       <!-- <input type='text' class="form-control" id='datetime'/ value="<?php echo date("Y-m-d");?>"> -->
                                       <input type="date" class="form-control" name="param_Fdate">
                                    </div>
                                    <div class="col-md-3">
                                        <label>To Date:<label>                                                                                 
                                    </div>
                                    <div class="col-md-3">
                                        <!-- <input type='text' class="form-control" id='datetime1'/ value="<?php echo date("Y-m-d");?>"> -->
                                        <input type="date" class="form-control" name="param_Tdate">
                                    </div>
                                </div>
                                <br>
                                <div class="row" >
                                    <div class="col-md-3">
                                        <label>Site:<label>                                                                                 
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="Select_By_SBU">
                                            <Option value="IR">IR</option>
                                            <option value="UU">UU</option>
                                            <option value="ALL">ALL</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>To Enter Top N:<label>                                                                                 
                                    </div>
                                    <div class="col-md-3">
                                        <input type='number' require class="form-control" name="paraTopN">
                                    </div>
                                </div>                                                           
             
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-success">
                                                Search
                                            </button>
                                            <button type="cancel" class="btn btn-danger">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
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
    </div><!-- /.modal -->














</body>
</html>

<?php
    }
?>