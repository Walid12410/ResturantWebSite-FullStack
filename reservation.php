<!DOCTYPE html>
<?php


include 'connection.php';

$dateerror= $dayerror = $timeerror= $peopleerror= $nameerror=$phoneerror=$commenterror=$usernameerror="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    function validate($data){
        
        $data=trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars($data);
        return $data;   
    }

    if(empty($_POST['Date'])){
        $dateerror= "* date is required";
    }else{
        $date = validate($_POST['Date']);
        if (!preg_match('/^[0-9-]+$/', $date)) {
            $dateerror = '* Invalid date format';
        }
    }
    if(empty($_POST['Day'])){
        $dayerror = "* Day is required";
    }else{
        $day = validate($_POST['Day']);
    }
    if(empty($_POST['Time'])){
        $timeerror = '* Time is required';
    }else{
        $time = validate($_POST['Time']);
    }
    if(empty($_POST['people'])){
        $peopleerror = '* enter how many people in reservation';
    }else{
        $people = validate($_POST['people']);
    }
    if(empty($_POST['Name'])){
        $nameerror = '* Enter Your Name';
    }else{
        $name = validate($_POST['Name']);
        if (!preg_match('/^[a-zA-Z\s]+$/', $_POST['Name'])) {
            $nameerror = '* Only letters and white spaces allowed';
        }
    }
    if(empty($_POST['userName'])){
        $usernameerror = '* required your Username';
    }else{
        $username = validate($_POST['userName']);
    }
    if(empty($_POST['phone'])){
        $phoneerror = '* phonenumber is required';
    }else{
        $phone = validate($_POST['phone']);
    }

    $comment = validate($_POST['comment']); 

