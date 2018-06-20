<?php
    include_once('include/my_function.php');
    session_start();
    $message = "Please be informed that USER-ID = " . $_SESSION['ses_email'] . ' ' . ' was logout from HRIS ';
    $token = $myToken;
    send_notification($message, $token);

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