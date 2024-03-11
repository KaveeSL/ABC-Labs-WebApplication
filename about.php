<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css\footer.css">
<head>
    <style>
        .container .content{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.container .content .left-side{
  width: 25%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-top: 15px;
  position: relative;
}
.content .left-side::before{
  content: '';
  position: absolute;
  height: 70%;
  width: 2px;
  right: -15px;
  top: 50%;
  transform: translateY(-50%);
  background: #afafb6;
}
.content .left-side .details{
  margin: 14px;
  text-align: center;
}
.content .left-side .details i{
  font-size: 30px;
  color: #3e2093;
  margin-bottom: 10px;
}
.content .left-side .details .topic{
  font-size: 18px;
  font-weight: 500;
}
.content .left-side .details .text-one,
.content .left-side .details .text-two{
  font-size: 14px;
  color: #afafb6;
}
.container .content .right-side{
  width: 75%;
  margin-left: 75px;
}
.content .right-side .topic-text{
  font-size: 23px;
  font-weight: 600;
  color: #3e2093;
}
.right-side .input-box{
  height: 50px;
  width: 100%;
  margin: 12px 0;
}
.right-side .input-box input,
.right-side .input-box textarea{
  height: 100%;
  width: 100%;
  border: none;
  outline: none;
  font-size: 16px;
  background: #F0F1F8;
  border-radius: 6px;
  padding: 0 15px;
  resize: none;
}
.right-side .message-box{
  min-height: 110px;
}
.right-side .input-box textarea{
  padding-top: 6px;
}
.right-side .button{
  display: inline-block;
  margin-top: 12px;
}
.right-side .button input[type="button"]{
  color: #fff;
  font-size: 18px;
  outline: none;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  background: #3e2093;
  cursor: pointer;
  transition: all 0.3s ease;
}
.button input[type="button"]:hover{
  background: #5029bc;
}
@media (max-width: 950px) {
  .container{
    width: 90%;
    padding: 30px 40px 40px 35px ;
  }
  .container .content .right-side{
   width: 75%;
   margin-left: 55px;
}
}
@media (max-width: 820px) {
  .container{
    margin: 40px 0;
    height: 100%;
  }
  .container .content{
    flex-direction: column-reverse;
  }
 .container .content .left-side{
   width: 100%;
   flex-direction: row;
   margin-top: 40px;
   justify-content: center;
   flex-wrap: wrap;
 }
 .container .content .left-side::before{
   display: none;
 }
 .container .content .right-side{
   width: 100%;
   margin-left: 0;
 }
}
@media (max-width: 820px) {
  .container{
    margin: 40px 0;
    height: 100%;
  }
  .container .content{
    flex-direction: column-reverse;
  }
 .container .content .left-side{
   width: 100%;
   flex-direction: row;
   margin-top: 40px;
   justify-content: center;
   flex-wrap: wrap;
 }
 .container .content .left-side::before{
   display: none;
 }
 .container .content .right-side{
   width: 100%;
   margin-left: 0;
 }
}
.container > div {
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background-color: #f1f2f9;
    direction: rtl;
}

.slider {
    width: 1000px;
    margin: 200px;

}
.container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px,200px));
    grid-template-rows: 200px 200px;
    gap: 15px;
    grid-auto-flow: dense;
}
.overlay {
    position: absolute;
    z-index: 100;
    width: 100%;
    min-height: 100px;
    max-height: auto;
    bottom: 0;
    border-radius: 0 0 10px 10px;
    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.87));
}
.overlay h3 {
    padding: 20px;
    padding-bottom: 0;
    color: #fff;
}
.box-image {
    object-fit: cover;
    border-radius: 10px;
    height: 100%;
    width: 100%;
}

.first {
    position: relative;
    grid: 5/3;
    grid-row: 1/-1;
    grid-column: 1/3;
}
.second {
    grid-column: -1/3;
}
.third {
    grid-row: 2/2;
}
.fourth {
    grid-row: 2/2;
}

h2 {
      color: #006DD3;
    }
    </style>
</head>

<body>

    <br><br>
    <center><h2>About ABC Laboratories</h2><br>
    <h3><h1>- ABC LabS -</h1><br>
    Welcome to ABC Laboratories, your trusted partner in medical testing and diagnostics. With a <br> 
    commitment to excellence and innovation, we strive to provide superior healthcare services to our <br>
