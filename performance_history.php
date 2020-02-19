<?php
    //echo "USER = " . $param_emp_email . "<br>";

    /*----------------------------------*/
    /*--- Query User Information ---*/
    /*----------------------------------*/
    include_once('include/db_Conn.php');   
    $strSql = "SELECT * " ;
    $strSql .= "FROM MAS_Performance " ;
    $strSql .= "WHERE emp_code='". $param_emp_code . "' ";
    $strSql .= "ORDER BY performance_year DESC";
    //echo $strSql . "<br>";
    
    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo "Record Count = " . $nRecCount ."<br>";

    echo "<h3 align='center'><font color='red'>Performance History Data</font></h3>";
    echo "<hr>";
    
    if ($nRecCount >0)
    {
?>                
        <div class='table-responsive'>
            <table class='table table-bordered table-hover' id='myTable' style='width:100%;' align="center">
                <thead>
                    <tr class='info'>                
                        <th style='width:30%;' class='text-center'>YEAR</th>
                        <th style='width:15%;' class='text-center'>KPI</th>
                        <th style='width:15%;' class='text-center'>COMPETENCY</th>
                        <th style='width:20%;' class='text-center'>TOTAL</th>
                        <th style='width:20%;' class='text-center'>GRADE</th>
                    </tr>
                </thead>
                <tbody>

<?php
                    while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                    { 
?> 
                        <tr>
                            <td class='text-center'><?php echo $ds['performance_year']; ?></td>
                            <td class='text-center'><?php echo $ds['performance_kpi']; ?></td>
                            <td class='text-center'><?php echo $ds['performance_com']; ?></td>
                            <td class='text-center'><?php echo $ds['performance_tot']; ?></td>
                            <td class='text-center'><?php echo $ds['performance_grade']; ?></td>
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