<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>PAY | NSUK </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="w3c.css">
    <script defer src="static/footerdate.js"></script>
    <script  defer src="static/welslide.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link href="https://nacos.org.ng/img/nnl%20ico%20(1).png" rel="icon" type="image">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-win8.css">
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

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
  font-size:20px
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
        .exo {
  font-family: "Exo", sans-serif;
  font-optical-sizing: auto;
  font-weight: 600;
  font-style: normal;
}
.container {
    margin: 0 auto; /* Center the container */
    max-width: 800px; /* Set a maximum width */
}

        </style>
    </head>


    <body>

      <div class="w3-container-fluid w3-mobile animate-in-element dropdown-container w3-bar">

        <div class="kanit-regular w3-mobile">

        <div class="   w3-mobile" style="padding-top:11px; padding-right: 16px;">
            <img src="img/nacoss.png" class=" w3-left " style="width:35%; height:10%">


            <a href="contact.html" class="w3-bar-item w3-button w3-right w3-button w3-hover-none w3-hide-small w3-round-sm w3-border-white  w3-hover-border-green w3-hover-text-green ">Contact</a>
            <a href="about.html" class="w3-bar-item w3-button w3-right w3-button w3-hover-none w3-hide-small w3-round-sm w3-border-white w3- w3-hover-border-green w3-hover-text-green  ">About</a>
            <a href="payments.html" class="w3-bar-item w3-button w3-right w3-button w3-hover-none w3-hide-small w3-round-sm w3-border-white w3- w3-hover-border-green w3-hover-text-green">Payments</a>
            <a href="leadership.html" class="w3-bar-item w3-button w3-right w3-button w3-hover-none w3-hide-small w3-round-sm w3-border-white w3- w3-hover-border-green w3-hover-text-green ">Leadership</a>
            <a href="index.html" class="w3-bar-item w3-button w3-right w3-button w3-hover-none w3-hide-small w3-round-sm w3-border-white w3- w3-hover-border-green w3-hover-text-green">Home</a>
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
    
    <form  action="process_payment.php" method="post">
    
      <div class="w3-container container w3-round-large"  style= "width: 100%; background-color: rgb(183, 255, 168); flex-direction: row;">
        <div class="w3-row-padding" >

         
            <br>
           <h5 class="w3-center exo" style ="font-size: px;">Fill carefully to make payment</h5> 
        <br><br>
        <div class="w3-half">
           <label for="name" >First Name:</label>
        <input  class="w3-input w3- w3-round-large w3-animate-input" type="text" name="firstname" required><br>
          </div>

          <div class="w3-half">
          <label for="name" >Last Name:</label>
        <input  class="w3-input w3-border w3-round-large w3-animate-input" type="text" name="lastname" required><br>
          </div>

          <div class="w3-half">
        <label for="matric_number">Matric Number:</label>
        <input  class="w3-input w3-border w3-round-large w3-animate-input" type="text" name="matric_number" required><br>
          </div>

          <div class="w3-half w3-">
        <label for="academic_level">Phone Number:</label>
        <input  class="w3-input w3-border w3-round-large w3-animate-input" type="dropdown" name="academic_level" required><br>
          </div>
       
          <div class="w3-   " style="width: 45%; padding:10px">
            <select class="w3-select w3-border w3-round-large" name="academic_level" required>
              <option value="" disabled selected>Select Level</option>
              <option value="1">100L</option>
              <option value="2">200L</option>
              <option value="3">300L</option>
              <option value="4">400L</option>
            </select>
          </div>
<br><br>
<br>
        <label class="exo" style="font-size: 17px; ;">Select Item:</label><br>
        <input class="w3-check" type="checkbox" name="items[]" value="tshirt" data-price="3200.00"> T-shirt (3,200.00 NGN)<br>
        <input class="w3-check" type="checkbox" name="items[]" value="idcard" data-price="1500.00"> ID Card (1,500.00 NGN)<br>
        <input class="w3-check" type="checkbox" name="items[]" value="both" data-price="4800.00"> T-shirt & ID Card (4,800 NGN)<br>
        <br>
        <br>

        <div class="w3-center">
        <label for="amount">Amount to Pay:</label>
        <span id="checkout-amount">0.00 NGN</span><br>


        <br>

        <button type="submit" class = "w3-button w3-win8-emerald  w3-round-large w3-hover w3-hover-pale-green"  style = "color: green">Pay Now</button>
        <br><br>
      </div>
      </div>
    </form>
  </div>


