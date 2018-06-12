<?php    
    try
    {
?>              
        <div class='table-responsive'>
            <table class='table table-bordered table-hover' id='myTable'>            
                <thead>               
                    <tr class='info'>                
                        <th style='width:8%;' class='text-center'>Code</th>
                        <th style='width:8%;' class='text-center'>คำนำหน้า</th>
                        <th style='width:8%;' class='text-center'>ชื่อ</th>
                        <th style='width:18%;' class='text-center'>นามสกุล</th>
                        <th style='width:8%;' class='text-center'>Title</th>
                        <th style='width:8%;' class='text-center'>First Name</th>
                        <th style='width:18%;' class='text-center'>Last Name</th>
                        <th style='width:18%;' class='text-center'>Picture</th>
                        <th style='width:6%;' class='text-center'>Mode</th>                
                    </tr>
                </thead>
                <tbody>
<?php
        include('include/db_Conn.php');

        $strSql = "SELECT * ";
        $strSql .= "FROM Emp_Main ";        
        $strSql .= "ORDER BY emp_code ";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();
       
        if ($nRecCount >0)
        {
            while ($ds = $statement->fetch(PDO::FETCH_NAMED))
            {                
                $BirthDate = new DateTime($ds['emp_birth_date']);
                $tmpBirthDate = $BirthDate->format('Y')+543 . "/".$BirthDate->format('m') . "/". $BirthDate->format('d');
                $BirthDate = new DateTime($tmpBirthDate);

                $WorkingDate = new DateTime($ds['job_working_date']);
                $tmpBirthDate = $WorkingDate->format('Y')+543 . "/".$WorkingDate->format('m') . "/". $WorkingDate->format('d');
                $WorkingDate = new DateTime($tmpBirthDate);
                //echo $BirthDate->format('d-m-Y') . "<br>";
?> 
                <tr>
                    <td class='text-center'><?php echo $ds['emp_code']; ?></td>
                    <td><?php echo $ds['emp_ttitle']; ?></td>
                    <td><?php echo $ds['emp_tfname']; ?></td>
                    <td><?php echo $ds['emp_tlname']; ?></td>
                    <td><?php echo $ds['emp_etitle']; ?></td>
                    <td><?php echo $ds['emp_efname']; ?></td>
                    <td><?php echo $ds['emp_elname']; ?></td>                    
                    <td align='center'>
                        <img src='<?php echo $ds['emp_picture'] . '?v=' . date("YmdHis"); ?>' height='72' width='48'>                        
                    </td>
                    <td class='text-center'>
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
                            '<?php echo $ds['emp_picture']; ?>',
                            '<?php echo $ds['job_business']; ?>',
                            '<?php echo $ds['job_department']; ?>',
                            '<?php echo $ds['job_location']; ?>',
                            '<?php echo $ds['job_grade']; ?>',
                            '<?php echo $ds['job_position']; ?>',
                            '<?php echo $WorkingDate->format('d/m/Y'); ?>',
                            '<?php echo $ds['addr_no']; ?>',
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
                            '<?php echo $ds['edu_level2']; ?>',
                            '<?php echo $ds['edu_detail2']; ?>',
                            '<?php echo $ds['edu_institute2']; ?>',
                            '<?php echo $ds['edu_faculty2']; ?>',
                            '<?php echo $ds['edu_major2']; ?>',
                            '<?php echo $ds['edu_grade2']; ?>',
                            '<?php echo $ds['edu_graduated_year2']; ?>'
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