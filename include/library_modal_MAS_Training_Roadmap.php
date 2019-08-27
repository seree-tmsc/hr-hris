<script type="text/javascript">
    function showModalUpdate(argument1,argument2,argument3,argument4,argument5,argument6,argument7,argument8,argument9,argument10,argument11,argument12)
    {
        $('#update_BIZ').val(argument1);
        $('#update_DEP').val(argument2);
        $('#update_SEC').val(argument3);
        $('#update_Task').val(argument4);
        $('#update_Module').val(argument5);
        $('#update_CodeCourse').val(argument6);
        $('#update_CourseContent').val(argument7);
        $('#update_CourseName').val(argument8);
        $('#update_Position').val(argument9);
        $('#update_JG').val(argument10);
        $('#update_Type').val(argument11);
        $('#update_Instructor').val(argument12);
        // show modal
        $('#update_record_modal').modal('show');        
    }

    function showModalDelete(argument1,argument2,argument3,argument4,argument5,argument6,argument7,argument8,argument9,argument10,argument11,argument12)
    {
        $('#delete_BIZ').val(argument1);
        $('#delete_DEP').val(argument2);
        $('#delete_sec').val(argument3);
        $('#delete_TASK').val(argument4);
        $('#delete_Module').val(argument5);
        $('#delete_codecourse').val(argument6);
        $('#delete_CourseContent').val(argument7);
        $('#delete_CourseName').val(argument8);
        $('#delete_Position').val(argument9);
        $('#delete_JG').val(argument10);
        $('#delete_Type').val(argument11);
        $('#delete_Instructor').val(argument12);
        // show modal
        $('#delete_record_modal').modal('show');        
    }
</script>