<style>
        .dropdown-menu {
            min-width: 0px !important;
        }
</style>

<div class='table-responsive'>
    <table class='table table-bordered table-hover' id='myTable'>
        <thead>
            <tr class='info'>
                <th class='text-center' style='width:10%;'>Departmemt</th>
                <th class='text-center' style='width:10%;'>Code</th>
                <th style='width:15%;'>First Name</th>
                <th style='width:20%;'>Last Name</th>
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
                                &var3=<?php echo $ds['emp_tfname']; ?>
                                &var4=<?php echo $ds['emp_tlname']; ?>" 
                                target="_blank">
                                1.1
                                </a>
                            </li>
                            <li>
                                <a href="pa21.php
                                ?var1=<?php echo $ds['emp_code']; ?>
                                &var2=<?php echo $ds['emp_picture']; ?>
                                &var3=<?php echo $ds['emp_tfname']; ?>
                                &var4=<?php echo $ds['emp_tlname']; ?>" 
                                target="_blank">
                                2.1
                                </a>
                            </li>
                            <li>
                                <a href="pa22.php
                                ?var1=<?php echo $ds['emp_code']; ?>
                                &var2=<?php echo $ds['emp_picture']; ?>
                                &var3=<?php echo $ds['emp_tfname']; ?>
                                &var4=<?php echo $ds['emp_tlname']; ?>" 
                                target="_blank">
                                2.2
                                </a>
                            </li>
                            <li>
                                <a href="pa41.php
                                ?var1=<?php echo $ds['emp_code']; ?>
                                &var2=<?php echo $ds['emp_picture']; ?>
                                &var3=<?php echo $ds['emp_tfname']; ?>
                                &var4=<?php echo $ds['emp_tlname']; ?>" 
                                target="_blank">
                                4.1
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
