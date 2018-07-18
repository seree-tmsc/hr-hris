<style>
        .dropdown-menu {
            min-width: 0px !important;
        }
</style>

<div class='table-responsive'>
    <table class='table table-bordered table-hover' id='myTable'>
        <thead>
            <tr class='info'>
                <th class='text-center' style='width:8%;'>Biz.</th>
                <th class='text-center' style='width:8%;'>Dept.</th>
                <th class='text-center' style='width:10%;'>Code</th>
                <th style='width:12%;'>First Name</th>
                <th style='width:17%;'>Last Name</th>
                <th class='text-center' style='width:10%;'>JG</th>
                <th style='width:20%;'>Position</th>                
                <th class='text-center' style='width:15%;'>More Page</th>
            </tr>
        </thead>
        <tbody>

<?php
    $strSql = "SELECT * " ;
    $strSql .= "FROM EMP_Main " ;
    $strSql .= "WHERE " . substr($condition, 2, strlen($condition)-2);
    //$strSql .= "ORDER BY job_business, job_department, emp_code" ;
    $strSql .= "ORDER BY job_business, job_department, emp_code" ;
    //echo $strSql . "<br>";

    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
    $statement->execute();  
    $nRecCount = $statement->rowCount();
    //echo "Record Count = " . $nRecCount ."<br>";

    if ($nRecCount >0)    
    {
        while ($ds = $statement->fetch(PDO::FETCH_NAMED))
        {
?> 
            <tr>
                <td class='text-center'><?php echo $ds['job_business']; ?></td>
                <td class='text-center'><?php echo $ds['job_department']; ?></td>
                <td class='text-center'><?php echo $ds['emp_code']; ?></td>
                <td><?php echo $ds['emp_tfname']; ?></td>
                <td><?php echo $ds['emp_tlname']; ?></td>
                <td class='text-center'><?php echo $ds['job_grade']; ?></td>
                <td><?php echo $ds['job_position']; ?></td>                
                <td class='text-center'>
                    <div class="dropdown">
                        <button class="btn btn-default btn-xs dropdown-toggle drop-edit" type="button" data-toggle="dropdown">Page
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="pa11.php
                                ?var1=<?php echo $ds['emp_code']; ?>
                                &var2=<?php echo $ds['emp_picture']; ?>
                                &var3=<?php echo $ds['emp_ttitle']; ?>
                                &var4=<?php echo $ds['emp_tfname']; ?>
                                &var5=<?php echo $ds['emp_tlname']; ?>
                                &var6=<?php echo $ds['emp_etitle']; ?>
                                &var7=<?php echo $ds['emp_efname']; ?>
                                &var8=<?php echo $ds['emp_elname']; ?>
                                &var9=<?php echo $ds['emp_nname']; ?>
                                &var10=<?php echo $ds['emp_id_no']; ?>
                                &var11=<?php echo $ds['emp_birth_date']; ?>
                                &var20=<?php echo $ds['job_business']; ?>
                                &var21=<?php echo $ds['job_department']; ?>
                                &var22=<?php echo $ds['job_location']; ?>
                                &var23=<?php echo $ds['job_position']; ?>
                                &var24=<?php echo $ds['job_grade']; ?>
                                &var25=<?php echo $ds['job_working_date']; ?>
                                &var30=<?php echo $ds['addr_no']; ?>
                                &var31=<?php echo $ds['addr_road']; ?>
                                &var32=<?php echo $ds['addr_area']; ?>
                                &var33=<?php echo $ds['addr_district']; ?>
                                &var34=<?php echo $ds['addr_province']; ?>
                                &var35=<?php echo $ds['addr_postal_code']; ?>
                                &var40=<?php echo $ds['edu_level1']; ?>
                                &var41=<?php echo $ds['edu_detail1']; ?>
                                &var42=<?php echo $ds['edu_institute1']; ?>                                                                
                                &var43=<?php echo $ds['edu_faculty1']; ?>
                                &var44=<?php echo $ds['edu_major1']; ?>
                                &var45=<?php echo $ds['edu_graduated_year1']; ?>
                                &var46=<?php echo $ds['edu_level2']; ?>
                                &var47=<?php echo $ds['edu_detail2']; ?>
                                &var48=<?php echo $ds['edu_institute2']; ?>                                                                
                                &var49=<?php echo $ds['edu_faculty2']; ?>
                                &var50=<?php echo $ds['edu_major2']; ?>
                                &var51=<?php echo $ds['edu_graduated_year2']; ?>"
                                target="_blank">
                                Per. Info.
                                </a>
                            </li>
                            <li>
                                <a href="pa21.php
                                ?var1=<?php echo $ds['emp_code']; ?>
                                &var2=<?php echo $ds['emp_picture']; ?>
                                &var3=<?php echo $ds['emp_ttitle']; ?>
                                &var4=<?php echo $ds['emp_tfname']; ?>
                                &var5=<?php echo $ds['emp_tlname']; ?>
                                &var6=<?php echo $ds['emp_etitle']; ?>
                                &var7=<?php echo $ds['emp_efname']; ?>
                                &var8=<?php echo $ds['emp_elname']; ?>
                                &var9=<?php echo $ds['emp_nname']; ?>
                                &var10=<?php echo $ds['job_position']; ?>
                                &var11=<?php echo $ds['job_grade']; ?>
                                &var12=<?php echo $ds['job_working_date']; ?>"
                                target="_blank">
                                Performance
                                </a>
                            </li>
                            <li>
                                <a href="pa22.php
                                ?var1=<?php echo $ds['emp_code']; ?>
                                &var2=<?php echo $ds['emp_picture']; ?>
                                &var3=<?php echo $ds['emp_ttitle']; ?>
                                &var4=<?php echo $ds['emp_tfname']; ?>
                                &var5=<?php echo $ds['emp_tlname']; ?>
                                &var6=<?php echo $ds['emp_etitle']; ?>
                                &var7=<?php echo $ds['emp_efname']; ?>
                                &var8=<?php echo $ds['emp_elname']; ?>
                                &var9=<?php echo $ds['emp_nname']; ?>
                                &var10=<?php echo $ds['job_position']; ?>
                                &var11=<?php echo $ds['job_grade']; ?>
                                &var12=<?php echo $ds['job_working_date']; ?>"                            
                                target="_blank">
                                Promotion
                                </a>
                            </li>
                            <li>
                                <a href="pa41.php
                                ?var1=<?php echo $ds['emp_code']; ?>
                                &var2=<?php echo $ds['emp_picture']; ?>
                                &var3=<?php echo $ds['emp_ttitle']; ?>
                                &var4=<?php echo $ds['emp_tfname']; ?>
                                &var5=<?php echo $ds['emp_tlname']; ?>
                                &var6=<?php echo $ds['emp_etitle']; ?>
                                &var7=<?php echo $ds['emp_efname']; ?>
                                &var8=<?php echo $ds['emp_elname']; ?>
                                &var9=<?php echo $ds['emp_nname']; ?>
                                &var10=<?php echo $ds['job_position']; ?>
                                &var11=<?php echo $ds['job_grade']; ?>
                                &var12=<?php echo $ds['job_working_date']; ?>"                                
                                target="_blank">
                                Welfare
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
                               
                <!--<td class='text-center'><a href="<?php //echo $ds['attachment']; ?>" target="_blank">Click</a></td>-->
            </tr>
<?php
        }
    }
?>
        </tbody>
    </table>
</div>
