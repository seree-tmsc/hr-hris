<h3 align="center"><font color="red">My Team Data</font></h3>

<div class="row">
    <!--
    <div class="col-md-1">
    </div>
    -->
    <div class="col-md-12">
        <div class="form-inline">
            Search : 
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(0)" placeholder="Search by Biz..." title="Type department">
            <div class="pull-right">
                <!--
                <button class="btn btn-success" data-toggle="modal" data-target="#export_modal">
                    <span class="fa fa-cloud-download"></span> 
                    Download CSV File
                </button>
                -->
            </div>
        </div>
    </div>
    <!--
    <div class="col-md-1">
    </div>
    -->
</div>
<br>

<?php
    /*----------------------------------*/
    /*--- Query My Team Information ---*/
    /*----------------------------------*/
    include_once('include/db_Conn.php');   
    $strSql = "SELECT * " ;
    $strSql .= "FROM MAS_Users_ID " ;
    $strSql .= "WHERE emp_code='". $param_emp_code . "' ";    
    //echo $strSql . "<br>";
        
    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo "Record Count = " . $nRecCount ."<br>";
    
    if ($nRecCount == 1)
    {
        $ds = $statement->fetch(PDO::FETCH_NAMED);
        $tmpAllmyteam = $ds['user_myteam'];
        $business_condition = "";
        $departmnet_condition = "";
        $condition = "";
        //echo "user_myteam = " . $tmpAllmyteam . "<br>";

        while(strlen($tmpAllmyteam) != 0)
        {            
            $tmpmyteam = substr($tmpAllmyteam,0,strpos($tmpAllmyteam,';'));
            //echo strpos($tmpAllmyteam,';') . "<br>";
            //echo "myteam = " . $tmpmyteam . "<br>";

            $business_condition = "job_business = '" . substr($tmpmyteam, 1, strpos($tmpmyteam,',')-1) . "' ";
            $department_condition = "job_department = '" . substr($tmpmyteam, strpos($tmpmyteam,',')+1, strpos($tmpmyteam,']') - strpos($tmpmyteam,',') - 1) . "' ";
            $condition .= "OR (" . $business_condition . " AND " . $department_condition . ") ";
            //echo "codition = " . $condition . "<br>";

            $tmpAllmyteam = substr($tmpAllmyteam,strpos($tmpAllmyteam,';')+1,strlen($tmpAllmyteam));
            //echo "tmpAll = " . $tmpAllmyteam . "<br>";

        }

        if(strlen($condition) != 0)
        {
            require_once("myteam_list.php");
        }
        else
        {
            echo "No information of my team data";
        }
    }
?>