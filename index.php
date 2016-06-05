<?php
$the_url = isset($_REQUEST['url']) ? htmlspecialchars($_REQUEST['url']) : '';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>XBot</title>
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <meta name="apple-mobile-web-app-status-bar-style" content="black" />
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
      <link rel="stylesheet" type="text/css" href="bootstrap/css/uxasia.css">
      <style>
         .content-8 { min-height:600px;}
         .content-8 p {
         font-size: 16px;
         font-weight: normal;
         color: #7f8c8d;
         margin:10px 0;
         }
         .btn-crawl { border-radius:1px; background:#333;color:#ffffff;}
      </style>
   </head>
   <body>
      <div class="page-wrapper">
         <!-- header-10 -->
         <header class="header-10">
            <div class="container">
               <div class="navbar col-sm-12" role="navigation">
                  <div class="navbar-header">
                     <ul class="nav pull-left">
                        <li class="tagline"><a href="#">Xbot</a></li>
                     </ul>
                  </div>
                  <div class="collapse navbar-collapse pull-right">
                     <ul class="nav pull-right">
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Signup</a></li>
                        </ul>
                  </div>
               </div>
            </div>
         </header>
         <!-- content-8  -->
         <section class="content-8">

               <div class="container">

                     <div class="col-md-6 text-left">
                     <div class="" style=" background:#fafafa; padding:10px;">
                        <form class="form-inline" method="post">
                           <div class="form-group">
                              <input type="text" class="form-control" name="url" id="" value="<?php echo $the_url;  ?>" placeholder="website url" style="width:400px;">
                           </div>
                           <button type="submit" class="btn btn-default">Search</button>
                        </form>
                     </div>
                         <?php
                         if (isset($_REQUEST['url']) && !empty($_REQUEST['url'])) {
                           // fetch data from specified url
                           $text = file_get_contents($_REQUEST['url']);
                         }
                         elseif (isset($_REQUEST['text']) && !empty($_REQUEST['text'])) {
                           // get text from text area
                           $text = $_REQUEST['text'];
                         }

                         // parse emails
                         if (!empty($text)) {
                           $res = preg_match_all(
                             "/[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}/i",
                             $text,
                             $matches
                           );

                           if ($res) {
                             foreach(array_unique($matches[0]) as $email) {
                               echo "<p><a href=''>". $email ."</a></p><br />";
                             }
                           }
                           else {
                             echo "No emails found.";
                           }
                         }

                         ?>
                     </div>

                     <div class="col-md-6 text-left" style=" padding-left:100px;">

                     <img src="img/diagram.png" width="150">


                  </div>
                  </div>





      </section>
      <!-- content-11  -->
      <!-- footer-3 -->

      </div>
      <!-- Start Open Web Analytics Tracker -->
      <!-- End Open Web Analytics Code -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="Developer/flat-ui/js/bootstrap.min.js"></script>
   </body>
</html>
