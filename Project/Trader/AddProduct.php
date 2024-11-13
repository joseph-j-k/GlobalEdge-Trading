<?php
include("Head.php");

if(isset($_POST["btn_submit"]))
{
    $subcat = $_POST["selsubcat"];
    $name = $_POST["txt_name"];
    $desc = $_POST["txtdesc"];
    $price = $_POST["txtprice"];
    
    $photo = $_FILES['txt_photo']['name'];
    $temp = $_FILES['txt_photo']['tmp_name'];
    move_uploaded_file($temp, '../Assets/Files/Product/'.$photo);
    
    $insqry = "INSERT INTO tbl_product (product_name, product_desc, product_price, product_photo, trader_id, subcat_id)
               VALUES ('$name', '$desc', '$price', '$photo', '".$_SESSION['tid']."', '$subcat')";
    
    if($con->query($insqry)) {
        echo "<script>
                showToast('Product added successfully!');
                setTimeout(() => window.location='User.php', 2000);
              </script>";
    }
}

if(isset($_GET['acid']))
{
    $delqry = "DELETE FROM tbl_product WHERE product_id='".$_GET['acid']."'";
    if($con->query($delqry)) {
        echo "<script>
                showToast('Product deleted successfully!');
                setTimeout(() => window.location='AddProduct.php', 2000);
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Registration</title>
<style>
    /* Main Container */
    body {
        font-family: Arial, sans-serif;
        background: #FFF8E1;
        color: #333;
    }
    
    /* Form Styling */
    .form-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 30px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
        font-size: 1.8em;
    }

    /* Toast Notification */
    #toast {
        visibility: hidden;
        max-width: 300px;
        margin: auto;
        background: #5cb85c;
        color: #fff;
        text-align: center;
        border-radius: 8px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        transform: translateX(-50%);
        bottom: 30px;
        font-size: 1em;
    }

    #toast.show {
        visibility: visible;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    /* Table Styling */
    .product-table {
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
    }
    
    .product-table th, .product-table td {
        padding: 15px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .product-table th {
        background: #FFF8E1;
    }

    /* Button Styling */
    .btn {
        padding: 10px;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>
</head>

<body>

<div id="toast">Action successful!</div>

<div class="form-container">
    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
        <h1>Product Registration</h1>
        <label>Category</label>
        <select name="selcategory" id="selcategory" onchange="getSubcategory(this.value)" class="form-control">
            <option>---select---</option>
            <?php 
                $sel = "select * from tbl_category"; 
                $result = $con -> query($sel);
                while($data = $result -> fetch_assoc()) {
                    echo "<option value='".$data["category_id"]."'>".$data["category_name"]."</option>";
                }
            ?>
        </select>

        <label>Subcategory</label>
        <select name="selsubcat" id="selsubcat" class="form-control">
            <option>---select---</option>
        </select>

        <label>Product Name</label>
        <input type="text" name="txt_name" id="txt_name" class="form-control" />

        <label>Description</label>
        <textarea name="txtdesc" id="txtdesc" rows="3" class="form-control"></textarea>

        <label>Price</label>
        <input type="text" name="txtprice" id="txtprice" class="form-control" />

        <label>Photo</label>
        <input type="file" name="txt_photo" id="txt_photo" class="form-control" />

        <button type="submit" name="btn_submit" class="btn">Submit</button>
        <button type="reset" class="btn">Cancel</button>
    </form>
</div>

<table class="product-table">
    <tr>
        <th>Si No</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Subcategory</th>
        <th>Details</th>
        <th>Photo</th>
        <th>Action</th>
    </tr>
    <?php
    $i = 0;
    $SelQry = "SELECT * FROM tbl_product t 
               INNER JOIN tbl_subcategory p ON t.subcat_id=p.subcat_id 
               INNER JOIN tbl_category c ON c.category_id=p.category_id  
               WHERE trader_id='".$_SESSION['tid']."'";
    $result = $con->query($SelQry);
    while($row = $result->fetch_assoc()) {
        $i++;
        echo "<tr>
                <td>{$i}</td>
                <td>{$row['product_name']}</td>
                <td>{$row['product_price']}</td>
                <td>{$row['category_name']}</td>
                <td>{$row['subcat_name']}</td>
                <td>{$row['product_desc']}</td>
                <td><img src='../Assets/Files/Product/{$row['product_photo']}' width='75' height='75' /></td>
                <td>
                    <a href='AddProduct.php?acid={$row['product_id']}'>Delete</a>
                    <a href='Stock.php?m={$row['product_id']}'>Stock</a>
                </td>
              </tr>";
    }
    ?>
</table>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getSubcategory(cid) {
    $.ajax({
        url: "../Assets/AjaxPages/AjaxCategory.php?cid=" + cid,
        success: function(html) {
            $("#selsubcat").html(html);
        }
    });
}

function showToast(message) {
    var toast = document.getElementById("toast");
    toast.innerHTML = message;
    toast.classList.add("show");
    setTimeout(() => { toast.classList.remove("show"); }, 3000);
}
</script>

</body>
</html>
<?php include("Foot.php"); ?>
