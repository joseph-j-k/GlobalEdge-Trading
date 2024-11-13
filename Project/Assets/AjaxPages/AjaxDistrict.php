<option value="">Select Place</option>
<?php
include('../Connection/Connection.php');
$selQry="select * from tbl_district where state_id=".$_GET['did'];
$result=$con->query($selQry);
while($data=$result->fetch_assoc())
		{
		
        ?>
        <option value="<?php echo $data['district_id']?>"><?php echo $data['district_name'];?></option>
        <?php
		}
?>