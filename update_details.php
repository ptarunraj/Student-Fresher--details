<?php
      //error_reporting(0);
      include("connection.php");
    
        $id = $_GET['id'];

        $query = "SELECT * FROM forms where ID = $id";
        $data = mysqli_query($conn,$query);

       // $rows = mysqli_num_rows($data);

        $result = mysqli_fetch_assoc($data)
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Update Details</title>
    </head>
    <body>
        <div class = "title">
            <h1>Update Details</h1>
        </div>
        <div class="container">
        
        
        <form class = "forms" action = "#" method = "POST" enctype="">
            <div class="input_field">
            <label>Your Name: </label>
            <input type="text" name="name" value = "<?php echo $result['NAME'];?>"required>
            </div>
            
            <div class="input_field">
            <label>Gender: </label>
            <select name="gender"  required>
                <option value="">Select</option>

                <option value="Male"

                <?php 
                        if($result['GENDER'] == 'Male')
                            echo "selected";

                ?>

                >Male</option>


                <option value="Female"

                <?php 
                        if($result['GENDER'] == 'Female')
                            echo "selected";

                ?>

                >Female</option>


                <option value="Others"

                <?php 
                        if($result['GENDER'] == 'Others')
                            echo "selected";

                ?>

                >Others</option>
            </select>
            </div>
           
            <div class="input_field">
            <label>Mobile No: </label>
            <input type="text" name="mobile" value =" <?php echo $result['MOBILE_NUMBER'];?>"  required>
            </div>
            
            <div class="input_field">
            <label>Email:</label>
            <input type="Email" name="email" value = "<?php echo $result['EMAIL'];?>" required>
            </div>
            
           <div class="input_field">
            <label>Resume:</label>
            <input type="File" name="res" >
            </div> 
           
            <div class = "sub">
               <center><input type="submit" name="update" value="Update Details" class="btn"></center> 
            </div>

            
        </form>
        </div>
    </body>
</html>

<?php

if($_POST['update'])
{

     $name = $_POST['name'];
     $gender = $_POST['gender'];
     $mobile = $_POST['mobile'];
     $email = $_POST['email'];

      if(strlen($mobile) > 0 && strlen($mobile) != 10)
    {
        echo "mobile number should be 10 digits only!";
    }
    else
    {

    
     
     $query = "UPDATE forms set NAME = '$name',GENDER = '$gender',MOBILE_NUMBER = '$mobile',EMAIL = '$email'where ID = $id";
     $data = mysqli_query($conn,$query);

     if($data)
     {
        echo "<script>alert('Record Updated Successfully')</script>";
        ?>
         <meta http-equiv = "refresh" content = "0; url = http://localhost/Task/display.php" />
        <?php
     }
     else
     {
        echo "<script>alert('Record Updation Failed')</script>";
     }
    }
     
}


/*//print_r($_FILES["Res:"]);
$filename =  $_FILES["Res:"]["name"];
$tempname =  $_FILES["Res:"]["tmp_name"];
$folder = "Resume/".$filename;
move_uploaded_file($tempname,$folder);

//echo "<img src='$folder' height = '100px' width = '100px'>";*/

?>