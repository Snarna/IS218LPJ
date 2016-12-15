
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>All User Page</title>

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
        @include('afterLoginNavBar')
        <br>
        <br>
        <div>
          <div class="page-header animated fadeIn">
            <h1>All Users <small>Include current user</small></h1>
          </div>
          <div class="row animated fadeInUp">
            @php echo $userTable @endphp
          </div>
        </div>
    </div> <!-- /container -->
  </body>
</html>
