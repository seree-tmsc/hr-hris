<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("include/library.php"); ?>
</head>

<body>              
<?php
    try
    {
        require_once('include/db_Conn.php');
        
        $strSql = "SELECT * ";
        $strSql .= "FROM Emp_MainData ";
        $strSql .= "WHERE Emp_Code='" . $_GET["param_emp_code"] . "' ";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();
        
        if ($nRecCount = 1)
        {
            $ds = $statement->fetch(PDO::FETCH_NAMED);        
                        
            echo "<div class='container'>";
            echo "<div class='row'>";
            echo "<p></p>";

            echo "<div class='col-lg-3'>";
            echo "</div>";

            echo "<div class='col-lg-6'>";
            echo "<div class='panel panel-default'>";
            echo "<div class='panel-heading'>";
            echo "<h3 class='panel-title'>Update User Data</h3>";
            echo "<div class='panel-body'>";

            echo "<form action='emp_master_update.php?param_emp_code=" . $ds["Emp_Code"] . "' ";
            echo "method='post'>";

            echo "<div class='form-group'>";
            echo "<label>Emp_Code:</label>";
            echo "<input type='text' class='form-control' name ='Emp_Code' value=". $ds['Emp_Code'] ." disabled>";
            echo "</div>";            
            echo "<div class='form-group'>";
            echo "<label>Title:</label>";
            echo "<input type='text' class='form-control' name ='Title' value=". $ds['Title'] ." disabled>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label>Names:</label>";
            echo "<input type='text' class='form-control' name ='Names' value=". $ds['Names'] ." disabled>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label>Surname:</label>";
            echo "<input type='text' class='form-control' name ='Surname' value=". $ds['Sur_Name'] ." disabled>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label>Picture:</label>";
            echo "<input type='text' class='form-control' name ='Picture' value=". $ds['Picture'] ." disabled>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label>Enter_Date:</label>";
            echo "<input type='date' class='form-control' name ='ent_date' value=". $ds['Enter_Date'] ." disabled>";
            echo "</div>";
            echo "<div>";
            echo "<br>";
            echo "</div>";
            echo "<button type='submit' name='yes' class='btn btn-success'>Submit</button>";
            echo " ";
            echo "<button type='cancel' name='no' class='btn btn-danger'>Cancel</button>";
            echo "</form>";
            echo "</div>"; 
            echo "</div>"; 
            echo "</div>";                

            echo "<div class='col-lg-3'>";
            echo "</div>";

            echo "</div>"; 
            echo "</div>"; 
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

</body>
</html>