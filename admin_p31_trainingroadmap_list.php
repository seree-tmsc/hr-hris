<?php
    echo 'Search condition = Dept.=' .$_POST['selDept'] . ' and Pos.=' . $_POST['selPos'] . ' and Sec.=' .$_POST['selSec'] . "<br>";

    try
    {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-hover' id='myTable'>";        
        echo "<thead>";
        echo "<tr class='info'>";
        echo "<th style='width:5%;'>BIZ</th>";
        echo "<th style='width:5%;'>DEP</th>";
        echo "<th style='width:5%;'>Section</th>";
        echo "<th style='width:5%;' class='text-center'>Task</th>";
        echo "<th style='width:15%;' class='text-center'>Module</th>";
        echo "<th style='width:10%;' class='text-center'>Code_Course</th>";
        echo "<th style='width:20%;' class='text-center'>Course_Content</th>";
        echo "<th style='width:20%;' class='text-center'>Course_Name</th>";
        echo "<th style='width:10%;' class='text-center'>Position</th>";
        echo "<th style='width:15%;' class='text-center'>Mode</th>";        
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        include('include/db_Conn.php');

        switch($_POST['selDept'])
        {
            case "ALL":
                echo "select dept=ALL";

                //$strSql = "SELECT T.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
                //$strSql .= "FROM MAS_TRAINING_RECORD_NEW T ";
                //$strSql .= "JOIN Emp_Main E ON T.emp_code = E.emp_code ";
                //$strSql .= "ORDER BY T.Emp_Code ";
                $strSql = "SELECT T.*, E.job_department, E.job_position ";
                $strSql .= "FROM MAS_TRAINING_ROADMAP_NEW AS T INNER JOIN Emp_main AS E ON T.DEP = E.job_department and T.Position = E.job_position ";
                $strSql .= "ORDER BY SEC ";
                //echo $strSql;
                break;

            default:
                switch($_POST['selPos'])
                {
                    //case "ALL":
                    //    echo "select dept=" . $_POST['selDept'] ." / postion = ALL";

                        //$strSql = "SELECT T.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
                        //$strSql .= "FROM MAS_TRAINING_RECORD_NEW T ";
                        //$strSql .= "JOIN Emp_Main E ON T.emp_code = E.emp_code ";
                        //$strSql .= "WHERE E.job_department ='" .  $_POST['selDept'] . "' ";
                        //$strSql .= "ORDER BY T.Emp_Code ";
                        
                        //$strSql = "SELECT T.*, E.job_department, E.job_position ";
                        //$strSql .= "FROM MAS_TRAINING_ROADMAP_NEW AS T INNER JOIN Emp_main AS E ON T.DEP = E.job_department and T.Position = E.job_position ";
                        //$strSql .= "WHERE T.DEP ='" .  $_POST['selDept'] . "' ";
                        //$strSql .= "ORDER BY SEC ";

                        //break;

                    //default:
                        //switch($_POST['selEmp'])
                        //{
                            case "ALL":
                                //echo "select dept=" . $_POST['selDept'] . " / postion = " . $_POST['selPos'] ." / employee = ALL";
                                //echo "select dept=" . $_POST['selDept'] ." / postion = ALL";


                                $strSql = "SELECT * ";
                                $strSql .= "FROM MAS_TRAINING_ROADMAP_NEW ";
                                $strSql .= "WHERE DEP ='" . $_POST['selDept'] . "' ";
                                $strSql .= "ORDER BY SEC ";
                                //$strSql = "SELECT T.*, E.job_department, E.job_position ";
                                //$strSql .= "FROM MAS_TRAINING_ROADMAP_NEW AS T INNER JOIN Emp_main AS E ON T.DEP = E.job_department and T.Position = E.job_position ";
                                //$strSql .= "WHERE T.DEP ='" .  $_POST['selDept'] . "' ";
                                //$strSql .= "ORDER BY SEC ";
                                //echo $strSql;

                                //$strSql = "SELECT T.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
                                //$strSql .= "FROM MAS_TRAINING_RECORD_NEW T ";
                                //$strSql .= "JOIN Emp_Main E ON T.emp_code = E.emp_code ";
                                //$strSql .= "WHERE E.job_department ='" .  $_POST['selDept'] . "' ";
                                //$strSql .= "AND E.job_position ='" .  $_POST['selPos'] . "' ";
                                //$strSql .= "ORDER BY T.Emp_Code ";
                                break;

                            default:
                                //echo "select dept=" . $_POST['selDept'] . " / position = " . $_POST['selPos'] ." ";


                                $strSql = "SELECT * ";
                                $strSql .= "FROM MAS_TRAINING_ROADMAP_NEW ";
                                $strSql .= "WHERE DEP ='" . $_POST['selDept'] . "' AND Position = '" . $_POST['selPos'] . "' AND SEC ='" . $_POST['selSec'] . "' ";
                                $strSql .= "ORDER BY SEC ";
                                //echo $strSql;

                                //$strSql = "SELECT T.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
                                //$strSql .= "FROM MAS_TRAINING_RECORD_NEW T ";
                                //$strSql .= "JOIN Emp_Main E ON T.emp_code = E.emp_code ";
                                //$strSql .= "WHERE E.emp_code ='" .  $_POST['selEmp'] . "' ";
                                //$strSql .= "ORDER BY T.Emp_Code ";

                                //Set นี้
                                //$strSql = "SELECT T.*, E.job_department, E.job_position ";
                                //$strSql .= "FROM MAS_TRAINING_ROADMAP_NEW AS T INNER JOIN Emp_main AS E ON T.DEP = E.job_department and T.Position = E.job_position ";
                                //$strSql .= "WHERE Position = '" . $_POST['selPos'] . "' and DEP = '" . $_POST['selDept'] . "' ";
                                //$strSql .= "ORDER BY SEC ";
                                break;
                        //}
                        break;
                }
                break;
        }

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
                    <td class='text-center'> <?php echo $ds['Module']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Code_Course']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Course_Content']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Course_Name']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Position']; ?> </td>           
                    <td class='text-center'>
                        <a href='#' onclick="javascript:showModalUpdate_admin_p31_trainingroadmap(
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
                            '<?php echo $ds['Instructor']; ?>',                         
                            '<?php echo $ds['Status_Training']; ?>'
                            )";>
                            <span class='fa fa-pencil-square-o fa-lg'></span>
                        </a>
                        <a href='#' onclick="javascript:showModalDelete_admin_p31_trainingroadmap(
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
                            '<?php echo $ds['Instructor']; ?>',                         
                            '<?php echo $ds['Status_Training']; ?>'
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