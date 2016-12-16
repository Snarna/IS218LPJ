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
      <script>
      $(document).ready(function(){
        //Change Name
        $("#changeNameButton").click(function(){
          //Gather Information
          var displayName = $("#nameh4");
          var firstNameSpan = $('#firstNameSpan');
          var lastNameSpan = $('#lastNameSpan');
          var changeNameForm = $('#changeNameForm');
          var firstNameInput = $('#newFirstName');
          var lastNameInput = $('#newLastName');
          //If Edit
          if($(this).val() == "edit"){
            //Change Display
            firstNameInput.val($("#firstNameSpan").html());
            lastNameInput.val($("#lastNameSpan").html());
            displayName.hide();
            changeNameForm.fadeIn();
            //Change Button Function
            $(this).html('Save Name');
            $(this).val('save');
          }
          //If Save
          else if($(this).val() == "save"){
            //Gather Information
            var newFirstName = firstNameInput.val();
            var newLastName = lastNameInput.val();
            if(newFirstName && newLastName){
              $.ajax({
                url: "/profile/changeName",
                type: "POST",
                data: {newFirstName : newFirstName, newLastName : newLastName},
                dataType: 'json',
                success: function(data){
                  if(data.status = 1){
                    //Success
                    firstNameSpan.html(newFirstName);
                    lastNameSpan.html(newLastName);
                    changeNameForm.hide();
                    displayName.fadeIn();
                    //Change Button Function
                    $(this).html('Change Name');
                    $(this).val('edit');
                  }
                  else{
                    errorShake($("#changeNameResponseDiv"), data.err);
                  }
                },
                error: function(xhr, ajaxOptions, thrownError){
                  errorShake($("#changeNameResponseDiv"), JSON.stringify(xhr));
                }
              });
            }
            else{
              errorShake($('#changeNameResponseDiv'), "Please Fill In Fist Name & Last Nam");
            }
          }
        });

        //Change Avatar
        $("form").submit(function(event){
          //Prevent Submit
          event.preventDefault();

          //Get File
          var file = new FormData(this);

          //If File Exist
          if(file){
            $.ajax({
              url: "/profile/changeAvatar",
              type: "POST",
              data: file,
              contentType: false,
              processData: false,
              dataType: 'json',
              success: function(data){
                if(data.status = 1){
                  fadePic($("#avatarImg"), data.path);
                  successFadeIn($("#profileresponsediv"), "Success!");
                  clearForm($('#uploadForm'));
                }
                else{
                  errorShake($("#profileresponsediv"), data.err);
                }
              },
              error: function(xhr, ajaxOptions, thrownError){
                errorShake($("#profileresponsediv"), JSON.stringify(xhr));
              }
            });
          }
        });
      });

      $(document).on('change', ':file', function() {
        //Custom Upload Input
        var input = $(this),
        fileName = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        $("#fileInputView").val(fileName);
        $("#fileUpload").prop("disabled", false);
      });
      </script>
   </head>
   <body>
      <div class="container">
         @include('afterLoginNavBar')
         <br>
         <br>
         <div class="container animated fadeIn">
            <div class="row">
               <div class="col-sm-12 mypadding mytransparent">
                     <div class="row">
                        <div class="col-sm-2">
                           <img id="avatarImg" src="{{$avatarPath}}" alt="" class="img-rounded img-responsive" />
                        </div>
                        <div class="col-sm-10">
                          <!-- Use to change form -->
                          <div class="row" style="display:none" id="changeNameForm">
                            <div class="alert alert-danger" id="changeNameResponseDiv" style="display:none">
                            </div>
                            <div class="col-sm-3">
                              <input id="newFirstName" class="form-control" placeholder="First Name" required/>
                            </div>
                            <div class="col-sm-3">
                              <input id="newLastName" class="form-control" placeholder="Last Name" required/>
                            </div>
                          </div>
                          <!-- Use to Display Name -->
                           <h4 id="nameh4">
                             <span id="firstNameSpan">{{$user['first_name']}}</span>{{ ' ' }}<span id="lastNameSpan">{{$user['last_name']}}</span>
                           </h4>
                           <p>
                              <i class="glyphicon glyphicon-envelope"></i> &nbsp; {{$user['email']}}
                              <br />
                              Registration Date: &nbsp; {{$user['created_at']}}
                           </p>
                           <!-- Split button -->
                           <div class="btn-group">
                              <button data-toggle="collapse" data-target="#changeAvatarDiv" type="button" class="btn btn-primary">Change Avatar</button>
                           </div>
                           <div class="btn-group">
                              <button class="btn btn-primary" id="changeNameButton" value="edit">Change Name</button>
                           </div>
                        </div>
                     </div>
               </div>
            </div>
            <br>
            <div id="changeAvatarDiv" class="row mytransparent collapse">
              <div id="profileresponsediv" style="display:none;">
              </div>
              <form id="uploadForm">
                <div class="input-group">
                  <label class="input-group-btn">
                    <span class="btn btn-secondary">
                        Browse… <input type="file" name="avatar" id="fileInput" style="display: none;" accept="image/*">
                    </span>
                </label>
                  <input type="text" class="form-control" id="fileInputView" readonly>
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit" id="fileUpload" disabled>Up Load Avatar</button>
                  </span>
                </div>
              </form>
            </div>
         </div>
      </div>
      <!-- /container -->
   </body>
</html>
