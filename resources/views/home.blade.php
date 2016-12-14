<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Home Page</title>
      <!-- Bootstrap core CSS -->
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="../css/logout.css" rel="stylesheet">
      <!-- My Style Sheet-->
      <link href="../css/mystyle.css" rel="stylesheet">
      <!-- CSS3 Animation -->
      <link rel="stylesheet" href="../css/animate.css">
      <!-- Favicon -->
      <link rel="icon" href="#">
      <style>
         /* Remove the navbar's default margin-bottom and rounded borders */
         .navbar {
         margin-bottom: 0;
         border-radius: 0;
         }
         /* Add a gray background color and some padding to the footer */
         footer {
         background-color: #f2f2f2;
         padding: 25px;
         }
         .carousel-inner img {
         width: 100%; /* Set width to 100% */
         margin: auto;
         min-height:100px;
         }
         /* Hide the carousel text when the screen is less than 600 pixels wide */
         @media (max-width: 600px) {
         .carousel-caption {
         display: none;
         }
         }
      </style>
      <!-- jQuery Core -->
      <script src="../js/jquery.js"></script>
      <!-- Bootstrap JS -->
      <script src="../js/bootstrap.min.js"></script>
   </head>
   <body>
      <div class="container">
         @include('afterLoginNavBar')
         <br>
      </div>
      <!-- /container -->
      <div id="myCarousel" class="carousel slide animated fadeIn" data-ride="carousel">
         <!-- Indicators -->
         <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
         </ol>
         <!-- Wrapper for slides -->
         <div class="carousel-inner" role="listbox">
            <div class="item active">
               <img src="../images/home_slide_0.jpg" alt="Image">
               <div class="carousel-caption">
                  <h3>New Jersey Institue of Technology</h3>
                  <p>Newark Campus</p>
               </div>
            </div>
            <div class="item">
               <img src="../images/home_slide_1.jpg" alt="Image">
               <div class="carousel-caption">
                  <h3>Computer Science</h3>
                  <p>Newark Campus</p>
               </div>
            </div>
         </div>
         <!-- Left and right controls -->
         <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
         </a>
         <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
         <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
         </a>
      </div>
      <div class="container text-center animated fadeInUp">
         <h3>What We Do</h3>
         <br>
         <div class="row">
            <div class="col-sm-4">
               <img src="../images/logo.jpeg" class="img-responsive" style="width:100%" alt="Image">
               <p>NJIT</p>
            </div>
            <div class="col-sm-4">
               <img src="../images/NJIT.png" class="img-responsive" style="width:100%" alt="Image">
               <p>Highlanders</p>
            </div>
            <div class="col-sm-4">
               <div class="well">
                  <p>Check out my new page</p>
               </div>
               <div class="well">
                  <p>Learning CSS3 animations</p>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
