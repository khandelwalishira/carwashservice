<?php
      $connection=mysqli_connect("localhost","root","","carwash");
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['snoEdit'])){
      // Update the record
      
        $id = $_POST["snoEdit"];

        $title = $_POST["titleEdit"];
        $description = $_POST["descriptionEdit"];
    
      // Sql query to be executed
      $sql = "UPDATE users SET `carnumber` = '$title' , `status` = '$description' WHERE users.`Id` = $id";
      $result = mysqli_query($connection, $sql);
      if($result){
        $update = true;
    }
    else{
        echo "We could not update the record successfully";
    }
    }
     }
   
?>
    <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>All Appointments</title>
  </head>
  <body>
      <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="allappointments.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="title">carnumber</label>
              <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="desc">Status</label>
              <input type="text" class="form-control" id="descriptionEdit" name="descriptionEdit" >
            </div> 
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
 
    <div class="container">
         <div class="row">
             <div class="col-md-12 mt-4">
                 <div class="card">
                     <div class="class-header">
                         <h4 class="card-title">ALL Appointments</h4>
                     </div>
                     <div class="class-body">
                         <form action="allappointments.php" method="post">
                             <div class="row">
                                 <div class="col-md-5">
                                     <div class="form-group">
                                         <input type="text"  name="filter_value"class="form-control" placeholder="Filter/Add name of the place">
                                     </div>
                                 </div>
                                 <div class="col-md-5">
                                     <div class="form-group">
                                         <input type="text"  name="filter_valuenext"class="form-control" placeholder="Filter/Search with the dates">
                                     </div>
                                 </div>
                                 <div class="col-md-2">
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
     <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
      <?php

        if(isset($_POST['filter_btn'])){
            $value_filter=$_POST['filter_value'];
            $value_filternext=$_POST['filter_valuenext'];
            $query="SELECT * FROM  users WHERE CONCAT(servicecenter) LIKE '%$value_filter' AND CONCAT(appointmentdate) LIKE '%$value_filternext' ";
            $query_run=mysqli_query($connection ,$query);
            if(mysqli_num_rows($query_run)>0){
                while($row=mysqli_fetch_assoc($query_run)){
                   
                    ?>
                <?php
               
              echo "<tr>
                
                <td> ". $row['Id']."</td>
                <td> ".$row['carnumber'] ." </td>
                <td> ". $row['city']." </td>
                <td> ".$row['servicecenter']." </td>
                <td>  ". $row['appointmentdate'] ."</td>
                <td>  " .$row['status'] ."</td>
                <td>  ".$row['carname'] ."</td>
                <td>  ".$row['contact'] ."</td>
                <td>  ".$row['email'] ."</td>
                <td>  ".$row['date']."</td>
                <td> <button class='edit btn btn-sm btn-primary'id=" .$row['Id'] ." >Edit</button></td>
                
                 
             </tr>";
             ?>
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
    
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        carnumber = tr.getElementsByTagName("td")[1].innerText;
        status = tr.getElementsByTagName("td")[5].innerText;
        console.log(carnumber, status);
        titleEdit.value = carnumber;
        descriptionEdit.value = status;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })      
  </script>
  </body>
</html>