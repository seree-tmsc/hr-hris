<!DOCTYPE html>
    <html lang="en">
    <head>
    </head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        
        <?php require_once("include/library.php");?>
        <script type="text/javascript" src="Training_Roadmap.js"></script>
    <body>
        <div class='table-respon'>
        <div class='table-responsive'>
            <table class='table table-bordered table-hover' id='myTable'>
                <thead>
                    <tr class='info'>
                        <th class='text-center'>Emp-Code</th>
                        <th class='text-center'>Emp-Name</th>
                        <th class='text-center'>Training-Set</th>
                        <th class='text-center'>Module</th>
                        <th class='text-center'>Course Code</th>
                        <th class='text-center'>Course Name</th>
                        <th class='text-center'>Training Status</th>
                        <th class='text-center'>Mode</th>
                        <th class='text-center'>Detail</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                try    
                {                            
                    include('include/db_Conn.php');
                    $strSql1 = "select * ";
                    $strSql1 .= "from MAS_TRAINING_ROADMAP_GENERATE ";
                    if(isset($_POST['Select_By_Emp']))
                    {
                        $strSql1 .= "where emp_code='" . $_POST['Select_By_Emp'] . "' ";
                    }
                    if(isset($_GET['param1']))
                    {
                        $strSql1 .= "where emp_code='" . $_GET['param1'] . "' ";
                    }            
                    //echo $strSql1 . "<br>";

                    $statement1 = $conn->prepare( $strSql1, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                    $statement1->execute();  
                    $nRecCount1 = $statement1->rowCount();
                    
                    if ($nRecCount1 >0)
                    {
                        while ($ds1 = $statement1->fetch(PDO::FETCH_NUM))
                        {
                ?>                
                            <tr>
                                <form method="post" action="Training_Roadmap_Update_Status.php?param1=<?php echo $ds1['0']; ?>&param2=<?php echo $ds1['4']; ?>">
                                    <td> <?php echo $ds1['0']; ?></td>
                                    <td> <?php echo $ds1['1']; ?> </td>
                                    <td> <?php echo $ds1['2']; ?> </td>
                                    <td class='text-center'> <?php echo $ds1['3']; ?> </td>
                                    <td class='text-center'> <?php echo $ds1['4']; ?> </td>
                                    <td class='text-center'> <?php echo $ds1['5']; ?> </td>     
                                    <td class='text-center'> <?php echo $ds1['6']; ?> </td>
                <?php
                                    if($ds1['6'] == 1)
                                    {
                                        echo "<td class='text-center'>";
                                        echo "<input type='checkbox' name='ck' checked> <br> <input type='submit' name='btn' value='OK'>";
                                        echo "</td>";
                                    }
                                    else
                                    {
                                        echo "<td class='text-center'>";
                                        echo "<input type='checkbox' name='ck'> <br> <input type='submit' name='btn' value='OK'>";
                                        echo "</td>";
                                    }
                ?>
                                    <td class='text-center'>                                 
                                        <a href='#' onclick="javascript:showModal_for_Update(
                                        '<?php echo $ds1['0'];?>',
                                        '<?php echo $ds1['1'];?>',
                                        '<?php echo $ds1['2'];?>',
                                        '<?php echo $ds1['3'];?>',
                                        '<?php echo $ds1['4'];?>',
                                        '<?php echo $ds1['5'];?>',
                                        '<?php echo $ds1['12'];?>',
                                        '<?php echo $ds1['13'];?>',
                                        '<?php echo $ds1['14'];?>',
                                        '<?php echo $ds1['15'];?>',
                                        '<?php echo $ds1['16'];?>',
                                        '<?php echo $ds1['17'];?>',
                                        '<?php echo $ds1['18'];?>',
                                        '<?php echo $ds1['19'];?>',
                                        '<?php echo $ds1['20'];?>',
                                        '<?php echo $ds1['21'];?>')">
                                            <span class='fa fa-pencil-square-o fa-lg'></span>
                                        </a>
                                    </td>
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
        <?php include_once('Training_Roadmap_Modal_Update_Detail.php');?>
    </body>
</html>