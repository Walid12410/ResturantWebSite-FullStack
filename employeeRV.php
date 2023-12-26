<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="emloyee.css">

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
                            <a class="nav-link active" aria-current="page" href="employeeRV.php">View-Delete-Reservation</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="EmployeeAdd.php">Add-Reservation</a>
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
    <div class="hero-section">
        <div class="overlay"></div>
        <div class="table-container">
            <?php
            include 'connection.php';

            if (isset($_GET['id'])) {
                $sqlquerydelete = "DELETE FROM reservations WHERE id=" . $_GET['id'];
                $QueryResult2 = @mysqli_query($conn, $sqlquerydelete);

                if ($QueryResult2) {
                    echo '<div class="alert alert-success" role="alert">Product deleted successfully.</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error deleting product: ' . mysqli_error($conn) . '</div>';
                }
            }
            $sql = "SELECT * FROM reservations";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    echo '<div class="table-responsive">';
                    echo "<table class='table table-bordered table-hover'>";
                    echo "<thead>
                            <tr>
                                <th>Reservations-ID</th>
                                <th>Name</th>
                                <th>UserName</th>
                                <th>people</th>
                                <th>phone</th>
                                <th>time</th>
                                <th>date</th>
                                <th>day</th>
                                <th>Delete</th>
                            </tr>
                        </thead>";
                    echo "<tbody>";

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['people'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['time'] . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['day'] . "</td>";
                        echo "<td><a href='EmployeeCB.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo '</div>';
                } else {
                    echo "No products found.";
                }
            } else {
                echo "Error in the SQL query: " . mysqli_error($conn);
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>