<?php 
    
    session_start();//starting a session in client side

    $sessionID = session_id(); //storing session id

    setcookie("session_id",$sessionID,time()+1800,"/","localhost",false,true);//In here we are set the cookie as terminates after 30 minutes - HTTP only flag
    

?>


<!DOCTYPE html>
<html>
<head>
<title> Login Csrf</title>
<meta charset="utf-8"/>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" id="bootstrap-css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"> </script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="config.js"> </script>

<style>

body {
    background-color: #756A7F;
font-family: 'Raleway', sans-serif;
}

.middlePage {
	width: 1000px;
    height: 650px;
    position:center;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}

p {
	color:#60733a;
}

.spacing {
	padding-top:10px;
	padding-bottom:7px; }

.logo {
	color:#4b1b9b;

}

</style>

</head>
<body>
<center>
<div class="middlePage">
<div class="page-header">
<h1 class="logo"> UTS - 19090127 - MIFTAKHUL ANAM <br><small></small> </h1>
</div> 

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"> <font size="5" color="blue"> Csrf Log In </font></h3>
    </div>

    <div class ="panel-body">
       

            <div class="center">
			
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
</center>
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