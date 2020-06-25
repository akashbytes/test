<?php 
include 'header.php';
include_once 'classes/database.php';
include_once 'classes/products.php';
include_once 'initial.php';
$products = new Products($db);

if (isset($_GET['delete'])) {
    $products->id=$_GET['delete'];    
    $products->delete($_GET['delete']);
}

?>
        <!-- ============================================================== -->
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
                            <li class="active">Products</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Products</h3>
                            <a href="products-add.php" class="btn btn-sm btn-info">Add</a>
                            <p class="text-muted"><!-- Add class <code>.color-bordered-table .primary-bordered-table</code> --></p>
                            <div class="table-responsive">
                                <?php
                                if($products->countAll()>0){
                                    $data = $products->getAllProducts();
                                    ?>
                                        <table class="table color-bordered-table primary-bordered-table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($data as $key => $value) {
                                                    ?>
                                                    <tr>
                                                        <td><?=$key+1;?></td>
                                                        <td><?=$value['name'];?></td>
                                                        <td><?=$value['price'];?></td>
                                                        <td>
                                                            <a href="?delete=<?=$value['id'];?>" class="btn btn-danger">Delete</a>
                                                            <a href="products-edit.php?id=<?=$value['id'];?>" class="btn btn-info">Edit</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                


                                            </tbody>
                                        </table>
                                    <?php
                                }else{
                                    ?>
                                        <h3 class="text-center">No data found</h3>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
             
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> Developed By WXIT Consultant Services PVT LTD </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- jQuery peity -->
    <script src="plugins/bower_components/peity/jquery.peity.min.js"></script>
    <script src="plugins/bower_components/peity/jquery.peity.init.js"></script>
    <!--Style Switcher -->
    <script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>


<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/table-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Jan 2019 12:56:58 GMT -->
</html>
