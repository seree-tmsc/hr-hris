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

            <div class="col-lg-6 col-lg-offset-3">                                                        
                <div class="panel panel-primary" id="panel-header">
                    <div class="panel-heading">
                        Criteria [Items Receive]                                 
                    </div>

                    <div class="panel-body">
                        <form method="post" action="admin_p32.php">
                            <!----------------------------------->
                            <!-- Dropdownlist Department Level -->
                            <!----------------------------------->
                            <div class="form-group">
                                <label for="title">Select Department :</label>
                                <select name="selDept" id="selDept" class="form-control" style="width:500px" required>
                                    <option value="">--- Select Department ---</option>

                                    <?php
                                        require_once('include/db_Conn.php');
        
                                        $strSql = "SELECT job_department ";
                                        $strSql .= "FROM Emp_Main ";
                                        $strSql .= "GROUP BY job_department ";
                                        $strSql .= "ORDER BY job_department ";
                                        //echo $strSql . "<br>";
                                    
                                        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                                        $statement->execute();  
                                        $nRecCount = $statement->rowCount();
                                        //echo $nRecCount . " records <br>";
                                            
                                        if ($nRecCount >0)
                                        {
                                            echo "<option value='ALL'>ALL</option>";

                                            while($ds = $statement->fetch(PDO::FETCH_NAMED))
                                            {
                                                echo "<option value='" . $ds['job_department']. "'>" . $ds['job_department'] . "</option>";
                                            }
                                        }
                                    ?>

                                </select>
                            </div>

                            <!--------------------------------->
                            <!-- Dropdownlist Position Level -->
                            <!---------------------------------->
                            <div class="form-group">
                                <label for="title">Select Position :</label>
                                <select name="selPos" id='selPos' class="form-control" style="width:500px">
                                <option value="">--- Select Position ---</option>
                                </select>
                            </div>

                            <!--------------------------------->
                            <!-- Dropdownlist Employee Level -->
                            <!---------------------------------->
                            <div class="form-group">
                                <label for="title">Select Employee :</label>
                                <select name="selEmp" id="selEmp" class="form-control" style="width:500px">
                                <option value="">--- Select Employee Code ---</option>
                                </select>
                            </div>

                            <!--------------------------------->
                            <!-- Dropdownlist module Level -->
                            <!---------------------------------->
                            <div class="form-group">
                                <label for="title">Select Module :</label>
                                <select name="selModule" id="selModule" class="form-control" style="width:500px">
                                <option value="">--- Select Module Code ---</option>
                                </select>
                            </div>

                            <!--------------------------------->
                            <!-- Dropdownlist Code Course Level -->
                            <!---------------------------------->
                            <div class="form-group">
                                <label for="title">Select Code Course :</label>
                                <select name="selCourse" id="selCourse" class="form-control" style="width:500px">
                                <option value="">--- Select Code Course ---</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <button type="submit" style="float: right; margin:2px;" class="btn btn-success">
                                        <span class="fa fa-check fa-lg">&nbsp&nbsp&nbspOK</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>                                
                </div>
            </div>

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
                        $('select[name="selEmp"]').empty();

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
                $('select[name="selEmp"]').empty();
            }
        });

        $( "select[name='selPos']" ).click(function ()
        {
            var dept = document.getElementById("selDept").value;
            console.log(dept);

            var pos = $(this).val();
            console.log(pos);

            if(pos)
            {
                $.ajax({
                    url: "ajaxBrowseEmployee.php",
                    dataType: 'Json',
                    data: {'dept':dept, 'pos':pos },
                    
                    success: function(data) 
                    {
                        $('select[name="selEmp"]').empty();
                        $('select[name="selEmp"]').append('<option value=ALL>ALL</option>');

                        $.each(data, function(key, value) 
                        {
                            $('select[name="selEmp"]').append('<option value="'+ key +'">'+ key + " " + value +'</option>');
                        });
                    }
                });
            }
            else
            {
                $('select[name="selEmp"]').empty();
            }
        });

        $( "select[name='selEmp']" ).click(function ()
        {
            var dept = document.getElementById("selDept").value;
            console.log(dept);
            
            var pos = document.getElementById("selPos").value;
            console.log(pos);

            var emp = $(this).val();
            console.log(emp);
                        
            if(emp)
            {
                $.ajax({
                    url: "ajaxBrowseModule.php",
                    dataType: 'Json',
                    type: 'post',
                    data: {'dept':dept, 'pos':pos, 'emp':emp },
                    success: function(data) 
                    {
                        $('select[name="selModule"]').empty();
                        $('select[name="selModule"]').append('<option value=ALL>ALL</option>');

                        $.each(data, function(key, value) 
                        {
                            $('select[name="selModule"]').append('<option value="'+ key +'">'+ key + " " + value +'</option>');
                        });
                    }
                });
            }
            else
            {
                $('select[name="selModule"]').empty();
            }
        });

         $( "select[name='selModule']" ).click(function ()
        {
            //alert('error');

            var dept = document.getElementById("selDept").value;
            console.log(dept);
            
            var pos = document.getElementById("selPos").value;
            console.log(pos);

            var emp = document.getElementById("selEmp").value;
            console.log(emp);

            var module1 = $(this).val();
            console.log(module1);
            
            if(module1)
            {
                $.ajax({
                    url: "ajaxBrowseCourse.php",
                    dataType: 'Json',
                    type: 'post',
                    data: {'dept':dept, 'pos':pos, 'emp':emp, 'module1':module1 },
                    
                    success: function(data) 
                    {
                        $('select[name="selCourse"]').empty();
                        $('select[name="selCourse"]').append('<option value=ALL>ALL</option>');

                        $.each(data, function(key, value) 
                        {
                            $('select[name="selCourse"]').append('<option value="'+ key +'">'+ key + " " + value +'</option>');
                        });
                    }
                    
                });
            }
            else
            {
                $('select[name="selCourse"]').empty();
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