<!-- Content Section -->
<div class="row">
    <div class="col-md-12">
        <!--<p></p>-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-inline">         
            <div class="pull-left">
                
            </div>
            <div class="panel-heading">
                <h3 class="panel-title">CRITERIA</h3>
            </div>        
                            <form action="Training_Roadmap_main.php" method="post">                                
                                <div class="row" >
                                <div class="col-md-3">
                                        <label>BUSINESS:<label>                                                                                 
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="Select_By_BUSI">
                                            <Option value="BIZ">BIZ</option>
                                            <option value="IR">IR</option>
                                            <option value="MCI">MCI</option>
                                            <option value="SCM">SCM</option>
                                            <option value="TECH">TECH</option>
                                            <option value="UU">UU</option>
                                        </select>
                                    </div>                                    
                                </div>
                                <br>
                                <div class="row" >
                                    <div class="col-md-3">
                                        <label>DEPARTMENT:<label>                                                                                 
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="Select_By_DEPT">
                                            <Option value="ACC">ACC</option>
                                            <option value="HR">HR</option>
                                            <option value="IT">IT</option>
                                            <option value="ENG">ENG</option>
                                            <option value="MCI">MCI</option>
                                            <option value="MGT">MGT</option>
                                            <option value="PD-Plan">PD-Plan</option>
                                            <option value="PRO">PRO</option>
                                            <option value="PUR">PUR</option>
                                            <option value="PUR">R&D</option>
                                            <option value="PUR">SAL</option>
                                            <option value="PUR">SHE&Q</option>
                                            <option value="PUR">WH</option>
                                        </select>
                                    </div>                                  
                                </div>     
                                <br>
                                <div class="row" >
                                    <div class="col-md-3">
                                        <label>MODULE:<label>                                                                                 
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="Select_By_MODULE">
                                            <Option value="Basic Skill">Basic Skill</option>
                                            <option value="TECH">Technical Skill (Job Family)</option>
                                            <option value="COMPE">Core-Competency Skill</option>
                                            <option value="LEAD">Leadership Skill (Managerial Competency)</option>
                                            <option value="SAFE">SHE & Q Skill</option>
                                            <option value="SAFE">Functional-Competency Skill</option>
                                        </select>
                                    </div>                                  
                                </div>                                                           
             
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <div class="pull-center">
                                            <button type="submit" class="btn btn-success">
                                                Search
                                            </button>
                                            <button type="cancel" class="btn btn-danger">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p></p>
        <!--<h5>User Data:</h5>-->
        <?php
            /*include "Training_Roadmap_Matrix.php"; */
        ?>
    </div>
</div>        

<?php    
    try    
    {
        require_once("include/library.php");

        include('include/db_Conn.php');
        $strSql = "select Job_business, Job_department, Section, Task, JG_Name, JG ";
        $strSql .= "from MAS_Training_JG ";
        $strSql .= "where Job_business='" . $_POST["Select_By_BUSI"] . "' ";
        $strSql .= "and Job_department='" . $_POST["Select_By_DEPT"] . "' ";
        $strSql .= "group by Job_business, Job_department, Section, Task, JG_Name, JG ";
        $strSql . "<br>";

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
            //echo "Error on Table ... MAS_Training_JG!" . "<br>";
            exit;
        } 

        $strSql1 = "select Module_Code, Module_Name, Code_Course, R.Course_name ";
        $strSql1 .= "from MAS_Training_Roadmap R ";
        $strSql1 .= "join MAS_Training_Course C ON C.Course_Code=R.Code_Course ";
        $strSql1 .= "where R.job_business='" . $_POST["Select_By_BUSI"] . "' and R.job_department='" . $_POST["Select_By_DEPT"] . "' and C.Module_Name='" . $_POST["Select_By_MODULE"] . "' ";
        $strSql1 .= "group by Module_Code, Module_Name, Code_Course, R.Course_name ";
        $strSql1 .= "order by Module_Code, Module_Name, Code_Course, R.Course_name ";
        echo $strSql1 . "<br>";

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
                    $strSql2 .= "where job_business='" . $_POST["Select_By_BUSI"] . "' and job_department='" . $_POST["Select_By_DEPT"] . "' " ;
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

