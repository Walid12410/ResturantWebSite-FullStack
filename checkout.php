<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Checkout Page</title>
</head>

<style>
    body {
        background-image: url('https://images.unsplash.com/photo-1647427017067-8f33ccbae493?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-size: cover;
        background-position: center;
        min-height: 90vh;
        background-repeat: no-repeat;
    }

    .container {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
        margin-top: 50px;
    }
</style>

<body>
    <div class="container mt-4">
        <form action="thankyouCO.php" method="post" id="checkoutForm">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Data will be inserted here dynamically -->
                    </tbody>
                </table>
            </div>

            <div>
                <p>Total Sum: <span id="totalSum"></span></p>
            </div>

            <button type="submit" class="btn btn-warning">Complete Purchase</button>
            <button type="button" class="btn btn-warning" onclick="clearData()">Clear Data</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="path/to/menu.js"></script>
    <script src="checkout.js"></script>
</body>

</html>
