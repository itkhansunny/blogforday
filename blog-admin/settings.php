<?php
session_start();
include("header.php");

?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
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
            <div class="col-md-12">
									<div class="card">
										<div class="card-body">
											<!-- Nav tabs -->
											<div class="vtabs">
												<ul class="nav nav-tabs tabs-vertical" role="tablist">
													<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home4" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Main</span> </a> </li>
													<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile4" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Social Media</span></a> </li>
													<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages4" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Home Page</span></a> </li>
												</ul>
												<!-- Tab panes -->
                                                <form action="settingsStore.php" method="POST" enctype="multipart/form-data">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="home4" role="tabpanel">
                                                            <input type="hidden" name="logo" value="<?php echo getSValue('logo'); ?>">
                                                            <div class="form-group row">
                                                                <label class="col-lg-4 col-form-label" for="name">Blog Name</label>
                                                                <div class="col-lg-8">
                                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter blog name.." value="<?php echo getSValue('name'); ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-4 col-form-label" for="description">Blog Description</label>
                                                                <div class="col-lg-8">
                                                                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter blog description.."  value="<?php echo getSValue('description'); ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-4 col-form-label" for="uploadedFile">Blog Logo</label>
                                                                <div class="col-lg-8">
                                                                    <input type="file" class="form-control" id="uploadedFile" name="uploadedFile">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane p-20" id="profile4" role="tabpanel">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label" for="facebook">Facebook</label>
                                                                    <div class="col-lg-8">
                                                                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter facebook url.." value="<?php echo getSValue('facebook'); ?>">
                                                                    </div>
                                                                </div>
                                                               
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label" for="twitter">Twitter</label>
                                                                    <div class="col-lg-8">
                                                                        <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Enter twitter url.." value="<?php echo getSValue('twitter'); ?>">
                                                                    </div>
                                                                </div>
                                                               
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label" for="linkedin">Linkedin</label>
                                                                    <div class="col-lg-8">
                                                                        <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Enter linkedin url.." value="<?php echo getSValue('linkedin'); ?>">
                                                                    </div>
                                                                </div>
                                                               
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label" for="github">Github</label>
                                                                    <div class="col-lg-8">
                                                                        <input type="text" class="form-control" id="github" name="github" placeholder="Enter github url.." value="<?php echo getSValue('github'); ?>">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="tab-pane p-20" id="messages4" role="tabpanel">
                                                            <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label" for="pageheader">Home Page Header</label>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" class="form-control" id="pageheader" name="pageheader" placeholder="Enter blog header.." value="<?php echo getSValue('pageheader'); ?>">
                                                                        </div>
                                                                    </div>
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label" for="blogowner">Blog Owner</label>
                                                                    <div class="col-lg-8">
                                                                        <input type="text" class="form-control" id="blogowner" name="blogowner" placeholder="Enter blog owner name.." value="<?php echo getSValue('blogowner'); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label" for="bio">Blog Owner Bio</label>
                                                                    <div class="col-lg-8">
                                                                        <input type="text" class="form-control" id="bio" name="bio" placeholder="Enter blog owner bio.." value="<?php echo getSValue('bio'); ?>">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-lg-8">
                                                                <button class="btn btn-success" type="submit" name="save" value="save">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
											</div>
										</div>
									</div>
								</div>
            </div>
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
    <!-- scripit init-->





</body>

</html>