<?php
    try
    {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-hover' id='myTable'>";        
        echo "<thead>";
        echo "<tr class='info'>";
        echo "<th style='width:5%;'>Code</th>";
        echo "<th style='width:10%;'>First Name</th>";
        echo "<th style='width:15%;'>Last Name</th>";
        echo "<th style='width:20%;'>e-Mail</th>";
        echo "<th style='width:5%;' class='text-center'>Type</th>";
        echo "<th style='width:15%;'>Created Date</th>";        
        echo "<th style='width:15%;' class='text-center'>Mode</th>";        
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        include('include/db_Conn.php');

        $strSql = "SELECT M.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
        $strSql .= "FROM MAS_Users_Id M ";
        $strSql .= "JOIN Emp_Main E ON M.emp_code = E.emp_code ";
        $strSql .= "ORDER BY Emp_Code ";

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
                    <td> <?php echo $ds['user_email']; ?> </td>
                    <td class='text-center'> <?php echo $ds['user_type']; ?> </td>
                    <td> <?php echo $ds['user_create_date']; ?> </td>                    
                    <td class='text-center'>
                        <a href='#' onclick="javascript:showModalUpdate_User_Master(
                            '<?php echo $ds['emp_code']; ?>',
                            '<?php echo $ds['emp_tfname']; ?>',
                            '<?php echo $ds['emp_tlname']; ?>',
                            '<?php echo $ds['user_email']; ?>',
                            '<?php echo $ds['user_type']; ?>',
                            '<?php echo $ds['user_create_date']; ?>'
                            )";>
                            <span class='fa fa-pencil-square-o fa-lg'></span>
                        </a>
                        <a href='#' onclick="javascript:showModalDelete_User_Master(
                            '<?php echo $ds['emp_code']; ?>',
                            '<?php echo $ds['emp_tfname']; ?>',
                            '<?php echo $ds['emp_tlname']; ?>',
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