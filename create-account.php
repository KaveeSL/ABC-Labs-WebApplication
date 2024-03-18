<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
        
    <title>Create Account</title>
    <style>
        .container{
            animation: transitionIn-X 0.5s;
        }
    </style>
</head>
<body>

<?php

// Start session management
session_start();

// Include the Database class
require_once("connection.php");

// Define the SignUp class
class SignUp {
    // Private property to hold the database connection
    private $database;

    // Constructor to initialize the SignUp object with a database connection
    public function __construct($db) { // Constructor (Encapsulation)
        $this->database = $db; // Dependency Injection (Dependency Injection)
    }

    // Method to handle the sign-up process
    public function signUpProcess() { // Method (Encapsulation)
        // Initialize session variables
        $_SESSION["user"] = ""; // Encapsulation
        $_SESSION["usertype"] = ""; // Encapsulation

        // Set timezone and store current date in session
        date_default_timezone_set('Asia/Kolkata'); // Abstraction
        $_SESSION["date"] = date('Y-m-d'); // Abstraction

        // Initialize error message
        $error = ''; // Encapsulation

        // Check if the request method is POST
        if ($_SERVER["REQUEST_METHOD"] === "POST") { // Abstraction
            // Retrieve form data from session
            $fname = $_SESSION['personal']['fname']; // Encapsulation
            $lname = $_SESSION['personal']['lname']; // Encapsulation
            $name = $fname . " " . $lname; // Encapsulation
            $address = $_SESSION['personal']['address']; // Encapsulation
            $nic = $_SESSION['personal']['nic']; // Encapsulation
            $dob = $_SESSION['personal']['dob']; // Encapsulation
            $email = $_POST['newemail']; // Encapsulation
            $tele = $_POST['tele']; // Encapsulation
            $newpassword = $_POST['newpassword']; // Encapsulation
            $cpassword = $_POST['cpassword']; // Encapsulation

            // Validate password confirmation
            if ($newpassword == $cpassword) { // Abstraction
                // Prepare and execute SQL query to check if email already exists
                $sqlmain = "SELECT * FROM webuser WHERE email=?"; // Abstraction
                $stmt = $this->database->prepare($sqlmain); // Encapsulation
                $stmt->bind_param("s", $email); // Encapsulation
                $stmt->execute(); // Encapsulation
                $result = $stmt->get_result(); // Encapsulation

                // If email exists, set error message
                if ($result->num_rows == 1) { // Abstraction
                    $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>'; // Encapsulation
                } else {
                    // If email does not exist, insert user data into database
                    $sqlInsertPatient = "INSERT INTO patient(pemail, pname, ppassword, paddress, pnic, pdob, ptel) VALUES (?, ?, ?, ?, ?, ?, ?)"; // Abstraction
                    $stmtInsertPatient = $this->database->prepare($sqlInsertPatient); // Encapsulation
                    $stmtInsertPatient->bind_param("sssssss", $email, $name, $newpassword, $address, $nic, $dob, $tele); // Encapsulation
                    $stmtInsertPatient->execute(); // Encapsulation

                    // Insert user data into webuser table
                    $sqlInsertWebUser = "INSERT INTO webuser VALUES (?, 'p')"; // Abstraction
                    $stmtInsertWebUser = $this->database->prepare($sqlInsertWebUser); // Encapsulation
                    $stmtInsertWebUser->bind_param("s", $email); // Encapsulation
                    $stmtInsertWebUser->execute(); // Encapsulation

                    // Set session variables
                    $_SESSION["user"] = $email; // Encapsulation
                    $_SESSION["usertype"] = "p"; // Encapsulation
                    $_SESSION["username"] = $fname; // Encapsulation

                    // Redirect user to the index page
                    header('Location: patient/index.php'); // Abstraction
                    exit; // Abstraction
                }
            } else {
                // Set error message for password confirmation error
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>'; // Encapsulation
            }
        } else {
            // Set empty error message for non-POST requests
            $error = '<label for="promter" class="form-label"></label>'; // Encapsulation
        }

        // Return the error message
        return $error; // Encapsulation
    }
}

// Create instance of Database class
$database = new Database(); // Encapsulation

// Create instance of SignUp class
$signUp = new SignUp($database); // Encapsulation (Dependency Injection)

// Call signUpProcess method to handle sign up process
$error = $signUp->signUpProcess(); // Abstraction

?>




    <center>
    <div class="container">
        <table border="0" style="width: 69%;">
            <tr>
                <td colspan="2">
                    <p class="header-text">Let's Get Started</p>
                    <p class="sub-text">It's Okey, Now Create User Account.</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="newemail" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="email" name="newemail" class="input-text" placeholder="Email Address" required>
                </td>
                
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="tele" class="form-label">Mobile Number: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="tel" name="tele" class="input-text"  placeholder="ex: 0712345678" pattern="[0]{1}[0-9]{9}" >
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="newpassword" class="form-label">Create New Password: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="password" name="newpassword" class="input-text" placeholder="New Password" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="cpassword" class="form-label">Conform Password: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="password" name="cpassword" class="input-text" placeholder="Conform Password" required>
                </td>
            </tr>
     
            <tr>
                
                <td colspan="2">
                    <?php echo $error ?>

                </td>
            </tr>
            
            <tr>
                <td>
                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >
                </td>
                <td>
                    <input type="submit" value="Sign Up" class="login-btn btn-primary btn">
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                    <a href="login.php" class="hover-link1 non-style-link">Login</a>
                    <br><br><br>
                </td>
            </tr>

                    </form>
            </tr>
        </table>

    </div>
</center>
<br><br><br><br>
<footer id="picassoFooter" style="background-color: #006DD3; color: #ffffff; padding: 20px; display: flex; flex-wrap: wrap; justify-content: space-around; align-items: center; font-family: 'Arial', sans-serif;">
  
    </div>
    <div class="footer-contact" style="margin: 10px;">
        <h3 style="color: #f0f0f0; margin-bottom: 15px;">Contact</h3>
        <div class="footer-contact">
        <p>Email Us:</p> <a href="email.html">abc.labspvtltd@gmail.com</a>
        <p>Call Us: 045 456 7890</p>
    </div>
    </div>
    <div class="footer-social" style="margin: 10px;">
        <h3 style="color: #f0f0f0; margin-bottom: 15px;">Follow Us</h3>
        <div class="social-icons" style="list-style: none; padding: 0;">
            <a href="https://facebook.com" target="_blank" class="social-icon" style="color: #ffffff; text-decoration: none; display: inline-block; padding: 8px; background-color: #004585; margin-right: 5px;">FB</a>
            <a href="https://twitter.com" target="_blank" class="social-icon" style="color: #ffffff; text-decoration: none; display: inline-block; padding: 8px; background-color: #004585; margin-right: 5px;">TW</a>
            <a href="https://instagram.com" target="_blank" class="social-icon" style="color: #ffffff; text-decoration: none; display: inline-block; padding: 8px; background-color: #004585; margin-right: 5px;">IG</a>
        </div>
    </div>
    <div class="footer-art" style="margin: 10px;">
        <canvas id="picassoCanvas" style="max-width: 100px; height: auto; margin-top: 20px;"></canvas>
    </div>


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
</footer>
</body>
</html>