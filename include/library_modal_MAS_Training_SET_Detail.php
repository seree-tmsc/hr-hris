<script type="text/javascript">
    function showModalUpdate(argument1,argument2,argument3,argument4)
    {
        $('#update_TrainSet').val(argument1);
        $('#update_CodeCourse').val(argument2);
        $('#update_Skill').val(argument3);
        $('#update_CourseName').val(argument4);
        // show modal
        $('#update_record_modal').modal('show');        
    }

    function showModalDelete(argument1,argument2,argument3,argument4)
    {
        $('#paramdelete_TrainSET').val(argument1);
        $('#delete_CodeCourse').val(argument2);
        $('#delete_Skill').val(argument3);
        $('#delete_CourseName').val(argument4);
        // show modal
        $('#delete_record_modal').modal('show');        
    }
</script>