<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Uploaded Files Details</title>
	<style type="text/css">
		body
		{
			background-color: #C4DFDF ;
		}
		table
		{
			background-color: white;
		}
		h1
		{
			color: #116D6E;
		}
		.update
		{
			width: 40%;
		}
		.delete
		{
			width: 40%;
		}
	</style>
</head>
<body>

</body>
</html>
<?php
        include("connection.php");
        //error_reporting(0);

        $query = "SELECT * FROM forms";
        $data = mysqli_query($conn,$query);

        $rows = mysqli_num_rows($data);
        //$result = mysqli_fetch_assoc($data);

        

        if($rows != 0)
        {
 ?>
              <h1 align="center">DETAILS OF UPLOADED FILES</h1>
            <center>  <table border = "1" cellpadding="4" width="100%">
              	<tr>
              	<th width = "5%">ID</th>	
              	<th width="15%">NAME</th>
              	<th width="10%">GENDER</th>
              	<th width="10%">MOBILE_NUMBER</th>
              	<th width="20%">EMAIL</th>
              	<th width = "20%">FILE</th>
              	<th width="20%">OPERATIONS</th>
              	
              	</tr>
              
              <?php
              while($result = mysqli_fetch_assoc($data))
              {
                 
              	
              	  echo "<tr>
              	        <td>".$result['ID']."</td>
              	        <td>".$result['NAME']."</td>
                    	  <td>".$result['GENDER']."</td>
                      	<td>".$result['MOBILE_NUMBER']."</td>
                      	<td>".$result['EMAIL']."</td> 
                      	
                         <td><a href='download.php?file=".$result['FILE']."'>".$result['FILE']."</a></td>
                    	
                      	<td> &nbsp&nbsp&nbsp <a href = 'update_details.php?id=$result[ID] & nme=$result[NAME] & gen=$result[GENDER] & mno=$result[MOBILE_NUMBER] & eml=$result[EMAIL] & fle=$result[FILE]' ><input type = 'submit' value = 'Update' class = 'update'></a> 


                      	&nbsp&nbsp&nbsp&nbsp


                      	 <a href = 'delete.php?id=$result[ID] & nme=$result[NAME] & gen=$result[GENDER] & mno=$result[MOBILE_NUMBER] & eml=$result[EMAIL] & fle=$result[FILE] ' ><input type = 'submit' value = 'Delete' class = 'delete'></a></td>
                    	  </tr>";

              }
        }
        else
        {
        	echo "No records found";
        }
?>

</table></center>

