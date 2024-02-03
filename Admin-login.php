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
    <title>ADMIN LOGIN PAGE</title>
    <link rel="shortcut icon" href="images/gamcologo.png" type="image/x-icon">

    <style>
        body {
            background-color: #101721 ; /* Set background color to black */
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
            color: #ffffff; /* Green color for the "Create an account" link */
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }

        .ca:hover {
            text-decoration: underline; /* Underline the link on hover */
        }
    </style>
</head>

<body>

    <div class="container" id="container">
        
        <div class="form-container sign-in">
            <form method="post">
                <h1>Sign In</h1>
                <br>
                <span>or use your email password</span>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="login-submit">Sign In</button>
                
            </form>
            <a href="User-login.php"><button class="hidden" id="register">Login as Client!</button></a>
        </div>
        
    </div>

    <script src="login.js"></script>
</body>

</html>


<?php


    //check if the submit button is clicked or not
    if(isset($_POST['login-submit']))
    {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        //sql to check the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE email = '$email' AND password = '$password'";

        //execute the sql queery
        $result = mysqli_query($conn,$sql);

        //count the rows 
        $count = mysqli_num_rows($result);

        if($count==1)
        {

            $row = mysqli_fetch_assoc($result);
            $_SESSION['admin_id'] = $row['id'];
            
            //user is exist
            echo '<script>
            swal({
                title: "Success",
                text: "Login Successfully",
                icon: "success"
            }).then(function() {
                window.location = "dashboard.php";
            });
        </script>';

       



       
        
        exit;

        }
        else{
            //user not available
            echo '<script>
            swal({
                title: "Error",
                text: "Username or Password did not match",
                icon: "error"
            }).then(function() {
                window.location = "Admin-login.php";
            });
        </script>';
        
        exit;
        }
    }

?>