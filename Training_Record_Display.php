<?php 
      
    include_once('include/db_Conn.php');   
    $strSql = "SELECT distinct Emp_ID,Name_Surname,Dept " ;
    $strSql .= "FROM  MAS_Training_Record " ;    
    /*$strSql .= "WHERE emp_code='". $param_emp_code . "' " ;*/
    $strSql .= "WHERE emp_ID='MU-019' ";
    //echo $strSql . "<br>";

    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo "Record Count = " . $nRecCount ."<br>";

    if ($nRecCount == 1)
    {
        $ds = $statement->fetch(PDO::FETCH_NAMED);
        $emp_ID = $ds['Emp_ID'];
        $NameSurname = $ds['Name_Surname'];
        $Dept = $ds['Dept'];
        
    }
    else
    {
        echo "<script> 
                alert('Error! There are more than 1 record!'); 
                window.location.href='p53.php'; 
            </script>";        
    }

?>

<head>
    <meta charset="utf-8">
    <!--
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    -->
    <link href="../tools/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Related Infor. Data Page</title>
    <link rel="stylesheet" href="../tools/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../tools/bootstrap-3.3.7-dist/css/my.css">
    <style>
        * {
        box-sizing: border-box;
        }
        
        #myInput {
        background-image: url('/css/searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
        }

        #myTable {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
        font-size: 12px;
        }

        #myTable th, #myTable td {
        text-align: left;
        padding: 12px;
        }

        #myTable tr {
        border-bottom: 1px solid #ddd;
        }

        #myTable tr.header, #myTable tr:hover {
        background-color: #f1f1f1;
        }
        
    </style>      
</head>

<div class="panel panel-red">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-user-circle fa-fw"></i> Trainging Records</h3>                    
    </div>

    <div class="panel-body text-center">
        <!-- Header1 -->
        <div class="form-group">
            <div class="col-lg-12">
                <br>
                <label><font color="red">Personal Information:</font></label>
            </div>
        </div>            

        <div class="form-group">
            <div class="col-lg-2" align="left">
            <label>รหัสพนักงาน</label>
                <input type="text" readonly class="form-control" value="<?php echo $emp_ID; ?>" >
            </div>
            <div class="col-lg-2" align="left">  
                <label>ชื่อ-นามสกุล</label>
                <input type="text" readonly class="form-control" value="<?php echo $NameSurname; ?>" >
            </div>
            <div class="col-lg-3" align="left">    
                <label>แผนก</label>
                <input type="text" readonly class="form-control" value="<?php echo $Dept; ?>" >
            </div>           
        </div>
             
      
        <!-- Header2 -->
        <div class="form-group">
            <div class="col-lg-12">
                <br>
                <br>
                <label><font color="red">ข้อมูลการอบรม :</font></label>
            </div>
        </div>           
    </div>

        <div class="panel panel-primary">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

                    <table id="myTable">
                    <tr class="header">
                        <th style="width:20%;">Course_Name</th>
                        <th style="width:20%;">Institute</th>
                        <th style="width:20%;">Location</th>
                        <th style="width:20%;">Type_course</th>
                        <th style="width:20%;">Start_Date</th>
                        <th style="width:20%;">End_Date</th>
                        <th style="width:20%;">Training_Day</th>
                        <th style="width:20%;">Year</th>
                        <th style="width:20%;">Cost</th>                                            
                    </tr>
        </div>
        <?php
            include_once('include/db_Conn.php');   
            $Sql = "SELECT Course_Name,Institute,Location,Type_course,start_date,End_Date,Training_Day,Year,Cost " ;
            $Sql .= "FROM  MAS_Training_Record " ;
            $Sql .= "WHERE emp_ID='MU-019' ";
            /*echo $Sql . "<br>";*/

            $statement = $conn->prepare( $Sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
            $statement->execute();  
            $nRecCount = $statement->rowCount();

            if ($nRecCount >0)
                {
                                
                    while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                    {
                        echo  "<tr>";
                        echo  "<td>" . $ds['Course_Name'] . "</td>";
                        echo  "<td>" . $ds['Institute'] . "</td>";
                        echo  "<td>" . $ds['Location'] . "</td>";
                        echo  "<td>" . $ds['Type_course'] . "</td>";
                        echo  "<td>" . $ds['start_date'] . "</td>";
                        echo  "<td>" . $ds['End_Date'] . "</td>";
                        echo  "<td>" . $ds['Training_Day'] . "</td>";
                        echo  "<td>" . $ds['Year'] . "</td>";
                        echo  "<td>" . $ds['Cost'] . "</td>";
                        /*echo  "<td>" . $ds1['SUM_Amt'] / $ds['Inv_Receipt_Amt_in_Lc'] . "</td>";*/
                        /*echo  "<td class='text-center'>";
                        echo  "</a>";
                        echo  " "; 
                        */
                                    
                       /* echo  "<td class='text-center'>";                 
                        echo  "<a target='_blank' class='btn btn-warning btn-xs' href='TopNByRW_By_Detail.php";
                        echo  "?param_Mat_Code=" . $ds['Mat_Code'] ;                                    
                        echo  "&paramF=" . $_POST['param_Fdate'] ;
                        echo  "&paramT=" . $_POST['param_Tdate'] ;
                        echo  "&paramS=" . $_POST['Select_By_SBU'] . "'>";
                        echo  "Detail";
                        echo  "</a>";
                        echo  " ";               */                    

                        echo  "</td>";
                        echo  "</tr>";    
                    }
                }               
        ?>

        <script>
            function myFunction() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                   tr[i].style.display = "";
                } else {
                   tr[i].style.display = "none";
                }
                }       
            }
            }
        </script>
</div>