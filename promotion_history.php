<?php
    //echo "USER = " . $param_emp_email . "<br>";

    /*----------------------------------*/
    /*--- Query User Information ---*/
    /*----------------------------------*/
    include_once('include/db_Conn.php');   
    $strSql = "SELECT * " ;
    $strSql .= "FROM MAS_Promotion " ;
    $strSql .= "WHERE emp_code='". $param_emp_code . "' ";
    $strSql .= "ORDER BY promotion_year ";
    //echo $strSql . "<br>";
    
    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo "Record Count = " . $nRecCount ."<br>";

    if ($nRecCount >0)
    {
?>        
        <h3 align="center"><font color="red">Promotion History Data</font></h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-inline">
                    Search : 
                    <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(0)" placeholder="Search by year.." title="Type year">
                    <!--
                    <div class="pull-right">
                        <button class="btn btn-success" data-toggle="modal" data-target="#export_modal">
                            <span class="fa fa-cloud-download"></span> 
                            Download CSV File
                        </button>
                    </div>
                    -->
                </div>
            </div>
        </div>                    
        <br>

        <div class='table-responsive'>
            <table class='table table-bordered table-hover' id='myTable' style='width:100%;' align="center">
                <thead>
                    <tr class='info'>                
                        <th style='width:10%;' class='text-center'>YEAR</th>
                        <th style='width:15%;' class='text-center'>From-JG</th>
                        <th style='width:15%;' class='text-center'>From-Position</th>
                        <th style='width:15%;' class='text-center'>From-Department</th>
                        <th style='width:15%;' class='text-center'>To-JG</th>
                        <th style='width:15%;' class='text-center'>To-Position</th>
                        <th style='width:15%;' class='text-center'>To-Department</th>
                    </tr>
                </thead>
                <tbody>

<?php
                    while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                    { 
?> 
                        <tr>
                            <td class='text-center'><?php echo $ds['promotion_year']; ?></td>
                            <td class='text-center'><?php echo $ds['promotion_from_jg']; ?></td>
                            <td class='text-center'><?php echo $ds['promotion_from_pos']; ?></td>
                            <td class='text-center'><?php echo $ds['promotion_from_dep']; ?></td>
                            <td class='text-center'><?php echo $ds['promotion_to_jg']; ?></td>
                            <td class='text-center'><?php echo $ds['promotion_to_pos']; ?></td>
                            <td class='text-center'><?php echo $ds['promotion_to_dep']; ?></td>
                        </tr>
<?php
                    }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    }
    else
    {
        echo "No data";
    }
?>