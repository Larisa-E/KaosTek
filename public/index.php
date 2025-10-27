<?php
session_start();
require_once __DIR__ . '/../src/db.php';

// check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// db connection
$conn = get_db();

// error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KaosTek Dashboard</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- navbar -->
    <nav class="nav-pills-border-radius" data-bs-theme="dark">
        <div class="container-fluid"> <!-- fixed -->
            <a class="navbar-brand"></a>
            <p class="text-end fs-3">KAOS丅EK</p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container-fluid">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="welcome.php">Welcome</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#orderDetails">Order Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#customers">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#orders">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#rapports">Rapports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center mb-4">KaosTek Dashboard</h2>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! <a href="logout.php">Logout</a></p>

        <!-- products (sorted cheapest to most expensive) -->
        <h3 id="products">Products</h3>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT product_name, price FROM products ORDER BY price ASC, product_name ASC";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['product_name']) . "</td>
                                <td>" . htmlspecialchars($row['price']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2' class='text-center'>No products found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- order details -->
        <h3 id="orderDetails">Order Details</h3>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT product_name, quantity, price FROM OrderDetails ORDER BY price ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['product_name']) . "</td>
                                <td>" . htmlspecialchars($row['quantity']) . "</td>
                                <td>" . htmlspecialchars($row['price']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No products found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- customers -->
        <h3 id="customers">Customers</h3>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT customer_id, customer_name, address AS adress FROM customers";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['customer_id']) . "</td>
                                <td>" . htmlspecialchars($row['customer_name']) . "</td>
                                <td>" . htmlspecialchars($row['adress']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No customers found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- orders -->
        <h3 id="orders">Orders</h3>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer ID</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT order_id, customer_id, order_date FROM orders";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['order_id']) . "</td>
                                <td>" . htmlspecialchars($row['customer_id']) . "</td>
                                <td>" . htmlspecialchars($row['order_date']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No orders found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- rapports -->
        <h3 id="rapports">Rapports</h3>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Order Count</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT customer_id, customer_name, order_count FROM rapport";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['customer_id']) . "</td>
                                <td>" . htmlspecialchars($row['customer_name']) . "</td>
                                <td>" . htmlspecialchars($row['order_count']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No reports found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
