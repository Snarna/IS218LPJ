<nav class="navbar navbar-default navbar-fixed-top mytransparent">
   <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="#">LOGO</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav">
            <li><a href="../home">Home</a></li>
            <li><a href="../alluser">All Users</a></li>
         </ul>
         <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <span id="currentUserNameSpan">{{ $user['first_name']}}</span> <b class="caret"></b></a>
               <ul class="dropdown-menu">
                  <li><a href="../profile"><i></i>Profile</a></li>
                  <li class="divider"></li>
                  <li><a href="../logout"><i></i>Logout</a></li>
               </ul>
            </li>
         </ul>
      </div>
      <!-- /.navbar-collapse -->
   </div>
   <!-- /.container-fluid -->
</nav>
