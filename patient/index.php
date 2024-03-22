<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Dashboard</title>
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table,.anime{
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
    
    
</head>
<body>

    <?php


    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    //import database
    include("../connection.php");

    $sqlmain= "select * from patient where pemail=?";
    $stmt = $database->prepare($sqlmain);
    $stmt->bind_param("s",$useremail);
    $stmt->execute();
    $userrow = $stmt->get_result();
    $userfetch=$userrow->fetch_assoc();

    $userid= $userfetch["pid"];
    $username=$userfetch["pname"];


    //echo $userid;
    //echo $username;
    
    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo substr($username,0,13)  ?>..</p>
                                    <p class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-home menu-active menu-icon-home-active" >
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Home</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session">
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">Available Sessions</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">My Bookings</p></a></div>
                    </td>
                </tr>
              
                
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                            <td colspan="1" class="nav-bar" >
                            <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Patient Dashboard</p>
                          
                            </td>
                            <td width="25%">

                            </td>
                            <td width="15%">
                                
                                <p class="heading-sub12" style="padding: 0;margin: 0;">
                                    <?php 
                               


                                $patientrow = $database->query("select  * from  patient;");
                                $doctorrow = $database->query("select  * from  doctor;");
                             


                                ?>
                                </p>
                            </td>
                            
        
        
                        </tr>
                <tr>
                    <td colspan="4" >
                        
                    <center>

                            
                                <?php
                                    echo '<datalist id="doctors">';
                                    $list11 = $database->query("select  docname,docemail from  doctor;");
    
                                    for ($y=0;$y<$list11->num_rows;$y++){
                                        $row00=$list11->fetch_assoc();
                                        $d=$row00["docname"];
                                        
                                        echo "<option value='$d'><br/>";
                                        
                                    };
    
                                echo ' </datalist>';
    ?>
                              
                            <br>
                            <br>
                            
                        </td>
                    </tr>
                    </table>
                    </center>
                    
                </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <table border="0" width="100%"">
                            <tr>
                                <td width="50%">

                                    




                                    <center>
                                        <table class="filter-container" style="border: none;" border="0">
                                            <tr>
                                                <td colspan="4">
                                                    <p style="font-size: 20px;font-weight:600;padding-left: 12px;">Status</p>
                                                </td>
                                            </tr>
                                            <tr>

                                            <h3 style="font-size: 1.5em; color: #333; margin-bottom: 10px;">Downloadable Report Files<br><h5>Enter your E-Mail Here</h5></h3>

                                            <!-- Search Form -->
                                            <form action="" method="GET" style="margin-top: 20px; display: inline-block;">
                                            <input type="email" name="email" placeholder="Enter Email Address" style="padding: 8px; border: 1px solid #ccc; border-radius: 0px; display: inline-block;">
                                            <input type="submit" value="Search" style="padding: 8.6px 16.5px; background-color: #007bff; color: #fff; border: none; border-radius: 0px; cursor: pointer; display: inline-block;">
                                        </form>


                                        <?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['email']) && !empty($_GET['email'])) {
    // Retrieve files associated with the email from the database
    $email = $_GET['email'];
    $stmt = $database->prepare("SELECT id, filename FROM files WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $fileResult = $stmt->get_result();

    if ($fileResult && $fileResult->num_rows > 0) {
        // Output download links for each file
        echo "<h3>Click file to download ...</h3>";
        while ($row = $fileResult->fetch_assoc()) {
            $fileId = $row['id'];
            $filename = $row['filename'];
            // Generate download link
            echo "<a href='download.php?file_id=$fileId'>$filename</a><br>";
        }
    } else {
        echo "<p>No files found for the email address: $email</p>";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['email']) && empty($_GET['email'])) {
    echo "<p>Please enter an email address to search for files.</p>";
}
?>

<!-- Download Script (download.php) -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['file_id'])) {
    // Retrieve file path from the database based on file ID
    $fileId = $_GET['file_id'];
    $stmt = $database->prepare("SELECT filepath FROM files WHERE id = ?");
    $stmt->bind_param("i", $fileId);
    $stmt->execute();
    $fileResult = $stmt->get_result();

    if ($fileResult && $fileResult->num_rows > 0) {
        $row = $fileResult->fetch_assoc();
        $filepath = $row['filepath'];

        // Force download the file
        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            readfile($filepath);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "File not found.";
    }
}
?>






                                                <td style="width: 25%;">
                                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex">
                                                        <div>
                                                                <div class="h1-dashboard">
                                                                    <?php    echo $doctorrow->num_rows  ?>
                                                                </div><br>
                                                                <div class="h3-dashboard">
                                                                    All Doctors &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="width: 25%;">
                                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                                        <div>
                                                                <div class="h1-dashboard">
                                                                    <?php    echo $patientrow->num_rows  ?>
                                                                </div><br>
                                                                <div class="h3-dashboard">
                                                                    All Patients &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                </div>
                                                        </div>
                                                 </div>
                                                </td>
                                                </tr>
                                                <tr>
                                            
                                                
                                            </tr>
                                        </table>
                                    </center>








                                </td>
                            </tr>
                        </table>
                    </td>
                <tr>
            </table>
        </div>
    </div>

    <footer id="picassoFooter" style="background-color: #006DD3; color: #ffffff; padding: 20px; display: flex; flex-wrap: wrap; justify-content: space-around; align-items: center; font-family: 'Arial', sans-serif;">
  
    </div>
    <div class="footer-contact" style="margin: 10px;">
        <h3 style="color: #f0f0f0; margin-bottom: 15px;">Contact</h3>
        <p>Email Us: abc.labspvtltd@gmail.com</p>
        <p>Call Us: 045 456 7890</p>
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