<?php 
error_reporting(0);
include 'header.php';
include_once 'classes/database.php';
include_once 'classes/products.php';
include_once 'initial.php';
$products = new Products($db);

if (isset($_POST['add'])) {
      // set user property values
    $products->name = htmlentities(trim($_POST['name']));
    $products->price = htmlentities(trim($_POST['price']));
    $res = $products->create();
}


?>
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Products</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                      
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Product Add</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Products</h3>
                            <p class="text-muted m-b-30 font-13">  </p>
                            <form class="form-horizontal" method="post" enctype="mutipart/form-data">
                                <?php
                                if ($products->success==true) {
                                    ?>
                                    <div class="alert alert-success"><?=$products->msg;?></div>
                                    <?php
                                }
                                if ($products->error==true) {
                                    ?>
                                    <div class="alert alert-danger"><?=$products->msg;?></div>
                                    <?php
                                }
                                // echo $products->msg;
                                ?>
                                <div class="form-group">
                                    <label class="col-md-12">Name </label>
                                    <div class="col-md-12">
                                        <input type="text" name="name" class="form-control"  placeholder=""> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Price </label>
                                    <div class="col-md-12">
                                        <input type="text" name="price" class="form-control"  placeholder=""> 
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-12"></label>
                                    <div class="col-sm-12">
                                        <!-- <input type="text" class="form-control" placeholder="Helping text"> <span class="help-block"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span> </div> -->
                                        <button name="add"  class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!-- ============================================================== -->
                <!-- .right-sidebar -->
               
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
