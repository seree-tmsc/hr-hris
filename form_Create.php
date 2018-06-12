<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home Criteria</title>
    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- COTAINER  -->
    <div class="container-fulid">
        <p></p>
        <!-- ROW  -->
        <div class="row">
            <!-- COLUMN  -->
            <div class="col-md-6 col-md-offset-3">
                <!-- PANEL -->
                <div class="panel panel-primary">
                    <!-- PANEL HEADER -->
                    <div class="panel-heading">
                        <h1 class = "panel-title">Panel Heading</h1>
                    </div> <!-- PANEL HEADER -->
                    <!-- PANEL BODY -->
                    <div class="panel-body">
                        <!-- FORM -->
                        <form action="add.php" method="post">
                            <div class="form-group">
                                <label>Materila Code:</label>
                                <?php include "ddl_pd_code.php"; ?>
                                <!--
                                <input type="text" required class="form-control" name="param1">
                                -->
                            </div>
                            <div class="form-group">
                                <label>Lot No.:</label>
                                <input type="text" required class="form-control" name="param_pd_lot">
                            </div>
                            <div class="form-group">
                                <label>Date:</label>
                                <input type="date" required class="form-control" name="param_pd_date">
                            </div>
                            <div class="form-group">
                                <label>Rx No.:</label>
                                <select class="form-control" name="param_pd_rx">
                                    <option value="01">Rx-01</option>
                                    <option value="02">Rx-02</option>
                                    <option value="03">Rx-03</option>
                                    <option value="04">Rx-04</option>
                                    <option value="05">Rx-05</option>
                                    <option value="06">Rx-06</option>
                                    <option value="07">Rx-07</option>
                                    <option value="08">Rx-08</option>
                                    <option value="09">Rx-09</option>
                                    <option value="10">Rx-10</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Lead Time:</label>
                                <select class="form-control" name="param_pd_lt">
                                    <option value="1">1 Day</option>
                                    <option value="2">2 Day</option>
                                    <option value="3">3 Day</option>
                                    <option value="4">4 Day</option>
                                    <option value="5">5 Day</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>File [Manuf]:</label>
                                <input type="file" required class="form-control" name="param_pd_file_manuf">
                            </div>
                            <div class="form-group">
                                <label>File [COA]:</label>
                                <input type="file" required class="form-control" name="param_pd_file_coa">
                            </div>
                            
                            <button type="submit" class="btn btn-success">
                                Submit
                            </button>
                            <button type="cancel" class="btn btn-danger" 
                                    onclick="javascript:window.location='Page2_List.php'; return false;">
                                    Cancel
                            </button>    
                        </form> <!-- FORM -->               
                    </div> <!-- PANEL BODY -->
                    <!-- PANEL FOOTER -->
                    <div class="panel-footer">
                        Panel Footer
                    </div> <!-- PANEL FOOTER --> 
                </div> <!-- PANEL -->
            </div> <!-- COLUMN  -->
        </div> <!-- ROW  -->
    </div> <!-- CONTAINER  -->

    <!-- jQuery -->
    <script src="../jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>