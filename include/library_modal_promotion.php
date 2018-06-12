
<script type="text/javascript">
    function showModalAdd()
    {
        // show modal
        $('#add_new_record_modal').modal('show');
    }

    function showModalUpdate(argument1,argument2,argument3,argument4,argument5,argument6,argument7,argument8,argument9,argument10)
    {
        $('#paramupdate_emp_code').val(argument1);
        $('#update_emp_code').val(argument1);
        $('#update_emp_tfname').val(argument2);
        $('#update_emp_tlname').val(argument3);
        $('#update_promotion_year').val(argument4);
        $('#update_promotion_from_jg').val(argument5);
        $('#update_promotion_from_pos').val(argument6);        
        $('#update_promotion_from_dep').val(argument7);
        $('#update_promotion_to_jg').val(argument8);
        $('#update_promotion_to_pos').val(argument9);
        $('#update_promotion_to_dep').val(argument10);

        // show modal
        $('#update_record_modal').modal('show');        
    }

    function showModalDelete(argument1,argument2,argument3,argument4,argument5,argument6,argument7,argument8,argument9,argument10)
    {                
        $('#paramdelete_emp_code').val(argument1);
        $('#delete_emp_code').val(argument1);
        $('#delete_emp_tfname').val(argument2);
        $('#delete_emp_tlname').val(argument3);
        $('#delete_promotion_year').val(argument4);
        $('#delete_promotion_from_jg').val(argument5);
        $('#delete_promotion_from_pos').val(argument6);        
        $('#delete_promotion_from_dep').val(argument7);
        $('#delete_promotion_to_jg').val(argument8);
        $('#delete_promotion_to_pos').val(argument9);
        $('#delete_promotion_to_dep').val(argument10);
     
        // show modal
        $('#delete_record_modal').modal('show');        
    }
</script>