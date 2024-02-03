<?php include('config/dbcon.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="shortcut icon" href="images/gamcologo.png" type="image/x-icon">
    <title>GAMCO LOGIN PAGE | REGISTER PAGE</title>

    <style>
        body {
            background-color: #101721; /* Set background color to black */
            color: #fff; /* Set text color to white */
            font-family: Arial, sans-serif; /* Keep the font family the same */
            margin: 0; /* Remove default margin */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Make the body take the full height of the viewport */
        }

        form {
            background-color: #111; /* Darker background color for the form */
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }

        label {
            color: #fff; /* Light text color for labels */
            display: block;
            margin-bottom: 5px;
        }

        input {
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }

        button {
            background-color: #08295e; /* Green button color */
            color: #fff; /* Light text color for the button */
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }

        button:hover {
            background-color: #2057b0; /* Darker green color on hover */
        }

        .ca {
            color: #ffffff; /* White color for the "Already have an account?" link */
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }

        .ca:hover {
            text-decoration: underline; /* Underline the link on hover */
        }

        .error {
            color: #ff6961; /* Red color for error messages */
        }

        .success {
            color: #77dd77; /* Green color for success messages */
        }
    </style>
</head>

<body>

    <div class="container" id="container">
       
        <div class="form-container sign-in" style="height: 100%;">
            <form method="post">
            <h1 style="text-align: center; ">EMPLOYEE REGISTRATION</h1>
                

                <input type="text" name="name" placeholder="Fullname">
                <input type="text" name="phonenumber" placeholder="Phonenumber">
                <input type="text" name="gender" placeholder="Gender">
                <button type="submit" name="register">Sign Up</button>
                
            </form>
            <a href="Admin-login.php"><button class="hidden" id="register">Login as Admin!</button></a>
            
        </div>
        
    </div>

    <script src="login.js"></script>
</body>

</html>

<?php
if(isset($_POST['register']))
{
    $full_name = $_POST['name'];
    $phone_number = $_POST['phonenumber'];
    $gender = $_POST['gender'];


    
    $sql = "INSERT INTO employee SET  name = '$full_name', phone_number = '$phone_number', gender = '$gender'";

          //execute query to insert data in database
          $result = mysqli_query($conn , $sql) or die(mysqli_error());

          //check the query is executed or not

          if ($result == true) {
            
              
              echo '<script>
                  swal({
                      title: "Success",
                      text: "Employeee Register Successfully ",
                      icon: "success"
                  }).then(function() {
                      window.location = "User-login.php";
                  });
              </script>';
              
              exit; // Make sure to exit after performing the redirect
          }
          
      else{
          echo '<script>
          swal({
              title: "Error",
              text: "Admin Failed to  Insert",
              icon: "error"
          }).then(function() {
              window.location = "User-login.php";
          });
      </script>';

      exit;
          
      }

          
}

?>