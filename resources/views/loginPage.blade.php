
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sign In Page</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/login.css" rel="stylesheet">
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
    <!-- My JavaScript Code -->
    <script src="../js/myScript.js"></script>

    <script>
    $(document).ready(function() {
      //Hide Msg Div
      $("#loginresponsediv").hide();

      //On Form Submit
      $("form").submit(function(event){
        //Hide Msg Div
        $("#loginresponsediv").hide();

        //Prevent Submit
        event.preventDefault();

        //Get Information From Form
        var email = $("#inputemail").val();
        var password = $("#inputpassword").val();
        if(email && password){
          $.ajax({
            url: "../login",
            type: "POST",
            data: {email:email, password:password},
            success: function(data){
              if(data === "pass"){
                //Success
                window.location.href = "../home";
              }
              else{
                errorShake($("#loginresponsediv"), data);
              }
            },
            error: function(xhr, ajaxOptions, thrownError){
              errorShake($("#loginresponsediv"), JSON.stringify(xhr));
            }
          });
        }
      });

    });
    </script>
  </head>

  <body>
    <div class="container">
        @include('beforeLoginNavBar')
        <br>
        <br>
        <form class="form-login mytransparent animated fadeIn">
          <h2 class="form-login-heading">Please Login</h2>
          <div class="alert alert-danger" id="loginresponsediv" style="display:none;">
          </div>
          <label for="inputemail" class="sr-only">Email address</label>
          <input type="email" id="inputemail" class="form-control" placeholder="Email address" required autofocus>
          <label for="inputpassword" class="sr-only">Password</label>
          <input type="password" id="inputpassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <div class="row">
          <div class="col-sm-6">
            <a href="../signup">Sign Up</a>
          </div>
          <div class="col-sm-6">
            <a class="pull-right" href="../forgotpassword">Forgot password</a>
          </div>
        </div>
      </form>
    </div> <!-- /container -->
  </body>
</html>