<br><br><br><br><br>

    <!--Footer Start-->
  <div class="w3-container-fluid w3-black W3-mobile " style="height: 100%">
    <footer>

       <div class="w3-center">
      <img src="img/footer_nacos.png " div class="w3-center"  style="width:49%;max-width:100%; height:29% ; padding-top:20px">
       </div>
 <br>
       <div class="w3-container w3-mobile">
       </div>

         <div class="w3-row-padding w3-mobile">
           <div class="w3-col s4 w3-mobile exo" >


            <p  style="font-weight: bold; text-decoration: underline; font-size:21px "  class="w3-text-green exo">CONTACT US</p>
            <div class="contact exo">
            <img src="icons/google-maps.gif" class="w3-bar-item w3-circle" style="width: 9%; max-width:10% ; font-size:16px;">

             Computer Science Department <br>
             Nasarawa State University Keffi <br>
             Nigeria.
 <br><br>
             <img src="icons/phone.gif" class="w3-bar-item w3-circle" style="width: 9%; max-width:10%; font-size:16px;">
             Phone: +234------------
             <br><br>
             <img src="icons/email.gif" class="w3-bar-item w3-circle" style="width: 9%;  max-width:10%; font-size:16px;">

             E-mail: Shrine@gmail.com
             <br><br>
             <img src="icons/facebook.png" class="w3-bar-item w3-circle" style="width: 9%;  max-width:10%; font-size:16px;">



           </div>
           </div>
           <div class="w3-col s4  w3-mobile exo w3-text-white" >


             <p style="font-weight: bold;text-decoration: underline; font-size:21px"  class="w3-text-green">QUICK LINKS</p>
             <div class="w3-text-white">
             <a href="index.html" style="text-decoration: none; color:white; font-size:16px;" class="w3-hover w3-hover-text-green w3-text-white"> - HOME</a>
 <br><br>
             <a href="leadership.html" style="text-decoration: none; color:white ; font-size:16px;"  class="w3-hover w3-hover-text-green">- LEADERSHIP </a>
             <br><br>
             <a href="payments.html" style="text-decoration: none; color:white ; font-size:16px;"  class="w3-hover w3-hover-text-green">- GALLERY</a>
             <br><br>
             <a href="about.html" style="text-decoration: none; color:white ; font-size:16px;"  class="w3-hover w3-hover-text-green">- ABOUT</a>
             <br><br>
             <a href="contact.html" style="text-decoration: none; color:white ; font-size:16px;"  class="w3-hover w3-hover-text-green">- CONTACT</a>

            </div>
           </div>
           <div class="w3-col s4  w3-mobile exo " >


            <p style="font-weight: bold; text-decoration: underline; font-size:21px" class="w3-text-green">PAYMENTS</p>

            <a href="###" style="text-decoration: none; color:white; font-size:16px ; font-size:16px;"  class="w3-hover w3-hover-text-green" >- Pay Dues</a>
            <br><br>
                        <a href="###" style="text-decoration: none; color:white; font-size:16px;"  class="w3-hover w3-hover-text-green">- Check Dues Details </a>
                        <br><br>
                        <a href="###" style="text-decoration: none; color:white ; font-size:16px;"  class="w3-hover w3-hover-text-green">- Query Payment Status</a>
                        <br><br>
                        <a href="###" style="text-decoration: none ;color:white; ; font-size:16px;" ; class="w3-hover w3-hover-text-green">- Payment Complaint</a>
                        <br><br>



         </div>


         </div>
<br>

         <div class="w3-center w3-text-white w3-mobile w3-hover w3-hover-text-green" style="font-family: verdana; font-size: 15px; font-weight: bold;">
           <p id="currentDateParagraph"  class="cantarell-regular "> </p>
         </div>







     </footer>
  

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
       <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('input[name="items[]"]');
            const checkoutAmount = document.getElementById('checkout-amount');

            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    updateCheckoutAmount();
                });
            });

            function updateCheckoutAmount() {
                let totalAmount = 0;
                checkboxes.forEach(function (checkbox) {
                    if (checkbox.checked) {
                        totalAmount += parseFloat(checkbox.getAttribute('data-price'));
                    }
                });
                checkoutAmount.textContent = totalAmount.toFixed(2) + " NGN";
            }
        });
    </script>

    
         </body>
       </html>

