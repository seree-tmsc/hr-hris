<?php    
    try    
    {
        require_once("include/library.php");

        include('include/db_Conn.php');
        $strSql = "select Job_business, Job_department, Section, Task, JG_Name, JG ";
        $strSql .= "from MAS_Training_JG ";
        $strSql .= "where Job_business='BIZ' ";
        $strSql .= "and Job_department='HR' ";
        $strSql .= "group by Job_business, Job_department, Section, Task, JG_Name, JG ";
        //echo $strSql . "<br>";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();
        $aTemp = array();
        $aHeader = array();        
       
        if ($nRecCount >0)
        {
            while ($ds = $statement->fetch(PDO::FETCH_NUM))
            {
                $aTemp = array($ds[2], $ds[5]);
                array_push($aHeader, $aTemp);
            }            
        }
        else
        {
            echo "Error on Table ... MAS_Training_JG!" . "<br>";
            exit;
        } 

        $strSql1 = "select Module_Code, Module_Name, Code_Course, R.Course_name ";
        $strSql1 .= "from MAS_Training_Roadmap R ";
        $strSql1 .= "join MAS_Training_Course C ON C.Course_Code=R.Code_Course ";
        $strSql1 .= "where R.job_business='BIZ' and R.job_department='HR' ";
        $strSql1 .= "group by Module_Code, Module_Name, Code_Course, R.Course_name ";
        $strSql1 .= "order by Module_Code, Module_Name, Code_Course, R.Course_name ";
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
            echo "<th class='text-center'>Col-1</th>";
            echo "<th class='text-center'>Col-2</th>";
            echo "<th class='text-center'>Col-3</th>";
            echo "<th class='text-center'>Col-4</th>";

            $nMax = sizeof($aHeader);
            for($nI = 0; $nI < $nMax; $nI++)
            {
                echo "<th class='text-center'>" . $aHeader[$nI][0] . "-" . $aHeader[$nI][1] ."</th>";
            }

            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($ds1 = $statement1->fetch(PDO::FETCH_NUM))
            {
                echo "<tr>";
                echo "<td align='center'>" . $ds1[0] . "</td>";
                echo "<td>" . $ds1[1] . "</td>";
                echo "<td align='center'>" . $ds1[2] . "</td>";
                echo "<td>" . $ds1[3] . "</td>";
                
                for($nI = 0; $nI < $nMax; $nI++)
                {
                    echo "<td align='center'>";
                    //echo "<td>" . $aHeader[$nI][0] . "-" . $aHeader[$nI][1] ."</td>";                
                    $strSql2 = "select * ";
                    $strSql2 .= "from MAS_Training_Roadmap ";
                    $strSql2 .= "where job_business='BIZ' and job_department='HR' " ;
                    $strSql2 .= "and Section='" .  $aHeader[$nI][0] . "' ";
                    $strSql2 .= "and JG='" .  $aHeader[$nI][1] . "' ";
                    $strSql2 .= "and  Code_Course='" . $ds1[2] ."' ";
                    //echo $strSql2 . "<br>";

                    $statement2 = $conn->prepare($strSql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                    $statement2->execute();  
                    $nRecCount2 = $statement2->rowCount();

                    if ($nRecCount2 > 0 && $nRecCount2 == 1)
                    {
                        //echo "<span style='color:red;' class='fa fa-check fa-lg'></span>";
                        echo "<button class='btn btn-default' disabled>";
                        echo "<span style='color:red;' class='fa fa-check fa-lg'></span>";
                        echo "&nbsp";
                        echo "</button>";
                    }
                    else 
                    {
                        //echo "<span class='fa fa-pencil-square-o fa-lg'></span>";
                        /*
                        echo "<button class='btn btn-success' data-toggle='modal' data-target='#add_new_record_modal'>";
                        echo "<span class='glyphicon glyphicon-plus'></span>";
                        echo "&nbsp Add ";
                        echo "</button>";
                        */
                    }
                    echo "</td>";
                }

                echo "</tr>";
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