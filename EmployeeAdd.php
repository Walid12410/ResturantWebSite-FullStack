<!DOCTYPE html>
<!DOCTYPE html>
<?php


include 'connection.php';

$dateerror = $dayerror = $timeerror = $peopleerror = $nameerror = $phoneerror = $commenterror = $usernameerror = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function validate($data)
    {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (empty($_POST['Date'])) {
        $dateerror = "* date is required";
    } else {
        $date = validate($_POST['Date']);
        if (!preg_match('/^[0-9-]+$/', $date)) {
            $dateerror = '* Invalid date format';
        }
    }
    if (empty($_POST['Day'])) {
        $dayerror = "* Day is required";
    } else {
        $day = validate($_POST['Day']);
    }
    if (empty($_POST['Time'])) {
        $timeerror = '* Time is required';
    } else {
        $time = validate($_POST['Time']);
    }
    if (empty($_POST['people'])) {
        $peopleerror = '* enter how many people in reservation';
    } else {
        $people = validate($_POST['people']);
    }
    if (empty($_POST['Name'])) {
        $nameerror = '* Enter Name reservation';
    } else {
        $name = validate($_POST['Name']);
        if (!preg_match('/^[a-zA-Z\s]+$/', $_POST['Name'])) {
            $nameerror = '* Only letters and white spaces allowed';
        }
    }
    if (empty($_POST['userName'])) {
        $usernameerror = '* required  Username';
    } else {
        $username = validate($_POST['userName']);
    }
    if (empty($_POST['phone'])) {
        $phoneerror = '* phonenumber is required';
    } else {
        $phone = validate($_POST['phone']);
    }
    
    $comment = validate($_POST['comment']); 

    if (
        $dateerror == "" && $timeerror == "" && $dayerror == "" && $peopleerror == "" &&
        $usernameerror == "" && $nameerror == "" && $phoneerror == ""
    ) {
        $sql = "INSERT INTO reservations (date, day, time, 
    people, name, username, phone, comment ) VALUES ('$date', '$day', 
    '$time', '$people', '$name', '$username', '$phone', '$comment')";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        echo '<script type="text/javascript"> alert("New reservation is added successfully") </script>';
        mysqli_close($conn);
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="employeeadd.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="EmployeeCB.php">Hello Employee</a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link " href="EmployeeCB.php">View-Delete-CallingBack</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="employeeRV.php">View-Delete-Reservation</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="EmployeeEdit.php">Add-Reservation</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="logout.php" class="login-button">Logout</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <section class="hero-section">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center mb-4" style="color:#ff0707;">Booking a Table</h3>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="mb-2">
                                    <label for="Date">Date <span style="color:red;">
                                            <?php echo $dateerror ?>
                                        </span></label>
                                    <input type="text" id="Date" name="Date" class="form-control"
                                        placeholder="Day-Month-" value="<?php echo isset($date) ? $date : ''; ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="Day">Day<span style="color:red;">
                                            <?php echo $dayerror ?>
                                        </span></label>
                                    <select id="Day" name="Day" class="form-control">
                                        <option value="" selected disabled hidden>Choose Day...</option>
                                        <option value="Monday" <?php echo (isset($day) && $day == 'Monday') ? 'selected' : ''; ?>>Monday</option>
                                        <option value="Tuesday" <?php echo (isset($day) && $day == 'Tuesday') ? 'selected' : ''; ?>>Tuesday</option>
                                        <option value="Wednesday" <?php echo (isset($day) && $day == 'Wednesday') ? 'selected' : ''; ?>>Wednesday</option>
                                        <option value="Thursday" <?php echo (isset($day) && $day == 'Thursday') ? 'selected' : ''; ?>>Thursday</option>
                                        <option value="Friday" <?php echo (isset($day) && $day == 'Friday') ? 'selected' : ''; ?>>Friday</option>
                                        <option value="Saturday" <?php echo (isset($day) && $day == 'Saturday') ? 'selected' : ''; ?>>Saturday</option>
                                        <option value="Sunday" <?php echo (isset($day) && $day == 'Sunday') ? 'selected' : ''; ?>>Sunday</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="Time">Select a Time <span style="color:red;">
                                            <?php echo $timeerror ?>
                                        </span></label>
                                    <select id="Time" name="Time" class="form-control">
                                        <option value="" selected disabled hidden>Choose Time...</option>
                                        <option value="8:00" <?php echo (isset($time) && $time == '8:00') ? 'selected' : ''; ?>>8:00</option>
                                        <option value="9:00" <?php echo (isset($time) && $time == '9:00') ? 'selected' : ''; ?>>9:00</option>
                                        <option value="10:00" <?php echo (isset($time) && $time == '10:00') ? 'selected' : ''; ?>>10:00</option>
                                        <option value="11:00" <?php echo (isset($time) && $time == '11:00') ? 'selected' : ''; ?>>11:00</option>
                                        <option value="12:00" <?php echo (isset($time) && $time == '12:00') ? 'selected' : ''; ?>>12:00</option>
                                        <option value="13:00" <?php echo (isset($time) && $time == '13:00') ? 'selected' : ''; ?>>13:00</option>
                                        <option value="14:00" <?php echo (isset($time) && $time == '14:00') ? 'selected' : ''; ?>>14:00</option>
                                        <option value="15:00" <?php echo (isset($time) && $time == '15:00') ? 'selected' : ''; ?>>15:00</option>
                                        <option value="16:00" <?php echo (isset($time) && $time == '16:00') ? 'selected' : ''; ?>>16:00</option>
                                        <option value="17:00" <?php echo (isset($time) && $time == '17:00') ? 'selected' : ''; ?>>17:00</option>
                                        <option value="18:00" <?php echo (isset($time) && $time == '18:00') ? 'selected' : ''; ?>>18:00</option>
                                        <option value="19:00" <?php echo (isset($time) && $time == '19:00') ? 'selected' : ''; ?>>19:00</option>
                                        <option value="20:00" <?php echo (isset($time) && $time == '20:00') ? 'selected' : ''; ?>>20:00</option>
                                        <option value="21:00" <?php echo (isset($time) && $time == '21:00') ? 'selected' : ''; ?>>21:00</option>
                                        <option value="22:00" <?php echo (isset($time) && $time == '22:00') ? 'selected' : ''; ?>>22:00</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="People">Select Number of People <span style="color:red;">
                                            <?php echo $peopleerror ?>
                                        </span></label>
                                    <select id="People" name="people" class="form-control">
                                        <option value="" selected disabled hidden>Choose number of people...</option>
                                        <option value="1" <?php echo (isset($people) && $people == '1') ? 'selected' : ''; ?>>1 person</option>
                                        <option value="2" <?php echo (isset($people) && $people == '2') ? 'selected' : ''; ?>>2 people</option>
                                        <option value="3" <?php echo (isset($people) && $people == '3') ? 'selected' : ''; ?>>3 people</option>
                                        <option value="4" <?php echo (isset($people) && $people == '4') ? 'selected' : ''; ?>>4 people</option>
                                        <option value="5" <?php echo (isset($people) && $people == '5') ? 'selected' : ''; ?>>5 people</option>
                                        <option value="6" <?php echo (isset($people) && $people == '6') ? 'selected' : ''; ?>>6 people</option>
                                        <option value="7" <?php echo (isset($people) && $people == '7') ? 'selected' : ''; ?>>7 people</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="Name">Name <span style="color:red;">
                                            <?php echo $nameerror ?>
                                        </span></label>
                                    <input type="text" id="Name" name="Name" class="form-control"
                                        placeholder="Enter Your Name" value="<?php echo isset($name) ? $name : ''; ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="UserName">User Name <span style="color:red;">
                                            <?php echo $usernameerror ?>
                                        </span></label>
                                    <input type="text" id="UserName" name="userName" class="form-control"
                                        placeholder="Enter The User Name"
                                        value="<?php echo isset($username) ? $username : ''; ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="Phone">Phone Number <span style="color:red;">
                                            <?php echo $phoneerror ?>
                                        </span></label>
                                    <input type="tel" id="Phone" name="phone" class="form-control"
                                        placeholder="Enter Your Phone Number"
                                        value="<?php echo isset($phone) ? $phone : ''; ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="Comment">Comments <span style="color:red;">
                                            <?php echo $commenterror ?>
                                        </span></label>
                                    <textarea id="Comment" name="comment" rows="2"
                                        placeholder="Leave A Message"><?php echo isset($comment) ? $comment : ''; ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-danger">Booking A Table</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>