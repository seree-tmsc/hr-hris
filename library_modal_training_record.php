<script type="text/javascript">
    function showModalUpdate_training_record(argument1,argument2,argument3,argument4,argument5,argument6,
    argument7,argument8,argument9,argument10,argument11,argument12,argument13,argument14,
    argument15,argument16,argument17,argument18,argument19,argument20,argument21,argument22,
    argument23,argument24,argument25,argument26,argument27,argument28,argument29,argument30,
    argument31,argument32,argument33,argument34,argument35,argument36,argument37,argument38)
    {
        $('#paramupdate_emp_code').val(argument1);
        $('#update_Emp_ID').val(argument1);
        $('#update_Name_Surname').val(argument2);
        $('#update_Dept').val(argument3);
        $('#update_Position').val(argument4);
        $('#update_Site').val(argument5);
        $('#update_Join_Date').val(argument6);
        $('#update_Status').val(argument7);
        
        // show modal
        $('#update_record_modal').modal('show');
        //document.getElementById("edit_Fname").innerHTML = A;
    }

    function showModalDelete_training_record(argument1,argument2,argument3,argument4,argument5,argument6,
    argument7,argument8,argument9,argument10,argument11,argument12,argument13,argument14,
    argument15,argument16,argument17,argument18)
    {
        // alert('function showModalEdit');
        /*
        var A =argument1;
        var B =argument2;
        var C =argument3;
        var D =argument4;
        */

        // set value to modal            
        $('#delete_Emp_ID').val(argument1);
        $('#delete_Name_Surname').val(argument2);
        $('#delete_Dept').val(argument3);
        $('#delete_Position').val(argument4);
        $('#delete_Site').val(argument5);
        $('#delete_Join_Date').val(argument6);
        $('#delete_Status').val(argument7);
        
        // show modal
        $('#delete_record_modal').modal('show');
        //document.getElementById("edit_Fname").innerHTML = A;
    }
</script>