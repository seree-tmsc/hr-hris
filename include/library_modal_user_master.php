
<script type="text/javascript">
    function showModalUpdate_User_Master(argument1,argument2,argument3,argument4,argument5,argument6)
    {
        $('#paramupdate_emp_code').val(argument1);
        $('#update_emp_code').val(argument1);
        $('#update_emp_tfname').val(argument2);
        $('#update_emp_tlname').val(argument3);
        $('#update_user_email').val(argument4);
        $('#update_user_type').val(argument5);
        $('#update_user_create_date').val(argument6);

        // show modal
        $('#update_record_modal').modal('show');
        //document.getElementById("edit_Fname").innerHTML = A;
    }

    function showModalDelete_User_Master(argument1,argument2,argument3,argument4,argument5,argument6)
    {
        $('#paramdelete_emp_code').val(argument1);
        $('#delete_emp_code').val(argument1);
        $('#delete_emp_tfname').val(argument2);
        $('#delete_emp_tlname').val(argument3);
        $('#delete_user_email').val(argument4);
        $('#delete_user_type').val(argument5);
        $('#delete_user_create_date').val(argument6);
                
        // show modal
        $('#delete_record_modal').modal('show');
        //document.getElementById("edit_Fname").innerHTML = A;
    }
</script>