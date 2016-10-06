<?php

error_reporting(E_ALL ^ E_NOTICE);

// Autoloader
require "twitteroauth-master/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

// Credentials
$consumer_key = "UxvG34t1TWd53lgoFcyhAXLCT";
$consumer_secret = "NSkHFUSSfM42Xv9QsLYo1YS6Oa8TbTT3HCImR3wVjFOnB2PT8v";
$access_token = "339780935-lcXdeBoMGclSOcdcufv8or2SYSugEpGnHxORiog7";
$access_token_secret = "RBNFhfl39lhLkVjljsgKEdIikDNPZttYQRvmI7EA0ifrb";

// What to do
$usersearch = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);

      // Set Search Parameters
       $user = $usersearch->get("statuses/user_timeline", ["screen_name" => "{$_POST['name']}", "count" => 5,  "result_type" =>"recent"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Imperial Tux Empire / Twitter Search</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="css/animate.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

     <script src="https://use.typekit.net/oxl4jcj.js"></script>
     <script>try{Typekit.load({ async: true });}catch(e){}</script>


</head>

<body>



    <!-- Page Content -->
    <div class="container-fluid">

<section class="blue-gradient">
        <div class="row">
            <div class="col-lg-12 text-center">

            <img class="logo" src="img/logo-lg.png"><br>
            <img class="logo-text" src="img/logo-text.svg" alt="The Imperial Tux Empire">
            <p class="lead">The evil lord Darth Penguin has risen to power with the might of The Imperial Tux Empire, obsessed with finding the traitors of the Twitter Republic, he has dispatched thousands of APIs into the far reaches of the social network to discover the rebels communications array...</p>



               <!-- Search From -->
              <form class="form-horizontal" method="POST">
                    <fieldset>




                    <!-- Search input-->
                    <div class="form-group">
                      <div class="col-md-12">
                        <input name="name" type="search" placeholder="Username" class="form-control input-md" value="<?PHP  if(isset($_POST['name'])){ echo  $_POST['name'];} ?> ">
                        
                      </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                      <div class="col-md-12">

                        <button type="submit" value="Submit" class="btn btn-block btn-primary" >Search</button>
                      </div>
                    </div>
                    </fieldset>
               </form>
            </div>
        </div>
        <!-- /.row -->
        </section>
        <section>
            <div class="results">
                  <?php
                           // Builds the Array
                           if(isset($user) && is_array($user)) {
                                // Counts results
                               if(count($user)) {
                                // Display Result Tweets 
                                   foreach($user as $userinfo) {
                                      echo '  <div class="media animated bounceInUp">
                                                      <div class="media-left media-middle">
                                                          <img class="media-object img-circle" src="'.$userinfo->user->profile_image_url.'" alt="...">
                                                      </div>
                                                      <div class="media-body">
                                                        <h4 class="media-heading">'.$userinfo->user->name.'</h4>
                                                        <p>'.$userinfo->text.'</p>
                                                      </div>
                                                    </div> ';
                                   }
                               }
                                // If no results
                               else {
                                   echo 'No Rebel Data Avaliable';
                               } 
                           }
                 ?>
                 </div>
    </section>
    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>
