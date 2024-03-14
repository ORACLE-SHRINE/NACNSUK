<?php
session_start();

// Check if payment data is available in the session
if (isset($_SESSION['payment_data'])) {
    // Retrieve payment data
    $transactionReference = isset($_SESSION['payment_data']['transactionReference']) ? $_SESSION['payment_data']['transactionReference'] : '';
    $email = isset($_SESSION['payment_data']['email']) ? $_SESSION['payment_data']['email'] : '';
    $matricNumber = isset($_SESSION['payment_data']['matricNumber']) ? $_SESSION['payment_data']['matricNumber'] : '';
    $amount = isset($_SESSION['payment_data']['amount']) ? $_SESSION['payment_data']['amount'] : '';

    // Clear payment data from the session
    unset($_SESSION['payment_data']);
} else {
    // Redirect to an error page or home page if payment data is not available
    header('Location: error.php');
    exit();
}
?>


<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Reciept</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="w3c.css">
   
    <!--chatbot-->
   
    <!--end of bot-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link href="https://nacos.org.ng/img/nnl%20ico%20(1).png" rel="icon" type="image">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-win8.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,900;1,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Cantarell&family=IBM+Plex+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">

    <script>
        function myFunction() {
          var x = document.getElementById("demo");
          if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
          } else {
            x.className = x.className.replace(" w3-show", "");
          }
        }
        </script>
        <style>
.kanit-regular {
  font-family: "Kanit", sans-serif;
  font-weight: 400;
  font-style: normal;
  font-size:25px
}
         .mySlides {display:none;}
         .footer {font-size:12px}
         .contact { font-family:verdana; font-size:14px; font-weight:bold }
         .animate-in {
            opacity: 0;
            transform: scale(0.4);
            transition: opacity 0.4s ease-out, transform 0.4s ease-out;
        }

        /* Final state of elements */
        .is-visible {
            opacity: 1;
            transform: scale(1);
        }
        .nunito{
  font-family: "Nunito", sans-serif;
  font-optical-sizing: auto;
  font-weight: 700;
  font-style: normal;
  font-size:x-large;
}

.ibm-plex sans-regular {
  font-family: "IBM Plex Sans", sans-serif;
  font-weight: 400;
  font-style: normal;
}
.cantarell-regular {
  font-family: "Cantarell", sans-serif;
  font-weight: 400;
  font-style: normal;
}
.nunito-bb {
  font-family: "Nunito", sans-serif;
  font-optical-sizing: auto;
  font-weight: 900;
  font-style: normal;
  font-size:28px;
}
.exo {
  font-family: "Exo", sans-serif;
  font-optical-sizing: auto;
  font-weight: 600;
  font-style: normal;
}
.caveat {
  font-family: "Caveat", cursive;
  font-optical-sizing: auto;
  font-weight: 400;
  font-style: normal;
}
.container {
    margin: 0 auto; /* Center the container */
    max-width: 800px; /* Set a maximum width */
}
        </style>
    </head>

    <body>

      <div class="w3-container-fluid w3-mobile animate-in-element w3-hide dropdown-container w3-bar">

        <div class="kanit-regular w3-mobile">

        <div class="   w3-mobile" style="padding-top:11px; padding-right: 16px;">
            <img src="img/nacoss.png" class=" w3-left " style="width:35%; height:10%">


            <a href="contact.html" class="w3-bar-item w3-button w3-right w3-button w3-hover-none w3-hide-small w3-round-sm w3-border-white w3-bottombar w3-hover-border-green w3-hover-text-green ">Contact</a>
            <a href="about.html" class="w3-bar-item w3-button w3-right w3-button w3-hover-none w3-hide-small w3-round-sm w3-border-white w3-bottombar w3-hover-border-green w3-hover-text-green  ">About</a>
            <a href="payments.html" class="w3-bar-item w3-button w3-right w3-button w3-hover-none w3-hide-small w3-round-sm w3-border-white w3-bottombar w3-hover-border-green w3-hover-text-green">Payments</a>
            <a href="leadership.html" class="w3-bar-item w3-button w3-right w3-button w3-hover-none w3-hide-small w3-round-sm w3-border-white w3-bottombar w3-hover-border-green w3-hover-text-green ">Leadership</a>
            <a href="index.html" class="w3-bar-item w3-button w3-right w3-button w3-hover-none w3-hide-small w3-round-sm w3-border-white w3-bottombar w3-hover-border-green w3-hover-text-green">Home</a>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>

        </div>


        <div class="w3-right w3-hover w3-mobile " style="font-size:19px">
        <div id="demo" class="w3-bar-block  w3-hide w3-hide-large w3-hide-medium w3-right">
          <a href="index.html" class="w3-bar-item w3-button w3-right w3-button w3-hover-white w3-hover-text-green ">Home</a>
            <a href="contact.html" class="w3-bar-item w3-button w3-right w3-button w3-hover-white w3-hover-text-green ">Contact</a>
            <a href="about.html" class="w3-bar-item w3-button w3-right w3-button w3-hover-white w3-hover-text-green ">About</a>
            <a href="payments.html" class="w3-bar-item w3-button w3-right w3-button w3-hover-white w3-hover-text-green ">Payments</a>
            <a href="leadership.html" class="w3-bar-item w3-button w3-right w3-button w3-hover-white w3-hover-text-green ">Leadership</a>
        </div>
        </div>
    </div>
  </div>

  <br><br><br>
    
  <div class="w3-container w3-mobile kanit-regular exo w3-center" style="font-size:20px">
    <img class=" "  src="img/nacoss.png" style="width: 27%; max-width: 40%; min-width: 45%; width: 20%;" >