if($dateerror=="" && $timeerror== "" && $dayerror=="" && $peopleerror=="" && 
$usernameerr == "" && $nameerror=="" && $phoneerror=="" ){
    $sql = "INSERT INTO reservations (date, day, time, 
    people, name, username, phone, comment ) VALUES ('$date', '$day', 
    '$time', '$people', '$name', '$username', '$phone', '$comment')";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            mysqli_close($conn);
            header("Location: thankyoureservation.php");
            exit();
  }
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Restaurant Booking</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: black;
        }

        header {
            background-color: black;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        .background-image {
            background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            height: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            width: 40%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }



        label {
            display: block;
            margin-bottom: 8px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            width: 100%;
            margin-bottom: 5px;
        }

        button {
            width: 100%;
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        button:hover {
            background-color: #555;
        }
        

        @media screen and (max-width: 768px) {
            .form-container {
                width: 60%;
            }
        }

        @media screen and (max-width: 480px) {
            .background-image {
                background-size: contain;
            }

            .form-container {
                width: 60%;
            }
        }

        .wrapper .icon {
            position: relative;
            background-color: #ffffff;
            border-radius: 50%;
            margin: 10px;
            width: 50px;
            height: 50px;
            line-height: 50px;
            font-size: 22px;
            display: inline-block;
            align-items: center;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            color: #333;
            text-decoration: none;
        }

        .wrapper .tooltip {
            position: absolute;
            top: 0;
            line-height: 1.5;
            font-size: 14px;
            background-color: #ffffff;
            color: #ffffff;
            padding: 5px 8px;
            border-radius: 5px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .wrapper .tooltip::before {
            position: absolute;
            content: "";
            height: 8px;
            width: 8px;
            background-color: #ffffff;
            bottom: -3px;
            left: 50%;
            transform: translate(-50%) rotate(45deg);
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .wrapper .icon:hover .tooltip {
            top: -45px;
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .wrapper .icon:hover span,
        .wrapper .icon:hover .tooltip {
            text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.1);
        }

        .wrapper .facebook:hover,
        .wrapper .facebook:hover .tooltip,
        .wrapper .facebook:hover .tooltip::before {
            background-color: #3b5999;
            color: #ffffff;
        }

        .wrapper .twitter:hover,
        .wrapper .twitter:hover .tooltip,
        .wrapper .twitter:hover .tooltip::before {
            background-color: #46c1f6;
            color: #ffffff;
        }

        .wrapper .instagram:hover,
        .wrapper .instagram:hover .tooltip,
        .wrapper .instagram:hover .tooltip::before {
            background-color: #e1306c;
            color: #ffffff;
        }

        .wrapper .github:hover,
        .wrapper .github:hover .tooltip,
        .wrapper .github:hover .tooltip::before {
            background-color: #333333;
            color: #ffffff;
        }

        .wrapper .youtube:hover,
        .wrapper .youtube:hover .tooltip,
        .wrapper .youtube:hover .tooltip::before {
            background-color: #de463b;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <header>
        <h1>Restaurant Booking</h1>
    </header>
    <div class="background-image">
        <div class="form-container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="Date">Date <span style="color:red;"><?php echo $dateerror ?></span></label>
                <input type="text" id="Date" name="Date" placeholder="Day-Month-" value="<?php echo isset($date) ? $date : ''; ?>">
                <label for="Day">Day<span style="color:red;"><?php echo $dayerror ?></span></lable>
                <select id="Day" name="Day">
                    <option value="" selected disabled hidden>Choose Day...</option>
                    <option value="Monday" <?php echo (isset($day) && $day == 'Monday') ? 'selected' : ''; ?>>Monday</option>
                    <option value="Tuseday" <?php echo (isset($day) && $day == 'Tuseday') ? 'selected' : ''; ?>>Tuseday</option>
                    <option value="Wednesday" <?php echo (isset($day) && $day == 'Wednesday') ? 'selected' : ''; ?>>Wednesday</option>
                    <option value="Thursday" <?php echo (isset($day) && $day == 'Thursday') ? 'selected' : ''; ?>>Thursday</option>
                    <option value="Friday" <?php echo (isset($day) && $day == 'Friday') ? 'selected' : ''; ?>>Friday</option>
                    <option value="Saturday" <?php echo (isset($day) && $day == 'saturday') ? 'selected' : ''; ?>>Saturday</option>
                    <option value="Sunday" <?php echo (isset($day) && $day == 'Sunday') ? 'selected' : ''; ?>>Sunday</option>
                </select>
                <label for="time">Select a Time <span style="color:red;"><?php echo $timeerror ?></span></label>
                <select id="Time" name="Time">
                    <option value="" selected disabled hidden>Choose Time...</option>
                    <option value="8:00" <?php echo (isset($time) && $time == '8:00') ? 'selected' : ''; ?>>8:00</option>
                    <option value="9:00" <?php echo (isset($time) && $time == '9:00') ? 'selected' : ''; ?>>9:00</option>
                    <option value="10:00" <?php echo (isset($time) && $time == '10:00') ? 'selected' : ''; ?>>10:00</option>
                    <option value="11:00" <?php echo (isset($time) && $time == '11:00') ? 'selected' : ''; ?>>11:00</option>
                    <option value="12:00" <?php echo (isset($time) && $time == '12:00') ? 'selected' : ''; ?>>12:00</option>
                    <option value="13:00" <?php echo (isset($time) && $time == '13:00') ? 'selected' : ''; ?>>13:00</option>
                    <option value="14:00"<?php echo (isset($time) && $time == '14:00') ? 'selected' : ''; ?>>14:00</option>
                    <option value="15:00" <?php echo (isset($time) && $time == '15:00') ? 'selected' : ''; ?>>15:00</option>
                    <option value="16:00" <?php echo (isset($time) && $time == '16:00') ? 'selected' : ''; ?>>16:00</option>
                    <option value="17:00"<?php echo (isset($time) && $time == '17:00') ? 'selected' : ''; ?>>17:00</option>
                    <option value="18:00"<?php echo (isset($time) && $time == '18:00') ? 'selected' : ''; ?>>18:00</option>
                    <option value="19:00"<?php echo (isset($time) && $time == '19:00') ? 'selected' : ''; ?>>19:00</option>
                    <option value="20:00"<?php echo (isset($time) && $time == '20:00') ? 'selected' : ''; ?>>20:00</option>
                    <option value="21:00" <?php echo (isset($time) && $time == '21:00') ? 'selected' : ''; ?>>21:00</option>
                    <option value="22:00"<?php echo (isset($time) && $time == '22:00') ? 'selected' : ''; ?>>22:00</option>
                </select>
                <label for="people">Select Number of People <span style="color:red;"><?php echo $peopleerror ?></span></label>
                <select id="people" name="people">
                    <option value="" selected disabled hidden>Choose number of people...</option>
                    <option value="1" <?php echo (isset($people) && $people == '1') ? 'selected' : ''; ?>>1 person</option>
                    <option value="2" <?php echo (isset($people) && $people == '2') ? 'selected' : ''; ?>>2 people</option>
                    <option value="3" <?php echo (isset($people) && $people == '3') ? 'selected' : ''; ?>>3 people</option>
                    <option value="4" <?php echo (isset($people) && $people == '4') ? 'selected' : ''; ?>>4 people</option>
                    <option value="5" <?php echo (isset($people) && $people == '5') ? 'selected' : ''; ?>>5 people</option>
                    <option value="6"<?php echo (isset($people) && $people == '6') ? 'selected' : ''; ?>>6 people</option>
                    <option value="7" <?php echo (isset($people) && $people == '7') ? 'selected' : ''; ?>>7 people</option>
                </select>
                <label for="Name">Name <span style="color:red;"><?php echo $nameerror ?></span></label>
                <input type="text" id="Name" name="Name" placeholder="Enter Your Name" value="<?php echo isset($name) ? $name : ''; ?>">
                <label for="userName">User Name <span style="color:red;"><?php echo $usernameerror ?></span></label>
                <input type="text" id="userName" name="userName" placeholder="Enter The User Name" value="<?php echo isset($username) ? $username : ''; ?>">
                <label for="phone">Phone Number <span style="color:red;"><?php echo $phoneerror ?></span> </label>
                <input type="tel" id="phone" name="phone" placeholder="Enter Your Phone Number" value="<?php echo isset($phone) ? $phone : ''; ?>">
                <label for="comment">Comments <span style="color:red;"><?php echo $commenterror ?></span></label>
                <textarea id="comment" name="comment" rows="2" placeholder="Leave A Massege"><?php echo isset($comment) ? $comment : ''; ?></textarea>
                <button type="submit">Booking A Table</button><br><br>
            </form>
            <a class="c1" href='home.php'>Back To HomePage</a>
        </div>
    </div>
    <center>
        <br>
        <div class="wrapper">
            <a href="https://www.facebook.com/" class="icon facebook">
                <div class="tooltip">Facebook</div>
                <span><i class="fab fa-facebook-f"></i></span>
            </a>
            <a href="https://twitter.com/" class="icon twitter">
                <div class="tooltip">Twitter</div>
                <span><i class="fab fa-twitter"></i></span>
            </a>
            <a href="https://www.instagram.com/" class="icon instagram">
                <div class="tooltip">Instagram</div>
                <span><i class="fab fa-instagram"></i></span>
            </a>
            <a href="https://www.youtube.com/" class="icon youtube">
                <div class="tooltip">Youtube</div>
                <span><i class="fab fa-youtube"></i></span>
            </a>
        </div>
    </center>
</body>

</html>