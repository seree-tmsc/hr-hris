<style>
        .dropdown-menu {
            min-width: 0px !important;
        }
</style>

<div class='table-responsive'>
    <table class='table table-bordered table-hover' id='myTable'>
        <thead>
            <tr class='info'>
                <th class='text-center' style='width:8%;'>Year</th>
                <th class='text-center' style='width:10%;'>Code</th>
                <th class='text-center' style='width:10%;'>Title</th>
                <th style='width:12%;'>F-Name</th>
                <th style='width:26%;'>L-Name</th>
                <th class='text-center' style='width:8%;'>KPI</th>
                <th class='text-center' style='width:8%;'>Comp.</th>
                <th class='text-center' style='width:8%;'>Tot.</th>
                <th class='text-center' style='width:10%;'>Grade</th>
            </tr>
        </thead>
        <tbody>

<?php
    //echo substr($condition, 2, strlen($condition)-2) . "<br>";

    $strSql = "SELECT *, E.emp_code as 'Emp_Code' " ;
    $strSql .= "FROM MAS_Performance P " ;
    $strSql .= "JOIN Emp_Main E ON E.emp_code = P.emp_Code ";
    $strSql .= "WHERE " . substr($condition, 2, strlen($condition)-2);    
    $strSql .= "ORDER BY P.performance_year, P.emp_code" ;
    //echo $strSql . "<br>";

    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo "Record Count = " . $nRecCount ."<br>";

    if ($nRecCount >0)    
    {
        while ($ds = $statement->fetch(PDO::FETCH_NAMED))
        {            
?> 
            <tr>
                <td class='text-center'><?php echo $ds['performance_year']; ?></td>
                <td class='text-center'><?php echo $ds['Emp_Code']; ?></td>
                <td><?php echo $ds['emp_ttitle']; ?></td>
                <td><?php echo $ds['emp_tfname']; ?></td>
                <td><?php echo $ds['emp_tlname']; ?></td>
                <td class='text-right'><?php echo $ds['performance_kpi']; ?></td>
                <td class='text-right'><?php echo $ds['performance_com']; ?></td>
                <td class='text-right'><?php echo $ds['performance_tot']; ?></td>
                <td class='text-center'><?php echo $ds['performance_grade']; ?></td>                
            </tr>
<?php
        }
    }
?>
        </tbody>
    </table>
</div>
