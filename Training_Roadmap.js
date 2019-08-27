function showModal_for_Update(argument1,argument2,argument3,argument4,argument5,
    argument6,argument7,argument8,argument9,argument10,argument11,argument12,argument13,argument14,argument15,argument16)
{      
    //alert("You Click detail button");
    $('#paramupdate_emp_code').val(argument1);
    $('#update_emp_code').val(argument1);
    $('#update_emp_name').val(argument2);
    $('#update_training_set').val(argument3);
    $('#update_module').val(argument4);
    $('#paramupdate_course_code').val(argument5);
    $('#update_course_code').val(argument5);
    $('#update_course_name').val(argument6);
    
    $('#update_start_date').val(argument7);
    $('#update_end_date').val(argument8);
    $('#update_training_day').val(argument9);
    $('#update_institute').val(argument10);
    $('#update_location').val(argument11);
    
    $('#update_site').val(argument12);
    $('#update_status').val(argument13);
    $('#update_Type_course').val(argument14);
    $('#update_year').val(argument15);
    $('#update_cost').val(argument16);

    // show modal
    $('#modal_for_update').modal('show');    
}

function test(param1)
{
    alert(param1);
}