<script type="text/javascript">
    function showModalUpdate_Welfair(argument1,argument2,argument3,argument4,argument5,argument6,argument7,argument8,argument9,argument10)
    {
        $('#paramupdate_auto_no').val(argument1);        
        $('#update_ent_date').val(argument2);
        $('#update_wd_date').val(argument3);        
        $('#update_emp_code').val(argument4);
        $('#update_emp_fname').val(argument5);
        $('#update_emp_lname').val(argument6);
        $('#update_line_item').val(argument7);
        $('#update_detail_item').val(argument8);
        $('#update_amount').val(argument9);
        $('#update_attachment').val(argument10);

        // show modal
        $('#update_record_modal').modal('show');
        //document.getElementById("edit_Fname").innerHTML = A;
    }

    function showModalDelete_Welfair(argument1,argument2,argument3,argument4,argument5,argument6,argument7,argument8,argument9,argument10)
    {        
        $('#paramdelete_auto_no').val(argument1);        
        $('#delete_ent_date').val(argument2);
        $('#delete_wd_date').val(argument3);        
        $('#delete_emp_code').val(argument4);
        $('#delete_emp_fname').val(argument5);
        $('#delete_emp_lname').val(argument6);
        $('#delete_line_item').val(argument7);
        $('#delete_detail_item').val(argument8);
        $('#delete_amount').val(argument9);
        $('#delete_attachment').val(argument10);
                
        // show modal
        $('#delete_record_modal').modal('show');
        //document.getElementById("edit_Fname").innerHTML = A;
    }
</script>