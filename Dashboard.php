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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <link rel="shortcut icon" href="images/gamcologo.png" type="image/x-icon">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
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
          <p class="font-weight-bold">DASHBOARD</p>
        </div>

        <div class="main-cards">

            

          <?php
            $sql1 = "SELECT COUNT(*) AS item_count FROM employee";

            $itemres = mysqli_query($conn, $sql1);

            $count = mysqli_num_rows($itemres);

            if($itemres)
            {
              $row = mysqli_fetch_assoc($itemres);
              $item_count = $row['item_count'];
            }
            
            ?>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">EMPLOYEE</p>
              <span class="material-icons-outlined text-orange">person</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $item_count;?></span>
          </div>

          <?php
            $sql3 = "SELECT COUNT(*) AS emp_count FROM tbl_message";

            $empres = mysqli_query($conn, $sql3);

            $count = mysqli_num_rows($empres);

            if($empres)
            {
              $row = mysqli_fetch_assoc($empres);
              $emp_count = $row['emp_count'];
            }
            
            ?>


          <div class="card">
            <div class="card-inner">
              <p class="text-primary">MESSAGE SENT</p>
              <span class="material-icons-outlined text-green">email</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $emp_count;?></span>
          </div>

          <?php
            $sql4 = "SELECT COUNT(*) AS admin_count FROM tbl_admin";

            $adminres = mysqli_query($conn, $sql4);

            if($adminres)
            {
              $row = mysqli_fetch_assoc($adminres);
              $admin_count = $row['admin_count'];
            }
            
            ?>


          <div class="card">
            <div class="card-inner">
              <p class="text-primary">ADMIN NO.</p>
              <span class="material-icons-outlined text-red">person</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $admin_count;?></span>
          </div>

        </div>


        



        </div>
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->

    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
  </body>
</html>