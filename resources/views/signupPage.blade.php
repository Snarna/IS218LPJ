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
    <link href="../css/signup.css" rel="stylesheet">
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
    <!-- My Script -->
    <script src="../js/myScript.js"></script>
    <script>
      $(document).ready(function(){

        //On Form Submit
        $("form").submit(function(event){
          //Hide Old Msg
          $("#signupresponsediv").hide();

          //Prevent Submit
          event.preventDefault();

          //Get Data From Form
          var email = $("#email").val();
          var firstname = $("#firstname").val();
          var lastname = $("#lastname").val();
          var password = $("#password").val();
          var passwordconfirm = $("#passwordconfirm").val();
          var sq1 = $("#secquestion1").val();
          var sa1 = $("#secquestion1ans").val();
          var sq2 = $("#secquestion2").val();
          var sa2 = $("#secquestion2ans").val();

          if(password === passwordconfirm){
            $.ajax({
              url:"../signup/do",
              type: "POST",
              data:{email:email,
                    firstname:firstname,
                    lastname:lastname,
                    password:password,
                    sq1:sq1,
                    sa1:sa1,
                    sq2:sq2,
                    sa2:sa2},
              success:function(data){
                if(data == "pass"){
                  window.location.href = "../signupsuccess";
                }
                else{
                  errorShake($("#signupresponsediv"), data);
                }
              },
              error:function(xhr, ajaxOptions, thrownError){
                errorShake($("#signupresponsediv"), "Sign up failed! with Error:" + JSON.stringify(xhr));
              }
            });
          }
          else{
            errorShake($("#signupresponsediv"), "Passwords don't match.");
          }

        });
      });
    </script>
  </head>

  <body>
    <div class="container">
      @include('\layouts\beforeLoginNavBar')
      <br>
      <br>
      <form class="form-signup mytransparent animated fadeIn" action="/signup/do" method="post">
        {{ csrf_field() }}<!-- CSRF Protection -->
        <h2 class="form-signup-heading">Sign Up Form</h2>
        <div class="alert alert-danger" id="signupresponsediv" style="display:none;">
        </div>
        <div class="form-group">
          <label for="email" class="col-form-label">Email <span class="requiredstar">*</span> </label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group row">
          <div class="col-sm-6">
            <label for="firstname" class="col-form-label">First Name <span class="requiredstar">*</span> </label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
          </div>
          <div class="col-sm-6">
            <label for="lastname" class="col-form-label">Last Name <span class="requiredstar">*</span> </label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-form-label">Password <span class="requiredstar">*</span> </label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="passwordconfirm" class="col-form-label">Confrim Password <span class="requiredstar">*</span> </label>
            <input type="password" class="form-control" id="passwordconfirm" required>
        </div>
        <div class="form-group">
          <label for="secquestion1" class="col-form-label">Security Question 1 <span class="requiredstar">*</span> </label>
          <select class="form-control" id="secquestion1" name="secquestion1">
             <?php echo $question_options ?>
          </select>
          <input type="text" class="form-control" id="secquestion1ans" name="secquestion1ans" required>
        </div>
        <div class="form-group">
          <label for="secquestion2" class="col-form-label">Security Question 2 <span class="requiredstar">*</span> </label>
          <select class="form-control" id="secquestion2" name="secquestion2">
             <?php echo $question_options ?>
          </select>
          <input type="text" class="form-control" id="secquestion2ans" name="secquestion2ans" required>
        </div>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>
