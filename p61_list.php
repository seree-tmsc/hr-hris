<?php
try
    {
        require_once('db_Conn.php');
        $strSql = "SELECT U.emp_code as 'emp_code', E.names as 'emp_fname', E.sur_name as 'emp_lname', ";
        $strSql .= "U.emp_email as 'emp_email', U.emp_user_type as 'emp_user_type', ";
        $strSql .= "U.emp_file_name as 'emp_file_name', U.ent_date as 'enter_date' ";
        $strSql .= "FROM MAS_Users_ID U JOIN EMP_MainData E ON U.emp_code=E.emp_code ";        
        $strSql .= "ORDER BY U.emp_code ";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();
        
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-hover'>";
        echo "<thead>";
        echo "<tr class='head-salmon'>";
        echo "<th>Emp-Code</th>";
        echo "<th>Name</th>";
        echo "<th>Surname</th>";        
        echo "<th>e-Mail</th>";
        echo "<th>user-Type</th>";
        echo "<th>File-name</th>";
        echo "<th>Enter-Date</th>";
        echo "<th class='text-center'>Mode</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
       
        if ($nRecCount >0)
        {
            while ($ds = $statement->fetch(PDO::FETCH_NAMED))
            {
                echo "<tr>";
                echo "<td>" . $ds['emp_code'] . "</td>";
                echo "<td>" . $ds['emp_fname'] . "</td>";
                echo "<td>" . $ds['emp_lname'] . "</td>";
                echo "<td>" . $ds['emp_email'] . "</td>";
                echo "<td>" . $ds['emp_user_type'] . "</td>";
                //echo "<td>" . $ds['emp_file_name'] . "</td>";
                echo "<td align='center'>" . "<img src='" . $ds['emp_file_name'] .  "' alt='Smiley face' height='42' width='42'>" . "</td>";
                echo "<td>" . $ds['enter_date'] . "</td>";
                echo "<td class='text-center'>";

                /*
                echo  "<a href='p61_read.php";                
                echo  "?param_emp_code=" . $ds['emp_code'] . "'> ";
                echo "<span class='fa fa-pencil-square-o fa-lg'></span>";                
                echo  "</a>";
                echo  " ";
                */
?>
                <a href='#' onclick="javascript:showModalEdit(
                        '<?php echo $ds['emp_code']; ?>',
                        '<?php echo $ds['emp_fname']; ?>',
                        '<?php echo $ds['emp_lname']; ?>',
                        '<?php echo $ds['emp_email']; ?>',
                        '<?php echo $ds['emp_user_type']; ?>',
                        '<?php echo $ds['emp_file_name']; ?>'
                        )";>
                    <span class='fa fa-pencil-square-o fa-lg'></span>
                </a>
                <a href='#' onclick="javascript:showModalDelete(
                        '<?php echo $ds['emp_code']; ?>',
                        '<?php echo $ds['emp_fname']; ?>',
                        '<?php echo $ds['emp_lname']; ?>',
                        '<?php echo $ds['emp_email']; ?>',
                        '<?php echo $ds['emp_user_type']; ?>',
                        '<?php echo $ds['emp_file_name']; ?>'
                        )";>
                    <span class='fa fa-minus-circle fa-lg'></span>
                </a>
<?php
                /*
                echo  "<a href=# ";
                echo  "onclick = " . '"' ;
                echo  "confirmDelete('p61_del.php?param_emp_code=" . $ds['emp_code'] . "')";
                echo  "; return false;" . '"';
                echo  "> ";
                //echo "<span class='fa fa-times fa-lg'></span>";
                //echo "<span class='fa fa-window-close-o fa-lg'></span>"; 
                echo "<span class='fa fa-minus-circle fa-lg'></span>";               
                echo  "</a>";
                */
                echo  "</td>";
                echo  "</tr>";              
            }
            echo  "</tbody>";
            echo  "</table>";
            echo  "</div>";
        }
        else
        {
            echo "No data";
        }
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>    