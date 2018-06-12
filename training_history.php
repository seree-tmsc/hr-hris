<?php
    //echo "USER = " . $param_emp_email . "<br>";

    /*----------------------------------*/
    /*--- Query User Information ---*/
    /*----------------------------------*/
    include_once('db_Conn.php'); 
      
    $strSql = "SELECT * " ;
    $strSql .= "FROM Emp_Main " ;
    $strSql .= "WHERE emp_code='". $user_emp_code . "' ";    
    //echo $strSql . "<br>";

    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo "Record Count = " . $nRecCount ."<br>";

    if ($nRecCount == 1)
    {
        $ds = $statement->fetch(PDO::FETCH_NAMED);
        $job_business = $ds['job_business'];
        $job_department = $ds['job_department'];
        $job_location = $ds['job_location'];
        $job_position = $ds['job_position'];
        $job_working_date = $ds['job_working_date'];
    }
    else
    {
        echo "<script> 
                alert('Error! There are more than 1 record!'); 
                window.location.href='p11.php'; 
            </script>";        
    }
?>

<div class="panel panel-red">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-user-circle fa-fw"></i> Training History</h3>                    
    </div>

    <div class="panel-body text-center">
        <div class="col-lg-6 col-md-6">
            <div class="list-group">
            </div>   
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="list-group">
            </div>
        </div>                    
    </div>
</div>