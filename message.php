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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="shortcut icon" href="images/gamcologo.png" type="image/x-icon">
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
          <p class="font-weight-bold">Message</p>
        </div>


        <?php
        
        $user_id = $_GET['id'];

        // sql query to get all data in database
        $sql = "SELECT * FROM employee WHERE id = $user_id";

        // check if the query is executed or not
        $res = mysqli_query($conn, $sql);

        // count rows to check if we have data or not in the database
        $count = mysqli_num_rows($res);

        if($count > 0) {
            // we have data
            while($row1 = mysqli_fetch_assoc($res)) {
                // GET THE VALUE FROM INDIVIDUAL COLUMNS
                $phonenumber = $row1['phone_number'];
            ?>
            <form  method="post" >
                <!-- Display the fetched phone number in the form -->
                <div class="flex">
                    <div class="inputBox">
                        <span>Phone_number (required)</span>
                        <input type="number" class="box" required maxlength="100" placeholder="enter number" name="phonenumber" value="<?php echo $phonenumber; ?>">
                    </div>

                    <div class="inputBox">
                        <span>Message(required)</span>
                        <textarea name="message" id="" cols="30" rows="5" placeholder="enter message"></textarea>
                    </div>
                </div>

            <?php
            }
        } else {
            // user not available
            echo '<script>
                    swal({
                        title: "Error",
                        text: "User not available",
                        icon: "error"
                    }).then(function() {
                        window.location = "student-acc.php";
                    });
                  </script>';
            exit;
        }
    
?>


    <!-- The rest of your form goes here -->
    <input type="submit"  class="btn" name="submit">
</form>



<?php
    use Infobip\Configuration;
    use Infobip\Api\SmsApi;
    use Infobip\Model\SmsDestination;
    use Infobip\Model\SmsTextualMessage;
    use Infobip\Model\SmsAdvancedTextualRequest;
    require __DIR__ . "/vendor/autoload.php";

    if(isset($_POST['submit']))
    {
        $message = $_POST['message'];
        $phonenumber = $_POST['phonenumber'];

        // Infobip API configuration
        $apiUrl = "5yem4x.api.infobip.com";
        $apiKey = "c11acaf079e55401016a988ab069a623-2918e7ef-a611-4451-be53-924127f3af80";

        $configuration = new Configuration(host: $apiUrl, apiKey: $apiKey);
        $api = new SmsApi(config: $configuration);

        // Create destination and message objects for API
        $destination = new SmsDestination(to: $phonenumber);
        $theMessage = new SmsTextualMessage(
            destinations: [$destination],
            text: $message,
            from: "GAMCO"
        );

        $request = new SmsAdvancedTextualRequest(messages: [$theMessage]);

        try {
            // Send message through Infobip API
            $response = $api->sendSmsMessage($request);

            // Insert message into the database
            // Assuming $conn is your database connection
            $insertSql = "INSERT INTO tbl_message (phone_number, message , status , emp_id) VALUES ('$phonenumber', '$message' , 'Delivered' , '$user_id')";
            $insertResult = mysqli_query($conn, $insertSql);

            if ($insertResult) {
                // Message successfully sent through API and saved to the database
                echo '<script>
                        swal({
                            title: "Success",
                            text: "Message Successfully Sent and Saved",
                            icon: "success"
                        }).then(function() {
                            window.location = "student-acc.php";
                        });
                    </script>';
                exit;
            } else {
                // Error inserting message into the database
                echo 'Error: ' . mysqli_error($conn);
            }
        } catch (Infobip\ApiException $e) {
            // Error sending message through Infobip API
            echo 'Error sending message through Infobip API: ' . $e->getMessage();
        }
    }
?>

        

     
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->

    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
  </body>
</html>