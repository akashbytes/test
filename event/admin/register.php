<?php include 'config.php';


if ($_SESSION['u_id']!="") 
{
    ?>
    <script type="text/javascript">
        window.location.href="dashboard.php";
    </script>
    <?php
}


if (isset($_POST['signup'])) 
{
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $pass=mysqli_real_escape_string($con,$_POST['pass']);
    $cpass=mysqli_real_escape_string($con,$_POST['cpass']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);


     $name_pattern='/^[a-zA-Z ]{2,30}$/';
     $email_pattern ='/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/';
     $phone_pattern = '/^[0-9]{1}[0-9]{6,11}$/'; 
    
    if(!preg_match($name_pattern,$name))
    {
        $error="First  Is Invalid";
    }
    elseif(!preg_match($phone_pattern,$phone))
    {
        $error="Phone No Is Invalid";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $error="Email Is Invalid";
    }
    elseif(strlen($pass)<10)
    {
        $error="Password Length Must Be Atleast Ten Characters ";
    }
    else if($pass!=$cpass)
    {
        $error="Confirm Password Do Not Matched";
    }
    else
    {
        
        $data=mysqli_query($con,"SELECT * FROM `users` WHERE `u_email`='$email'");
        
        if(mysqli_num_rows($data)<=0)
        {
        

        require_once 'mailer/class.phpmailer.php';
        require_once 'mailer/class.smtp.php';
        require_once 'mailer/PHPMailerAutoload.php';
        
       

        $code=random_string();
        $name=$name;
        $email=$email;
        $subject='Email Verfication';
        // $msg=$msg;
        $sender_email="user@wxit.in";
        $sender_name="WXIT";
        $mail = new PHPMailer();
        $mail->Host='wxit.in';
        $mail->isSMTP();
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPAuthSecure='tls';
        $mail->Username=$sender_email;
        $mail->Password="Anomla@123wx";
        $mail->setFrom($sender_email,$sender_name);//name is the top name from sender and email is the email To which The Mail will Be Send
        $mail->addAddress($email);  
        $mail->addReplyTo($sender_email,$name);
        $mail->isHTML(true);
        $mail->Subject=$subject;
        // $code=rand(9999,999999);
        $mail->Body='<!DOCTYPE html>
        <html>
        <head>
          <title></title>
        </head>
        <body>
        <div style="background:#ebeced">
          <div style="background:#ebeced;padding:10px">
            <div style="background:#ffffff;width:80%;margin:auto">
              <div style="font-family:Lato,sans-serif;color:#212e43;font-size:18px;font-weight:bold;text-align:center;padding:10px">Hi &nbsp;&nbsp;
              '.$name.',
            </div>
            <hr style="border:1px solid #ebeced;width:500px">
            <div style="text-align:center;color:#212e43;font-family:Lato,sans-serif;font-size:16px;font-weight:400;padding:20px;line-height:1.8">
                Welcome to Wxit!<br><a href="http://localhost/attendence/project/index.php?code='.$code.'">Click to verifiying your email ID  </a>
            </div>
            <div style="text-align:center;font-family:Lato,sans-serif;color:#212e43;font-size:16px;font-weight:400;padding:20px;line-height:1.8">
                For any help or assistance, reach out to us anytime at <a href="mailto:user@wxit.in" target="_blank">user@wxit.in</a>
            </div>
            <hr style="border:1px solid #ebeced;width:600px">
            <div style="text-align:center;font-family:Lato,sans-serif;font-size:16px;font-weight:500;font-style:italic;color:#a9a9a9;line-height:1.8">
              Kind Regards,<br>
              <div style="text-align:center;font-family:Lato,sans-serif;color:#212e43;font-size:16px;font-weight:bolder">
                Wxit</div>
            </div>
          </div>
          <div style="font-family:Lato;text-align:center;color:#212e43;padding:16px;font-family:Lato;font-size:12px;margin:auto">
            For any queries, please call
            <span style="font-family:Lato;font-size:14px;font-style:italic;color:#61cdcd;font-weight:600">
              +91 XXXXXXXXXX</span><br><br>
          </div></div><div class="adL">
          </div></div><div class="adL">
        </div></div>
        </body>
        </html>';
        if (!$mail->send()) 
        {
            $error="Something Went Wrong";
            # code...
        }
        else
        {
            // $qry="INSERT INTO `admin`(`id`, `type`, `username`, `password`, `email`,`cphone`,`verified`, `code`, `status`) VALUES (NULL,'vender','$name','$pass','$email','$phone','0','$code','0')";
            $qry="INSERT INTO `users`(`u_id`, `u_name`, `u_email`, `u_phone`, `u_status`, `u_pass`,`u_code`) VALUES (NULL,'$name','$email','$phone','1','$pass','$code')";
            if (mysqli_query($con,$qry)) 
            {
                $success="Please Check Your Email For Verification Link";
            }
        }
      
        
    }
    else
    {
        $error='Account Already Exist';
    }
    
    
    
    
    
 }  




}







error_reporting(0);










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
    <title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
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
    <section id="wrapper" class="new-login-register"    style="background-image: url('back.jpg')!important;"   >
        <div class="lg-info-panel">
            <div class="inner-panel">
                <a href="javascript:void(0)" class="p-20 di"><img src="logo.png" style="height: 100px!important;"></a>
                <div class="lg-content">
                    <h2>Signup Today And Make Your Daily Attendence Report Live </h2>
                </div>
            </div>
        </div>
        <div class="new-login-box">
            <div class="white-box">
                <h3 class="box-title m-b-0">Enter your details below</h3> 
                <form class="form-horizontal new-lg-form" id="loginform" method="post">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <?php
                                if(isset($success))
                                {
                                    ?>
                                    <div class="alert alert-success"><?php echo $success;   ?></div>
                                    <?php

                                }
                            ?>
                            <?php
                                if(isset($error))
                                {
                                    ?>
                                    <div class="alert alert-danger"><?php echo $error;   ?></div>
                                    <?php

                                }
                            ?>

                          </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="name" type="text" required="" value="<?php   echo $_POST['name'] ?>" placeholder="Name"> </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="email" type="text" required="" value="<?php   echo $_POST['email'] ?>" placeholder="Email"> </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="phone" type="text" value="<?php   echo $_POST['phone'] ?>" required="" placeholder="Phone"> </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="pass" type="password" required="" placeholder="Password"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="cpass" type="password" required="" placeholder="Confirm Password"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button name="signup" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Already have an account? <a href="index.php" class="text-danger m-l-5"><b>Sign In</b></a></p>
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