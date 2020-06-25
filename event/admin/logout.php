<?php
include 'config.php';
session_start();


$user_id=$_SESSION['u_id'];

$data=mysqli_query($con,"SELECT * FROM `users` WHERE `a_date`='$date' AND `a_user_id`='$user_id'  ");
    if (mysqli_num_rows($data)<=0) 
    {
            $qry="INSERT INTO `attendence`(`a_id`, `a_user_id`, `a_login`, `a_logout`, `a_date`, `a_ip`) VALUES (NULL,'$user_id','$time','-','$date','117.99.162.211')";
            mysqli_query($con,$qry);
    }

$qry="UPDATE `attendence` SET `a_logout`='$time' WHERE `a_date`='$date' AND `a_user_id`='$user_id'";
mysqli_query($con,$qry);


session_destroy();



?>
<script type="text/javascript">
	window.location.href="index.php";
</script>
<?php
header("location:index.php");
?>