<?php
ob_start();
include("Head.php");
$selQry = "select *from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_product p on p.product_id=c.product_id inner join tbl_user u on u.user_id = b.user_id where trader_id='".$_SESSION["tid"]."' and booking_status!='0' and cart_status!='0'";
$res  = $con -> query($selQry);
if(isset($_GET["cid"]))

	{
		$upQry="update tbl_cart set cart_status = '".$_GET["sts"]."' where cart_id='".$_GET["cid"]."' ";
		if($con -> query($upQry))
		{
			?>
            <script>
				window.location="OrderDetails.php";
			</script>
            <?php
		}
	}

	?>
    
            	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order Details</title>
<style>
    body{
        background-color: #FFF8E1;
    }
    
    h1 {
        color: #343a40;
        margin-top: 20px;
    }
    .container {
        max-width: 1000px;
        margin: 20px auto;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    table th, table td {
        padding: 12px;
        text-align: center;
        border: 1px solid #dee2e6;
    }
    table th {
        background-color: #6c757d;
        color: #ffffff;
    }
    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    .action-links a {
        color: #007bff;
        text-decoration: none;
    }
    .action-links a:hover {
        text-decoration: underline;
    }
    .img {
        width: 50px;
        height: auto;
        border-radius: 4px;
    }

    .tdd{

        color:red;
    }
</style>
</head>
<body>
<div class="container" style="margin-top: 50px">
	<h1 align="center">Order Details</h1>
  <table >
    <tr>
      <td>SlNo</td>
      <td>Name</td>
      <td>Photo</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Total Amount</td>
      <td>Action</td>
    </tr>
    <?php 
	$i=0;
	while($row = $res -> fetch_assoc())
	{
		$quantity = $row["cart_quantity"];
		$price = $row["product_price"];
		$totalamount = $quantity * $price;
		$i++;
		?>
        <tr>
            <td><?php echo $i;?></td> 
            <td><?php echo $row["product_name"];?></td> 
            <td><img src="../Assets/Files/Product/<?php echo $row["product_photo"];?>" width="47"  class="img"/></td>
            <td><?php echo $row["cart_quantity"];?></td>
            <td><?php echo $row["product_price"];?></td>
            <td><?php echo $totalamount;?></td>
	        <td>
          		<?php
                
					if($row["booking_status"]==1 && $row["cart_status"]==0)
					{
						echo "Payment Pending....";
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==1)
					{
						?>
                        Payment Completed / 
                        <a href="OrderDetails.php?cid=<?php echo $row["cart_id"];?>&sts=2">Deliverd</a>
                        <?php
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==2)
					{
						?>
                        Order Completed 
                        <?php
					}
				
				
				?>
          </td>

</tr>
<?php
	}
	?>
  </table>
</div>
<p style="margin-bottom: 40px"></p>
</body>
<?php 
include("Foot.php");
ob_flush();
?>
</html>