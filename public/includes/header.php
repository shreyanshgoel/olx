<?php 

  include 'classes.php';
  
  $a = new mysqldatabase;
  $a->connect();
  session::construct();

if(isset($_POST['logout']))
{
	session::destruct();
	session::construct();
	
}


if(isset($_POST['user_register']))
{
	$b = new user;
	$b->assign($_POST['fname'],$_POST['email'],$_POST['pass'],$_POST['cpass']);
	$b->register();
	
}

if(isset($_POST['user_login']))
{
	$c = new user;
	
	$c->assign('',$_POST['email'],$_POST['pass'],'');
	
	$c->login();
	
}


if(isset($_SESSION['set_user']))
{
	
	$set_user = $_SESSION['set_user'];
	
}

?>

<html>

<head>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 500px;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
.controls {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 300px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

.pac-container {
  font-family: Roboto;
}

#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}

#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}

    </style>


<link type="text/css" rel="stylesheet" href="bootstrap-3.3.4-dist/css/bootstrap-theme.min.css" />
<link type="text/css" rel="stylesheet" href="bootstrap-3.3.4-dist/css/bootstrap.min.css" />
<link type="text/javascript" href="js/jquery-1.9.1.min.js" />

<script src="js/jquery-1.9.1.min.js"></script>

</head>

<body>

<script type="text/javascript" src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>



<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form action="index.php" class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" name="search" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        
       <?php
	    
		 if(!isset($set_user)){?>
		 
        
        <li><a href="#" data-toggle="modal" data-target="#myModal">Log in/Register</a></li>
        <?php }else{?>
        
       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['set_user_email']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="myaccount.php">My Account</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <form action="index.php" method="post">
            <li><a><button type="submit" class="btn btn-link" name="logout">Logout</button></a></li>
            </form>
          </ul>
        </li>
      
      <?php } ?>
      
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div>
            
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                
                  Register
                
                </a></li>
                
                <li role="presentation">
                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                
                  Log in
                
                </a></li>
                </ul>
            
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                
                       <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Name</label>
                          <input type="text" class="form-control" name="fname" id="exampleInputPassword1" placeholder="name" required="required">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" required="required">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password" required="required">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Confirm Password</label>
                          <input type="password" class="form-control" name="cpass" id="exampleInputPassword1" placeholder="Confirm Password" required="required">
                        </div>
                       
                        <button type="submit" name="user_register" class="btn btn-default">Submit</button>
                      </form>
                
                
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                                 
                     <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" required="required">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password" required="required">
                      </div>
                      <button type="submit" name="user_login" class="btn btn-default">Submit</button>
                    </form>   
                
                
                
                </div>
              </div>
            
            </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
