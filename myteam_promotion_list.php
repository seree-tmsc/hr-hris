<style>
        .dropdown-menu {
            min-width: 0px !important;
        }
</style>

<div class='table-responsive'>
    <table class='table table-bordered table-hover' id='myTable'>
        <thead>
            <tr class='info'>
                <th class='text-center' style='width:5%;'>No.</th>
                <th class='text-center' style='width:8%;'>Year</th>
                <th class='text-center' style='width:9%;'>Code</th>
                <th style='width:10%;'>F-Name</th>
                <th style='width:18%;'>L-Name</th>
                <th class='text-center' style='width:5%;'>Fr.JG</th>
                <th class='text-center' style='width:10%;'>Fr.Pos.</th>
                <th class='text-center' style='width:10%;'>Fr.Dept.</th>
                <th class='text-center' style='width:5%;'>To.JG</th>
                <th class='text-center' style='width:10%;'>To.Pos.</th>
                <th class='text-center' style='width:10%;'>To.Dept.</th>
            </tr>
        </thead>
        <tbody>

<?php
    //echo substr($condition, 2, strlen($condition)-2) . "<br>";

    $strSql = "SELECT *, E.emp_code as 'Emp_Code' " ;
    $strSql .= "FROM MAS_Promotion P " ;
    $strSql .= "JOIN Emp_Main E ON E.emp_code = P.emp_Code ";
    $strSql .= "WHERE " . substr($condition, 2, strlen($condition)-2);    
    $strSql .= "ORDER BY P.promotion_year DESC, P.emp_code" ;
    //echo $strSql . "<br>";

    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo "Record Count = " . $nRecCount ."<br>";

    if ($nRecCount >0)    
    {
        $nI=1;
        ob_start();
        while ($ds = $statement->fetch(PDO::FETCH_NAMED))
        {            
?> 
            <tr>
                <td class='text-center'><?php echo $nI; ?></td>
                <td class='text-center'><?php echo $ds['promotion_year']; ?></td>
                <td class='text-center'><?php echo $ds['Emp_Code']; ?></td>
                <td><?php echo $ds['emp_tfname']; ?></td>
                <td><?php echo $ds['emp_tlname']; ?></td>
                <td class='text-center'><?php echo $ds['promotion_from_jg']; ?></td>
                <td><?php echo $ds['promotion_from_pos']; ?></td>
                <td><?php echo $ds['promotion_from_dep']; ?></td>
                <td class='text-center'><?php echo $ds['promotion_to_jg']; ?></td>
                <td><?php echo $ds['promotion_to_pos']; ?></td>
                <td><?php echo $ds['promotion_to_dep']; ?></td>            
            </tr>
<?php
            $nI++;
        }
        ob_end_flush();
    }
?>
        </tbody>
    </table>
</div>
