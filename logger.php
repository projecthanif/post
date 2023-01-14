<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
    $email=$_POST['email']??'';
    $password=$_POST['password']??'';
    $login=$_POST['login']??'';
    if(isset($login)){
        if(empty($email)){
            $Error = "Email Required to login";
        }else{
            $email = $_POST['email'];
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $Error = "Only Valid Email is Allowed";
            }else{

            }
        }
        if(empty($password)){
            $Error = "Password Required";
        }
        
    }




    

    $conn = mysqli_connect('localhost', 'root', '', 'usersdata');

    if(mysqli_connect_error()){
    die("Connection Error") . $conn->error;
}

$sql = "SELECT * FROM users 
WHERE email='$email';";

$result=$conn->query($sql);
$out=$result->fetch_assoc();
if($out==true){
    $verify_password = password_verify($password, $out['user_password']);
    if($verify_password==true){

            header("Location:comment.php");
            
    }else{
   
        $wrong= "Wrong password";
   }
    
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Logger</title>
</head>
<body>


    <div class="container m-5">
        <div class="d-flex justify-content-center p-5">
            <form action="" class="form" method="post">
                <div class="card p-5">
                    <div class="d-flex justify-content-center">
                        <div class="card-head"><h3>Login</h3></div>
                    </div>
                    <div class="card-body">
                        <div class="form-inline">
                            <label for="name">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-inline">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="" class="form-control" placeholder="Your Password">
                            <?php if (isset($password)){
                         if($verify_password == false) {
                           echo ' <div class="alert alert-dismissable alert-danger">'.$wrong.'</div>';
                        }
                        }                      
                   ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="card-foot">
                            <input type="submit" name="login" value="Login" class="form-control bg-danger">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <div class="card-foot">
                            <a href="Register.php" class="card-link">Register?</a>                            
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php


?>