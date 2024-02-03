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

    <link rel="shortcut icon" href="images/gamcologo.png" type="image/x-icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>

  <?php
  // if(!isset($_SESSION['admin_id']))
  // {
  //     echo '<script>
  //                                     swal({
  //                                         title: "Error",
  //                                         text: "You must login first before you proceed!",
  //                                         icon: "error"
  //                                     }).then(function() {
  //                                         window.location = "admin-login.php";
  //                                     });
  //                                 </script>';
  //                                 exit;
  // }
  
  
  ?>
    <div class="grid-container">

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
      <main class="main-container" id="admin_table">
        <div class="main-title">
          <p class="font-weight-bold">View Message</p>
        </div>

        <style>
    .delivered-row {
        color: green; /* Set the desired background color for "Delivered" status */
    }
</style>

            <div class="btn-add">
            <a href="student-acc.php" class="btn1"><i class="material-icons-outlined">arrow_back</i>Back</a>
            </div>
          
               <table style="width: 80%;">
                <thead >
                    <tr>
                        <th>Id</th>
                        <th>emp_id</th>
                        <th>Phone_number</th>
                        <th>Message</th>
                        <th>Date & Time Message</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                //query to get all data from tbl_admin database
                $user_id = $_GET['id'];
                $sql = "SELECT * FROM tbl_message WHERE emp_id = '$user_id'";

                //execute the query
                $result = mysqli_query($conn,$sql);

                //check whether if the query is execute or not

                if($result==True)
                {
                    //count the rows to check we have data in database or not
                    $count = mysqli_num_rows($result);

                    $ids=1;

                    //check the num of rows
                    if($count>0)
                    {
                        while($rows=mysqli_fetch_assoc($result))
                        {
                            $id = $rows['id'];
                            $student_id = $rows['emp_id'];
                            $phone_number = $rows['phone_number'];
                            $message = $rows['message'];
                            $datetime = $rows['datemessage'];
                            $status = $rows['status'];

                            
                            $rowColorClass = ($status == 'Delivered') ? 'delivered-row' : '';

                            ?>
                               <tr>
                            <td><?php echo $ids++;?></td>
                            <td><?php echo $student_id;?></td>
                            <td><?php echo $phone_number;?></td>
                            <td><?php echo $message;?></td>
                            <td><?php echo $datetime;?></td>
                            <td class="<?php echo $rowColorClass; ?>"><?php echo $status;?></td>
                        
               
                    <td>
                        
                    </td>
                </tr>
                
                <?php
                        }
                    }
                    else
                    {

                    }

                }

            ?>

                </table>

         

      
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
    <script src="js/deladmin.js"></script>
  </body>
</php>