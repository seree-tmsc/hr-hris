
<?php    
    try    
    {
        require_once("include/library.php");
        include('include/db_Conn.php');

        $strSql1 = "select * from MAS_TRAINING_ROADMAP_GENERATE ";
        //$strSql1 .= "where emp_code='" . $_POST['Select_By_Emp'] . "' and Biz='" . $_POST['Select_By_BUSI'] . "' and Dep='" . $_POST['Select_By_DEPT']. "' ";
        $strSql1 .= "where emp_code='" . $_POST['Select_By_Emp'] . "' ";
        //echo $strSql1 . "<br>";

        $statement1 = $conn->prepare( $strSql1, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement1->execute();  
        $nRecCount1 = $statement1->rowCount();
        
        if ($nRecCount1 >0)
        {
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered table-hover' id='myTable'>";
            echo "<thead>";
            echo "<tr class='info'>";            
            echo "<th class='text-center'>Emp-Code</th>";
            echo "<th class='text-center'>Emp-Name</th>";
            echo "<th class='text-center'>Training-Set</th>";
            echo "<th class='text-center'>Module</th>";
            echo "<th class='text-center'>Course Code</th>";
            echo "<th class='text-center'>Course Name</th>";
            echo "<th class='text-center'>Training Status</th>";
            echo "<th class='text-center'>Mode</th>";
            echo "<th class='text-center'>Detail</th>";

            //$nMax = sizeof($aHeader);
            //for($nI = 0; $nI < $nMax; $nI++)
            //{
            //    echo "<th class='text-center'>" . $aHeader[$nI][0] . "-" . $aHeader[$nI][1] ."</th>";
            //}

            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($ds1 = $statement1->fetch(PDO::FETCH_NUM))
            {                
?>                
                <tr>
                    <form method="post" action="updateStatus.php?param1=<?php echo $ds1['0']; ?>
                    &param2=<?php echo $ds1['1']; ?>
                    &param3=<?php echo $ds1['2']; ?>
                    &param4=<?php echo $ds1['3']; ?>
                    &param5=<?php echo $ds1['4']; ?>">
                    
                        <td> <?php echo $ds1['0']; ?> </td>
                        <td> <?php echo $ds1['1']; ?> </td>
                        <td> <?php echo $ds1['2']; ?> </td>
                        <td class='text-center'> <?php echo $ds1['3']; ?> </td>
                        <td class='text-center'> <?php echo $ds1['4']; ?> </td>
                        <td class='text-center'> <?php echo $ds1['5']; ?> </td>     
                        <td class='text-center'> <?php echo $ds1['6']; ?> </td>           
                        <td class='text-center'>
                            <input type="checkbox" name="ck" value="1">
                            <input type="submit" name="btn" value="ok">
                        </td>
                        <td class='text-center'>
                            <a href="Training_roadmap_update.php"><input type="button" value="Detail"></a>
                        <?php
                        //echo  "<td class='text-center'>";                 
                        //echo  "<a target='_blank' class='btn btn-warning btn-xs' href='Training_roadmap_update.php";
                        //echo  "&paramEMP=" . $ds1['0'] ;
                        //echo  "&paramName=" . $ds1['1'] ;
                        //echo  "&paramTrainingSet=" . $ds1['2'] ;
                        //echo  "&paramModule=" . $ds1['3'] ;
                        //echo  "&paramCourse=" . $ds1['4'] ;
                        //echo  "&paramCourseName=" . $ds1['5'] . "'>";
                        //echo  "Detail";
                        //echo  "</a>";
                        ?>
                        
                    </form>
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