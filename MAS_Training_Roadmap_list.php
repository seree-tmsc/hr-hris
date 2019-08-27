<?php
    try
    {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-hover' id='myTable'>";        
        echo "<thead>";
        echo "<tr class='info'>";
        echo "<th style='width:10%;'>BIZ</th>";
        echo "<th style='width:10%;'>DEP</th>";
        echo "<th style='width:10%;'>SEC</th>";
        echo "<th style='width:10%;' class='text-center'>TASK</th>";
        echo "<th style='width:15%;'>Module</th>";
        echo "<th style='width:10%;'>Code Course</th>";
        echo "<th style='width:20%;'>Course Content</th>";
        echo "<th style='width:20%;'>Course Name</th>";
        echo "<th style='width:10%;'>Position</th>";
        echo "<th style='width:10%;'>JG</th>";
        echo "<th style='width:10%;'>Type</th>";
        echo "<th style='width:10%;'>Instructor</th>";
        echo "<th style='width:10%;' class='text-center'>Mode</th>";        
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        include('include/db_Conn.php');

        $strSql = "SELECT * ";
        $strSql .= "FROM MAS_TRAINING_ROADMAP_NEW ";
        $strSql .= "ORDER BY BIZ ";

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
                    <td> <?php echo $ds['TASK']; ?> </td>
                    <td> <?php echo $ds['Module']; ?> </td>
                    <td> <?php echo $ds['Code_Course']; ?> </td>
                    <td> <?php echo $ds['Course_Content']; ?> </td>
                    <td> <?php echo $ds['Course_Name']; ?> </td>
                    <td> <?php echo $ds['Position']; ?> </td>
                    <td> <?php echo $ds['JG']; ?> </td>
                    <td> <?php echo $ds['Type']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Instructor']; ?> </td>  
                    <td class='text-center'>
                        <a href='#' onclick="javascript:showModalUpdate(
                            '<?php echo $ds['BIZ']; ?>',
                            '<?php echo $ds['DEP']; ?>',
                            '<?php echo $ds['SEC']; ?>',
                            '<?php echo $ds['TASK']; ?>',
                            '<?php echo $ds['Module']; ?>',
                            '<?php echo $ds['Code_Course']; ?>',
                            '<?php echo $ds['Course_Content']; ?>',
                            '<?php echo $ds['Course_Name']; ?>',
                            '<?php echo $ds['Position']; ?>',
                            '<?php echo $ds['JG']; ?>',
                            '<?php echo $ds['Type']; ?>',
                            '<?php echo $ds['Instructor']; ?>'
                            )";>
                            <span class='fa fa-pencil-square-o fa-lg'></span>
                        </a>
                        <a href='#' onclick="javascript:showModalDelete(
                            '<?php echo $ds['BIZ']; ?>',
                            '<?php echo $ds['DEP']; ?>',
                            '<?php echo $ds['SEC']; ?>',
                            '<?php echo $ds['TASK']; ?>',
                            '<?php echo $ds['Module']; ?>',
                            '<?php echo $ds['Code_Course']; ?>',
                            '<?php echo $ds['Course_Content']; ?>',
                            '<?php echo $ds['Course_Name']; ?>',
                            '<?php echo $ds['Position']; ?>',
                            '<?php echo $ds['JG']; ?>',
                            '<?php echo $ds['Type']; ?>',
                            '<?php echo $ds['Instructor']; ?>'
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