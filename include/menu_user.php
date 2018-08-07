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
        echo "<img src='". $ds['emp_picture'] . "?v=" . date("YmdHis") . "' width='196'> ";
        echo "</div>";
        echo "<div class='user' align='center'>";
        echo "<label>" . $ds['emp_code'] . "</label>";
        echo "<br>";
        echo "<label>" . $ds['job_business'] . ' / ' . $ds['job_department'] . "</label>";
        echo "<br>";
        echo "<label>" . $ds['emp_etitle'] . $ds['emp_efname'] . ' ' . $ds['emp_elname'] . "</label>";
        echo "<br>";
        echo "<label> </label>";
        echo "</div>";
        
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
        echo "<img src='images/pic_0005.jpg' alt=''>";        
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
        <i class="fa fa-folder-open fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="hrinf_menu">
        <a href="p21.php" class="list-group-item">2.1 Perfomance list</a>
        <a href="p22.php" class="list-group-item">2.2 Promotion list</a>        
    </div>

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

    <a href="#ed_menu" class="list-group-item" data-toggle="collapse">
        5. Employee Development
        <i class="fa fa-graduation-cap fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="ed_menu">
        <a href="p51.php" class="list-group-item">5.1 Training Roadmap</a>  
        <a href="#" class="list-group-item">5.2 IDP</a>
        <a href="p53.php" class="list-group-item">5.3 Training Record</a>
        <a href="#" class="list-group-item">5.4 e-Learning</a>
    </div>

    <a href="#roadmap_menu" class="list-group-item" data-toggle="collapse">
        6. -
        <!--<i class="fa fa-line-chart fa-lg btn pull-right"></i>-->
    </a>
    <div class="list-group collapse" id="roadmap_menu">
        <!--<a href="#" class="list-group-item">6.1 Roadmap</a>-->
    </div>

    <a href="#pms_menu" class="list-group-item" data-toggle="collapse">
        7. PMS
        <i class="fa fa-thumbs-o-up fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="pms_menu">
        <a href="#" class="list-group-item">7.1 PMS</a>
    </div>

    <a href="#attendant_menu" class="list-group-item" data-toggle="collapse">
        8. Attendant
        <i class="fa fa-calendar fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="attendant_menu">
        <a href="#" class="list-group-item">8.1 Attendant</a>
    </div>

    <a href="#organization_menu" class="list-group-item" data-toggle="collapse">
        9. Organization
        <i class="fa fa-users fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="organization_menu">
        <a href="#" class="list-group-item">9.1 Organization</a>
    </div>

    <a href="#myteam_menu" class="list-group-item" data-toggle="collapse">
        10. My Team
        <i class="fa fa-user-plus fa-lg btn pull-right"></i>
    </a>
    <div class="list-group collapse" id="myteam_menu">
        <a href="pa1.php" class="list-group-item">10.1 My Team HR Information</a>
        <a href="pa2.php" class="list-group-item">10.2 My Team Performance</a>
        <a href="pa3.php" class="list-group-item">10.3 My Team Promotion</a>
        <a href="pa51.php" class="list-group-item">10.4 My Team Training Roadmap</a>
        <a href="pa53.php" class="list-group-item">10.5 My Team Training Record</a>
    </div>
</div>