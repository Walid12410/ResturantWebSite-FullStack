<!DOCTYPE html>
<?php
include "connection.php";

$pnameError = "";
$descError = "";
$priceError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function validate($data) {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }

    if (empty($_POST['pname'])) {
        $pnameError = '* Product Name is required';
    } else {
        $pname = validate($_POST['pname']);
    }

    if (empty($_POST['price'])) {
        $priceError = '* Price is Required';
    } else {
        $price = validate($_POST['price']);
    }

    if (empty($_POST['description'])) {
        $descError = '* Description is required';
    } else {
        $description = validate($_POST['description']);
    }

    if (empty($pnameError) && empty($descError) && empty($priceError)) {
        $checkQuery = "SELECT * FROM products WHERE name = '$pname'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            $pnameError = "* Product with the same name already exists";
        } else {
            if (isset($_FILES['image'])) {
                $errors = array();
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];
                $file_parts = explode('.', $_FILES['image']['name']);
                $file_ext = strtolower(end($file_parts));
                $extensions = array("jpeg", "jpg", "png");

                if (in_array($file_ext, $extensions) == false) {
                    $errors[] = 'Extension not allowed, please choose a JPEG or PNG file.';
                }

                if ($file_size > 2097152) {
                    $errors[] = 'File size must be exactly 2 MB';
                }

                if (empty($errors)) {
                    $target_dir = "images/";

                    if (!file_exists($target_dir)) {
                        mkdir($target_dir, 0777, true);
                    }

                    $target_path = $target_dir . $file_name;

                    move_uploaded_file($file_tmp, $target_path);

                    $sql = "INSERT INTO products VALUES (NULL, '$pname', '$description', '$target_path', $price)";

                    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    echo '<script type="text/javascript"> alert("New product is added successfully") </script>';
                    mysqli_close($conn);
                } else {
                    print_r($errors);
                }
            }
        }
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Admin</title>
    <link rel="stylesheet" href="styleadmin.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="admin-view.php">Hello Admin</a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="admin.php">Add-Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adminDelete.php">Delete-Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-Edit.php">Edit-Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-view.php">View-Product</a>
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
                            <h3 class="card-title text-center mb-4 " style="color:#009970;">Add-Product</h3>
                            <form method="post" enctype="multipart/form-data"
                                action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="mb-2">
                                    <p>Product Name <span style="color:red;">
                                            <?php echo $pnameError ?>
                                        </span></p>
                                    <input type="text" name="pname" class="form-control"
                                        placeholder="Enter Product Name">
                                </div>
                                <div class="mb-2">
                                    <p>Description <span style="color:red;">
                                            <?php echo $descError ?>
                                        </span></p>
                                        <textarea name="description" class="form-control" cols="10" rows="5" placeholder="Add Description"></textarea>
                                </div>
                                <div class="mb-2">
                                    <p>Product Price<span style="color:red;">
                                            <?php echo $priceError ?>
                                        </span></p>
                                    <input type="number" name="price" class="form-control" placeholder="Add Price">
                                </div>
                                <div class="mb-2">
                                    <p>Product Image</p>
                                    <input type="file" name="image" class="form-control" placeholder="Image">
                                </div>
                                <button type="submit" name="submit" value="Submit" class="btn btn-success">Add
                                    Product</button>
                                <button type="reset" name="reset" value="reset" class="btn btn-success">Reset</button>
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