<?php
    include_once('my_function.php');
    session_start();
    $message = $_SESSION['ses_email'] . ' ' . ' Logout from HRIS ';
    $token = $myToken;
    //send_line_notify($message, $token);

    unset ( $_SESSION['ses_email'] );
    unset ( $_SESSION['ses_status'] );
    session_destroy();

    echo "<script> window.location.href='login.php'; </script>";
    /*
    echo "<script>
            alert('Warning! Logout already');
            window.location.href='login.php';
        </script>";
    */
?>