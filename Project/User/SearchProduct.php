<?php include("Head.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="../Assets/Templates/Search/bootstrap.min.css">

    <style>
        /* General styling for body */
        body {
            background-color: #FFF8E1; /* Light background */
            color: black; /* Dark text color */
            padding: 40px; /* Padding for body */
            font-family: 'Poppins', sans-serif; /* Font style */
        }

        /* Custom alert box */
        .custom-alert-box {
            z-index: 1;
            position: fixed;
            top: 100px;
            right: 20px;
        }

        /* Alert boxes */
        .alert {
            display: none;
            margin-bottom: 10px;
            border-radius: 5px;
            padding: 20px;
            font-weight: bold;
        }

        .alert-success {
            background-color: #dff0d8; /* Light green background */
            color: #3c763d; /* Dark green text */
        }

        .alert-danger {
            background-color: #f2dede; /* Light red background */
            color: #a94442; /* Dark red text */
        }

        .alert-warning {
            color: #8a6d3b;
            background-color: #f0ad4e; /* Light orange background */
            border-color: #ffeeba; /* Light orange border */
        }

        /* Filter section styles */
        .filter-section {
            padding: 30px;
            border: 1px solid red; /* Light border */
            border-radius: 20px;
            margin-bottom: 20px; /* Space below filter section */
            background-color: #1e1e1e; /* Dark background */
            color: #ffffff; /* White text */
        }

        .form-check {
            margin-bottom: 5px; /* Space between checkboxes */
        }

        .list-group-item {
            padding: 12px 10px; /* Padding for list items */
            background-color: #2a2a2a; /* Dark item background */
            border-color: #444; /* Dark border */
            color: #ffffff; /* White text */
        }

        /* Loader styles */
        #loader {
            display: none; /* Hidden by default */
        }

        /* Button styles */
        .view-cart-button {
            margin-top: 20px;
            text-align: center; /* Center align */
        }

        .btn-primary {
            background-color: #007bff; /* Bootstrap primary color */
            border-color: #f90000; /* Border color */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #004085; /* Darker border on hover */
        }

        /* Stylish textbox styles */
        .stylish-textbox {
            width: 100%;
            padding: 10px;
            border: 2px solid red; /* Border color */
            border-radius: 8px; /* Rounded corners */
            font-size: 16px; /* Text size */
            color: black; /* Text color */
            background-color: #FFF8E1; /* Light background */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Shadow effect */
            transition: border-color 0.3s ease, box-shadow 0.3s ease; /* Transition effects */
        }

        .stylish-textbox:focus {
            border-color: red; /* Darker border on focus */
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.2); /* Enhanced shadow on focus */
            outline: none; /* Remove default outline */
        }

        .stylish-textbox::placeholder {
            color: #888; /* Placeholder color */
            font-style: italic; /* Italicize placeholder */
        }
    </style>
</head>

<body onload="productCheck()">
    <div class="custom-alert-box">
        <div class="alert alert-success">Successfully Added to Cart!</div>
        <div class="alert alert-danger">Failed to Add to Cart!</div>
        <div class="alert alert-warning">Already Added to Cart!</div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 filter-section">
                <h5>Filter Products</h5>
                <hr>
                <h6 class="text-info">Search by Product Name</h6>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="text" onkeyup="productCheck()" class="product_check stylish-textbox" id="txt_name" placeholder="Enter product name...">
                            </label>
                        </div>
                    </li>
                </ul>
                <br />
                <hr>
                <h6 class="text-info">Select Category</h6>
                <ul class="list-group">
                    <?php
                    $selCat = "SELECT * FROM tbl_category";
                    $result = $con->query($selCat);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" id="category" onclick="changeSub(),productCheck()" class="form-check-input product_check" value="<?php echo $row["category_id"]; ?>"><?php echo $row["category_name"]; ?>
                            </label>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
                <br />
                <h6 class="text-info">Select Sub Category</h6>
                <ul class="list-group" id="subcat">
                    <!-- Subcategory items will be injected here -->
                </ul>
            </div>

            <div class="col-lg-9">
                <h5 class="text-center" id="textChange">All Products</h5>
                <div class="view-cart-button">
                    <a href="MyCart.php" class="btn btn-primary">View Cart</a>
                </div>
                <hr>
                <div class="text-center">
                    <img src="../Assets/Templates/Search/loader.gif" id="loader" width="200" />
                </div>
                <div class="row" id="result">
                    <!-- Product results will be injected here -->
                </div>
            </div>
        </div>
    </div>

    <script src="../Assets/Templates/Search/jquery.min.js"></script>
    <script src="../Assets/Templates/Search/bootstrap.min.js"></script>
    <script src="../Assets/Templates/Search/popper.min.js"></script>
    <script>
        function changeSub() {
            var cat = get_filter_text('category');
            if (cat.length !== 0) {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxSearchSubCat.php?data=" + cat,
                    success: function (response) {
                        $("#subcat").html(response);
                    }
                });
            } else {
                $("#subcat").html("");
            }
        }

        function addCart(id) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxAddCart.php?id=" + id,
                success: function (response) {
                    if (response.trim() === "Added to Cart") {
                        $(".alert-success").fadeIn(300).delay(1500).fadeOut(400);
                    } else if (response.trim() === "Already Added to Cart") {
                        $(".alert-warning").fadeIn(300).delay(1500).fadeOut(400);
                    } else {
                        $(".alert-danger").fadeIn(300).delay(1500).fadeOut(400);
                    }
                }
            });
        }

        function productCheck() {
            $("#loader").show();

            var action = 'data';
            var category = get_filter_text('category');
            var subcategory = get_filter_text('subcategory');
            var name = document.getElementById('txt_name').value;

            $.ajax({
                url: "../Assets/AjaxPages/AjaxSearchProduct.php?action=" + action + "&category=" + category + "&subcategory=" + subcategory + "&name=" + name,
                success: function (response) {
                    $("#result").html(response);
                    $("#loader").hide();
                    $("#textChange").text("Filtered Products");
                }
            });
        }

        function get_filter_text(text_id) {
            var filterData = [];
            $('#' + text_id + ':checked').each(function () {
                filterData.push($(this).val());
            });
            return filterData;
        }
    </script>
</body>

</html>

<?php include("Foot.php"); ?>
