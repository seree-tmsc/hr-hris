<script type="text/javascript">
    function showModalUpdate_emp_master(argument1,argument2,argument3,argument4,argument5,argument6,
    argument7,argument8,argument9,argument10,argument11,argument12,argument13,argument14,
    argument15,argument16,argument17,argument18,argument19,argument20,argument21,argument22,
    argument23,argument24,argument25,argument26,argument27,argument28,argument29,argument30,
    argument31,argument32,argument33,argument34,argument35,argument36,argument37,argument38,
    argument39,argument40,argument41,argument42,argument43,argument44,argument45,argument46)
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

        $('#update_emp_emergency_mobile_no').val(argument12);
        $('#update_emp_religion').val(argument13);
        $('#update_emp_current_status').val(argument14);
        $('#update_emp_blood_type').val(argument15);

        //alert(argument16);
        //var cName = argument16.substr(argument16.length-10,10);
        //alert(cName);

        $('#update_emp_picture').val(argument16);
        $('#paramupdate_emp_picture').attr('src',argument16);

        //$('#update_emp_picture').attr('src',argument16);
        //$('#paramupdate_emp_picture').val(cName);

        $('#update_job_business').val(argument17);
        $('#update_job_department').val(argument18);

        $('#update_job_section').val(argument19);
        $('#update_job_task').val(argument20);

        $('#update_job_location').val(argument21);
        $('#update_job_grade').val(argument22);
        $('#update_job_position').val(argument23);
        $('#update_job_working_date').val(argument24);

        $('#update_addr_no').val(argument25);
        $('#update_addr_moo').val(argument26);
        $('#update_addr_road').val(argument27);
        $('#update_addr_area').val(argument28);
        $('#update_addr_district').val(argument29);
        $('#update_addr_province').val(argument30);
        $('#update_addr_postal_code').val(argument31);

        $('#update_edu_level1').val(argument32);
        $('#update_edu_detail1').val(argument33);
        $('#update_edu_institute1').val(argument34);
        $('#update_edu_faculty1').val(argument35);
        $('#update_edu_major1').val(argument36);
        $('#update_edu_grade1').val(argument37);
        $('#update_edu_graduated_year1').val(argument38);

        $('#update_edu_level2').val(argument39);
        $('#update_edu_detail2').val(argument40);
        $('#update_edu_institute2').val(argument41);
        $('#update_edu_faculty2').val(argument43);
        $('#update_edu_major2').val(argument44);
        $('#update_edu_grade2').val(argument45);
        $('#update_edu_graduated_year2').val(argument46);
        
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
        $('#delete_job_location').val(argument15);
        $('#delete_job_grade').val(argument16);
        $('#delete_job_position').val(argument17);
        $('#delete_job_working_date').val(argument18);

        // show modal
        $('#delete_record_modal').modal('show');
        //document.getElementById("edit_Fname").innerHTML = A;
    }
</script>


