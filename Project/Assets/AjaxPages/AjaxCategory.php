
<?php
include("../Connection/Connection.php");

?>

<option value="">---Select---</option>

<?php

$sel="select * from tbl_subcategory where category_id='".$_GET["cid"]."'";
$re=$con->query($sel);
		while($row=$re->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["subcat_id"];?>"><?php echo $row["subcat_name"];?></option>
            <?php
		}
	



?>