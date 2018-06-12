<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    

    <style>
        /*------------------------------------
        / CSS for bootstrap-inputtype
        /------------------------------------*/
        .container{
            margin-top:20px;
        }
        .image-preview-input {
            position: relative;
            overflow: hidden;
            margin: 0px;    
            color: #333;
            background-color: #fff;
            border-color: #ccc;    
        }
        .image-preview-input input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .image-preview-input-title {
            margin-left:2px;
        }
    </style>
</head>

<body>    
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">
                    <!--<span class="glyphicon glyphicon-plus"></span> -->
                    <span class="fa fa-plus-circle fa-lg"></span> 
                    Add
                </button>
                <!--
                <button type "cancel" class="btn btn-info" onclick="javascript:window.location='main.php'; return false;">
                    <span class="glyphicon glyphicon-home"></span> 
                    Home
                </button>
                -->
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <p></p>
            <!--<h5>User Data:</h5>-->
            <?php
                include "p61_list.php";
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
                    <div class="panel panel-default">
                        <!--
                        <div class="panel-heading">
                            <h3 class="panel-title">Input Form</h3>
                        </div>
                        -->

                        <form action="p61_add.php" method="post" enctype="multipart/form-data">
                            <div class="panel-body">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Emp-List:</label>
                                        <?php require_once "dtl_emp_list.php"; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Emp-Code:</label>
                                        <p id="var1" class="form-control" disabled></p>
                                    </div>
                                    <div class="form-group">
                                        <label>First Name:</label>
                                        <p id="var2" class="form-control" disabled></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name:</label>
                                        <p id="var3" class="form-control" disabled></p>
                                    </div>                                    
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>e-Mail:</label>
                                        <input type="text" required class="form-control" name="add_emp_email" >
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" required class="form-control" name="add_emp_password">
                                    </div>
                                    <div class="form-group">
                                        <label>User Status:</label>
                                        <select class="form-control" name="sel_user_type">
                                            <option value="U">User</option>
                                            <option value="P">Power User</option>
                                            <option value="A">Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Enter Date:</label>
                                        <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>" disabled>
                                    </div>                                                            
                                </div>

                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Upload File:</label>
                                        <!-- HTNML for bootstrap-inputtype -->                                    
                                        <!-- image-preview-filename input [CUT FROM HERE]-->
                                        <div class="input-group image-preview">
                                            <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                            <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                                </button>
                                                <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="glyphicon glyphicon-folder-open"></span>
                                                    <span class="image-preview-input-title">Browse</span>
                                                    <input type="file" required accept="image/png, image/jpeg, image/gif" name="add_emp_file_name"/> <!-- rename it -->
                                                </div>
                                            </span>
                                        </div>
                                        <!-- /input-group image-preview [TO HERE]-->                                        
                                    </div>
                                </div>
                            </div>

                            <div class="panel-footer">
                                <div align="right">                            
                                    <button type="submit" class="btn btn-success">
                                        Submit
                                    </button>
                                    <button type="cancel" class="btn btn-danger" data-dismiss="modal">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!--
                <div class="modal-footer">                    
                </div>
                -->
            </div>
        </div>
    </div>


    <!-- Bootstrap Modals -->
    <!-- Modal - Edit Record/User -->    
    <div class="modal fade" id="edit_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Update Record</h4>
                </div>

                <div class="modal-body">
                    <div class="panel panel-default">
                        <!--
                        <div class="panel-heading">
                            <h3 class="panel-title">Input Form</h3>
                        </div>
                        -->

                        <form action="p61_update.php" method="post" enctype="multipart/form-data">
                            <div class="panel-body">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Emp-List:</label>
                                        <input type="text" disabled class="form-control">
                                    </div> 
                                    
                                    <input type="hidden" class="form-control" id="paramu_emp_code" name="paramu_emp_code" >

                                    <div class="form-group">
                                        <label>Emp-Code:</label>
                                        <input type="text" disabled class="form-control" id="edit_emp_code" name="edit_emp_code" >
                                    </div>
                                    <div class="form-group">
                                        <label>First Name:</label>
                                        <input type="text" disabled class="form-control" id="edit_emp_fname" name="edit_emp_fname">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name:</label>
                                        <input type="text" disabled class="form-control" id="edit_emp_lname" >
                                    </div>                     
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>e-Mail:</label>
                                        <input type="text" disabled class="form-control" id="edit_emp_email" >
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" disabled class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>User Status:</label>
                                        <select class="form-control" id="edit_emp_user_type" name="edit_emp_user_type">
                                            <option value="U">User</option>
                                            <option value="P">Power User</option>
                                            <option value="A">Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Enter Date:</label>
                                        <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>" disabled>
                                    </div>                                                            
                                </div>

                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Upload File:</label>
                                        <!-- HTNML for bootstrap-inputtype -->                                    
                                        <!-- image-preview-filename input [CUT FROM HERE]-->
                                        <div class="input-group image-preview">
                                            <input type="text" id="edit_emp_file_name" name="edit_emp_file_name" class="form-control image-preview-filename"> <!-- don't give a name === doesn't send on POST/GET -->
                                            <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                                </button>
                                                <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="glyphicon glyphicon-folder-open"></span>
                                                    <span class="image-preview-input-title">Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="edit_emp_file_name2"/> <!-- rename it -->
                                                </div>
                                            </span>
                                        </div>
                                        <!-- /input-group image-preview [TO HERE]-->                                        
                                    </div>
                                </div>
                            </div>

                            <div class="panel-footer">
                                <div align="right">                            
                                    <button type="submit" class="btn btn-success" name="btn_submet">
                                        Update
                                    </button>
                                    <button type="cancel" class="btn btn-danger" name ="btn_cancel" data-dismiss="modal">
                                        Cancel
                                    </button>                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!--
                <div class="modal-footer">                    
                </div>
                -->
            </div>
        </div>
    </div>


    <!-- Bootstrap Modals -->
    <!-- Modal - Delete Record/User -->    
    <div class="modal fade" id="delete_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Delete Record</h4>
                </div>

                <div class="modal-body">
                    <div class="panel panel-default">
                        <!--
                        <div class="panel-heading">
                            <h3 class="panel-title">Input Form</h3>
                        </div>
                        -->

                        <form action="p61_delete.php" method="post">
                            <div class="panel-body">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Emp-List:</label>
                                        <input type="text" disabled class="form-control">
                                    </div> 
                                    <div class="form-group">
                                        <!--<label>Emp-Code:</label>-->
                                        <input type="hidden"class="form-control" id="paramd_emp_code" name="paramd_emp_code">
                                    </div>
                                    <div class="form-group">
                                        <label>Emp-Code:</label>
                                        <input type="text" disabled class="form-control" id="delete_emp_code">
                                    </div>
                                    <div class="form-group">
                                        <label>First Name:</label>
                                        <input type="text"  disabled class="form-control" id="delete_emp_fname">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name:</label>
                                        <input type="text" disabled class="form-control" id="delete_emp_lname" >
                                    </div>                     
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>e-Mail:</label>
                                        <input type="text" disabled class="form-control" id="delete_emp_email" >
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" disabled class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>User Status:</label>
                                        <select class="form-control" disabled id="delete_emp_user_type">
                                            <option value="U">User</option>
                                            <option value="P">Power User</option>
                                            <option value="A">Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Enter Date:</label>
                                        <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>" disabled>
                                    </div>                                                            
                                </div>

                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Upload File:</label>
                                        <!-- HTNML for bootstrap-inputtype -->                                    
                                        <!-- image-preview-filename input [CUT FROM HERE]-->
                                        <div class="input-group image-preview">
                                            <input type="text" class="form-control image-preview-filename" id="delete_emp_file_name" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                            <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                                </button>
                                                <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="glyphicon glyphicon-folder-open"></span>
                                                    <span class="image-preview-input-title">Browse</span>
                                                    <input type="file" disabled accept="image/png, image/jpeg, image/gif" /> <!-- rename it -->
                                                </div>
                                            </span>
                                        </div>
                                        <!-- /input-group image-preview [TO HERE]-->                                        
                                    </div>
                                </div>
                            </div>

                            <div class="panel-footer">
                                <div align="right">                            
                                    <button type="submit" class="btn btn-success" name="btn_submet">
                                        Delete
                                    </button>
                                    <button type="cancel" class="btn btn-danger" name ="btn_cancel" data-dismiss="modal">
                                        Cancel
                                    </button>
                                    <!--onclick="onclick=window.location.href='p61.php'"-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!--
                <div class="modal-footer">                    
                </div>
                -->
            </div>
        </div>
    </div>
    

    <script type="text/javascript">
        function func_display() 
        {
            var x = document.getElementById("dtl_emp_list").value;
            console.log(x);
            var nLength = x.length;            
            var n1 = x.indexOf("/");            
            var str1 = x.substring(0, n1);            
            x = x.substring(n1+1, nLength);

            nLength = x.length;
            n1 = x.indexOf("/");
            var str2 = x.substring(0, n1);
            x = x.substring(n1+1, nLength);

            nLength = x.length;
            var str3 = x.substring(0, nLength);

            document.getElementById("var1").innerHTML = str1;
            document.getElementById("var2").innerHTML = str2;
            document.getElementById("var3").innerHTML = str3;
        }

        function confirmDelete(strUrl) 
        { 
            question = confirm("Do you want to delete this data [Y/N]?") 
            if (question !="0")
            { 
                top.location = strUrl 
            } 
        }


        function showModalEdit(argument1,argument2,argument3,argument4,argument5,argument6)
        {
            // alert('function showModalEdit');
            var A =argument1;
            var B =argument2;
            var C =argument3;
            var D =argument4;
            var E =argument5;
            var F =argument6;

            // set value to modal
            $('#paramu_emp_code').val(A);
            $('#edit_emp_code').val(A);
            $('#edit_emp_fname').val(B);
            $('#edit_emp_lname').val(C);
            $('#edit_emp_email').val(D);
            $('#edit_emp_user_type').val(E);
            $('#edit_emp_file_name').val(F);
            
            // show modal
            $('#edit_record_modal').modal('show');
            //document.getElementById("edit_Fname").innerHTML = A;
        }


        function showModalDelete(argument1,argument2,argument3,argument4,argument5,argument6)
        {
             // alert('function showModalEdit');
            var A =argument1;
            var B =argument2;
            var C =argument3;
            var D =argument4;
            var E =argument5;
            var F =argument6;

            // set value to modal
            $('#paramd_emp_code').val(A);
            $('#delete_emp_code').val(A);
            $('#delete_emp_fname').val(B);
            $('#delete_emp_lname').val(C);
            $('#delete_emp_email').val(D);
            $('#delete_emp_user_type').val(E);
            $('#delete_emp_file_name').val(F);
            
            // show modal
            $('#delete_record_modal').modal('show');
            //document.getElementById("edit_Fname").innerHTML = A;
        }

        //------------------------------------
        // javascript for bootstrap-inputtype
        //------------------------------------
        $(document).on('click', '#close-preview', function(){ 
            $('.image-preview').popover('hide');
            // Hover befor close the preview
            $('.image-preview').hover(
                function () {
                $('.image-preview').popover('show');
                }, 
                function () {
                $('.image-preview').popover('hide');
                }
            );    
        });

        $(function() {
            // Create the close button
            var closebtn = $('<button/>', {
                type:"button",
                text: 'x',
                id: 'close-preview',
                style: 'font-size: initial;',
            });
            closebtn.attr("class","close pull-right");
            // Set the popover default content
            $('.image-preview').popover({
                trigger:'manual',
                html:true,
                title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
                content: "There's no image",
                placement:'bottom'
            });
            // Clear event
            $('.image-preview-clear').click(function(){
                $('.image-preview').attr("data-content","").popover('hide');
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $('.image-preview-input input:file').val("");
                $(".image-preview-input-title").text("Browse"); 
            }); 
            // Create the preview image
            $(".image-preview-input input:file").change(function (){     
                var img = $('<img/>', {
                    id: 'dynamic',
                    width:200,
                    height:160
                });      
                var file = this.files[0];
                var reader = new FileReader();
                // Set preview image into the popover data-content
                reader.onload = function (e) {
                    $(".image-preview-input-title").text("Change");
                    $(".image-preview-clear").show();
                    $(".image-preview-filename").val(file.name);            
                    img.attr('src', e.target.result);
                    $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
                }        
                reader.readAsDataURL(file);
            });  
        });

    </script>
</body>

</html>