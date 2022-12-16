<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Your Appointments</title>
  </head>
  <body>
    <div class="container">
         <div class="row">
             <div class="col-md-12 mt-4">
                 <div class="card">
                     <div class="class-header">
                         <h4 class="card-title">Your Appointments</h4>
                     </div>
                     <div class="class-body">
                         <form action="yourappointment.php" method="post">
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <input type="text"  name="filter_value"class="form-control" placeholder="Enter your car Number and check the status">
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <button type ="submit" name="filter_btn" class="btn btn-primary">Filter Data</button>
                                 </div>
                             </div>
                         </form>
                         <table class="table table-bordered">
  <thead>

    <tr>
      <th scope="col">Id</th>
      <th scope="col">carnumber</th>
      <th scope="col">city</th>
      <th scope="col">servicecenter</th>
      <th scope="col">appointmentdate</th>
      <th scope="col">status</th>
      <th scope="col">carname</th>
      <th scope="col">contact</th>
     <th scope="col">email</th>
      <th scope="col">date</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $connection=mysqli_connect("localhost","root","","carwash");
     
 


        if(isset($_POST['filter_btn'])){
            $value_filter=$_POST['filter_value'];
            $query="SELECT * FROM  users WHERE CONCAT(carnumber) LIKE '%$value_filter'";
            $query_run=mysqli_query($connection ,$query);
            if(mysqli_num_rows($query_run)>0){
                while($row=mysqli_fetch_array($query_run)){
                   
                    ?>
              <tr>
                
                <td><?php echo $row['Id'];?> </td>
                <td><?php echo $row['carnumber'];?> </td>
                <td><?php echo $row['city'];?> </td>
                <td><?php echo $row['servicecenter'];?> </td>
                <td><?php echo $row['appointmentdate'];?> </td>
                <td><?php echo $row['status'];?> </td>
                <td><?php echo $row['carname'];?> </td>
                <td><?php echo $row['contact'];?> </td>
                <td><?php echo $row['email'];?> </td>
                <td><?php echo $row['date'];?> </td>
                 
             </tr>
                    <?php

                }

            }else{
               ?>
               <tr>
               <td colspan="7">"No Record Found" </td>  

              </tr>
              <?php
            }

        }
     ?>
    
 
  </tbody>
</table>
<a href="logout.php"><input type="submit "name="" value="Logout" style="background:blue; color :white; cursor:pointer;"></a>

                     </div>
                 </div>
             </div>

         </div>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>