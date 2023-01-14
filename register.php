<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $number = $_POST['number'] ?? '';
    $password = $_POST['password'] ?? '';
    $submit=$_POST['submit']??'';
    $Error='';
    if(isset($submit)){
        if(empty($name)){
            $Error = "Name Required";
        }else{
            $name = $_POST['name'];
            if(!preg_match("/^['a-zA-Z']*$/",$name)){
                $Error = "Only Letters and Whitespace allowed";
            }else{
                
            }
        }
        if(empty($email)){
            $Error = "Email required";
        }else{
            $email = $_POST['email'];
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $Error = "Valid Email required";
            }else{
               
            }
        }
        if(empty($number)){
            $Error = "Phone Number Required";
        }else{
            $number = $_POST['number'];
            if(filter_var($number,FILTER_VALIDATE_INT)){
                $Error = "Number required only";
            }else{

            }
        }
        if(empty($password)){
            $Error="Password Required";
        }else{
            $hash=password_hash($password,PASSWORD_DEFAULT);
        }
    }
    
$conn = mysqli_connect('localhost', 'root', '', 'usersdata');

if(mysqli_connect_error()){
    die('Connection Error');
}
$sql = "INSERT INTO users
VALUE(?,?,?,?,?);";

if(!empty($name && $email && $password && $number)){

    
$result = $conn->prepare($sql);
$result->bind_param('issss',$id,$name, $email, $number, $hash);

if($result->execute()){
        header("Location:logger.php");
        
}else{

    echo "Not";
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
<title>Register</title>
</head>
<body>
        

    <div class="container m-5">
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="form-inline">
                <div class="card p-5">
                    <div class="d-flex justify-content-center">
                    <div class="card-head"><h5>Register</h5></div>
                    </div>
                    <div class="card-body">
                        <div class="form form-inline">
                            <label for="name">Name</label>
                             <input type="text" name="name" id="" class="form-control" placeholder="Your Full Name" required>
                             
                        </div>
                        <div class="form-inline">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="" class="form-control" placeholder="Your Email" required>
                        </div>
                        <div class="form-inline">
                            <label for="number">Number</label>
                            <input type="" name="number" id="" class="form-control" placeholder="Your Number" required>
                        </div>
                        <div class="card-inline">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="" placeholder="Your Password" required>
                        </div>

                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="card-foot">
                            <input type="submit" value="Register" name="submit" class="form-control bg-danger">
                        </div>
                    </div><br>
                    <div class="d-flex justify-content-end">
                        <h6><a href="logger.php" class="card-link">Login</a></h6>
                    </div>
                </div>
            </form>
        </div>
    </div>






<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
