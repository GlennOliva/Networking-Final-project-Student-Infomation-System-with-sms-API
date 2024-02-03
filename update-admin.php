<?php include('config/dbcon.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/form.css">

    <link rel="shortcut icon" href="images/gamcologo.png" type="image/x-icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    <div class="grid-container">


    <?php
  if(!isset($_SESSION['admin_id']))
  {
      echo '<script>
                                      swal({
                                          title: "Error",
                                          text: "You must login first before you proceed!",
                                          icon: "error"
                                      }).then(function() {
                                          window.location = "admin-login.php";
                                      });
                                  </script>';
                                  exit;
  }
  
  
  ?>
      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
        </div>
        <?php
         if(isset($_SESSION['admin_id']))

         {
             $admin_id = $_SESSION['admin_id'];
            
         
            
             //sql query to get all data in database
             $sql2 = "SELECT * FROM tbl_admin WHERE id = $admin_id";

             //check if the query is executed or not
             $result2 = mysqli_query($conn,$sql2);

             //count rows to check if we have foods or not in database
             $count2 = mysqli_num_rows($result2);

           

             if($count2>0)
             {
                 //we have food
                 while($row1=mysqli_fetch_assoc($result2))
                 {
                     //GET THE VALUE FROM INDI COLS
                     $email = $row1['email'];
                    

                 ?>
                   <div class="header-right">
                    <p>Welcome back: <b><?php echo $email;?></b></p>
                  </div>
        
                  <?php

                  }
                }
                  else
                  {
                      //we don't have admin
                    
                      echo '<script>
                      swal({
                          title: "Error",
                          text: "Admin not available",
                          icon: "error"
                      }).then(function() {
                          window.location = "admin-acc.php";
                      });
                  </script>';
                  exit;
                  }

                  
                }



        ?>
      
      </header>
      <!-- End Header -->

     <!-- Sidebar -->
     <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="logo"><img src="images/emplogonew.png" alt=""></span><br>
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">

        <li class="sidebar-list-item">
  <a href="dashboard.php" class="dashboard-link">
    <span class="material-icons-outlined" style="color: white">dashboard</span> 
    <span class="dashboard-text">Dashboard</span>
  </a>
</li>


<li class="sidebar-list-item">
  <a href="admin-acc.php" class="dashboard-link">
    <span class="material-icons-outlined" style="color: white">person</span> 
    <span class="dashboard-text">Admin account</span>
  </a>
</li>


<li class="sidebar-list-item">
  <a href="student-acc.php" class="dashboard-link">
    <span class="material-icons-outlined" style="color: white">person</span> 
    <span class="dashboard-text">Employee</span>
  </a>
</li>

<li class="sidebar-list-item">
  <a href="view-all-message.php" class="dashboard-link">
    <span class="material-icons-outlined" style="color: white">message</span> 
    <span class="dashboard-text">View All Message</span>
  </a>
</li>

<li class="sidebar-list-item">
  <a href="groupmessage.php" class="dashboard-link">
    <span class="material-icons-outlined" style="color: white">message</span> 
    <span class="dashboard-text">Group Message</span>
  </a>
</li>
     
       
<li class="sidebar-list-item">
  <a href="admin-logout.php" class="dashboard-link">
    <span class="material-icons-outlined" style="color: white">logout</span> 
    <span class="dashboard-text">Logout</span>
  </a>
</li>
         
        
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">UPDATE ADMIN</p>
        </div>


                    <?php

            //1get the id 
            $id = $_GET['id'];

            //create sql querty

            $sql = "SELECT * FROM tbl_admin WHERE id=$id";

            //execute the query
            $result = mysqli_query($conn,$sql);

            //check if the query is executed or not!
            if($result == True)
            {
                //check if the data is available or not
                $count = mysqli_num_rows($result);

                //ccheck if we have admin data or not
                if($count==1)
                {
                    //display the details
                    //echo "admin available"; 
                    $row = mysqli_fetch_assoc($result);


                    $email = $row['email'];


                  
                }
                else
                {
                    header('Location: admin-acc.php');
                    exit();
                }
            }

            ?>

        <form action="" method="post" enctype="multipart/form-data">

           
 
 
     <div class="flex">
         
 
          <div class="inputBox">
             <span>Update Email (required)</span>
             <input type="text" class="box" required maxlength="100" placeholder="enter email" name="email" value="<?php echo $email;?>">
          </div>
 
         
 




</div>
<input type="hidden" name="id" value="<?php echo $id;?>">
<input type="submit" value="Update admin" class="btn" name="update_admin">
</form>
      </main>
      <!-- End Main -->




    </div>


    <?php
    
        //check whether the submit button is clicked or not
        if(isset($_POST['update_admin']))
        {
            $id = $_POST['id'];
            $email = $_POST['email'];


            


            //create sql query update
            $sql = "UPDATE tbl_admin SET email = '$email'   WHERE id = '$id'";

            //execute the query
            $result = mysqli_query($conn,$sql);

            //check the query executed or not
            if($result == True)
            {
                //query update sucess
                echo '<script>
                swal({
                    title: "Success",
                    text: "Admin Successfully Update",
                    icon: "success"
                }).then(function() {
                    window.location = "admin-acc.php";
                });
            </script>';
            
            exit; // Make sure to exit after performing the redirect
            }
            else{
                //failed to update
                echo '<script>
                    swal({
                        title: "Error",
                        text: "Admin Failed to  Update",
                        icon: "error"
                    }).then(function() {
                        window.location = "update-admin.php";
                    });
                </script>';

                exit;
            }
        }
    ?>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
  </body>
</html>