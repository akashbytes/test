<?php 

include 'header.php';



if (isset($_POST['email_btn'])) 
{
    $oemail=mysqli_real_escape_string($con,$_POST['oemail']);
    $nemail=mysqli_real_escape_string($con,$_POST['nemail']);
    $cemail=mysqli_real_escape_string($con,$_POST['cemail']);
    
    $data=mysqli_query($con,"SELECT * FROM `admin` WHERE `email`='$oemail'  AND `id`='1'   ");

    if (mysqli_num_rows($data)<=0) 
    {
        $error="Old email does not matched";
    }
    else
    {
        if ($nemail==$cemail) 
        {
            $qry="UPDATE `admin` SET `email`='$cemail' WHERE  `email`='$oemail'";
            if (mysqli_query($con,$qry)) 
            {
                $success="email Updated Success Fully";
            }
            else
            {
                $error="Something Went Wrong";
            }
        }
        else
        {
            $error="Confirm Email Does Not Matched";
        }
    }

}



if (isset($_POST['pass_btn'])) 
{
    $opass=mysqli_real_escape_string($con,$_POST['opass']);
    $npass=mysqli_real_escape_string($con,$_POST['npass']);
    $cpass=mysqli_real_escape_string($con,$_POST['cpass']);
    
    $data=mysqli_query($con,"SELECT * FROM `admin` WHERE `password`='$opass' AND `id`='1'  ");

    if (mysqli_num_rows($data)<=0) 
    {
        $error2="Old email does not matched";
    }
    else
    {
        if ($nemail==$cemail) 
        {
            $qry="UPDATE `admin` SET `password`='$cpass' WHERE  `id`='1'";
            if (mysqli_query($con,$qry)) 
            {
                $success2="Password Updated Success Fully";
            }
            else
            {
                $error2="Something Went Wrong";
            }
        }
        else
        {
            $error2="Confirm Password Does Not Matched";
        }
    }
}



?>
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Settings</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li ><a href="#" class="active">Settings</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Update Email</h3>
                            <p class="text-muted m-b-30 font-13">  </p>
                            <form class="form-horizontal" method="post">
                                <div class="form-group">
                                    <label class="col-md-12">Old Email <!-- <span class="help"> e.g. "George deo"</span> --></label>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="oemail" placeholder="Old Email"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">New Email <!-- <span class="help"> e.g. "George deo"</span> --></label>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="nemail"  placeholder="New Email"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Confirm Email <!-- <span class="help"> e.g. "George deo"</span> --></label>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="cemail"  placeholder="Confirm Email"> 
                                    </div>
                                </div>


                              <?php

                                if(isset($success))
                                {
                                    ?>
                                <div class="form-group">
                                    <label class="col-md-12"><!-- <span class="help"> e.g. "George deo"</span> --></label>
                                    <div class="col-md-12">
                                    <div class="alert alert-success"><?php  echo $success  ?></div>
                                    </div>
                                </div>

                                    <?php

                                }
                                if(isset($error))
                                {
                                    ?>
                                <div class="form-group">
                                    <label class="col-md-12"><!-- <span class="help"> e.g. "George deo"</span> --></label>
                                    <div class="col-md-12">
                                    <div class="alert alert-danger"><?php  echo $error  ?></div>
                                    </div>
                                </div>
                                    <?php
                                }
                                ?>



                                
                                <div class="form-group">
                                    <label class="col-sm-12"></label>
                                    <div class="col-sm-12">
                                        <input type="submit" class="btn  btn-success"  name="email_btn" value="Update Email"> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Update Password</h3>
                            <p class="text-muted m-b-30 font-13">  </p>
                            <form class="form-horizontal" method="post">
                                <div class="form-group">
                                    <label class="col-md-12">Old Password<!-- <span class="help"> e.g. "George deo"</span> --></label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control"  name="opass" placeholder="Old Password"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">New Password <!-- <span class="help"> e.g. "George deo"</span> --></label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="npass"  placeholder="New Password"> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Confirm Password <!-- <span class="help"> e.g. "George deo"</span> --></label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control"  name="cpass" placeholder="Confirm Password"> 
                                    </div>
                                </div>


                                <?php

                                if(isset($success2))
                                {
                                    ?>
                                <div class="form-group">
                                    <label class="col-md-12"><!-- <span class="help"> e.g. "George deo"</span> --></label>
                                    <div class="col-md-12">
                                    <div class="alert alert-success"><?php  echo $success2  ?></div>
                                    </div>
                                </div>

                                    <?php

                                }
                                if(isset($error2))
                                {
                                    ?>
                                <div class="form-group">
                                    <label class="col-md-12"><!-- <span class="help"> e.g. "George deo"</span> --></label>
                                    <div class="col-md-12">
                                    <div class="alert alert-danger"><?php  echo $error2  ?></div>
                                    </div>
                                </div>
                                    <?php
                                }
                                ?>


                                
                                <div class="form-group">
                                    <label class="col-sm-12"></label>
                                    <div class="col-sm-12">
                                        <input type="submit" class="btn  btn-success"  name="pass_btn" value="Update Password"> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
               
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray" class="yellow-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li><b>With Dark sidebar</b></li>
                                <br/>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray-dark" class="yellow-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme working">12</a></li>
                            </ul>
                            <ul class="m-t-20 all-demos">
                                <li><b>Choose other demos</b></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/john.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/pawandeep.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center">  Developed By WXIT Consultant Services PVT LTD </footer>

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/jasny-bootstrap.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>


<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/form-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Jan 2019 12:56:30 GMT -->
</html>