</div>

 <br>
 <br>

 <div class="w3-container w3-mobile container"> 
       
    <p class="w3-center w3-mobile exo " style="font-size:18px; color: green;">Transaction Reciept</p>
      
      <br>

    <div class="w3-ul " style="margin-left: 14px;">
    
    <li><p style="font-size:14px ;"><strong>Transaction ID:</strong>  <?php echo $transactionReference; ?></p> </li>
    <li><p style="font-size:14px ;"><strong>Email:</strong> <?php echo $email; ?></p> </li>
    <li> <p style="font-size:14px ;"><strong>Matric Number:</strong> <?php echo $matricNumber; ?></p> </li>
    <li><p style="font-size:14px ;"><strong>Amount Paid:</strong> <?php echo $amount; ?> NGN</p> </li>
    <li><p style="font-size:14px ;"><strong>Payment Status :</strong> Paid</p> </li>
    </div>  

    <br><br><br>
    <!-- You can customize this page with additional details or a link to a dashboard, etc. -->
    <div class="w3-center">
    <button onclick="window.print()" class="w3-center w3-button w3-round-large exo w3-hover-pale-green" style="background-color: rgb(61, 243, 61);">Print Reciept</button>
    </div>
</div>  



  <!--Footer End-->
           <script>
             // Function to check if an element is in the viewport
             function isElementInViewport(el) {
                 const rect = el.getBoundingClientRect();
                 return (
                     rect.top >= 0 &&
                     rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
                 );
             }
         
             // Function to handle scroll events
             function handleScroll() {
                 const animatedElements = document.querySelectorAll('.animate-in');
                 animatedElements.forEach(element => {
                     if (isElementInViewport(element)) {
                         element.classList.add('is-visible');
                     }
                 });
             }
         
             // Attach the handleScroll function to the scroll event
             window.addEventListener('scroll', handleScroll);
         
             // Trigger initial check
             handleScroll();
         </script>
        <br><br><br><br>
        <footer>

            <div class="w3-container-fluid w3-mobile kanit-regular" style="height: 100%; color:black">
            
            
                     <div class="w3-center  w3-mobile kanit-regular" style=" background-color: rgb(255, 255, 255)   ;font-size: 14px; font-weight: bold; color:rgb(0, 0, 0)">
                       <p id="currentDateParagraph"  class="cantarell-regular "> </p>
                     </div>
              
                 
            </div>
            
            </footer>
<script defer src="static/footerdate.js"></script>
<script  defer src="static/welslide.js"></script>
</body>
</html>
