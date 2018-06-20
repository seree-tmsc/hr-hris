<script type="text/javascript">
    function showModalUpdate_emp_master(argument1,argument2,argument3,argument4,argument5,argument6,
    argument7,argument8,argument9,argument10,argument11,argument12,argument13,argument14,
    argument15,argument16,argument17,argument18,argument19,argument20,argument21,argument22,
    argument23,argument24,argument25,argument26,argument27,argument28,argument29,argument30,
    argument31,argument32,argument33,argument34,argument35,argument36,argument37,argument38)
    {
        $('#paramupdate_emp_code').val(argument1);
        $('#update_emp_code').val(argument1);
        $('#update_emp_ttitle').val(argument2);
        $('#update_emp_tfname').val(argument3);
        $('#update_emp_tlname').val(argument4);
        $('#update_emp_etitle').val(argument5);
        $('#update_emp_efname').val(argument6);
        $('#update_emp_elname').val(argument7);
        $('#update_emp_nname').val(argument8);
        $('#update_emp_id_no').val(argument9);
        $('#update_emp_birth_date').val(argument10);
        $('#update_emp_mobile_no').val(argument11);

        $('#update_emp_picture').attr('src',argument12);
        $('#paramupdate_emp_picture').attr('src',argument12);

        $('#update_job_business').val(argument13);
        $('#update_job_department').val(argument14);
        $('#update_job_location').val(argument15);
        $('#update_job_grade').val(argument16);
        $('#update_job_position').val(argument17);
        $('#update_job_working_date').val(argument18);

        $('#update_addr_no').val(argument19);
        $('#update_addr_road').val(argument20);
        $('#update_addr_area').val(argument21);
        $('#update_addr_district').val(argument22);
        $('#update_addr_province').val(argument23);
        $('#update_addr_postal_code').val(argument24);

        $('#update_edu_level1').val(argument25);
        $('#update_edu_detail1').val(argument26);
        $('#update_edu_institute1').val(argument27);
        $('#update_edu_faculty1').val(argument28);
        $('#update_edu_major1').val(argument29);
        $('#update_edu_grade1').val(argument30);
        $('#update_edu_graduated_year1').val(argument31);

        $('#update_edu_level2').val(argument32);
        $('#update_edu_detail2').val(argument33);
        $('#update_edu_institute2').val(argument34);
        $('#update_edu_faculty2').val(argument35);
        $('#update_edu_major2').val(argument36);
        $('#update_edu_grade2').val(argument37);
        $('#update_edu_graduated_year2').val(argument38);
        
        // show modal
        $('#update_record_modal').modal('show');
        //document.getElementById("edit_Fname").innerHTML = A;
    }

    function showModalDelete_emp_master(argument1,argument2,argument3,argument4,argument5,argument6,
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
        $('#delete_emp_code').val(argument1);
        $('#delete_emp_ttitle').val(argument2);
        $('#delete_emp_tfname').val(argument3);
        $('#delete_emp_tlname').val(argument4);
        $('#delete_emp_etitle').val(argument5);
        $('#delete_emp_efname').val(argument6);
        $('#delete_emp_elname').val(argument7);
        $('#delete_emp_nname').val(argument8);
        $('#delete_emp_id_no').val(argument9);
        $('#delete_emp_birth_date').val(argument10);
        $('#delete_emp_mobile_no').val(argument11);

        $('#delete_emp_picture').attr('src',argument12);

        $('#delete_job_business').val(argument13);
        $('#delete_job_department').val(argument14);
        $('#delete_job_section').val(argument15);
        $('#delete_job_grade').val(argument16);
        $('#delete_job_position').val(argument17);
        $('#delete_job_working_date').val(argument18);

        // show modal
        $('#delete_record_modal').modal('show');
        //document.getElementById("edit_Fname").innerHTML = A;
    }
</script>