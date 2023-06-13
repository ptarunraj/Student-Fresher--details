<?php
      //error_reporting(0);
      include("connection.php");

      $id = $_GET['id'];

      $query = "DELETE from forms where ID = $id";
      $data = mysqli_query($conn,$query);

      if($data)
      {
            echo "<script>alert('Record Deleted successfully')</script>";
        ?>
         <meta http-equiv = "refresh" content = "0; url = http://localhost/Task/display.php" />
        <?php
     }
     else
     {
        echo "<script>alert('Record Deletion Failed')</script>";
     }
      
?>