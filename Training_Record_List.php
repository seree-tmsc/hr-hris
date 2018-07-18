<?php
    try
    {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-hover' id='myTable'>";        
        echo "<thead>";
        echo "<tr class='info'>";
        echo "<th style='width:10%;'>Emp_ID</th>";
        echo "<th style='width:20%;'>Name_Surname</th>";
        echo "<th style='width:10%;'>Dept</th>";
        echo "<th style='width:10%;'>Position</th>";
        echo "<th style='width:10%;'>Site</th>";
        echo "<th style='width:10%;'>Join_Date</th>";
        echo "<th style='width:10%;'>Status</th>"; 
        echo "<th style='width:15%;' class='text-center'>Mode</th>";
        echo "<th style='width:15%;' class='text-center'>Detail</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        include('include/db_Conn.php');

        $strSql = "SELECT distinct Emp_ID,Name_Surname,Dept,Position,Site,Join_Date,Status " ;
        $strSql .= "FROM  MAS_Training_Record "; 
        $strSql .= "ORDER BY Emp_ID ";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();
        if ($nRecCount >0)
        {
            while ($ds = $statement->fetch(PDO::FETCH_NAMED))
            {                       
?>                
                <tr>
                    <td> <?php echo $ds['Emp_ID']; ?> </td>
                    <td> <?php echo $ds['Name_Surname']; ?> </td>
                    <td> <?php echo $ds['Dept']; ?> </td>
                    <td> <?php echo $ds['Position']; ?> </td>
                    <td> <?php echo $ds['Site']; ?> </td>
                    <td> <?php echo $ds['Join_Date']; ?> </td>
                    <td> <?php echo $ds['Status']; ?> </td>
                    <td class='text-center'>
                        <a href='#' onclick="javascript:showModalUpdate_training_record(
                            '<?php echo $ds['Emp_ID']; ?>',
                            '<?php echo $ds['Name_Surname']; ?>',
                            '<?php echo $ds['Dept']; ?>',
                            '<?php echo $ds['Position']; ?>',
                            '<?php echo $ds['Site']; ?>',
                            '<?php echo $ds['Join_Date']; ?>',
                            '<?php echo $ds['Status']; ?>'
                            )";>
                            <span class='fa fa-pencil-square-o fa-lg'></span>
                        </a>
                        <a href='#' onclick="javascript:showModalDelete_training_record(
                            '<?php echo $ds['Emp_ID']; ?>',
                            '<?php echo $ds['Name_Surname']; ?>',
                            '<?php echo $ds['Dept']; ?>',
                            '<?php echo $ds['Position']; ?>',
                            '<?php echo $ds['Site']; ?>',
                            '<?php echo $ds['Join_Date']; ?>',
                            '<?php echo $ds['Status']; ?>'
                            )";>
                            <span class='fa fa-minus-circle fa-lg'></span>
                        </a>
                    </td>
                    
                    <td class='text-center'>
                        <a target='_blank' class='btn btn-warning btn-xs' href='#';> Detail
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