
<?php
    try
    {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-hover' id='myTable'>";        
        echo "<thead>";
        echo "<tr class='info'>";
        echo "<th style='width:10%;'>DEPT</th>";
        echo "<th style='width:20%;'>MODULE</th>";
        echo "<th style='width:10%;'>CODE</th>";
        echo "<th style='width:20%;'>COURSE_NAME</th>";
        echo "<th style='width:10%;'>TIMELINE</th>";
        echo "<th style='width:15%;' class='text-center'>Mode</th>";
        echo "<th style='width:15%;' class='text-center'>Detail</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        include('include/db_Conn.php');

        $Sql = "SELECT Job_business,Job_department,Code_Course,Course_name,Section,Position,JG " ;
        $Sql .= "FROM MAS_Training_Roadmap " ;
        $Sql .= "WHERE Job_business='". $ds["Job_business"] . "' and Job_department='". $ds["job_department"] ."' and Position ='". $ds["job_position"] ."' and JG='". $ds["job_grade"] ."' ";
        echo $Sql . "<br>";
        $statement = $conn->prepare( $Sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();

   /*     $strSql = "SELECT Dept,Module,Code_Course,Course_Name,Timeline " ;
        $strSql .= "FROM  MAS_Training_Course ";
        $strSql .= "WHERE Dept='" . $_POST["Select_By_DEPT"] . "' and Module='" . $_POST["Select_By_MODULE"] . "' "; 
        $strSql .= "ORDER BY Code_Course ";
        echo $strSql . "<br>";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();*/
        if ($nRecCount >0)
        {
            while ($ds = $statement->fetch(PDO::FETCH_NAMED))
            {                       
?>                
                <tr>
                    <td> <?php echo $ds['Dept']; ?> </td>
                    <td> <?php echo $ds['Module']; ?> </td>
                    <td> <?php echo $ds['Code_Course']; ?> </td>
                    <td> <?php echo $ds['Course_Name']; ?> </td>
                    <td> <?php echo $ds['Timeline']; ?> </td>                 
                    <td class='text-center'>
                    <a 
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