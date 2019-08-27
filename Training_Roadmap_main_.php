<!-- Content Section -->
<div class="row">
    <div class="col-md-12">
        <!--<p></p>-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-inline">
            <!-- TEST  -->

            <form action="Training_Roadmap_main_.php" method="post">                                
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
                                <!--<div class="row" >
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
                                </div>     -->                                                      
             
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

            Search : 
            <input type="text" class="form-control" id="myInput" onkeyup="Func_Search(0)" placeholder="Search by user names.." title="Type user name">
    
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">
                    <span class="glyphicon glyphicon-plus"></span> 
                    Add
                </button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p></p>
        <!--<h5>User Data:</h5>-->
        <?php
            /*include "Training_Roadmap_list_.php";       */             
        ?>
    </div>
</div>        


<?php
    try
    {
        require_once("include/library.php");

        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-hover' id='myTable'>";        
        echo "<thead>";
        echo "<tr class='info'>";
        echo "<th style='width:10%;'>BIZ</th>";
        echo "<th style='width:10%;'>Department</th>";
        echo "<th style='width:15%;'>Section</th>";
        echo "<th style='width:10%;' class='text-center'>TASK</th>";
        echo "<th style='width:10%;' class='text-center'>Position</th>";
        echo "<th style='width:15%;' class='text-center'>TrainingSET</th>";
        echo "<th style='width:15%;' class='text-center'>Mode</th>";        
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        include('include/db_Conn.php');

        $strSql = "SELECT * ";
        $strSql .= "FROM MAS_TRAINING_SET_MASTER ";
        $strSql .= "WHERE  BIZ='" . $_POST["Select_By_BUSI"] . "' and DEP='" . $_POST["Select_By_DEPT"] . "'";        
        $strSql .= "ORDER BY SEC ";
        /*$strSql = "SELECT * ";
        $strSql .= "FROM MAS_TRAINING_SET_MASTER ";
        $strSql .= "ORDER BY SEC ";*/
        
        echo $strSql . "<br>";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();
        if ($nRecCount >0)
        {
            while ($ds = $statement->fetch(PDO::FETCH_NAMED))
            {                       
?>                
                <tr>
                    <td> <?php echo $ds['BIZ']; ?> </td>
                    <td> <?php echo $ds['DEP']; ?> </td>
                    <td> <?php echo $ds['SEC']; ?> </td>
                    <td class='text-center'> <?php echo $ds['TASK']; ?> </td>
                    <td class='text-center'> <?php echo $ds['Position']; ?> </td>
                    <td class='text-center'> <?php echo $ds['TrainingSET']; ?> </td>
                    <td class='text-center'>
                        <a href='#' onclick="javascript:showModalUpdate(
                            '<?php echo $ds['emp_code']; ?>',
                            '<?php echo $ds['emp_tfname']; ?>',
                            '<?php echo $ds['emp_tlname']; ?>',
                            '<?php echo $ds['performance_year']; ?>',
                            '<?php echo $ds['performance_kpi']; ?>',
                            '<?php echo $ds['performance_com']; ?>',
                            '<?php echo $ds['performance_tot']; ?>',
                            '<?php echo $ds['performance_grade']; ?>'
                            )";>
                            <span class='fa fa-pencil-square-o fa-lg'></span>
                        </a>
                        <a href='#' onclick="javascript:showModalDelete(
                            '<?php echo $ds['emp_code']; ?>',
                            '<?php echo $ds['emp_tfname']; ?>',
                            '<?php echo $ds['emp_tlname']; ?>',
                            '<?php echo $ds['performance_year']; ?>',
                            '<?php echo $ds['performance_kpi']; ?>',
                            '<?php echo $ds['performance_com']; ?>',
                            '<?php echo $ds['performance_tot']; ?>',
                            '<?php echo $ds['performance_grade']; ?>'
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










