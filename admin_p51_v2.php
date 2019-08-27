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
        if(strtoupper($_SESSION["ses_user_type"]) == 'A' OR strtoupper($_SESSION["ses_user_type"]) == 'P')
        {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("include/library.php"); ?>
    <?php require_once("include/library_modal_emp_master.php"); ?>
    <style>    
        /*-------------------------------- */
        /* Css for datetimepicker on modal */
        /*-------------------------------- */
        .calendars-popup {
            z-index: 1151;
        }    
    </style>
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
                //require_once("emp_master_main.php"); 
            ?>



            

                   <div class="col-md-6 col-md-offset-3">
                        <!-- PANEL -->
                        <div class="panel panel-primary">
                            <!-- PANEL HEADER -->
                            <div class="panel-heading">
                                <h1 class = "panel-title">Criteria Roadmap By User</h1>
                            </div>         
                            
                            <!-- PANEL BODY -->
                            <div class="panel-body">
                                <!----------------->
                                <!-- FORM SUBMIT -->
                                <!----------------->
                                <form action="Training_Roadmap_List_By_EmpCode.php" method="post">
                                    <div class="form-group">
                                        <label>Select BUSINESS :</label>
                                        <select class="form-control" name="Select_By_BUSI">
                                            <Option value="BIZ">BIZ</option>
                                            <option value="IR">IR</option>
                                            <option value="MCI">MCI</option>
                                            <option value="SCM">SCM</option>
                                            <option value="TECH">TECH</option>
                                            <option value="UU">UU</option>
                                        </select>     
                                    </div>
                    
                                    <div class="form-group">
                                        <label>Select Department :</label>
                                        <select class="form-control" name="Select_By_DEPT">
                                            <Option value="ACC">ACC</option>
                                            <option value="HR">HR</option>
                                            <option value="IT">IT</option>
                                            <option value="ENG">ENG</option>
                                            <option value="MCI">MCI</option>
                                            <option value="MGT">MGT</option>
                                            <option value="PD-Plan">PD-Plan</option>
                                            <option value="PRO">PRO</option>
                                            <option value="PUR">PUR</option>
                                            <option value="R&D">R&D</option>
                                            <option value="SAL">SAL</option>
                                            <option value="SHE&Q">SHE&Q</option>
                                            <option value="WH">WH</option>                  
                                        </select>                                
                                    </div>
                    
                                    <div class="form-group">
                                        <label>Select Employee :</label>
                                        <select class="form-control" name="Select_By_Emp">                                    
                                            <?php                            
                                                require_once('include/db_Conn.php');
                                                $strSql = "Select * From Emp_Main Order by emp_code ";                                                
                    
                                                $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                                                $statement->execute();  
                                                $nRecCount = $statement->rowCount();
                                                echo $strSql;
                                                while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                                                {
                                                    echo "<option value=" . $ds["emp_code"] . ">" . $ds["emp_code"] . " - " . $ds["emp_tfname"] . " " . $ds["emp_tlname"] . " </option>";
                                                }
                                            ?>                     
                                        </select>    
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success" onclick="target='_blank';">OK</button>
                                    <button type="cancel" class="btn btn-danger" onclick="javascript:window.location='p11.php'; return false;">Cancel</button>                
                                </form>
                            </div>
                    
                            <!-- PANEL FOOTER -->
                            <div class="panel-footer">
                                Panel Footer
                            </div>        
                        </div>
                        <!-- PANEL -->
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


    <script>
        $( "select[name='selDept']" ).click(function () 
        {
            var dept = $(this).val();
            console.log(dept);

            if(dept)
            {
                $.ajax({
                    url: "ajaxBrowsePosition.php",
                    dataType: 'Json',
                    data: {'dept':dept},
                    
                    success: function(data) 
                    {
                        $('select[name="selPos"]').empty();
                        $('select[name="selPos"]').append('<option value=ALL>ALL</option>');

                        $.each(data, function(key, value) 
                        {
                            $('select[name="selPos"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }
            else
            {
                $('select[name="selPos"]').empty();
            }
        });
    </script>

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