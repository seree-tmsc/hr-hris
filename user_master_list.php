<?php
    try
    {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-hover' id='myTable'>";        
        echo "<thead>";
        echo "<tr class='info'>";
        echo "<th style='width:10%;'>Code</th>";
        echo "<th style='width:10%;'>First Name</th>";
        echo "<th style='width:15%;'>Last Name</th>";
        echo "<th style='width:20%;'>e-Mail</th>";
        echo "<th style='width:5%;' class='text-center'>Type</th>";
        echo "<th style='width:15%;' class='text-center'>Created Date</th>";        
        echo "<th style='width:10%;' class='text-center'>Mode</th>";        
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        include('include/db_Conn.php');

        $strSql = "SELECT * ";
        $strSql .= "FROM MAS_Users_ID ";        
        $strSql .= "ORDER BY user_type, emp_code ";
        //echo $strSql . "<br>";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();
        if ($nRecCount >0)
        {
            while ($ds = $statement->fetch(PDO::FETCH_NAMED))
            {
                $strSql = "SELECT * ";
                $strSql .= "FROM Emp_Main ";                
                $strSql .= "WHERE emp_code ='" . $ds['emp_code'] . "' ";
                //echo $strSql . "<br>";
        
                $statement2 = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                $statement2->execute();  
                $nRecCount2 = $statement2->rowCount();
                if ($nRecCount2 == 1)
                {
                    $ds2 = $statement2->fetch(PDO::FETCH_NAMED)
?>
                    <tr>
                        <td> <?php echo $ds['emp_code']; ?> </td>
                        <td> <?php echo $ds2['emp_tfname']; ?> </td>
                        <td> <?php echo $ds2['emp_tlname']; ?> </td>
                        <td> <?php echo $ds['user_email']; ?> </td>
                        <td class='text-center'> <?php echo $ds['user_type']; ?> </td>
                        <td class='text-center'> <?php echo $ds['user_create_date']; ?> </td>                    
                        <td class='text-center'>
                            <a href='#' onclick="javascript:showModalUpdate_User_Master(
                                '<?php echo $ds['emp_code']; ?>',
                                '<?php echo $ds2['emp_tfname']; ?>',
                                '<?php echo $ds2['emp_tlname']; ?>',
                                '<?php echo $ds['user_email']; ?>',
                                '<?php echo $ds['user_type']; ?>',
                                '<?php echo $ds['user_create_date']; ?>'
                                )";>
                                <span class='fa fa-pencil-square-o fa-lg'></span>
                            </a>
                            <a href='#' onclick="javascript:showModalDelete_User_Master(
                                '<?php echo $ds['emp_code']; ?>',
                                '<?php echo $ds2['emp_tfname']; ?>',
                                '<?php echo $ds2['emp_tlname']; ?>',
                                '<?php echo $ds['user_email']; ?>',
                                '<?php echo $ds['user_type']; ?>',
                                '<?php echo $ds['user_create_date']; ?>'
                                )";>
                                <span class='fa fa-minus-circle fa-lg'></span>
                            </a>
                        </td>
                    </tr> 
<?php
                }
                else
                {
                    break;
                }
?>                               
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