<?php
    try
    {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-hover' id='myTable'>";        
        echo "<thead>";
        echo "<tr class='info'>";
        echo "<th style='width:10%;'>Training-SET</th>";
        echo "<th style='width:10%;'>Code-Course</th>";
        echo "<th style='width:20%;'>Skill</th>";
        echo "<th style='width:20%;' class='text-center'>Code-Name</th>";
        echo "<th style='width:10%;' class='text-center'>Mode</th>";        
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        include('include/db_Conn.php');

        $strSql = "SELECT * ";
        $strSql .= "FROM MAS_TRAINING_SET_DETAIL ";
        $strSql .= "ORDER BY TrainingSET ";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();
        if ($nRecCount >0)
        {
            while ($ds = $statement->fetch(PDO::FETCH_NAMED))
            {                       
?>                
                <tr>
                    <td> <?php echo $ds['TrainingSET']; ?> </td>
                    <td> <?php echo $ds['Code_Course']; ?> </td>
                    <td> <?php echo $ds['Skill']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Course_Name']; ?> </td>  
                    <td class='text-center'>
                        <a href='#' onclick="javascript:showModalUpdate(
                            '<?php echo $ds['TrainingSET']; ?>',
                            '<?php echo $ds['Code_Course']; ?>',
                            '<?php echo $ds['Skill']; ?>',
                            '<?php echo $ds['Course_Name']; ?>'
                            )";>
                            <span class='fa fa-pencil-square-o fa-lg'></span>
                        </a>
                        <a href='#' onclick="javascript:showModalDelete(
                            '<?php echo $ds['TrainingSET']; ?>',
                            '<?php echo $ds['Code_Course']; ?>',
                            '<?php echo $ds['Skill']; ?>',
                            '<?php echo $ds['Course_Name']; ?>'
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