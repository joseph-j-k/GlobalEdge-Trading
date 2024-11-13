
<?php
include("Head.php");

if(isset($_GET["m"]))
{
	$_SESSION["m"]=$_GET["m"];
}

if(isset($_POST["btnsave"]))
{
	$qty=$_POST["txtqty"];
	
			
				$insqry="insert into tbl_stock(stock_quantity, stock_date, product_id)values('".$qty."',curdate(),'".$_SESSION["m"]."')";
				if($con->query($insqry))
				{		
					?>
          <script>
            alert('Inserted');
            window.location='Stock.php';
          </script>  
          <?php
				}
				
			
		
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Stock</title>
    <style>
        
        #tab {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
            text-align: center;
            margin-left:450px;
        }
        
        h1 {
            color: #333;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 50px;
        }
        
        table, th, td {
            border: 1px solid #ddd;
        }
        
        th, td {
            padding: 10px;
            text-align: center;
            color: #333;
        }
        
        th {
            background-color: #4CAF50;
            color: white;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        tr:hover {
            background-color: #e0f7fa;
        }
        
        input[type="text"] {
            width: 80%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div id="tab">
        <h1>Stock Entry</h1>
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <td>Quantity</td>
                    <td><input type="text" name="txtqty" id="txtqty" required="required" autocomplete="off" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="btnsave" id="btnsub" value="Save" />
                    </td>
                </tr>
            </table>
        </form>
        <table>
            <tr>
                <th>Si.no</th>
                <th>Date</th>
                <th>Quantity</th>
            </tr>
            <?php
            $i = 0;
            $selqry = "select * from tbl_stock s inner join tbl_product p on s.product_id=p.product_id where p.product_id='" . $_SESSION["m"] . "'";
            $result = $con->query($selqry);
            while ($row = $result->fetch_assoc()) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row["stock_date"]; ?></td>
                <td><?php echo $row["stock_quantity"]; ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
<?php include("Foot.php"); ?>
 
