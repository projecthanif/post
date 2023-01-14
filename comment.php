<?php
$comment = $_POST['text']??'';
$name = $_POST['name'] ?? '';
$submit = $_POST['submit'] ?? '';

// Image Upload
if($_SERVER['REQUEST_METHOD']=="POST"){
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    
    
    $extension = array('jpg', 'png', 'jpeg');
    $get_file_type = explode('.', $file_name);
    $file_type = end($get_file_type);
    if(!in_array($file_type,$get_file_type)){
        echo "PNG,JPG,JPEG need only";
    }
    if($file_size>2097152){
        echo "FIle size must not be greater than 2MB";
    }else{
        $new_file_name = "IMG-" . rand(100000, 200000) . "." . $file_type;
           $move= move_uploaded_file($file_tmp, 'upload/' . $new_file_name);
       
    }
// connection to database
$conn=mysqli_connect('localhost','root','','usersdata');

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (mysqli_connect_error()) {
        die('Connection failed');
    }

   
    if($file_type){
        $sql = "INSERT INTO post(text,image)
        VALUE('$comment','$new_file_name');";
        if ($conn->query($sql)) {
            header("Location:modal.php");
        }
    }else{
    
    $sql = "INSERT INTO post(text)
    VALUE('$comment');";

        if ($conn->query($sql)) {
        header("Location:comment.php");
    }
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.0/litera/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- css -->
<link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap.css">
<link rel="stylesheet"  href="bootstrap-5.2.3-dist/css/bootstrap.css">
<link rel="stylesheet"  href="bootstrap-5.2.3-dist/css/bootstrap.min.css">
<link rel="stylesheet"  href="bootstrap-5.2.3-dist/css/bootstrap.rtl.css">
<link rel="stylesheet"  href="bootstrap-5.2.3-dist/css/bootstrap.rtl.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<title></title>
</head>
<body style="background-color: #7c8f9c;">
 
    <div class="containerfluid m-3">
       <div class="d-flex flex-direction-row justify-content-between ">
       <div>
       <h4 class="fixed"></h4>
       </div>  
       <div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mymodal">Post</button>
        </div>
       </div>     
      <br>
        <div class="d-flex justify-content-around">
            <div class="container">
              <div class="row">
            <?php
                /**  to get date from database  */
                $conn = mysqli_connect('localhost', 'root', '', 'usersdata');
                    $data = "SELECT * FROM post;"; 
                    $out=mysqli_query($conn,$data);
                if(mysqli_num_rows($out)){
                    while ($result = mysqli_fetch_assoc($out)){
                            $present_date = $result['present_time'];
                            $ex = explode('-', $present_date);
                            $first = $ex[0];
                            $second = $ex[1];
                            $third = $ex[2];
                        switch ($second) {
                            case 01:
                                $month = "January";
                                break;
                            case 02:
                                $month = "Febuary";
                                break;
                            case 03:
                                $month = "March";
                                break;
                            case 04:
                                $month = "April";
                                break;
                        }
                            $date = $third . " " . $month . "," . $first;
                            $username = $result['username'];
                            $text = $result['text'];
                            $image = $result['image'];

                            $date_time = $result['present_date'];
                            $exp = explode(' ', $date_time);
                            $end = end($exp);

                    if($image||$text){
                        if(($image)==null){
                            $heredoc=<<<TEXT
                            <div class="col-sm-4">
                            <div class="shadow-sm p-1 mb-2 " border-radius:5px">
                            <div class="card p-5 m-2 bg-default" style="width:350px; height:390%;background-color:#acb3b8;">
                            <div class="card-body">                           
                                $date
                                $end<br>
                                $text
                                <br><br>                     
                                </div></div></div></div>
                            TEXT;
                            echo $heredoc; 
                           
                        }elseif(($text)==null){
                            $heredoc = <<<TEXT
                            <div class="col-sm-4">
                            <div class="shadow-sm p-1 mb-2" border-radius:5px">
                            <div class="card p-2 m-2 bg-default" style="width:350px; height:390%;background-color:#acb3b8;" >
                            <div class="card-img">                           
                             <div class="card-img">
                            <img src="upload/$image" class="thumbnail" width="330px" height="300px" style="border-radius:5px;"><br><br>
                            <div class="card-text"><div class="d-flex justify-content-end">$date $end</div> </div>
                            </div>
                            </div></div></div></div>
                        TEXT;
                            echo $heredoc;
                            
                        }elseif(empty($text && $image)){
                             
                        }else{
                            $heredoc = <<<TEXT
                            <div class="col-sm-4">
                            <div class="shadow-sm p-1 mb-2" border-radius:5px">
                            <div class="card m-2 bg-default" style="width:350px; height:390%; background-color:#acb3b8;">
                            <div class="card-body" >                           
                            <div class="card-img">
                            <img src="upload/$image" class="thumbnail" width="320px" height="290px" style="border-radius:5px;">
                            </div><div class="d-flex justify-content-center p-2">
                            $text</div>
                            <div class="d-flex align-items-end justify-content-end p-2">$date $end<br></div>
                            </div></div>
                            </div></div>
                        TEXT;
                            echo $heredoc;
                            
                        }
                    }

                            
                                              
                    }                                 
                }
            ?> 
            </div>
            </div>
            </div>                  
        </div>  
            <!-- Message -->             
        <div class="container">
            <div class="modal fade" id="mymodal">
                <div class="modal-dialog">
                    <div class="modal-content p-4" style="background-color: rgb(220, 234, 246);">
                        <div class="d-flex justify-content-center">
                            <div class="card p-4" style="background-color: rgb(220, 234, 246);">
                            <div class="card-body">
                            <form action="" method="post" class="form " enctype="multipart/form-data">
                                <h4 class="">Leave a comment</h4>
                                <div class="form-group p-2">
                                    <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="customfile">
                                    <label for="customfile" class="custom-file-input">Custom file</label>
                                    </div>
                                    <label for="messg">Message</label>
                                    <textarea name="text" id="" cols="30" rows="10" class="form-control"style="background-color: rgb(220, 234, 246);"></textarea>
                                </div><br>
                                <div class="d-flex justify-content-between">
                                    <button type="button" data-bs-dismiss="modal" class="btn btn-danger">close</button>
                                    <button type="submit" name="submit" value="Post" class="btn btn-primary">Post</button>
                                </div>
                            </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>             
    </div>


<script src="bootstrap-5.2.3-dist/js/bootstrap.js"></script>
<script src="bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
