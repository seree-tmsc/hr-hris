<!-- Content Section -->
<div class="row">
    <div class="col-md-12">
        <!--<p></p>-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        
        <!--<div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="">
                    <span class="glyphicon glyphicon-plus"></span> 
                    Roadmap
                </button>
        </div> -->

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p></p>
        <!--<h5>User Data:</h5>-->
        <?php
           /* include "performance_list.php"; */
        ?>
    </div>
</div>        

<body>
    <div class="container">
        <br>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">TRAINING ROADMAP</h3>
            </div>

            <div class="panel-body">        
                    <table id="myTable">
                    <tr class="header">
                        <th style="width:10%;">BIZ</th>
                        <th style="width:10%;">DEP</th>
                        <th style="width:10%;">SEC</th>
                        <th style="width:20%;">TASK</th>
                        <th style="width:15%;">Position</th>
                        <th style="width:20%;">TrainingSET</th>
                        <th style="width:15%;" class='text-center'>MODE</th>                       
                    </tr>
                    <?php
                           /* echo $_POST['Select_By_BUSI'] . "<br>";
                            echo $_POST['Select_By_DEPT'] . "<br>"; */
                            
                            include('include/db_Conn.php');
                            
                            $strSql = "SELECT * ";
                            $strSql .= "FROM MAS_TRAINING_SET_MASTER ";
                            $strSql .= "WHERE  BIZ='" . $_POST["Select_By_BUSI"] . "' and DEP='" . $_POST["Select_By_DEPT"] . "'";        
                            $strSql .= "ORDER BY SEC ";
                            /*echo $strSql . "<br>";*/

                            $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                            $statement->execute();  
                            $nRecCount = $statement->rowCount();
                                                       
                            if ($nRecCount >0)
                            {
                                require_once("include/library.php");

                                while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                                {
                                    echo  "<tr>";
                                    echo  "<td>" . $ds['BIZ'] . "</td>";
                                    echo  "<td>" . $ds['DEP'] . "</td>";
                                    echo  "<td>" . $ds['SEC'] . "</td>";
                                    echo  "<td>" . $ds['TASK'] . "</td>";
                                    echo  "<td>" . $ds['Position'] . "</td>";
                                    echo  "<td>" . $ds['TrainingSET'] . "</td>";
                                    /*echo  "<td>" . $ds1['SUM_Amt'] / $ds['Inv_Receipt_Amt_in_Lc'] . "</td>";*/
                                    /*echo  "<td class='text-center'>";
                                    echo  "</a>";
                                    echo  " "; 
                                    */
                                    
                                    /*echo  "<td class='text-center'>";                 
                                    echo  "<a target='_blank' class='btn btn-warning btn-xs' href='Training_Roadmap_list1.php";
                                    echo  "?paramBIZ=" . $_POST['paramBIZ'] ;                                    
                                    echo  "&paramDEP=" . $_POST['paramDEP'] ;
                                    echo  "&paramSEC=" . $_POST['paramSEC'] ;
                                    echo  "&paramPosition=" . $_POST['Position'] ;
                                    echo  "&paramTrainingSET=" . $_POST['paramTrainingSET'] . "'>";
                                    echo  "Detail";
                                    echo  "</a>";
                                    echo  " ";                        */
                                    
                                    
                                    echo  "<td class='text-center'>";                 
                                    echo  "<a target='_blank' class='btn btn-warning btn-xs' href='Training_Roadmap_list1.php";
                                    echo  "?paramBIZ=" . $ds['BIZ'] ;
                                    echo  "&paramDEP=" . $ds['DEP'] ;   
                                    echo  "&paramSEC=" . $ds['SEC'] ;
                                    echo  "&paramTrainingSET=" . $ds['TrainingSET'] ;
                                    echo  "&paramPosition=" . $ds['Position'] . "'>";
                                    echo  "Detail";
                                    echo  "</a>";
                                    echo  " ";      

                                    echo  "</td>";
                                    echo  "</tr>";    
                                }
                             
                            }  
                            
                    ?>
                    </table>
                   

                   <a href="export_to_csv_RwQty.php
                   ?param1=<?php echo $_POST['paraTopN']; ?>
                   &param2=<?php echo $_POST['param_Fdate']; ?>
                   &param3=<?php echo $_POST['param_Tdate']; ?>
                   &param4=<?php echo $_POST['Select_By_SBU']; ?>
                   " target='_blank'>Export To Excel</a>
                                                    
                    <script>
                            function myFunction() {
                            var input, filter, table, tr, td, i;
                            input = document.getElementById("myInput");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("myTable");
                            tr = table.getElementsByTagName("tr");
                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[1];
                                if (td) {
                                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                                }       
                            }
                            }
                    </script> 
                           
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
    
?>

