<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>My Profile</title>
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

			<!-- jQuery Core -->
      <script src="../js/jquery.js"></script>
      <!-- Ajax Config -->
      <script src="../js/ajaxConfig.js"></script>
      <!-- Bootstrap JS -->
      <script src="../js/bootstrap.min.js"></script>
      <!-- My Script -->
      <script src="../js/myScript.js"></script>
   </head>
   <body>
      <div class="container">
         @include('\layouts\afterLoginNavBar')
         <br>
         <div class="container animated fadeIn">
            <div class="row">
               <div class="col-xs-12 col-sm-12">
                  <div class="well well-sm">
                     <div class="row">
                        <div class="col-sm-2">
                           <img src="{{$avatarPath}}" alt="" class="img-rounded img-responsive" />
                        </div>
                        <div class="col-sm-10">
                           <h4>{{$user['first_name'] .' '. $user['last_name']}} </h4>
                           <p>
                              <i class="glyphicon glyphicon-envelope"></i> &nbsp; {{$user['email']}}
                              <br />
                              Registration Date: &nbsp; {{$user['created_at']}}
                           </p>
                           <!-- Split button -->
                           <div class="btn-group">
                              <button type="button" class="btn btn-primary">Change Avatar</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /container -->
   </body>
</html>
