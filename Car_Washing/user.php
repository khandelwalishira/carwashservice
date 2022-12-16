<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no" />

  <!-- style.css For Custom Styling -->
  <link rel="stylesheet" href="style.css" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
   integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />

  <!-- fontawesome cdn For Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
  integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ=="crossorigin="anonymous" />

  <title>Car Washing User Login</title>

</head>

<body >
  <!-- ==============header menu section starts here============== -->
  <section class="header_menu" id="header_menu">
    <div class="container-fluid px-0 shadow">
      <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 ">
        <a class="navbar-brand pl-5 pl-small-0" href="index.html">
         <img src="images/Logo.png" class="img img-fluid" width="120px"
          alt="LOGO">
        </a>
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
             <a class="nav-link" href="user.php" style="font-size:25px"><b>User&emsp;&emsp;&emsp;</b></a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="admin.php" style="font-size:25px"><b>Admin&emsp;&emsp;&emsp;</b></a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="contact.html" style="font-size:25px"><b>Contact Us&emsp;&emsp;&emsp;</b></a>
            </li>
            
        </ul>
        </div>
      </nav>
    </div>
  </section>
<div class="bg-img">
            
    <div class="content">
        <img src="images/Logo.png">
        <br>
        <br>
        <?php
        if(isset($_POST['submit'])){
          //Set connection variable
             $server="localhost";
             $username="root";
             $password="";
           //Create a database connection
             $con=mysqli_connect($server,$username,$password,"carwash");
             $email=$_POST['email'];
             //I need to send this email to your appointments
             $password=$_POST['password'];
              $email_search="select * from userlogin where email='$email'";
              $query=mysqli_query($con,$email_search);
             

              //In how many rows does my email id is present
              $email_count=mysqli_num_rows($query);
              if($email_count){
                $email_pass=mysqli_fetch_assoc($query);
                $db_pass=$email_pass['password'];
                
                if($password==$db_pass){
                  //move to appointment.php
                  echo "Login Succesfully";
                  ?>
                  <script>
                    location.replace("appointment.php");
                    </script>
                  <?php


                }else{
                  echo "Incorrect Password";

                }
              }else{
                   echo "Invalid Email";
              }
            }

     
        
        ?>
        <header>Login </header>
        <form action="user.php" method="post">
            <div class ="field">
                <span class= "fa fa-user"></span>
                <input type="text"  class="email" name="email" required Placeholder="Email id">  
           </div>
           <div class ="field space">
            <span class= "fa fa-lock"></span>
            <input type="password" class="password" name="password" required Placeholder="Password"> 
            <span class="show">SHOW</span> 
       </div>
       <div class="pass">
        <a href="#">Forgot Password?</a>
        <!-- href="F:\Project\HTML\dashboard.html" -->
       </div> 
        <button  class="btn btn-primary btn-block" name="submit">LOGIN</button>  
   <br>
    <div class ="signup">Don't have account?
        <a href="signup.php"><b> SignUp Now</b></a>
   
    </div>
    </form>
    </form>
   </div>
        </form>
    </div>
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