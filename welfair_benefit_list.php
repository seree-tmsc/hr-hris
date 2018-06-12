<?php
//echo $_POST['NumberOfRecord'] . "<br>";

try
    {
?>        
        <div class='table-responsive'>
            <table class='table table-bordered table-hover' id='myTable'>
            <thead>
                <tr class='head-salmon'>
                    <th>No.</th>
                    <th>Enter-Date</th>
                    <th>Date</th>
                    <th>Code</th>
                    <th>F-Name</th>
                    <th>L-Name</th>
                    <th>Line</th>
                    <th>Detail</th>
                    <th>Amount</th>
                    <th>PDF File</th>
                    <th class='text-center'>Mode</th>
                </tr>
            </thead>
        <tbody>
<?php
        require_once('include/db_Conn.php');
        $strSql = "SELECT M.auto_number as 'auto_number', M.ent_date as 'ent_date', ";
        $strSql .= "M.wd_date as 'wd_date', M.emp_code as 'emp_code', E.emp_tfname as 'emp_fname', E.emp_tlname as 'emp_lname', ";
        $strSql .= "M.line_item as 'line_item', M.detail_item as 'detail_item', ";
        $strSql .= "M.amount as 'amount', M.attachment as 'attachment' ";
        $strSql .= "FROM MAS_doctor_treatment M JOIN Emp_Main E ON M.emp_code=E.emp_code ";        
        $strSql .= "ORDER BY M.auto_number DESC";        
        //echo $strSql . "<br>";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();
       
        if ($nRecCount >0)
        {
            while ($ds = $statement->fetch(PDO::FETCH_NAMED))
            {
?>                
                <tr>                    
                    <td><?php echo $ds['auto_number'];?></td>
                    <td><?php echo date('d/M/Y', strtotime($ds['ent_date']));?></td>
                    <td><?php echo $ds['wd_date'];?></td>
                    <td><?php echo $ds['emp_code'];?></td>
                    <td><?php echo $ds['emp_fname'];?></td>
                    <td><?php echo $ds['emp_lname'];?></td>
                    <td align='center'><?php echo $ds['line_item'];?></td>
                    <td><?php echo $ds['detail_item'];?></td>
                    <td align='right'><?php echo number_format($ds['amount'],2, '.', ',');?></td>
                    <td align='center'><a href='<?php echo $ds['attachment'];?>' target='_blank'><img src='images/pdf.png'></a></td>
                    <td class='text-center'>
                        <a href='#' onclick="javascript:showModalUpdate_Welfair(
                            '<?php echo $ds['auto_number']; ?>',
                            '<?php echo $ds['ent_date']; ?>',
                            '<?php echo $ds['wd_date']; ?>',
                            '<?php echo $ds['emp_code']; ?>',
                            '<?php echo $ds['emp_fname']; ?>',
                            '<?php echo $ds['emp_lname']; ?>',
                            '<?php echo $ds['line_item']; ?>',
                            '<?php echo $ds['detail_item']; ?>',
                            '<?php echo $ds['amount']; ?>',
                            '<?php echo $ds['attachment']; ?>'
                            )";>
                            <span class='fa fa-pencil-square-o fa-lg'></span>
                        </a>
                        <a href='#' onclick="javascript:showModalDelete_Welfair(
                            '<?php echo $ds['auto_number']; ?>',
                            '<?php echo $ds['ent_date']; ?>',
                            '<?php echo $ds['wd_date']; ?>',
                            '<?php echo $ds['emp_code']; ?>',
                            '<?php echo $ds['emp_fname']; ?>',
                            '<?php echo $ds['emp_lname']; ?>',
                            '<?php echo $ds['line_item']; ?>',
                            '<?php echo $ds['detail_item']; ?>',
                            '<?php echo $ds['amount']; ?>',
                            '<?php echo $ds['attachment']; ?>'
                            )";>
                            <span class='fa fa-minus-circle fa-lg'></span>
                        </a>
                    </td>
                </tr>
<?php
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