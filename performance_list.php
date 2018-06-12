<?php
    try
    {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-hover' id='myTable'>";        
        echo "<thead>";
        echo "<tr class='info'>";
        echo "<th style='width:10%;'>Emp-Code</th>";
        echo "<th style='width:10%;'>First-Name</th>";
        echo "<th style='width:15%;'>Last-Name</th>";
        echo "<th style='width:10%;' class='text-center'>Year</th>";
        echo "<th style='width:10%;' class='text-center'>KPI</th>";
        echo "<th style='width:10%;' class='text-center'>Competency</th>";
        echo "<th style='width:10%;' class='text-center'>Total</th>";
        echo "<th style='width:10%;' class='text-center'>Grade</th>";
        echo "<th style='width:15%;' class='text-center'>Mode</th>";        
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        include('include/db_Conn.php');

        $strSql = "SELECT P.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
        $strSql .= "FROM MAS_Performance P ";
        $strSql .= "JOIN Emp_Main E ON P.emp_code = E.emp_code ";
        $strSql .= "ORDER BY P.Emp_Code ";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();
        if ($nRecCount >0)
        {
            while ($ds = $statement->fetch(PDO::FETCH_NAMED))
            {                       
?>                
                <tr>
                    <td> <?php echo $ds['emp_code']; ?> </td>
                    <td> <?php echo $ds['emp_tfname']; ?> </td>
                    <td> <?php echo $ds['emp_tlname']; ?> </td>
                    <td class='text-center'> <?php echo $ds['performance_year']; ?> </td>
                    <td class='text-center'> <?php echo $ds['performance_kpi']; ?> </td>
                    <td class='text-center'> <?php echo $ds['performance_com']; ?> </td>
                    <td class='text-center'> <?php echo $ds['performance_tot']; ?> </td>
                    <td class='text-center'> <?php echo $ds['performance_grade']; ?> </td>                    
                    <td class='text-center'>
                        <a href='#' onclick="javascript:showModalUpdate(
                            '<?php echo $ds['emp_code']; ?>',
                            '<?php echo $ds['emp_tfname']; ?>',
                            '<?php echo $ds['emp_tlname']; ?>',
                            '<?php echo $ds['performance_year']; ?>',
                            '<?php echo $ds['performance_kpi']; ?>',
                            '<?php echo $ds['performance_com']; ?>',
                            '<?php echo $ds['performance_tot']; ?>',
                            '<?php echo $ds['performance_grade']; ?>'
                            )";>
                            <span class='fa fa-pencil-square-o fa-lg'></span>
                        </a>
                        <a href='#' onclick="javascript:showModalDelete(
                            '<?php echo $ds['emp_code']; ?>',
                            '<?php echo $ds['emp_tfname']; ?>',
                            '<?php echo $ds['emp_tlname']; ?>',
                            '<?php echo $ds['performance_year']; ?>',
                            '<?php echo $ds['performance_kpi']; ?>',
                            '<?php echo $ds['performance_com']; ?>',
                            '<?php echo $ds['performance_tot']; ?>',
                            '<?php echo $ds['performance_grade']; ?>'
                            )";>
                            <span class='fa fa-minus-circle fa-lg'></span>
                        </a>
                    </td>
                </tr>                
<?php
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        }
        else
        {            
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "No data";
        }
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>    