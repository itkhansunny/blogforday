<?php 

include("header.php"); 

include("db.php");

$alert = $success = $error = "";

$eTitle     = "Title should not be empty";
$eContent   = "Content should not be empty";
$eCategory  = "Please select a category";
$eStatus    = "Please select a status";
$uFail      = "Image upload failed";
$invFormat  = "Invalid image format or size";

if(isset($_GET['alert'])){
    
    $alert = $_GET['alert'];
    
    if($alert == "eTitle"){
        $error = $eTitle;
    } else
     if($alert == "eContent"){
        $error = $eContent;
    } else
     if($alert == "eCategory"){
        $error = $eCategory;
    } else if($alert == "eStatus"){
        $error = $eStatus;
    }
    else if($alert == "uFail"){
        $error = $uFail;
    }
    else if($alert == "invFormat"){
        $error = $invFormat;
    }
}


$tableCategory = "category";

$sql = "SELECT * FROM {$tableCategory}";

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
                                <div class="card-body">
                                    <div class="form-validation">
                                        <form class="form-valide" action="postStore.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="post-title">Post Title <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="post-title" name="post-title" placeholder="Enter a title..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="post-content">Post Description <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <textarea class="form-control" name="post-content" id="post-content" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="post-category">Category <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <select class="js-select2 form-control" id="post-category" name="post-category" style="width: 100%;">
                                                        <option value="">--- Select ---</option>
                                                        
                                                        <?php while ($category = $result->fetch_assoc()) {
                                                            ?>
                                                            <option value="<?php echo $category['slug']; ?>"><?php echo $category['name']; ?></option>   
                                                            <?php
                                                        } ?>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="post-status">Status <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <select class="js-select2 form-control" id="post-status" name="post-status" style="width: 100%;">
                                                        <option value="">--- Select ---</option>
                                                        <option value="publish">Publish</option>
                                                        <option value="draft">Draft</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="post-image">Post Image <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input class="form-control" type="file" name="uploadedFile" id="post-image">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto">
                                                    <button type="reset" class="btn btn-info">Reset</button>
                                                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Publish</button>
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
    <!-- Select2 -->
    <script src="js/lib/select2/select2.full.min.js"></script>
    <script src="js/lib/form-validation/jquery.validate.min.js"></script>
    <script>
        var form_validation = function() {
    var e = function() {
            jQuery(".form-valide").validate({
                ignore: [],
                errorClass: "invalid-feedback animated fadeInDown",
                errorElement: "div",
                errorPlacement: function(e, a) {
                    jQuery(a).parents(".form-group > div").append(e)
                },
                highlight: function(e) {
                    jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
                },
                success: function(e) {
                    jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
                },
                rules: {
                        "post-title": {
                            required: !0,
                            minlength: 10
                        },
                        "post-content": {
                            required: !0,
                            minlength: 50
                        },
                        "post-category": {
                            required: !0
                        },
                        "post-status": {
                            required: !0
                        },
                        // "post-image": {
                        //         required: true,
                        //         accept: "image/*"
                        //     }
                    },
                messages: {
                    "post-title": {
                        required: "Please enter a post title",
                        minlength: "Your post title must consist of at least 10 characters"
                    },
                    "post-content": "Please write post content",
                    "post-category": "Please select a category",
                    "post-status": "Please select a status",
                    "post-image": "Please select a image file",
                }
            })
        }
    return {
        init: function() {
            e(), a(), jQuery(".js-select2").on("change", function() {
                jQuery(this).valid()
            })
        }
    }
}();
jQuery(function() {
    form_validation.init()
});
    </script>
    <script src="js/lib/bootstrap.min.js"></script><script src="js/scripts.js"></script>
    <!-- scripit init-->
    <script src="https://cdn.tiny.cloud/1/hbom4kson0fnyjyu21op1vgxzwht5yolpe0nnchomyn17vrw/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ]
    });
  </script>


</body>

</html>
