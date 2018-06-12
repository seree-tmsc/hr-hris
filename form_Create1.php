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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Criteria</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form action="prg_Create1.php" method="post">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="selMonth">Select Momth:</label>
                                        <select class="form-control" name="selMonth" autofocus>
                                            <option value="1">Jan</option>
                                            <option value="2">Feb</option>
                                            <option value="3">Mar</option>
                                            <option value="4">Apr</option>
                                            <option value="5">May</option>
                                            <option value="6">Jun</option>
                                            <option value="7">Jul</option>
                                            <option value="8">Aug</option>
                                            <option value="9">Sep</option>
                                            <option value="10">Oct</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Dec</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="selYear">Select Momth:</label>
                                        <select class="form-control" name="selYear">
                                            <option value="17">2017</option>
                                            <option value="18">2018</option>
                                            <option value="19">2019</option>
                                            <option value="20">2020</option>
                                            <option value="21">2021</option>
                                            <option value="22">2022</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>e-Mail:</label>
                                        <input type="email" required class="form-control" name="param1">
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" required class="form-control" name ="param2">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Disabled Input:</label>
                                        <input class="form-control" type="text" placeholder="Disabled input" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Input Text:</label>
                                        <input class="form-control" type="text" placeholder="Input Text" name="param3">
                                    </div>
                                    <div class="form-group">
                                        <label>Input Number:</label>
                                        <input class="form-control" type="number" placeholder="Input Number" name="param4">
                                    </div>
                                    <div class="form-group">
                                        <label>Input Number:</label>
                                        <input class="form-control" type="number" placeholder="Input Number" name="param5">
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="cancel" class="btn btn-danger" onclick="javascript:window.location='index.php'; return false;">Cancel</button>
                                </div>
                            </form>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