patients. At ABC Laboratories, we understand the importance of accurate and timely medical <br>
testing in ensuring optimal health outcomes.
<br><br>
<h2>Our Mission</h2><br>


Our mission is to revolutionize the healthcare industry by leveraging technology to enhance<br>
 efficiency, accuracy, and patient satisfaction. We aim to provide a seamless experience for <br>
 our patients from appointment scheduling to receiving test results, all while maintaining the <br>
 highest standards of quality and professionalism.
<br>
<h2>Our Services</h2><br>

ABC Laboratories offers a comprehensive range of medical testing services to cater to the diverse <br>
needs of our patients. Our state-of-the-art facilities are equipped with cutting-edge technology and <br>
staffed by highly skilled professionals dedicated to delivering accurate and reliable results. <br>
Whether you require routine blood tests, specialized diagnostics, or screening for chronic <br>
conditions, we are here to meet your needs with precision and compassion.
<br><br>
<h2>Why Choose ABC Laboratories?</h2><br>

<h4>Advanced Technology</h4> We utilize the latest advancements in medical technology to <br>ensure the highest level of accuracy and reliability in our testing procedures.
<br>
<h4>Expert Team</h4> Our team of experienced physicians, technicians, and support staff are <br>committed to providing personalized care and attention to each patient.
<br>
<h4>Convenience</h4> With our web-based Lab Appointment System, scheduling appointments and <br>accessing test results has never been easier. Say goodbye to long wait times and cumbersome paperwork!
<br>
<h4>Quality Assurance</h4>We adhere to strict quality control measures to ensure that every <br>test conducted at ABC Laboratories meets the highest standards of accuracy and reliability.
<br>
<h4>Patient-Centric Approach</h4> Your health and well-being are our top priorities. <br>We strive to make your experience at ABC Laboratories as comfortable and stress-free as possible.
<br><br><br>
<h2>Get Started Today</h2><br>

Experience the difference with ABC Laboratories. Schedule your appointment online or contact us to learn <br>
more about our services. We look forward to serving you and helping you achieve your health goals.
<br><br><br>
<h2>Contact Us</h2><br>

ABC Laboratories<br>
123 Main Street<br>
City, State ZIP<br>
Phone: (123) 456-7890<br>
Email: info@abclabs.com




<center>
    <div class="slider">
    <div class="container">
            <div class="first">
                <img class="box-image" src="img\a1.jpg" alt="">
            </div>
            <div class="second">
                <img class="box-image" src="img\a2.jpg" alt="">
            </div>
            <div class="third">
                <img class="box-image" src="img/a3.jpg" alt="">

            </div>
            <div class="fourth">
                <img class="box-image" src="img\a4.jpg" alt="">
            </div>
            
        </div>
    </div>
</center>
<center>
<h2>Thank you for choosing ABC Laboratories for all your medical testing needs.<br>
 Your health is our priority!</h2>
<br><br>

</center>
</h3>


   

<br><br><br><br><br><br><br>
<footer id="picassoFooter">
        <div class="footer-navigation">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
        <div class="footer-contact">
        <p>Email Us:</p> <a href="email.html">abc.labspvtltd@gmail.com</a>
        <p>Call Us: 045 456 7890</p>
    </div>
        <div class="footer-social">
            <h3>Follow Us</h3>
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank" class="social-icon">FB</a>
                <a href="https://twitter.com" target="_blank" class="social-icon">TW</a>
                <a href="https://instagram.com" target="_blank" class="social-icon">IG</a>
            </div>
        </div>
        <div class="footer-art">
            <canvas id="picassoCanvas"></canvas>
        </div>
    </footer>

<!--footer ABC LABS text-->
    <script>
        window.onload = function() {
            var canvas = document.getElementById('picassoCanvas');
            if (canvas.getContext) {
                var ctx = canvas.getContext('2d');
    
                // Set canvas size
                canvas.width = 200;
                canvas.height = 200;
    
                // Add text "ABC LABS" in white color and bold
                ctx.fillStyle = "#FFFFFF";
                ctx.font = "bold 30px Arial";
                ctx.textAlign = "center";
                ctx.textBaseline = "middle";
                ctx.fillText("| ABC LABS |", 100, 100);
            }
        };
    </script>
</body>

</html>