<?php
    try
    {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-hover' id='myTable'>";        
        echo "<thead>";
        echo "<tr class='info'>";
        echo "<th style='width:10%;'>BIZ</th>";
        echo "<th style='width:10%;'>Department</th>";
        echo "<th style='width:15%;'>Section</th>";
        echo "<th style='width:10%;' class='text-center'>TASK</th>";
        echo "<th style='width:10%;' class='text-center'>Position</th>";
        echo "<th style='width:15%;' class='text-center'>TrainingSET</th>";
        echo "<th style='width:15%;' class='text-center'>Mode</th>";        
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        include('include/db_Conn.php');

        $strSql = "SELECT * ";
        $strSql .= "FROM MAS_TRAINING_SET_MASTER ";
        $strSql .= "WHERE  BIZ='" . $_POST["Select_By_BUSI"] . "' and DEP='" . $_POST["Select_By_DEPT"] . "'";        
        $strSql .= "ORDER BY SEC ";
        /*$strSql = "SELECT * ";
        $strSql .= "FROM MAS_TRAINING_SET_MASTER ";
        $strSql .= "ORDER BY SEC ";*/
        
        echo $strSql . "<br>";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();
        if ($nRecCount >0)
        {
            while ($ds = $statement->fetch(PDO::FETCH_NAMED))
            {                       
?>                
                <tr>
                    <td> <?php echo $ds['BIZ']; ?> </td>
                    <td> <?php echo $ds['DEP']; ?> </td>
                    <td> <?php echo $ds['SEC']; ?> </td>
                    <td class='text-center'> <?php echo $ds['TASK']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Position']; ?> </td>
                    <td class='text-center'> <?php echo $ds['TrainingSET']; ?> </td> 
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