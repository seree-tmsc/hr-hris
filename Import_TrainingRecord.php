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
                        <h1 class = "panel-title">Import Excel into DB Training Record</h1>
                    </div> <!-- PANEL HEADER -->
                    <!-- PANEL BODY -->
                    <div class="panel-body">
                        <!-- FORM -->
                        <!--<form action="Import_TrainingRecord_process.php" method="post">
                            <div class="form-group">
                                <label>Source [CSV File Name] :</label>
                                <input type="file" accept=".csv" required class="form-control" name="param_csvFileName">
                            </div>
                            <div class="form-group">
                                <label>Target [Database Name] :</label>
                                <select required class="form-control" name="param_dbName">                                
                                <option value="MAS_Training_Record">1.TrainingRecord</option>
                            </select>                                
                            </div>

                            <button type="submit" class="btn btn-success">Import</button>
                            <button type="cancel" class="btn btn-danger" 
                                    onclick="javascript:window.location='p11.php'; return false;">Cancel
                            </button>    
                        </form> <!-- FORM -->

                         <form method="post" action="Import_TrainingRecord_process.php" enctype="multipart/form-data">
                               <div class="form-group">
                                    <label>Please select file (*.csv):</label>
                                    <input type="file" accept=".csv" required class="form-control" name="param_fileCSV" id="input_filename">
                               </div>
                               <button type="submit" style="float: right; margin:2px;" class="btn btn-success">
                                     OK 
                               </button>
                               <button type="cancel" style="float: right; margin:2px;" class="btn btn-danger" 
                                       onclick ="javascript:window.location.href='p11.php';return false;">
                                       Cancel
                               </button>
                        </form>            
                    </div> <!-- PANEL BODY -->
                    <!-- PANEL FOOTER -->
                    <div class="panel-footer">
                        Panel Footer
                    </div> <!-- PANEL FOOTER --> 
                </div> <!-- PANEL -->
            </div> <!-- COLUMN  -->
        </div> <!-- ROW  -->
    </div> <!-- CONTAINER  -->