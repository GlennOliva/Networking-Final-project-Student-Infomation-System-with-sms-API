<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAMCO Free Sms Website</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <!----Navbar starts here-->
    <nav class="navbar navbar-expand-lg" id="sticky-navbar" style="background-color: #EEEEEE;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GAMCO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#message">Message</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    
    

      <!----Hero section starts here-->
      <section class="hero" id="hero">
        <img src="images/textbg.jpg" alt="">
        <div class="hero-container">
            <h1>Free Message Application</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis ducimus accusamus totam? Molestias sunt magni possimus distinctio voluptate consequuntur a, placeat accusantium dolore amet obcaecati, earum at illo delectus quis.</p>
            <button>Message</button>
        </div>
      </section>

      <!----About section starts here-->
      <section class="about" id="about">
        <h1>What Can Mass Texting Do for You?</h1>
        
  <div class="text-container">
    <img src="images/Icon_Contacts.svg" alt="">
    <h1>Conveniently Engage All Your Contacts at Once</h1>
    <p>Mass text messaging can reach your entire audience instantly, but you can also group your contacts for targeted campaigns.</p>
  </div>

  <div class="text-container">
    <img src="images/Icon_Personlize.svg" alt="">
    <h1>
        Create a Closer Connection with Personalization</h1>
    <p>Improve your customer engagement and audience experience by personalizing your mass text messages.</p>
  </div>

  <div class="text-container">
    <img src="images/Icon_Schedule.svg" alt="">
    <h1>Schedule Texts & Campaigns with Ease</h1>
    <p>Set scheduled mass texts to send during optimal read times, or create a drip campaign to drive even more engagement.</p>
  </div>

  <div class="text-container">
    <img src="images/Icon_Optimize.svg" alt="">
    <h1>Track Message Performance to Optimize Messaging</h1>
    <p>Check our reporting tools to see which texts popped and which didn’t, then use key data points to optimize future messaging.</p>
  </div>
      </section>


       <!----Services section starts here-->

       <section class="services" id="services">
        <h1>Services</h1>

        <div class="services-col">
            <img src="images/sms-removebg-preview.png" alt=""">
            <h1>Fast Message</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia dolore molestias facilis nesciunt nihil quam minus excepturi eligendi, ipsam, at saepe officia quas iure autem inventore repellendus consequatur atque similique!</p>
        </div>

        <div class="services-col">
            <img src="images/coinnew1.png" alt="">
            <h1>No Hidden Fees</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia dolore molestias facilis nesciunt nihil quam minus excepturi eligendi, ipsam, at saepe officia quas iure autem inventore repellendus consequatur atque similique!</p>
        </div>

        <div class="services-col">
            <img src="images/reportnew.png" alt="">
            <h1>Reporting Tools</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia dolore molestias facilis nesciunt nihil quam minus excepturi eligendi, ipsam, at saepe officia quas iure autem inventore repellendus consequatur atque similique!</p>
        </div>
       </section>

       <section class="message" id="message">
        <h1 style="margin-bottom: 20px;">Message</h1>
        <form action="send.php" method="post" class="form-container">
            <div class="mb-3 form-group">
                <label for="exampleInputNumber" class="form-label">Number</label>
                <div class="input-container">
                    <input type="text" class="form-control full-width" name="phonenumber" id="exampleInputNumber" aria-describedby="numberHelp" placeholder="Enter your number">
                </div>
            </div>
            <div class="mb-3 form-group">
                <label for="exampleInputMessage" class="form-label">Message</label>
                <div class="input-container">
                    <textarea class="form-control full-width" name="message" id="exampleInputMessage" rows="3" placeholder="Enter your message"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
        
    </section>


    <footer style="background-color: #EEEEEE;  text-align: center; height: 7vh; margin-top: 2%; padding: 20px;">
        <h1 style="font-size: 24px;">Developed by: GAMCO</h1>
    </footer>

    
        
  
        
      
      
</body>
</html>