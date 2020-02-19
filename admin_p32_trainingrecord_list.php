


<?php
    try
    {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-hover' id='myTable'>";        
        echo "<thead>";
        echo "<tr class='info'>";
        echo "<th style='width:10%;'>Emp-Code</th>";
        echo "<th style='width:10%;'>Name-Surname</th>";
        echo "<th style='width:10%;'>Position</th>";
        echo "<th style='width:10%;' class='text-center'>Module</th>";
        echo "<th style='width:10%;' class='text-center'>Code-Course</th>";
        echo "<th style='width:10%;' class='text-center'>Course-Name</th>";
        echo "<th style='width:10%;' class='text-center'>Institute</th>";
        echo "<th style='width:10%;' class='text-center'>Location</th>";
        echo "<th style='width:10%;' class='text-center'>Type-Course</th>";
        echo "<th style='width:10%;' class='text-center'>Start-Date</th>";
        echo "<th style='width:10%;' class='text-center'>End-Date</th>";
        echo "<th style='width:10%;' class='text-center'>Duration</th>";
        echo "<th style='width:10%;' class='text-center'>Year</th>";
        echo "<th style='width:15%;' class='text-center'>Mode</th>";        
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        include('include/db_Conn.php');

        switch($_POST['selDept'])
        {
            case "ALL":
                //echo "select dept=ALL";

                $strSql = "SELECT T.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
                $strSql .= "FROM MAS_TRAINING_RECORD_NEW T ";
                $strSql .= "JOIN Emp_Main E ON T.emp_code = E.emp_code ";
                $strSql .= "ORDER BY T.Emp_Code ";
                echo $strSql . "<br>";
                break;

            default:
                switch($_POST['selPos'])
                {
                    case "ALL":
                        echo "select dept=" . $_POST['selDept'] ." / postion = ALL";

                        $strSql = "SELECT T.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
                        $strSql .= "FROM MAS_TRAINING_RECORD_NEW T ";
                        $strSql .= "JOIN Emp_Main E ON T.emp_code = E.emp_code ";
                        $strSql .= "WHERE E.job_department ='" .  $_POST['selDept'] . "' ";
                        $strSql .= "ORDER BY T.Emp_Code ";
                        //echo $strSql . "<br>";
                        break;


                    default:
                        switch($_POST['selEmp'])
                        {
                            case "ALL":
                                echo "select dept=" . $_POST['selDept'] . " / postion = " . $_POST['selPos'] ." / employee = ALL";

                                $strSql = "SELECT T.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
                                $strSql .= "FROM MAS_TRAINING_RECORD_NEW T ";
                                $strSql .= "JOIN Emp_Main E ON T.emp_code = E.emp_code ";
                                $strSql .= "WHERE E.job_department ='" .  $_POST['selDept'] . "' ";
                                $strSql .= "AND E.job_position ='" .  $_POST['selPos'] . "' ";
                                
                                //$strSql .= "AND T.Module ='" .  $_POST['selModule'] . "' ";
                                //$strSql .= "AND T.Code_Course ='" .  $_POST['selCourse'] . "' ";
                                $strSql .= "ORDER BY T.Emp_Code ";
                                //echo $strSql . "<br>";
                                break;
                        
                            default:
                                echo "select dept=" . $_POST['selDept'] . " / postion = " . $_POST['selPos'] ." / employee = " . $_POST['selEmp'];

                                $strSql = "SELECT T.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
                                $strSql .= "FROM MAS_TRAINING_RECORD_NEW T ";
                                $strSql .= "JOIN Emp_Main E ON T.emp_code = E.emp_code ";

                                $strSql .= "WHERE E.job_department ='" .  $_POST['selDept'] . "' ";
                                $strSql .= "AND E.job_position ='" .  $_POST['selPos'] . "' ";
                                $strSql .= "AND E.emp_code ='" .  $_POST['selEmp'] . "' ";
                                //$strSql .= "AND T.Module ='" .  $_POST['selModule'] . "' ";
                                //$strSql .= "AND T.Code_Course ='" .  $_POST['selCourse'] . "' ";
                                
                                $strSql .= "ORDER BY T.Emp_Code ";
                                //echo $strSql . "<br>";
                                break;

                        }
                        break;
                    default:

                    /*test Module*/
                    switch($_POST['selModule'])
                        {
                        case "ALL":
                            echo "select dept=" . $_POST['selDept'] . " / postion = " . $_POST['selPos'] ." / employee = " . $_POST['selEmp'] ." / Module= " . $_POST['SelModule'] . " ";

                            $strSql = "SELECT T.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
                            $strSql .= "FROM MAS_TRAINING_RECORD_NEW T ";
                            $strSql .= "JOIN Emp_Main E ON T.emp_code = E.emp_code ";
                            $strSql .= "WHERE E.job_department ='" .  $_POST['selDept'] . "' ";
                            $strSql .= "AND E.job_position ='" .  $_POST['selPos'] . "' ";
                            $strSql .= "AND E.emp_code = '" . $_POST['selEmp'] . "' ";
                            //$strSql .= "AND T.Module ='" .  $_POST['selModule'] . "' ";
                            //$strSql .= "AND T.Code_Course ='" .  $_POST['selCourse'] . "' ";
                            $strSql .= "ORDER BY T.Emp_Code ";
                            echo $strSql . "<br>";
                        break;

                        default:
                        //echo "select dept=" . $_POST['selDept'] . " / postion = " . $_POST['selPos'] ." / employee = " . $_POST['selEmp'] ." / Module= " . $_POST['SelModule'] . " ";

                            $strSql = "SELECT T.*, E.emp_tfname as 'emp_tfname', E.emp_tlname as 'emp_tlname'";
                            $strSql .= "FROM MAS_TRAINING_RECORD_NEW T ";
                            $strSql .= "JOIN Emp_Main E ON T.emp_code = E.emp_code ";
                            $strSql .= "WHERE E.job_department ='" .  $_POST['selDept'] . "' ";
                            $strSql .= "AND E.emp_code ='" .  $_POST['selEmp'] . "' ";
                            $strSql .= "AND E.job_position ='" .  $_POST['selPos'] . "' ";
                            $strSql .= "AND T.Module ='" .  $_POST['selModule'] . "' ";
                            //$strSql .= "AND T.Code_Course ='" .  $_POST['selCourse'] . "' ";
        
                            $strSql .= "ORDER BY T.Emp_Code ";
                            echo $strSql . "<br>";
                        break;
                        }
                        break; 
                    /*test*/


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
                    <td> <?php echo $ds['Emp_Code']; ?> </td>
                    <td> <?php echo $ds['Name_Surname']; ?> </td>
                    <td> <?php echo $ds['Position']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Module']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Code_Course']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Course_name']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Institute']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Location']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Type_Course']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Start_Date']; ?> </td>
                    <td class='text-center'> <?php echo $ds['End_Date']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Duration']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Year']; ?> </td>                    
                    <td class='text-center'>
                        <a href='#' onclick="javascript:showModalUpdate_admin_p32_trainingrecord(
                            '<?php echo $ds['Emp_Code']; ?>',
                            '<?php echo $ds['Name_Surname']; ?>',
                            '<?php echo $ds['Title']; ?>',
                            '<?php echo $ds['Name_TH']; ?>',
                            '<?php echo $ds['Surname_TH']; ?>',
                            '<?php echo $ds['Firstname_ENG']; ?>',
                            '<?php echo $ds['Lastname_ENG']; ?>',
                            '<?php echo $ds['Business']; ?>',
                            '<?php echo $ds['Dept']; ?>',
                            '<?php echo $ds['Section']; ?>',
                            '<?php echo $ds['Job_Task']; ?>',
                            '<?php echo $ds['Position']; ?>',
                            '<?php echo $ds['Site']; ?>',
                            '<?php echo $ds['Join_Date']; ?>',
                            '<?php echo $ds['Status']; ?>',
                            '<?php echo $ds['Start_Date']; ?>',
                            '<?php echo $ds['End_Date']; ?>',
                            '<?php echo $ds['Time']; ?>',
                            '<?php echo $ds['Duration']; ?>',
                            '<?php echo $ds['Module']; ?>',
                            '<?php echo $ds['Code_Course']; ?>',
                            '<?php echo $ds['Course_name']; ?>',
                            '<?php echo $ds['Institute']; ?>',
                            '<?php echo $ds['Location']; ?>',
                            '<?php echo $ds['Type_Course']; ?>',
                            '<?php echo $ds['Year']; ?>',
                            '<?php echo $ds['Cost']; ?>'
                            )";>
                            <span class='fa fa-pencil-square-o fa-lg'></span>
                        </a>
                        <a href='#' onclick="javascript:showModalDelete_admin_p32_trainingrecord(
                            '<?php echo $ds['Emp_Code']; ?>',
                            '<?php echo $ds['Name_Surname']; ?>',
                            '<?php echo $ds['Title']; ?>',
                            '<?php echo $ds['Name_TH']; ?>',
                            '<?php echo $ds['Surname_TH']; ?>',
                            '<?php echo $ds['Firstname_ENG']; ?>',
                            '<?php echo $ds['Lastname_ENG']; ?>',
                            '<?php echo $ds['Business']; ?>',
                            '<?php echo $ds['Dept']; ?>',
                            '<?php echo $ds['Section']; ?>',
                            '<?php echo $ds['Job_Task']; ?>',
                            '<?php echo $ds['Position']; ?>',
                            '<?php echo $ds['Site']; ?>',
                            '<?php echo $ds['Join_Date']; ?>',
                            '<?php echo $ds['Status']; ?>',
                            '<?php echo $ds['Start_Date']; ?>',
                            '<?php echo $ds['End_Date']; ?>',
                            '<?php echo $ds['Time']; ?>',
                            '<?php echo $ds['Duration']; ?>',
                            '<?php echo $ds['Module']; ?>',
                            '<?php echo $ds['Code_Course']; ?>',
                            '<?php echo $ds['Course_name']; ?>',
                            '<?php echo $ds['Institute']; ?>',
                            '<?php echo $ds['Location']; ?>',
                            '<?php echo $ds['Type_Course']; ?>',
                            '<?php echo $ds['Year']; ?>',
                            '<?php echo $ds['Cost']; ?>'
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