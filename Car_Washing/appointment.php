<?php
$insert=false;
if(isset($_POST['carnumber'])){
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
$carnumber=$_POST['carnumber'];
$city=$_POST['city'];
$servicecenter=$_POST['servicecenter'];
$appointmentdate=$_POST['appointmentdate'];
$status=$_POST['status'];
$carname=$_POST['carname'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$date=$_POST['date'];
$sql= "INSERT INTO `carwash`.`users` ( `carnumber`,`city`,`servicecenter`, `appointmentdate`, `status`,`carname`,`contact`, `email`, `date`) VALUES ( '$carnumber','$city','$servicecenter', '$appointmentdate', '$status', '$carname','$contact','$email','$date');";

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
    <title>Appointment Booking</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt=" Car Wash image">
    <div class="container">

        <h2>Welcome to IRK services for car wash </h2>
           <p>Book an Appointment for  Car wash</p>
           <?php
           if($insert==true){
               echo "<p>
                   Data is added successfully . </p>";
           }
           ?>
           <form action="appointment.php" method="post" >
           <input type="text" name="carnumber" id="carnumber" placeholder="Enter the car Number">
           <select name="city" id="city" required>
                   <option value="">--Select the city where yoy want to book an appointment--</option>
                   <option value="Wardha">Wardha</option>
                   <!-- <option value="Nagpur">Nagpur</option> -->
        
               </select>
                <select name="servicecenter" id="servicecenter" required>
                <option value=""><--Select the service center from here--></option>
            
                   <option value="Janta Garage">Sai Car center</option>
                   <option value="Janta Garage">Janta Garage</option>
                   <option value="Car Shine Services">Car Shine Services </option>
                   <option value="Poonam Washing chambers">Poonam Washing Chamber</option>
               </select>
              
               <input type="date" name="appointmentdate" id="appointmentdate" placeholder="Enter the date for appointmnet">
                 <select name="status" id="status" > 
                 <option value=""><--please select status as pending--></option>
                   <option value="Pending" >Pending </option>
               </select> 
               
              
               <input type="text" name="carname" id="carname" placeholder="Enter the name of car. for eg:Hyandai City">
               <input type="phone" name="contact" id="contact" placeholder="Enter your mobile number">
               <input type="email" name="email" id="email" placeholder="Enter your email">
               
               <button class="btn">Submit</button>
               <!-- <button class="btn">Your Appointments</button> -->
               <a href="yourappointment.php" class="btn" id="appointmentsPending">Your Appointments</a>
               
           </form>
           
    </div>
    <script>
        //disable the previous all dates.
        var todayDate=new Date();
        var month=todayDate.getMonth()+1;
        var year=todayDate.getUTCFullYear();
        var tdate=todayDate.getDate();
        //we want all the things in the string and 0 attach to it
        if(month<10){
            month="0"+month;
        }
        if(tdate<10){
            date="0"+date;
        }
        var mindate=year+"-"+month+"-"+tdate;
        document.getElementById("appointmentdate").setAttribute("min",mindate);
        console.log(mindate);

    </script>
  
</body>
</html>