<?php
$insert=false;
if(isset($_POST['name'])){
    //Set connection variable
$server="localhost";
$username="root";
$password="";
//Create a database connection
$con=mysqli_connect($server,$username,$password);
//Check for connection success
if(!$con)
{
   die("connection to this database fail due to".mysqli_connect_error());
}
// echo "Success connecting to the database"
//collect post variables
$name=$_POST['name'];
$services=$_POST['services'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$cost=$_POST['cost'];
$email=$_POST['email'];
$sql= "INSERT INTO `carwash`.`servicecenters` ( `name`,`services`,`address`, `contact`, `cost`, `email`) VALUES ( '$name','$services','$address', '$contact', '$cost', '$email');";
// echo $sql;
//Execute the Query
if($con->query($sql)==true){
    // echo "Successfully Inserted";
    //Flag for successfull insertion
    $insert=true;
}else{
    echo "ERROR : $sql <br> $con->error";
}
//Close the database connection
$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Center Info</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt=" Car Wash image">
    <div class="container">
    
        <h2>Welcome to IRK services for car wash </h2>
           <p>Enter the details of the services center here</p>
           <?php
           if($insert==true){
               echo "<p>
                   Data is added successfully . </p>";
           }
           ?>
           <form action="centers.php" method="post" >
               <input type="text" name="name" id="name" placeholder="Enter name of your center">
               <input type="text" name="services" id="services" placeholder="Enter your services here"> 
               <input type="text" name="address" id="address" placeholder="Enter your address here">
               <input type="number" name="cost" id="cost" placeholder="Cost for car wash">
               <input type="phone" name="contact" id="contact" placeholder="Enter your mobile number">
               <input type="email" name="email" id="email" placeholder="Enter your email">
               <button class="btn" id="submitcenters" name ="submit">Submit</button>
                <a href="./allappointments.php" class="btn" id="appointmentsPending">Sell all the pending appointments</a>
             
           </form>
    
           
    </div>
  
</body>
</html>