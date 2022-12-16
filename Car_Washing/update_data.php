
<?php
$server="localhost";
$username="root";
$password="";
//Create a database connection
$con=mysqli_connect($server,$username,$password,"carwash");
$id=$_GET['id'];
$q="SELECT *FROM users where id='$id'";
$data=mysqli_query($con,$q);
$total=mysqli_num_rows($data);
$row=mysqli_fetch_assoc($data);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt=" Car Wash image">
    <div class="container">

        <h2>Welcome to IRK services for car wash </h2>
           <p>Update the Appointment for  Car wash</p>
          
           <form action="appointment.php" method="post" >
           <input type="text" name="carnumber" value="<?php echo $row['carnumber']; ?>" id="carnumber" placeholder="Enter the car Number">
           <select name="city" id="city" required>
                   <option value="">--Select the city where yoy want to book an appointment--</option>
                   <option value="Wardha">Wardha</option>
                   <!-- <option value="Nagpur">Nagpur</option> -->
        
               </select>
                <select name="servicecenter" id="servicecenter" required>
                   <option value="">--Select the service center from here--</option>
                   <option value="Sai car center">Sai car center</option>
                   <option value="Janta Garage">Janta Garage</option>
                   <option value="Car Shine Services">Car Shine Services </option>
                   <option value="Poonam Washing chambers">Poonam Washing Chamber</option>
               </select>
              
               <input type="date" name="appointmentdate" id="appointmentdate" placeholder="Enter the date for appointmnet">
                 <select name="status" id="status" > 
                 <option value="">--please select status --</option>
                   <option value="Accept">Accepted</option>
                   <option value="Reject">Rejected</option>
               </select> 
               
              
               <input type="text" name="carname" id="carname" placeholder="Enter the name of car. for eg:Hyandai City">
               <input type="phone" name="contact" id="contact" placeholder="Enter your mobile number">
               <input type="email" name="email" id="email" placeholder="Enter your email">
               
               <button class="btn">Update details</button>
              
               
           </form>
           
    </div>
  
</body>
</html>