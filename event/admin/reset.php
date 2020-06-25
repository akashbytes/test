<?php 



include_once 'config.php';


if ($_SESSION['admin_id']!="") 
{
    ?>
    <script type="text/javascript">
        window.location.href="dashboard.php";
    </script>
    <?php
}

$data=mysqli_query($con,"SELECT * FROM `admin` WHERE `id`='1' AND `code`='ok' ");

if (mysqli_num_rows($data)>0) 
{
    ?>
    <script type="text/javascript">
        window.location.href="index.php";
    </script>
    <?php

}

if (isset($reset_btn)) 
{
    $npass=mysqli_real_escape_string($con,$npass);
    $cpass=mysqli_real_escape_string($con,$cpass);

    if (strlen($npass)<8) 
    {
        $error="Password Length Must Be eight character ";
    }
    else if($npass!=$cpass)
    {
        $error="Confirm password does not matched";
    }
    else
    {
            $qry="UPDATE `admin` SET `password`='$npass',`code`='ok' WHERE `id`='1'";
            if (mysqli_query($con,$qry)) 
            {
                $success="Password Updated Successfully";
            }
            else
            {
                $error="Something went wrong";
            }
    }

   
}




 ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Jan 2019 12:58:01 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title> Event Admin Login</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
    <section id="wrapper" class="new-login-register"    style="background-image: url('back.jpg')!important;background-size: cover!important;"   >
        <div class="lg-info-panel">
            <div class="inner-panel">
                <a href="javascript:void(0)" class="p-20 di"></a>
                <div class="lg-content">
                    <h2></h2>
                </div>
            </div>
        </div>
        <div class="new-login-box">
            <div class="white-box">
                <h3 class="box-title m-b-0">Reset  Password<img src="om.png" style="height: 100px!important; float: right;"></h3> 
                <form class="form-horizontal new-lg-form" id="loginform" method="post" >
                    <div class="form-group">
                        <div class="col-xs-12">
                            <?php 
                                if (isset($error)) 
                                {
                                    ?>
                                        <div class="alert alert-danger"><?php echo $error ?></div>
                                    <?php    

                                }
                                if (isset($success)) 
                                {
                                    ?>
                                        <div class="alert alert-success"><?php echo $success ?></div>
                                    <?php    
                                }
                             ?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="Password" required="" name="npass" placeholder="New Password"> 
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="Password" required="" name="cpass" placeholder="confirm Password"> 
                        </div>
                    </div>


                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" name="reset_btn" type="submit">Reset </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
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
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>


<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Jan 2019 12:58:01 GMT -->
</html>