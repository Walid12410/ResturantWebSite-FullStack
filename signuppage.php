<?php
include "connection.php";

$unerror = "";
$nameerro = "";
$ageerro = "";
$passworderror = "";
$repassworderror = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function validate($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }

    if (empty($_POST['uname'])) {
        $unerror = 'UserName is required';
    } else {
        $username = validate($_POST['uname']);
        if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
            $unerror = '* Only letter and number allowed';
        }
    }

    if (empty($_POST['name'])) {
        $nameerro = '* Name is required';
    } else {
        $name = validate($_POST['name']);
        if (!preg_match('/^[a-zA-Z]+$/', $name)) {
            $nameerro = '* Only letter and white space allowed';
        }
    }

    if (empty($_POST['age'])) {
        $ageerro = 'Enter your age';
    } else {
        $age = validate($_POST['age']);
    }

    if (empty($_POST['password'])) {
        $passworderror = "* Password is required";
    } elseif (strlen($_POST["password"]) > 20) {
        $passworderror = "Password should be at most 20 characters long.";
    } elseif (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d).+$/', $_POST["password"])) {
        $passworderror = "* Password should contain both letters and numbers.";
    } else {
        $password = validate($_POST["password"]);
    }

    if (empty($_POST['repassword'])) {
        $repassworderror = '*retype the password';
    } elseif ($_POST['repassword'] != validate($_POST['password'])) {
        $repassworderror = '* Passwords do not match';
    } else {
        $repassword = validate($_POST["repassword"]);
    }

    if (empty($_POST['gender'])) {
        $gendererror = "";
    } else {
        $gender = validate($_POST["gender"]);
    }

    if ($passworderror == "" && $repassworderror == "" && $nameerro == "" && $ageerro == "" && $unerror == "") {
        $checkUserQuery = "SELECT * FROM loginuser WHERE user_name = '$username'";
        $result = mysqli_query($conn, $checkUserQuery);
        if (mysqli_num_rows($result) > 0) {
            $unerror = '* Username already exists';
        } else {
            $sql = "INSERT INTO loginuser SET password = '$password', user_name = '$username', name = '$name', gender = '$gender', age = '$age'";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            mysqli_close($conn);
            header("Location: loginpage.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SignUp</title>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>
    <div class="container mt-5 ms-auto">
        <div class="card">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="row">
                    <h1 class="text-center">Registration</h1>
                    <div class="col-5 ms-5 mt-3">
                        <label>Name <span style="color:red;">
                                <?php echo $nameerro ?>
                            </span></label>
                        <input type="text" name="name" placeholder="Enter your name" class="form-control"
                            value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
                    </div>
                    <div class="col-5 mt-3 ms-5">
                        <label>UserName <span style="color:red;">
                                <?php echo $unerror ?>
                            </span></label>
                        <input type="text" name="uname" placeholder="Enter your username" class="form-control"
                            value="<?php echo isset($_POST['uname']) ? htmlspecialchars($_POST['uname']) : '' ?>">
                    </div>
                    <div class="col-10 ms-5 mt-3">
                        <label>Password <span style="color:red;">
                                <?php echo $passworderror ?>
                            </span></label>
                        <input type="password" name="password" placeholder="Enter your password" class="form-control"
                            value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '' ?>">
                    </div>
                    <div class="col-10 ms-5 mt-3">
                        <label>Confirm Password <span style="color:red;">
                                <?php echo $repassworderror ?>
                            </span></label>
                        <input type="password" name="repassword" placeholder="Re-Enter your password"
                            class="form-control"
                            value="<?php echo isset($_POST['repassword']) ? htmlspecialchars($_POST['repassword']) : '' ?>">
                    </div>
                    <div class="col-5 ms-5 mt-3">
                        <label>Date <span style="color:red;">
                                <?php echo $ageerro ?>
                            </span></label>
                        <input type="date" name="age" class="form-control"
                            value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age']) : '' ?>">
                    </div>
                    <div class="col-5 mt-3 ms-5">
                        <label>Gender</label>
                        <select name="gender" class="form-select">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="col-10 ms-5 mt-3">
                        <button type="submit" class="form-control btn btn-danger">Continue</button>
                    </div>
                    <div class="col-10 mt-3 ms-5 text-center">
                        <p>Already on Store? <a href="loginpage.php">Login</a></p>
                    </div>
                    <div class="col-10 ms-5 mt-3">
                        <p></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>