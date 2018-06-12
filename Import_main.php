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
                        <h1 class = "panel-title">Import Excel into DB</h1>
                    </div> <!-- PANEL HEADER -->
                    <!-- PANEL BODY -->
                    <div class="panel-body">
                        <!-- FORM -->
                        <form action="import_process.php" method="post">
                            <div class="form-group">
                                <label>Source [CSV File Name] :</label>
                                <input type="file" accept=".csv" required class="form-control" name="param_csvFileName">
                            </div>
                            <div class="form-group">
                                <label>Target [Database Name] :</label>
                                <select required class="form-control" name="param_dbName">                                
                                <option value="MAS_Performance">1.Performance Database</option>
                                <option value="MAS_Promotion">2.Promotion Database</option>                                
                                <option value="MAS_Users_ID">3.User-ID Database</option>                                
                            </select>                                
                            </div>

                            <button type="submit" class="btn btn-success">Import</button>
                            <button type="cancel" class="btn btn-danger" 
                                    onclick="javascript:window.location='p11.php'; return false;">Cancel
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