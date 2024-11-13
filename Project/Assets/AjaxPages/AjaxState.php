<option value="">Select State</option>
<?php
include('../Connection/Connection.php');
$selQry="select * from tbl_state where country_id = ".$_GET['sid'];
$result = $con -> query($selQry);
while($data = $result -> fetch_assoc())
		{
		
        ?>
        <option value="<?php echo $data['state_id']?>"><?php echo $data['state_name']?>
        </option>
        <?php
		}
?>