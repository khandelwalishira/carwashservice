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
$email=$_POST['email'];
$password=$_POST['password'];
$sql= "INSERT INTO `carwash`.`userlogin` ( `name`, `email`, `password`) VALUES ( '$name', '$email', '$password');";
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
<html lang="en" dir=""ltr>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no" />

        <!-- style.css For Custom Styling -->
        <link rel="stylesheet" href="style.css" />
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <!-- Bootstrap CSS -->
        <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />

        <title>Car Washing User SignUp</title>

    </head>

    <body>
           <!-- ==============header menu section starts here============== -->
        <section class="header_menu" id="header_menu">
            <div class="container-fluid px-0 shadow">
                <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 ">
                <a class="navbar-brand pl-5 pl-small-0" href="index.html">
                 <img src="images/Logo.png" class="img img-fluid" width="120px" alt="LOGO"></a>
                    <button
                      class="navbar-toggler"
                      type="button"
                      data-toggle="collapse"
                      data-target="#navbarSupportedContent"
                      aria-controls="navbarSupportedContent"
                      aria-expanded="false"
                      aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mx-auto">
                       <li class="nav-item active">
                         <a class="nav-link" href="index.html" style="font-size:25px"><b>Home&emsp;&emsp;&emsp;</b> <span
                         class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                         <a class="nav-link" href="user.html" style="font-size:25px"><b>User&emsp;&emsp;&emsp;</b></a>
                        </li>
                        <li class="nav-item">
                         <a class="nav-link" href="admin.html" style="font-size:25px"><b>Admin&emsp;&emsp;&emsp;</b></a>
                        </li>
                        <li class="nav-item">
                         <a class="nav-link" href="contact.html" style="font-size:25px"><b>Contact Us&emsp;&emsp;&emsp;</b></a>
                        </li>
                        
                    </ul>
                    </div>
                  </nav>
                </div>
              </section>
  <!-- ==============header menu section ends here============== -->
  <div class="bg-img">
            <div class="content1">
                <img src="images/Logo.png">
        <br>
        <?php
           if($insert==true){
               echo "<p>
                   Data is added successfully . </p>";
           }
           ?>
        <br>
                <header>Register</header>
                <form action="signup.php" method="post">
                    <div class ="field">
                        <span class= "fa fa-user"></span>
                        <input type="name" name="name" required Placeholder="Full Name">  
                   </div>
                <br>
                  <div class ="field">
                    <span class="fa fa-envelope-o"></span>
                   <input type="email" name="email" required Placeholder="email">  
                </div>
                <br>
                   <div class ="field">
                    <span class="fa fa-key" ></span>
                    <input type=" password" class="password" name="password" required Placeholder="set password"> 
                    <span class="show">SHOW</span> 
               </div>
           <br>
                
                <button type="submit" name="submit">SIGN UP</button>  
                <br>
                <a href="index.html" style="color: rgb(246, 78, 12);"><b> Go to Homepage</b></a>
            </form>
            </form>
           </div>
                </form>
            </div>
        
        <script>
            const pass_field=document.querySelector('.password');
            const show_btn=document.querySelector('.show');
            show_btn.addEventListener('click',function(){
                if(pass_field.type==="password"){
                    pass_field.type="text";
                    show_btn.style.color="#3498db";
                    show_btn.textContent="HIDE";
                }else{
                    pass_field.type="password";
                    show_btn.style.color="#222";
                    show_btn.textContent="SHOW";
                }
            
            });

            
        </script>
    </body>
</html>