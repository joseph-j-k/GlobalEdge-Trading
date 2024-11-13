
<?php
include("../Connection/Connection.php");
session_start();
$selqry="select * from tbl_booking where user_id ='".$_SESSION["uid"]."' and booking_status='0'";
$result=$con->query($selqry);
if($result->num_rows>0)
{
	
	if($row=$result->fetch_assoc())
	{
		$bid = $row["booking_id"];
		
		
			
		$selqry="select * from tbl_cart where booking_id='".$bid."'and product_id='".$_GET["id"]."' and cart_status='0'";
		$result=$con->query($selqry);
		if($result->num_rows>0)
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
			$selqry1="select * from tbl_booking where user_id ='".$_SESSION["uid"]."' and booking_status='0'";
			$result1=$con->query($selqry1);
			if($result1->num_rows>0)
			{
				$selqry="select MAX(booking_id) as id from tbl_booking";
				$res=$con->query($selqry);
				if($row=$res->fetch_assoc())
				{
		 			$insQry1="insert into tbl_cart(product_id,booking_id)values('".$_GET["id"]."','".$row["id"]."')";
         			if($con->query($insQry1))
					  { 
						 echo "Added to Cart";
					  }
         			else
          			{
	    			 echo"Failed";
          			}
				}
			}
			else
			{
			$insqry="insert into tbl_booking(user_id) value('".$_SESSION['uid']."')";
			if ($con->query($insqry))
			{
				$selqry="select MAX(booking_id) as id from tbl_booking";
				$res=$con->query($selqry);
				if($row=$res->fetch_assoc())
				{
		 			$insQry1="insert into tbl_cart(product_id,booking_id)values('".$_GET["id"]."','".$row["id"]."')";
         			if($con->query($insQry1))
					  { 
						 echo "Added to Cart";
					  }
         			else
          			{
	    			 echo"Failed";
          			}
				}
		
			}
			}
		}	
	}
}
else
{
	$insqry="insert into tbl_booking(user_id) value('".$_SESSION['uid']."')";
	if ($con->query($insqry))
	{
		 $selqry="select MAX(booking_id) as id from tbl_booking";
		$res=$con->query($selqry);
		if($row=$res->fetch_assoc())
		{
			$insqry1="insert into tbl_cart(product_id,booking_id)values('".$_GET['id']."','".$row["id"]."')";
				if($con->query($insqry1))
				{
					echo "Added to Cart";
				}
				else
				{
					echo "Failed";
				}
		}
	}
}

?>
