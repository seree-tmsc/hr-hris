<?php    
    try    
    {
        require_once("include/library.php");
?>              
        <div class='table-responsive'>
            <table class='table table-bordered table-hover' id='myTable'>            
                <thead>               
                    <tr class='info'>                
                        <th class='text-center'>Col-1</th>
                        <th class='text-center'>Col-2</th>
                        <th class='text-center'>Col-3</th>
                        <!--
                        <th class='text-center'>Col-4</th>
                        <th class='text-center'>Col-5</th>
                        <th class='text-center'>Col-6</th>
                        <th class='text-center'>Col-7</th>
                        <th class='text-center'>Col-8</th>
                        <th class='text-center'>Col-9</th>
                        -->
                    </tr>
                </thead>
                <tbody>
<?php
        include('include/db_Conn.php');
        $strSql = "select * ";
        $strSql .= "from MAS_Training_Roadmap R ";
        $strSql .= "join  MAS_Training_Course C ON C.Course_Code=R.Code_Course ";
        //$strSql .= "where R.job_business='BIZ' and R.job_department='IT' and jg='11' and R.Section='ERP' ";
        $strSql .= "where R.job_business='BIZ' and R.job_department='IT' and jg='13' ";
        $strSql .= "order by R.Section, R.Task, R.JG, R.Code_Course ";

        $statement = $conn->prepare( $strSql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
        $statement->execute();  
        $nRecCount = $statement->rowCount();
       
        if ($nRecCount >0)
        {
            while ($ds = $statement->fetch(PDO::FETCH_NUM))
            {
?> 
                <tr>
                    <!--
                    <td><?php //echo $ds[0]; ?></td>
                    <td><?php //echo $ds[1]; ?></td>
                    <td><?php //echo $ds[2]; ?></td>
                    <td><?php //echo $ds[3]; ?></td>
                    <td><?php //echo $ds[4]; ?></td>
                    <td><?php //echo $ds[5]; ?></td>
                    -->                 
                    <td><?php echo $ds[6]; ?></td>
                    <td><?php echo $ds[7]; ?></td>
                    <td align='center'><?php 
                            $strSql1 = "select * ";
                            $strSql1 .= "from MAS_Training_Record R ";
                            $strSql1 .= "join  MAS_Training_Course C ON C.Course_Code=R.Code_Course ";
                            //$strSql1 .= "where R.Emp_ID='oc-011' and Code_Course='" . $ds[6] . "' ";
                            $strSql1 .= "where R.Emp_ID='oc-002' and Code_Course='" . $ds[6] . "' ";
                            $strSql1 .= "order by C.Module_Code, C.Course_Code ";

                            $statement1 = $conn->prepare($strSql1, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                            $statement1->execute();  
                            $nRecCount1 = $statement1->rowCount();

                            if ($nRecCount1 > 0 && $nRecCount1 == 1)
                            {
                                //echo "<span style='color:red;' class='fa fa-check fa-lg'></span>";
                                echo "<button class='btn btn-default' disabled>";
                                echo "<span style='color:red;' class='fa fa-check fa-lg'></span>";
                                echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                                echo "</button>";
                            }
                            else 
                            {
                                //echo "<span class='fa fa-pencil-square-o fa-lg'></span>";
                                echo "<button class='btn btn-success' data-toggle='modal' data-target='#add_new_record_modal'>";
                                echo "<span class='glyphicon glyphicon-plus'></span>";
                                echo "&nbsp Add ";
                                echo "</button>";
                            }                            
                        ?>
                    </td>

                </tr>
<?php
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        }
        else
        {
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "No data";
        }
?>
        <!-- Bootstrap Modals -->
        <!-- Modal - Add New Record -->    
        <div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title">เพิ่มข้อมูล :</h3>
                    </div>
        
                    <form class="form-horizontal" role="form" action="_test01_add.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-lg-2">
                                    <label>ข้อมูลส่วนบุคคล : *</label>
                                    <input type="text" required placeholder ="รหัสพนักงาน" class="form-control" name="add_emp_code" >
                                </div>
                                <div class="col-lg-2">  
                                    <label>&nbsp;</label>                
                                    <select required class="form-control" name="add_emp_ttitle">
                                        <option value="นาย">นาย</option>
                                        <option value="นางสาว">นางสาว</option>
                                        <option value="นาง">นาง</option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label>&nbsp;</label>
                                    <input type="text" required placeholder ="ชื่อ" class="form-control" name="add_emp_tfname" >
                                </div>
                                <div class="col-lg-2">
                                    <label>&nbsp;</label>
                                    <input type="text" required placeholder ="นามสกุล" class="form-control" name="add_emp_tlname" >
                                </div>
                                <div class="col-lg-4">
                                    <label>&nbsp;</label>                                    
                                </div>                           
                            </div>                                                        
                            <br>
                            
                            <div class="form-group">
                                <div class="col-lg-2">
                                    <label>ข้อมูลหน่วยงาน : *</label>
                                    <select required class="form-control" name="add_job_business">
                                        <option value="-">-</option>
                                        <option value="IR">1.IR</option>
                                        <option value="UU">2.UU</option>
                                        <option value="TECH">3.TECH</option>
                                        <option value="SCM">4.SCM</option>
                                        <option value="BIZ">5.BIZ</option>
                                        <option value="MGT">6.MGT</option>
                                    </select>                                        
                                </div>
                                <div class="col-lg-2">
                                    <label>&nbsp;</label>
                                    <select required class="form-control" name="add_job_department">
                                        <option value="-">-</option>
                                        <option value="RD">R&D</option>
                                        <option value="SALES">SAL</option>
                                        <option value="ENG">ENG</option>
                                        <option value="PRO">PRO</option>
                                        <option value="PD-PLAN">PD-PLAN</option>
                                        <option value="PUR">PUR</option>
                                        <option value="WH">WH</option>
                                        <option value="ACC">ACC</option>
                                        <option value="HR">HR</option>
                                        <option value="IT">IT</option>
                                        <option value="MCI">MCI</option>
                                        <option value="MGT">MGT</option>
                                        <option value="SHEQ">SHE&Q</option>
                                    </select>                                        
                                </div>
                                <div class="col-lg-3">
                                    <label>&nbsp;</label>
                                    <input type="text" required placeholder ="ตำแหน่ง" class="form-control" name="add_job_position" >
                                </div>
                                <div class="col-lg-2">
                                    <label>&nbsp;</label>                            
                                    <select required class="form-control" name="add_job_grade">
                                        <option value="-">-</option>
                                        <option value="JG7">JG 7</option>
                                        <option value="JG8">JG 8</option>
                                        <option value="JG9">JG 9</option>
                                        <option value="JG10">JG 10</option>
                                        <option value="JG11">JG 11</option>
                                        <option value="JG12">JG 12</option>
                                        <option value="JG13">JG 13</option>
                                        <option value="JG14">JG 14</option>
                                        <option value="JG15">JG 15</option>
                                        <option value="JG16">JG 16</option>                                
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label>&nbsp;</label>
                                    <input type="date" required placeholder ="วันที่เริ่มงาน" class="form-control">
                                </div>
                                <br>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label>Upload File :</label>
                                    <input type="file" placeholder ="๊Select File" class="form-control">
                                </div>                                
                            </div>
                            <br>

                            <div class="form-group">
                                <div class="col-lg-2">  
                                    <label> การศึกษา :</label>                               
                                    <select  placeholder ="Title" class="form-control" name="add_edu_level1">
                                        <option value="-">-</option>
                                        <option value="PHD">ป.เอก</option>
                                        <option value="MS">ป.โท</option>
                                        <option value="BC">ป.ตรี</option>
                                        <option value="H">ปวส.</option>
                                        <option value="L">ปวช.</option>
                                        <option value="M">มัธยมศึกษา</option>
                                        <option value="P">ประถมศึกษา</option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label>&nbsp;</label>
                                    <input type="text"  placeholder ="วุฒิการศึกษา" class="form-control" name="add_edu_detail1" >
                                </div>
                                <div class="col-lg-3">
                                    <label>&nbsp;</label>
                                    <input type="text"  placeholder ="สถาบัน" class="form-control" name="add_edu_institute1" >
                                </div>
                                <div class="col-lg-3">
                                    <label>&nbsp;</label>
                                    <input type="text"  placeholder ="คณะ" class="form-control" name="add_edu_faculty1" >
                                </div>
                                <div class="col-lg-2">
                                    <label>&nbsp;</label>
                                    <input type="text"  placeholder ="สาขา/วิชาเอก" class="form-control" name="add_edu_major1" >
                                </div>
                            </div>                            
                        </div>
        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>    