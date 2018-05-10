
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php 
    //start a session - users browser
    session_start();

    //setting a cookie and session id
    $sessionID = session_id(); 

    setcookie("session_id",$sessionID,time()+3600,"/","localhost",false,true); 
    //Activated the HTTPS only flag and the cookie will be terminated in 3600 seconds = 1 hour

?>









<!DOCTYPE html>
<html>
<head>
<title> Secure Software System Assignment 1 - IT16039346 </title>
<meta charset="utf-8"/>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" id="bootstrap-css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"> </script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="config.js"> </script>

<style>

body {
    width:100px;
	height:100px;
  background: -webkit-linear-gradient(90deg, #700032 10%, #3A6073 90%); 
  background:    -moz-linear-gradient(90deg, #700032 10%, #3A6073 90%); 
  background:     -ms-linear-gradient(90deg, #700032 10%, #3A6073 90%);
  background:      -o-linear-gradient(90deg, #700032 10%, #3A6073 90%); 
  background:         linear-gradient(90deg, #700032 10%, #3A6073 90%);
font-family: 'Raleway', sans-serif;
}

.middlePage {
    width: 780px;
    height: 500px;
    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}

p {
	color:#CCC;
}

.spacing {
	padding-top:7px;
	padding-bottom:7px; }

.logo {
	color:#CCC;
}

</style>

</head>
<body>

<div class="middlePage">
<div class="page-header">
    <h1 class="logo">SSS Assignment 01<br><small> CSRF Protection through Synchronizer Token Patterns </small> </h1>
</div> 

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"> LOG IN TO CONTINUE </h3>
    </div>

    <div class ="panel-body">
     
            <div class="col-md-7" style="border-left:1px solid #ccc;height:160px">
                <form class="form-horizontal" method="POST" action="server.php" >
                    <input name="user_name" type="text" placeholder="Enter User Name" class="form-control input-md">
                    <div class="spacing"><input type="checkbox" name="checkboxes" id="checkboxes-0" value="1"><small> Remember me</small></div>
                    <input name="user_pswd" type="password" placeholder="Enter your password" class="form-control input-md">
                    <div class="spacing"><input type="hidden" id="csToken" name="CSR"/></div>
                    <input type="submit" name="sbmt" value="Log In" class="btn btn-info btn-sm pull-right">
                </form>
            </div>

        </div>
    </div>

</div>

    <?php 
        //if cookie is ok, request to the server and get CSRF token & store it inside hidden HTML DOM input tag ~ id=csToken
       if(isset($_COOKIE['session_id']))
            { 
                echo '<script> var token = loadDOC("POST","server.php","csToken");  </script>'; 
                   
                //echo "cookie set";     
            }
    ?>

    




</div>
</body>
</html>