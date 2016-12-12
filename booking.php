<?php

    require_once 'connectToDatabase.php';

    if(isset($_POST['submit'])) {

        $db = connectToDB();

        $fname = mysqli_real_escape_string($db, $_POST['fname']);
        $lname = mysqli_real_escape_string($db, $_POST['lname']);
        $gender = mysqli_real_escape_string($db, $_POST['gender']);
        $phno = mysqli_real_escape_string($db, $_POST['phno']);
        $mail = mysqli_real_escape_string($db, $_POST['mail']);
        $addr = mysqli_real_escape_string($db, $_POST['addr']);
        $date = mysqli_real_escape_string($db, $_POST['date']);
        $time = mysqli_real_escape_string($db, $_POST['time']);

        if((isset($fname) && !empty($fname)) && (isset($lname) && !empty($lname)) && (isset($phno) && !empty($phno)) && (isset($addr) && !empty($addr)) && (isset($date) && !empty($date))) {

            $query = "INSERT INTO customers VALUES('$fname', '$lname', '$gender', '$phno', '$mail', '$addr', '$date')";

            $result = mysqli_query($db, $query) or die('Error querying the database.');

            $subject = 'Booking at New Look Beauty Salon';

            $msg = 'Your booking has been scheduled on ' + $date + ' and ' + $time;

            $header = 'From: newlookbeautysalon@gmail.com';

            if(mail($mail, $subject, $msg, $header)) {
                echo '<div align="center" class="ad">A confirmation mail has been sent to ' + $mail + '</div>';
            }
        }
        else if(!(isset($fname) && !empty($fname)) || !(isset($lname) && !empty($lname))) {
            echo 'Please fill your name properly.';
        }
        else if(!is_numeric($phno) || mb_strlen($num) != 10) {
            echo 'Please provide us a valid contact number.';
        }
        else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            echo 'Enter a valid email id.';
        }
        else if(!(isset($addr) && !empty($addr))) {
            echo 'Address field cannot be left empty.';
        }
        else {
            echo 'Enter the date properly.';
        }
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Availability</title>
    <link rel="stylesheet" type="text/css" href="css/styleindex.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="images/icon.png" />
</head>

<body>

    <!--<div id="preloader">
        <h1>Welcome</h1>
    </div> -->  
    
    <header>
        <h2 id="logotitle">New Look Beauty Salon</h2>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="availability.html">Availibility</a></li>
                <li><a href="booking.php">Booking</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <content id="mains">
        <div class="section" id="section2">
            <div id="booking"></div>
            <div id="book">
                <center>
                    <br><br><br><h1>Book An Appoinment</h1><br><br>
                        <form method="POST" action="">
                            <table id="booking-table">
                                <tr>
                                    <td>First Name</td>
                                    <td><input type="text" name="fname"/></td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td><input type="text" name="lname"/></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td><select name="gender">
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                        <option value="t">Other</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Phone Number</td>
                                    <td><input type="number" name="phno"/></td>
                                </tr>
                                <tr>
                                    <td>Email ID</td>
                                    <td><input type="email" name="mail"/></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><input type="text" name="addr"/></td>
                                </tr>
                                <tr>
                                    <td>Date of Schedule</td>
                                    <td>
                                        <input type="date" name="date"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Preferred Time</td>
                                    <td>
                                        <select name="time">
                                            <option value="morn">Morning(7:00 - 12:00)</option>
                                            <option value="noon">Noon(12:00 - 4:00)</option>
                                            <option value="even">Evening(4:00 - 7:00)</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <input type="submit" id="submit" name="submit" value="submit"/>
                        </form>
                </center>
            </div>
        </div>

        <div class="section" id="pricesection">
            
        </div>
        
        <footer>
            <div id="connect">
                <h2>Connect With Us!</h2>
                <Br>
                <ul>
                    <li><a href="#"><img src="images/behance.svg" alt="Behance" title="Behance" /></a></li>
                    <li><a href="#"><img src="images/facebook.svg" alt="Facebook" title="Facebook" /></a></li>
                    <li><a href="#"><img src="images/google_plus.svg" alt="Google Plus" title="Google Plus" /></a></li>
                    <li><a href="#"><img src="images/instagram.svg" alt="Instagram" title="Instagram" /></a></li>
                    <li><a href="#"><img src="images/linkedin.svg" alt="LinkedIn" title="LinkedIn" /></a></li>
                    <li><a href="#"><img src="images/twitter.svg" alt="Twitter" title="Twitter" /></a></li>
                    <li><a href="#"><img src="images/youtube.svg" alt="YouTube" title="YouTube" /></a></li>

                </ul>
            </div>
                
                <p id="foots"><h2>New Look Beauty Salon</h2> <small>7-Eleven, 3908 Terrace Heights, Yakima, WA 98901, USA<Br> Email: newlook@gmail.com</small> <br><br> &copy; Copyright <b>New Look Beauty Salon</b> 2017</p>
                
        </footer>
    </content>
</body>


</html>