<script type="text/javascript">
    function showModalUpdate(argument1,argument2,argument3,argument4,argument5,argument6)
    {
        $('#update_BIZ').val(argument1);
        $('#update_DEP').val(argument2);
        $('#update_SEC').val(argument3);
        $('#update_Task').val(argument4);
        $('#update_Position').val(argument5);
        $('#update_TrainingSET').val(argument6);
        // show modal
        $('#update_record_modal').modal('show');        
    }

    function showModalDelete(argument1,argument2,argument3,argument4,argument5,argument6)
    {
        $('#delete_BIZ').val(argument1);
        $('#delete_DEP').val(argument2);
        $('#delete_SEC').val(argument3);
        $('#delete_TASK').val(argument4);
        $('#delete_Position').val(argument5);
        $('#delete_TrainingSET').val(argument6);
        // show modal
        $('#delete_record_modal').modal('show');        
    }
</script>