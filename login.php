<?php
    /*include_once('my_function.php');*/
    include_once('include/chk_Session.php');    
    $message = "";

    if($user_email == "")
    {
        try
        {
            if(isset($_POST["btn_Login"]))
            {
                if(empty($_POST["param_email"]) || empty($_POST["param_password"]))
                {
                    $message = '<label> * Required Filed</label>';
                }
                else
                {
                    include_once('include/db_Conn.php');

                    $strSql = "SELECT * ";
                    $strSql .= "FROM MAS_Users_ID ";
                    $strSql .= "WHERE user_email = '" . $_POST["param_email"] . "' ";
                    $strSql .= "AND user_pwd = cast('" . $_POST["param_password"] . "' as varchar) ";
                    //echo $strSql . "<br>";
                                        
                    $statement = $conn->prepare($strSql);                    
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                    $nRecCount = $statement->rowCount();
                    
                    if($nRecCount == 1)
                    {                    
                        $_SESSION["ses_email"] = $result[0]["user_email"];
                        $_SESSION["ses_user_type"] = $result[0]["user_type"];
                        $_SESSION["ses_emp_code"] = $result[0]["emp_code"];
                        header("location:p11.php");
                    }
                    else
                    {
                        $message = '<label> e-Mail or Password not correct </label>';
                    }
                }
            }
        }
        catch(PDOException $error)
        {
            $message = $error->getMessage();
        }
    }
    else
    {
        echo "<script> 
                alert('You are login already ... The system will redirect to main page'); 
                window.location.href='p11.php'; 
            </script>";
    } 
?>

<!-- - HTML for Login page - -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <title>Login Page</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="../vendors/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="../vendors/jquery-3.2.1/jquery-3.2.1.min.js"></script>
        <script src="../vendors/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

        <style>
            .login-bg-dark{
                background-color: silver;
            }
        </style>
    </head>

    <body class="login-bg-dark">
        <br />
        <!-- Begin Container -->
        <div class="container">
            <!-- Begin Row #1 -->
            <div clsss="row" align="center">
                
            </div>
            <!-- End Row #1 -->
            <br>
            <br>
            <br>
            <!-- Begin Row #2 -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center" >
                            <img src="images/tmsc-longlogo.png">                            
                        </div>

                        <div class="panel-body">
                            <!--<form role="form" method="post">-->
                            <form method="post">
                                <div class="form-group">
                                    <label>e-Mail : *</label>
                                    <input type="email" name="param_email" value="" placeholder="Input e-Mail" autofocus class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password : *</label>
                                    <input type="password" name="param_password" value="" placeholder="Input Password" class="form-control">
                                </div>
                                <br>
                                <div align="right">
                                    <input type="submit" name="btn_Login" value="Login" class="btn btn-success">
                                </div>                                
                            </form>     
                        </div>

                        <div class="panel-footer" align="right">
                            <h5>Please input e-Mail and Password</h5>
                            <?php
                            if(isset($message))
                            {
                                echo '<label class="text-danger">' . $message . '</label>';
                            }
                            ?>          
                        </div>
                    </div>
                </div>
                       
                <div class="col-lg-4 col-md-6">
                </div>
            </div>
            <!-- End Row #2 -->
        </div>
        <!-- End Container -->        
        <br />
    </body>
</html>
