
<script type="text/javascript">
    function showModalUpdate(argument1,argument2,argument3,argument4,argument5,argument6,argument7,argument8)
    {
        $('#paramupdate_emp_code').val(argument1);
        $('#update_emp_code').val(argument1);
        $('#update_emp_tfname').val(argument2);
        $('#update_emp_tlname').val(argument3);
        $('#update_performance_year').val(argument4);
        $('#update_performance_kpi').val(argument5);
        $('#update_performance_com').val(argument6);        
        $('#update_performance_tot').val(argument7);
        /*-- send value for tag <p> --*/
        document.getElementById("updateTotal").innerHTML = argument7;
        $('#update_performance_grade').val(argument8); 
        /*-- send value for tag <p> --*/
        document.getElementById("updateGrade").innerHTML = argument8;

        // show modal
        $('#update_record_modal').modal('show');        
    }

    function showModalDelete(argument1,argument2,argument3,argument4,argument5,argument6,argument7,argument8)
    {
        $('#paramdelete_emp_code').val(argument1);
        $('#delete_emp_code').val(argument1);
        $('#delete_emp_tfname').val(argument2);
        $('#delete_emp_tlname').val(argument3);
        $('#delete_performance_year').val(argument4);
        $('#delete_performance_kpi').val(argument5);
        $('#delete_performance_com').val(argument6);
        /*-- send value for tag <p> --*/
        document.getElementById("deleteTotal").innerHTML = argument7;
        /*-- send value for tag <p> --*/
        document.getElementById("deleteGrade").innerHTML = argument8;
                
        // show modal
        $('#delete_record_modal').modal('show');        
    }
</script>