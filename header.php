<?php 
include("blog-admin/db.php");

function time_Ago($time) {
  
  // Calculate difference between current
  // time and given timestamp in seconds
  $diff     = time() - $time;
    
  // Time difference in seconds
  $sec     = $diff;
    
  // Convert time difference in minutes
  $min     = round($diff / 60 );
    
  // Convert time difference in hours
  $hrs     = round($diff / 3600);
    
  // Convert time difference in days
  $days     = round($diff / 86400 );
    
  // Convert time difference in weeks
  $weeks     = round($diff / 604800);
    
  // Convert time difference in months
  $mnths     = round($diff / 2600640 );
    
  // Convert time difference in years
  $yrs     = round($diff / 31207680 );
    
  // Check for seconds
  if($sec <= 60) {
      echo "$sec seconds ago";
  }
    
  // Check for minutes
  else if($min <= 60) {
      if($min==1) {
          echo "one minute ago";
      }
      else {
          echo "$min minutes ago";
      }
  }
    
  // Check for hours
  else if($hrs <= 24) {
      if($hrs == 1) { 
          echo "an hour ago";
      }
      else {
          echo "$hrs hours ago";
      }
  }
    
  // Check for days
  else if($days <= 7) {
      if($days == 1) {
          echo "Yesterday";
      }
      else {
          echo "$days days ago";
      }
  }
    
  // Check for weeks
  else if($weeks <= 4.3) {
      if($weeks == 1) {
          echo "a week ago";
      }
      else {
          echo "$weeks weeks ago";
      }
  }
    
  // Check for months
  else if($mnths <= 12) {
      if($mnths == 1) {
          echo "a month ago";
      }
      else {
          echo "$mnths months ago";
      }
  }
    
  // Check for years
  else {
      if($yrs == 1) {
          echo "one year ago";
      }
      else {
          echo "$yrs years ago";
      }
  }
}

function limitStrLength($str, $limit)
{
    $str = wordwrap($str, $limit);
    $str = explode("\n", $str);
    return $str = $str[0] . ' ... '."<br/>";
}

//Get settings value start

function getSValue($key)
{
    include("blog-admin/db.php");
    $sql = "SELECT * FROM settings WHERE skey='$key'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
      $row = $result->fetch_assoc();
      return $row['svalue'];  
    }
}

//Get settings value end

?>

<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us"><head>
  <meta charset="utf-8">
  <title><?php echo getSValue("name"); ?> | <?php echo getSValue("description"); ?></title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="This is meta description">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Hugo 0.74.3" />
  
  <!-- theme meta -->
  <meta name="theme-name" content="reader" />

  <!-- plugins -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="plugins/slick/slick.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css" media="screen">

  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <link rel="icon" href="images/favicon.png" type="image/x-icon">

  <meta property="og:title" content="Reader | Hugo Personal Blog Template" />
  <meta property="og:description" content="This is meta description" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="" />
  <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
</head>
<body>
  <!-- navigation -->
<header class="navigation fixed-top">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-white">
      <a class="navbar-brand order-1" href="index.php">
        <img class="img-fluid" width="100px" src="blog-admin/images/<?php echo getSValue("logo"); ?>"
          alt="Reader | Hugo Personal Blog Template">
      </a>
      <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="index.php">
              homepage
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="about-us.php">
              About
            </a>
  
          </li>

          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>

      <div class="order-2 order-lg-3 d-flex align-items-center">
        <a class="m-2 border-0 bg-transparent text-body" href="blog-admin/login.php">Login</a>
        <!-- <select class="" id="select-language">
          <option id="en" value="" selected>Login</option>
          <option id="fr" value="">Logout</option>
        </select> -->
        
        <!-- search -->
        <form class="search-bar">
          <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
        </form>
        
        <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse" data-target="#navigation">
          <i class="ti-menu"></i>
        </button>
      </div>

    </nav>
  </div>
</header>
<!-- /navigation -->