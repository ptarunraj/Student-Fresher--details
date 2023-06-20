<?php
      //error_reporting(0);
      include("connection.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1">
        <title>File Upload</title>
       <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class = "title">
            <h1>Upload Your Details</h1>
        </div>
        <div class="container">  
            <form class = "forms" action = "#" method = "POST" enctype="multipart/form-data">
            <div class="input_field">
            <label>Your Name: </label>
            <input type="text" name="name" required>
            </div>
            
            <div class="input_field">
            <label>Gender: </label>
            <select name="gender"  required>
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
            </select>
            </div>
           
            <div class="input_field">
            <label>Mobile No: </label>
            <input type="text" name="mobile" placeholder="10 digits only"  required>
            </div>
            
            <div class="input_field">
            <label>Email:</label>
            <input type="Email" name="email"  required>
            </div>
            
            <div class="input_field">
            <label>Resume:</label>
            <input type="File" name="res">
            </div>
           
            <div class = "sub">
               <center><input type="submit" name="submit" value="Submit" class="btn"></center> 
            </div>

            
        </form>
        </div>
    </body>
</html>

<?php

if($_POST['submit'])
{

     $name = $_POST['name'];
     $gender = $_POST['gender'];
     $mobile = $_POST['mobile'];
     $email = $_POST['email'];

     //check file constraints

     if($_FILES["res"]["size"]>50000)
     {
        die("File is too large");
     }

     $fileext = end(explode('.',$_FILES["res"]["name"]));


     if($fileext != "pdf")
     {
        die("incorrect file type");
     }

     $filename =  $_FILES["res"]["name"];
     $tempname =  $_FILES["res"]["tmp_name"];
     $folder = "Resume/".$filename;
     move_uploaded_file($tempname,$folder);

      if(strlen($mobile) > 0 && strlen($mobile) != 10)
    {
        echo "mobile number should be 10 digits only!";
    }
    else
    {

     $query1 = "INSERT INTO forms (NAME,GENDER,MOBILE_NUMBER,EMAIL,FILE) values('$name','$gender','$mobile','$email','$folder')";

     $data = mysqli_query($conn,$query1);

     if($data)
     {
        echo "Data successfully inserted";
     }
     else
     {
        echo "Data insertion failed";
     }
    }
     
}


/*//print_r($_FILES["res"]);
$filename =  $_FILES["res"]["name"];
$tempname =  $_FILES["res"]["tmp_name"];
$folder = "Resume/".$filename;
move_uploaded_file($tempname,$folder);

//echo "<img src='$folder' height = '100px' width = '100px'>";*/

?>