<script type="text/javascript">
    function showModalUpdate_admin_p32_trainingrecord(argument1,argument2,argument3,argument4,argument5,argument6,
    argument7,argument8,argument9,argument10,argument11,argument12,argument13,argument14,
    argument15,argument16,argument17,argument18,argument19,argument20,argument21,argument22,
    argument23,argument24,argument25,argument26,argument27)
    {        
        $('#paramupdate_emp_code').val(argument1);
        $('#update_emp_code').val(argument1);
        $('#update_name_surname').val(argument2);
        $('#update_title').val(argument3);
        $('#update_nameth').val(argument4);
        $('#update_surnameth').val(argument5);
        $('#update_firstnameeng').val(argument6);
        $('#update_lastnameeng').val(argument7);
        $('#update_business').val(argument8);
        $('#update_dept').val(argument9);
        $('#update_section').val(argument10);
        $('#update_jobtask').val(argument11);

        $('#update_position').val(argument12);
        $('#update_site').val(argument13);
        $('#update_joindate').val(argument14);
        $('#update_status').val(argument15);
        $('#update_startdate').val(argument16);
      
        $('#update_enddate').val(argument17);
        $('#update_time').val(argument18);

        $('#update_duration').val(argument19);
        $('#update_module').val(argument20);

        $('#update_codecourse').val(argument21);
        $('#update_coursename').val(argument22);
        $('#update_institute').val(argument23);
        $('#update_location').val(argument24);

        $('#update_typecourse').val(argument25);
        $('#update_year').val(argument26);
        $('#update_cost').val(argument27);
        
        // show modal
        $('#update_record_modal').modal('show');
        //document.getElementById("edit_Fname").innerHTML = A;
    }

    function showModalDelete_admin_p32_trainingrecord(argument1,argument2,argument3,argument4,argument5,argument6,
    argument7,argument8,argument9,argument10,argument11,argument12,argument13,argument14,
    argument15,argument16,argument17,argument18,argument19,argument20,argument21,argument22,argument23,argument24
    ,argument25,argument26,argument27)
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
        $('#delete_name_surname').val(argument2);
        $('#delete_title').val(argument3);
        $('#delete_nameth').val(argument4);
        $('#delete_surnameth').val(argument5);
        $('#delete_firstname_eng').val(argument6);
        $('#delete_lastname_eng').val(argument7);
        $('#delete_business').val(argument8);
        $('#delete_dept').val(argument9);
        $('#delete_section').val(argument10);
        $('#delete_jobtask').val(argument11);

        $('#delete_position').attr('src',argument12);

        $('#delete_site').val(argument13);
        $('#delete_joindate').val(argument14);
        $('#delete_status').val(argument15);
        $('#delete_startdate').val(argument16);
        $('#delete_enddate').val(argument17);
        $('#delete_time').val(argument18);
        $('#delete_duration').val(argument19);
        $('#delete_module').val(argument20);
        $('#delete_code_course').val(argument21);
        $('#delete_course_name').val(argument22);
        $('#delete_institute').val(argument23);
        $('#delete_location').val(argument24);
        $('#delete_typecourse').val(argument25);
        $('#delete_year').val(argument26);
        $('#delete_cost').val(argument27);

        // show modal
        $('#delete_record_modal').modal('show');
        //document.getElementById("edit_Fname").innerHTML = A;
    }
</script>



<script type="text/javascript">
    function showModalUpdate_admin_p31_trainingroadmap(argument1,argument2,argument3,argument4,argument5,argument6,
    argument7,argument8,argument9,argument10,argument11,argument12,argument13)
    {        
        $('#paramupdate_biz').val(argument1);
        $('#update_dep').val(argument2);
        $('#update_sec').val(argument3);
        $('#update_task').val(argument4);
        $('#update_module').val(argument5);
        $('#update_codecourse').val(argument6);
        $('#update_coursecontent').val(argument7);
        $('#update_coursename').val(argument8);
        $('#update_position').val(argument9);
        $('#update_JG').val(argument10);
        $('#update_type').val(argument11);
        $('#update_instructor').val(argument12);
        $('#update_statustraining').val(argument13);
        
        // show modal
        $('#update_record_modal').modal('show');
        //document.getElementById("edit_Fname").innerHTML = A;
    }

    function showModalDelete_admin_p31_trainingroadmap(argument1,argument2,argument3,argument4,argument5,argument6,
    argument7,argument8,argument9,argument10,argument11,argument12,argument13)
    {
        // alert('function showModalEdit');
        /*
        var A =argument1;
        var B =argument2;
        var C =argument3;
        var D =argument4;
        */

        // set value to modal            
        $('#delete_biz').val(argument1);
        $('#delete_dep').val(argument2);
        $('#delete_sec').val(argument3);
        $('#delete_task').val(argument4);
        $('#delete_module').val(argument5);
        $('#delete_codecourse').val(argument6);
        $('#delete_coursecontent').val(argument7);
        $('#delete_coursename').val(argument8);
        $('#delete_position').val(argument9);
        $('#delete_JG').val(argument10);
        $('#delete_type').val(argument11);
        $('#delete_instructor').attr(argument12);
        $('#delete_statustraining').val(argument13);

        // show modal
        $('#delete_record_modal1').modal('show');
        //document.getElementById("edit_Fname").innerHTML = A;
    }
</script>