<?php include("header.php");?>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <section id="main-content">
                    <div class="row">

                    <?php if(isset($_SESSION['success'])){ ?>
                        <div class="col-lg-12">
                            <div class="alert alert-success text-light h5">
								<?php echo $_SESSION['success'];
                                unset($_SESSION['success']);
                                ?>
							</div>
                        </div>
                    <?php } ?>

                    <?php if(isset($_SESSION['error'])){ ?>
                        <div class="col-lg-12">
                            <div class="alert alert-danger text-light h5">
								<?php echo $_SESSION['error']; 
                                unset($_SESSION['error']);
                                ?>
							</div>
                        </div>
                    <?php } ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-validation">
                                        <form class="form-valide" action="passwordChange.php" method="POST">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="oldpass">Old Password <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="password" class="form-control" id="oldpass" name="oldpass" placeholder="Enter old password..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="newpass">New Password <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Enter new password..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="conpass">Confirm Password <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="password" class="form-control" id="conpass" name="conpass" placeholder="Enter confirm password..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto">
                                                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Change Password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p><?php echo date('Y'); ?> © Admin Board. - <a href="#">example.com</a></p>
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


</body>

</html>
