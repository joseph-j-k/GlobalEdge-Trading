<?php
include("Head.php");

$selqry = "SELECT * FROM tbl_booking b 
           INNER JOIN tbl_cart c ON c.booking_id = b.booking_id 
           INNER JOIN tbl_product p ON p.product_id = c.product_id 
           WHERE booking_status > 1 
           AND cart_status > 0 
           AND user_id = '{$_SESSION["uid"]}'";
$result = $con->query($selqry);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie D'Art :: My Booking</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #FFF8E1;  
        }

        .table-card {
            width: 80%;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
            padding: 30px;
            animation: fadeIn 0.6s ease-out;
            margin-left:200px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #9BA5E8;
            color: white;
        }

        td {
            color: #333;
        }

        .img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        a {
            color: #1e90ff;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="table-card">
        <h1>My Booking</h1>
        <form method="post" action="">
            <table>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>

                <?php
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $qty = $row["cart_quantity"];
                    $price = $row["product_price"];
                    $totalamt = $qty * $price;
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["product_name"]; ?></td>
                        <td><img src="../Assets/Files/Product/<?php echo $row["product_photo"]; ?>" class="img"/></td>
                        <td><?php echo $qty; ?></td>
                        <td>₹<?php echo $price; ?></td>
                        <td>₹<?php echo $totalamt; ?></td>
                        <td>
                            <?php
                            if ($row["booking_status"] == 1 && $row["cart_status"] == 1) {
                                echo "Payment Pending";
                            } elseif ($row["booking_status"] == 2 && $row["cart_status"] == 1) {
                                echo "Payment Completed";
                            } elseif ($row["booking_status"] == 1 && $row["cart_status"] == 2) {
                                echo "Product Packed";
                            } elseif ($row["booking_status"] == 1 && $row["cart_status"] == 3) {
                                echo "Product Shipped";
                            } elseif ($row["booking_status"] == 1 && $row["cart_status"] == 4) {
                                echo "Order Completed";
                            }
                            ?>
                        </td>
                        <td><a href="ProductRating.php?pid=<?php echo $row['product_id']; ?>">Review</a></td>
                        <td><a href="Feedback.php">Feedback</a></td>
                    </tr>
                <?php } ?>
            </table>
        </form>
    </div>
</body>

</html>

<?php include("Foot.php"); ?>
