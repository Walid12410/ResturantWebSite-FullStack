<?php
session_start(); 

include "connection.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname) && empty($pass)) {
        header("Location: loginpage.php?error=UserName and Password are required");
        exit();
    } elseif (empty($uname)) {
        header("Location: loginpage.php?error=UserName is required");
        exit();
    } elseif (empty($pass)) {
        header("Location: loginpage.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM loginuser WHERE user_name='$uname' AND password='$pass' ";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['age'] = $row['age'];
                $_SESSION['gender'] = $row['gender'];

                if ($row['user_name'] === 'mohammadwalid') {
                    header('Location: admin-view.php');
                } elseif ($row['user_name'] === 'mohammadE1' || $row['user_name'] === 'walidE2' || $row['user_name'] === 'yasmineE3') {
                    header('Location: EmployeeCB.php');
                } else {
                    header('Location: home.php');
                }
                exit();
            } else {
                header('Location: loginpage.php?error=Incorrect Username or password');
                exit();
            }
        } else {
            header('Location: loginpage.php?error=Incorrect Username or password');
            exit();
        }
    }
} else {
    header("Location: loginpage.php");
    exit();
}
?>