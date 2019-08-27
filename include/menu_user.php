<?php    
    /*----------------------------------*/
    /*--- Query User Information ---*/
    /*----------------------------------*/
    include_once('include/db_Conn.php');   
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
        
        //echo "<div class='user' align='center'>";
        echo "<div class='user' align='center'>";
        //echo "<img src='". $ds['emp_picture'] . "?v=" . date("YmdHis") . "' height='196' width='136'> ";
        //echo "<img src='". $ds['emp_picture'] . "?v=" . date("YmdHis") . "' width='196'> ";        
        echo "<img src='". $ds['emp_picture'] . "?v=" . date("YmdHis") . "' width='128' style='box-shadow: 5px 5px #1466f7;'> ";
        echo "</div>";
        echo "<br>";
        /*
        switch (strtoupper(substr($user_emp_code,0,2))){          
            case 'OC':
                    echo "<div class='user' align='center' style='background-color: tomato'>";
                    break;
            case 'OA':
                    echo "<div class='user' align='center' style='background-color: blue'>";
                    break;
            case 'OP':
                    echo "<div class='user' align='center' style='background-color: CornflowerBlue'>";
                    break;
            case 'ZE':
                    echo "<div class='user' align='center' style='background-color: Skyblue'>";
                    break;            
            default :
                    echo "<div class='user' align='center' style='background-color: #80FF00'>";
                    echo "<div class='user' align='center' style='background-color: #FF330D'>";
                    echo "<div class='user' align='center' style='background-color: white'>";
                    break;            
        }
        */
        echo "<div class='user' align='center' style='background-color: white'>";                
        echo "<label>" . $ds['emp_etitle'] . $ds['emp_efname'] . ' ' . $ds['emp_elname'] . "</label>";        
        //echo "<label>" . $ds['job_business'] . ' / ' . $ds['job_department'] . "</label>";
        //echo "<br>";
        //echo "<label>" . $ds['job_position'] . "</label>";
        echo "</div>";
        echo "<br>";
        
        /*  
        echo "<div class='panel panel-primary text-center'>";
        echo "<div class='panel-heading'>Picture";
        echo "</div>";
        echo "<div class='panel-body'>";
        echo "<img src='". $ds['emp_picture'] . "?v=" . date("YmdHis") . "' height='196' width='128'> ";
        echo "</div>";
        echo "</div>";
        */
    }
    else
    {
        echo "<div class='user' align='center'>";
        echo "<img src='images/pic_user.jpg' ' width='128' style='box-shadow: 5px 5px #26B5FF;'>>";        
        echo "</div>";
    }
?>

<div class="list-group">
    <a href="#myprofile_menu" class="list-group-item" data-toggle="collapse">
        1. My Profile
        <i class="fa fa-user-circle fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="myprofile_menu">
        <a href="p11.php" class="list-group-item">1.1 My Profile</a>
    </div>
    
    <a href="#hrinf_menu" class="list-group-item" data-toggle="collapse">
        2. HR Information History
        <i class="fa fa-bar-chart fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="hrinf_menu">
        <a href="p21.php" class="list-group-item">2.1 Perfomance list</a>
        <a href="p22.php" class="list-group-item">2.2 Promotion list</a>        
    </div>

    <a href="#ed_menu" class="list-group-item" data-toggle="collapse">
        3. Employee Development
        <i class="fa fa-graduation-cap fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="ed_menu">
        <a href="p51.php" class="list-group-item">5.1 Training Roadmap</a>          
        <a href="p53.php" class="list-group-item">5.3 Training Record</a>
    </div>

    <a href="#myteam_menu" class="list-group-item" data-toggle="collapse">
        4. My Team
        <i class="fa fa-users fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="myteam_menu">
        <a href="pa1.php" class="list-group-item">4.1 My Team - Employee Data</a>
        <a href="pa2.php" class="list-group-item">4.2 My Team - Performance Data</a>
        <a href="pa3.php" class="list-group-item">4.3 My Team - Promotion Data</a>
        <a href="pa4.php" class="list-group-item">4.4 My Team - Training Roadmap Data</a>
        <a href="pa5.php" class="list-group-item">4.5 My Team - Training Record Data</a>
        <!--<a href="pa51.php" class="list-group-item">9.4 My Team - Training Roadmap</a> -->
        <!--<a href="pa53.php" class="list-group-item">9.5 My Team - Training Record</a> -->
    </div>

    <!--
    <a href="#jd_menu" class="list-group-item" data-toggle="collapse">
        3. Job Description
        <i class="fa fa-address-card fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="jd_menu">
        <a href="#" class="list-group-item">3.1 Job Description</a>
    </div>

    <a href="#hradmin_menu" class="list-group-item" data-toggle="collapse">
        4. Admin
        <i class="fa fa-money fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="hradmin_menu">
        <a href="p41.php" class="list-group-item">4.1 Welfare & Benefit</a>
    </div>

    

    <a href="#pms_menu" class="list-group-item" data-toggle="collapse">
        6. PMS
        <i class="fa fa-thumbs-o-up fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="pms_menu">
        <a href="#" class="list-group-item">7.1 PMS</a>
    </div>

    <a href="#attendant_menu" class="list-group-item" data-toggle="collapse">
        7. Attendant
        <i class="fa fa-calendar fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="attendant_menu">
        <a href="#" class="list-group-item">8.1 Attendant</a>
    </div>

    <a href="#organization_menu" class="list-group-item" data-toggle="collapse">
        8. Organization
        <i class="fa fa-institution fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="organization_menu">
        <a href="#" class="list-group-item">9.1 Organization</a>
    </div>
    -->
</div>