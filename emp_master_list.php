<?php
    if( $_POST['selDept'] == 'ALL')
    {
        echo "Department : " . $_POST['selDept'] . "<br>";
    }
    else
    {
        echo "Department : " . $_POST['selDept'] . " / Position : " . $_POST['selPos'] . "<br>";
    }
    
    try
    {
?>              
        <div class='table-responsive'>
            <table class='table table-bordered table-hover' id='myTable'>            
                <thead>               
                    <tr class='info'>
                        <th style='width:4%;' class='text-center'>No.</th>
                        <th style='width:8%;' class='text-center'>Code</th>
                        <th style='width:7%;' class='text-center'>คำนำหน้า</th>
                        <th style='width:10%;' class='text-center'>ชื่อ</th>
                        <th style='width:15%;' class='text-center'>นามสกุล</th>
                        <th style='width:7%;' class='text-center'>Title</th>
                        <th style='width:10%;' class='text-center'>First Name</th>
                        <th style='width:15%;' class='text-center'>Last Name</th>
                        <th style='width:8%;' class='text-center'>Position</th>
                        <th style='width:8%;' class='text-center'>Picture</th>
                        <th style='width:8%;' class='text-center'>Mode</th>                
                    </tr>
                </thead>
                <tbody>

<?php
        include('include/db_Conn.php');

        if($_POST['selDept'] == 'ALL')
        {
            $strSql = "SELECT * ";
            $strSql .= "FROM Emp_Main ";
            $strSql .= "ORDER BY job_department, emp_code ";
        }
        else
        {
            $strSql = "SELECT * ";
            $strSql .= "FROM Emp_Main ";
            $strSql .= "WHERE job_department='" . $_POST['selDept'] . "' ";
            if($_POST['selPos'] != 'ALL')
            {
                $strSql .= "AND job_position='" . $_POST['selPos'] . "' ";
            }
            else
            {
                $strSql .= "ORDER BY emp_code ";
            }
        }

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();
       
        if ($nRecCount >0)
        {
            $nOrder = 1;
            ob_start();
            while ($ds = $statement->fetch(PDO::FETCH_NAMED))
            {
                $BirthDate = new DateTime($ds['emp_birth_date']);
                $tmpBirthDate = $BirthDate->format('Y')+543 . "/".$BirthDate->format('m') . "/". $BirthDate->format('d');
                $BirthDate = new DateTime($tmpBirthDate);

                $WorkingDate = new DateTime($ds['job_working_date']);
                $tmpWorkingDate = $WorkingDate->format('Y')+543 . "/".$WorkingDate->format('m') . "/". $WorkingDate->format('d');
                $WorkingDate = new DateTime($tmpWorkingDate);

                /*
                $EduYear = date('Y', strtotime($ds['edu_graduated_year1']));
                $EduYear = $EduYear+534;
                */
                //echo $BirthDate->format('d-m-Y') . "<br>";
                
?>

                <tr>
                    <td class='text-center'><?php echo $nOrder; ?></td>
                    <td class='text-center'><?php echo $ds['emp_code']; ?></td>
                    <td><?php echo $ds['emp_ttitle']; ?></td>
                    <td><?php echo $ds['emp_tfname']; ?></td>
                    <td><?php echo $ds['emp_tlname']; ?></td>
                    <td><?php echo $ds['emp_etitle']; ?></td>
                    <td><?php echo $ds['emp_efname']; ?></td>
                    <td><?php echo $ds['emp_elname']; ?></td>
                    <td><?php echo $ds['job_position']; ?></td>
                    <td align='center'>
                        <img src='<?php echo $ds['emp_picture'] . '?v=' . date("YmdHis"); ?>' height='72' width='48'>
                    </td>
                    <td class='text-center'>
                        <?php 
                            $cEmp_Picture = str_replace('\\', '/', $ds['emp_picture']);
                        ?>
                        <a href='#' onclick="javascript:showModalUpdate_emp_master(                            
                            '<?php echo $ds['emp_code']; ?>',
                            '<?php echo $ds['emp_ttitle']; ?>',
                            '<?php echo $ds['emp_tfname']; ?>',
                            '<?php echo $ds['emp_tlname']; ?>',
                            '<?php echo $ds['emp_etitle']; ?>',
                            '<?php echo $ds['emp_efname']; ?>',
                            '<?php echo $ds['emp_elname']; ?>',
                            '<?php echo $ds['emp_nname']; ?>',
                            '<?php echo $ds['emp_id_no']; ?>',
                            '<?php echo $BirthDate->format('d/m/Y'); ?>',
                            '<?php echo $ds['emp_mobile_no']; ?>',
                            '<?php echo $ds['emp_emergency_mobile_no']; ?>',
                            '<?php echo $ds['emp_religion']; ?>',
                            '<?php echo $ds['emp_current_status']; ?>',
                            '<?php echo $ds['emp_blood_type']; ?>',                            
                            '<?php echo $cEmp_Picture; ?>',
                            '<?php echo $ds['job_business']; ?>',
                            '<?php echo $ds['job_department']; ?>',
                            '<?php echo $ds['job_section']; ?>',
                            '<?php echo $ds['job_task']; ?>',
                            '<?php echo trim($ds['job_location']); ?>',
                            '<?php echo trim($ds['job_grade']); ?>',
                            '<?php echo $ds['job_position']; ?>',
                            '<?php echo $WorkingDate->format('d/m/Y'); ?>',
                            '<?php echo $ds['addr_no']; ?>',
                            '<?php echo $ds['addr_moo']; ?>',
                            '<?php echo $ds['addr_road']; ?>',
                            '<?php echo $ds['addr_area']; ?>',
                            '<?php echo $ds['addr_district']; ?>',
                            '<?php echo $ds['addr_province']; ?>',
                            '<?php echo $ds['addr_postal_code']; ?>',
                            '<?php echo $ds['edu_level1']; ?>',
                            '<?php echo $ds['edu_detail1']; ?>',
                            '<?php echo $ds['edu_institute1']; ?>',
                            '<?php echo $ds['edu_faculty1']; ?>',
                            '<?php echo $ds['edu_major1']; ?>',
                            '<?php echo $ds['edu_grade1']; ?>',
                            '<?php echo $ds['edu_graduated_year1']; ?>',
                            '<?php //echo $ds['edu_level2']; ?>',
                            '<?php //echo $ds['edu_detail2']; ?>',
                            '<?php //echo $ds['edu_institute2']; ?>',
                            '<?php //echo $ds['edu_faculty2']; ?>',
                            '<?php //echo $ds['edu_major2']; ?>',
                            '<?php //echo $ds['edu_grade2']; ?>',
                            '<?php //echo $ds['edu_graduated_year2']; ?>'
                            )";>
                            <span class='fa fa-pencil-square-o fa-lg'></span>
                        </a>
                        <a href='#' onclick="javascript:showModalDelete_emp_master(
                            '<?php echo $ds['emp_code']; ?>',
                            '<?php echo $ds['emp_ttitle']; ?>',
                            '<?php echo $ds['emp_tfname']; ?>',
                            '<?php echo $ds['emp_tlname']; ?>',
                            '<?php echo $ds['emp_etitle']; ?>',
                            '<?php echo $ds['emp_efname']; ?>',
                            '<?php echo $ds['emp_elname']; ?>',
                            '<?php echo $ds['emp_nname']; ?>',
                            '<?php echo $ds['emp_id_no']; ?>',
                            '<?php echo $ds['emp_birth_date']; ?>',
                            '<?php echo $ds['emp_mobile_no']; ?>',
                            '<?php echo $ds['emp_picture']; ?>',
                            '<?php echo $ds['job_business']; ?>',
                            '<?php echo $ds['job_department']; ?>',
                            '<?php echo $ds['job_location']; ?>',
                            '<?php echo $ds['job_grade']; ?>',
                            '<?php echo $ds['job_position']; ?>',
                            '<?php echo $ds['job_working_date']; ?>'
                            )";>
                            <span class='fa fa-minus-circle fa-lg'></span>
                        </a>
                    </td>
                </tr>
<?php
                $nOrder++;
            }
            ob_end_flush();
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