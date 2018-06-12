<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!--
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    -->
    <link href="../tools/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Related Infor. Data Page</title>
    <link rel="stylesheet" href="../tools/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../tools/bootstrap-3.3.7-dist/css/my.css">

    <style>        
        * {
        box-sizing: border-box;
        }
        
        #myInput {
        background-image: url('/css/searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
        }

        #myTable {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
        font-size: 12px;
        }

        #myTable th, #myTable td {
        text-align: left;
        padding: 12px;
        }

        #myTable tr {
        border-bottom: 1px solid #ddd;
        }

        #myTable tr.header, #myTable tr:hover {
        background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <div class="container">
        <br>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Search Data for Employee</h3>
            </div>

            <div class="panel-body">              
                <input type="text" id="myInput" onkeyup="Func_Search()" placeholder="Search for names.." title="Type in a name">
                <table id="myTable">
                    <tr class="header">
                        <th style="width:10%;">Emp-Code</th>
                        <th style="width:40%;">Emp-Name</th>
                        <th style="width:40%;">Emp-LastName</th>
                        <th style="width:10%;">Mode</th>
                    </tr>

                    <?php                 
                    include_once('db_Conn.php');
                    $strSql = "SELECT emp_code,emp_fname,emp_lname ";
                    $strSql .= "FROM Mas_employee ";
                    $strSql .= "ORDER BY emp_fname ";

                    $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                    $statement->execute();  
                    $nRecCount = $statement->rowCount();
                    if ($nRecCount >0)
                    {
                        while ($ds = $statement->fetch(PDO::FETCH_NAMED))
                        {
                            echo  "<tr>";
                            echo  "<td>" . $ds['emp_code'] . "</td>";
                            echo  "<td>" . $ds['emp_fname'] . "</td>";
                            echo  "<td>" . $ds['emp_lname'] . "</td>";
                            echo  "<td class='text-center'>";
                            echo  "</a>";
                            echo  " ";                   
                        }
                    }
                    ?>
                </table>
              
                <script>
                        function Func_Search() {
                            var input, filter, table, tr, td, i;

                            input = document.getElementById("myInput");
                            filter = input.value.toUpperCase();

                            table = document.getElementById("myTable");
                            tr = table.getElementsByTagName("tr");

                            for (i = 0; i < tr.length; i++) 
                            {
                                td = tr[i].getElementsByTagName("td")[1];
                                if (td) 
                                {
                                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) 
                                    {
                                        tr[i].style.display = "";
                                    } 
                                    else 
                                    {
                                        tr[i].style.display = "none";
                                    }
                                }       
                            }
                        }
                </script>
                           
            </div>
        </div>
    </div>
</body>

</html>
