
    <!-- Content Section -->
    <div class="row">
        <div class="col-md-12">
            <!--<p></p>-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-inline">
                Search : 
                <input type="text" class="form-control" id="myInput" onkeyup="Func_Search()" placeholder="Search by user names.." title="Type user name">
        
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
                //include "training_list.php";                    
            ?>
        </div>
    </div>    

    <!-- Bootstrap Modals -->
    <!-- Modal - Add New Record/User -->
    <div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add New Record</h4>
                </div>

                <div class="modal-body">
                </div>
            </div>
        </div>
    </div> 
