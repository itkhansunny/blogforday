<?php 
session_start();

include("header.php");

include("db.php");

$success = $error = "";

$successS   = "Post create successfully";
$successSU  = "Post updated successfully";
$successDel = "Post deleted successfully";

if(isset($_GET['alert'])){
    
    $alert = $_GET['alert'];
    
    if($alert == "successS"){
        echo $success = $successS;
    } else
     if($alert == "successSU"){
        echo $success = $successSU;
    } else
     if($alert == "successDel"){
        echo $successDel = $successDel;
    }
}

$table = "post";

$sql = "SELECT * FROM {$table}";

$result = $conn->query($sql);

?>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <a class="btn btn-primary" href="post-index.php" >View All Post</a>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Create Post</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                    <?php if(isset($_SESSION['success'])){ ?>
                        <div class="col-lg-12">
                            <div class="alert alert-success text-light h5">
								<?php echo $_SESSION['success']; ?>
							</div>
                        </div>
                    <?php } ?>
                    <?php if($success != ""){ ?>
                        <div class="col-lg-12">
                            <div class="alert alert-success text-light h5">
								<?php echo $success; ?>
							</div>
                        </div>
                    <?php } ?>

                    <?php if($error != ""){ ?>
                        <div class="col-lg-12">
                            <div class="alert alert-danger text-light h5">
								<?php echo $error; ?>
							</div>
                        </div>
                    <?php } ?>
                        <div class="col-lg-12">
                            <div class="card">
                            <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th>Create On</th>
                                                    <th>Update On</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($post = $result->fetch_assoc()) { ?>
                                                <tr>
                                                    <td><?php echo $post['title']; ?></td>
                                                    <td><?php echo ucfirst($post['category']); ?></td>
                                                    <td><?php echo ucfirst($post['status']); ?></td>
                                                    <td><?php echo time_Ago($post['createon']); ?></td>
                                                    <td><?php echo time_Ago($post['updateon']); ?></td>
                                                    <td>
                                                        <a class="btn btn-info" href="post-update.php?id=<?php echo $post['id']; ?>">Update</a>
                                                        <a class="btn btn-danger" href="post-delete.php?id=<?php echo $post['id']; ?> " onclick="return confirm('Are you sure delete this post from the blog?')">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p><?php echo date("Y"); ?> © Admin Board. - <a href="#">example.com</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- jquery vendor -->
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="js/lib/menubar/sidebar.js"></script>
    <script src="js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    
    <!-- bootstrap -->
    <script src="js/lib/bootstrap.min.js"></script><script src="js/scripts.js"></script>
    <!-- Select2 -->

    <script src="js/lib/data-table/datatables.min.js"></script>
    <script src="js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="js/lib/data-table/buttons.flash.min.js"></script>
    <script src="js/lib/data-table/jszip.min.js"></script>
    <script src="js/lib/data-table/pdfmake.min.js"></script>
    <script src="js/lib/data-table/vfs_fonts.js"></script>
    <script src="js/lib/data-table/buttons.html5.min.js"></script>
    <script src="js/lib/data-table/buttons.print.min.js"></script>
    <script src="js/lib/data-table/datatables-init.js"></script>
    

</body>

</html>
