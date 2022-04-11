<?php


session_start();//starting  session in server side

if(empty($_SESSION['key']))//creating key for CSRF token
{
    $_SESSION['key']=bin2hex(random_bytes(32));
    
}

$token = hash_hmac('sha256',"This is token:index.php",$_SESSION['key']);//creating CSRF token

$_SESSION['CSRF'] = $token; //in here store CSRF token in to the  session variable

ob_start(); // to start of outer buffer function

echo $token;


if(isset($_POST['sbmt']))
{
    ob_end_clean(); //to clean previous displayed echoed  --End of Outer Buffer--
    
   
    loginvalidate($_POST['CSR'],$_COOKIE['session_id'],$_POST['user_name'],$_POST['user_pswd']); //validate the logins

}

function loginvalidate($user_CSRF,$user_sessionID, $username, $password)//function to validate Login
{
    if($username=="anam" && $password=="19090127" && $user_CSRF==$_SESSION['CSRF'] && $user_sessionID==session_id())
    {
        echo "<script> alert('Login Sucess') </script>";
        echo "Welcome Anam"."<br/>"; 
        apc_delete('CSRF_token');
    }
    else
    {
        echo "<script> alert('Login Failed') </script>";
        echo "Login Failed ! "."<br/>"."Authorization Failed!!";
        
    }
}


?>