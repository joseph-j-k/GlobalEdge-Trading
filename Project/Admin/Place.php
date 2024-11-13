<?php
include("../Assets/Connection/Connection.php");
include("Head.php");

$id='';
$place='';
if(isset($_POST['btn_submit']))
{
	//$id=$_POST['txt_id'];
	$place=$_POST['txt_place'];
	$district=$_POST['sel_district'];
	
	//if($id=='')
	//{
		$insqry="insert into tbl_place(place_name,district_id) values('".$place."','".$district."')";
		if($con->query($insqry))
		{
			?>
        	<script>
        	alert("Inserted");
			window.location="Place.php";
        	</script>
        	<?php
		}
	//}
	//else
	//{
		//$update="update tbl_place set state_name='".$place."' where state_id='".$id."'";
	//}
	
}

if(isset($_GET['did']))
{
	$delqry="delete from tbl_place where place_id='".$_GET['did']."'";
	if($con->query($delqry))
	{
		?>
        <script>
        alert("Deleted");
		window.location="Place.php";
        </script>
        <?php
	}
}

$sname='';
$sid='';
if(isset($_GET['eid']))
{
	$sel="select * from tbl_place where place_id='".$_GET['eid']."'";
	$result=$con->query($sel);
	$data=$result->fetch_assoc();
	$sid=$data['state_id'];
	$sname=$data['state_name'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
  <style>
    /* General body styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f3f5;
        color: #333;
        margin: 0;
        padding: 0;
    }

    /* Form container styling */
    form {
        width: 80%;
        max-width: 600px;
        margin: 80px auto;
        padding: 40px;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    }

    /* Heading styling */
    h1 {
        text-align: center;
        color: #4CAF50;
        font-size: 1.8em;
        margin-bottom: 20px;
    }

    /* Table styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th, td {
        padding: 30px;
        text-align: center;
    }

    th {
        background-color: #4CAF50;
        color: white;
        font-weight: 500;
    }

    td {
        background-color: #e9f5f2;
        border-bottom: 1px solid #ddd;
    }

    /* Input field styling */
    input[type="text"], select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 5px;
        background-color: #fafafa;
        color: #333;
    }

    /* Submit and cancel button styling */
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1em;
        width: 48%;
        margin: 5px 1%;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    /* Action links styling */
    .actions a {
        padding: 8px 12px;
        color: white;
        background-color: #4CAF50;
        border-radius: 4px;
        text-decoration: none;
        margin: 0 5px;
        transition: background-color 0.3s ease;
    }

    .actions a:hover {
        background-color: #45a049;
    }

    .actions a.delete {
        background-color: #f44336;
    }

    /* Additional styles for alignment */
    .reply-action {
        text-align: center;
        padding-top: 15px;
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">PLACE</h1>
  <table  align="center">
    <tr>
      <td>State</td>
      <td><label for="sel_state"></label>
        <select name="sel_state" id="sel_state" onChange="getPlace(this.value)">
        <option>-------Select-------</option>
        <?php
		$selstate="select * from tbl_state";
		$result=$con->query($selstate);
		while($data=$result->fetch_assoc())
		{
		?>
        <option value="<?php echo $data['state_id'];?>"><?php echo $data['state_name'];?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district">
        <option>-------Select-------</option>
        <?php
		$selstate="select * from tbl_district";
		$result=$con->query($selstate);
		while($data=$result->fetch_assoc())
		{
		?>
        <option value="<?php echo $data['district_id'];?>"><?php echo $data['district_name'];?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
      <input type="text" name="txt_place" id="txt_place" required/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
      
    </tr>
  </table>
  <br />
  <table align="center">
  <tr>
    <td>SL NO</td>
    <td>Place Name</td>
    <td><div align="center">District Name</div></td>
    <td><div align="center">Place Name</div></td>
    <td><div align="center">Action</div></td>
  </tr>
  <?php
  $i=0;
  $selqry="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id inner join tbl_state s on d.state_id=s.state_id";
  $result=$con->query($selqry);
  while($data=$result->fetch_assoc())
  {
	  $i++;
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $data['state_name'];?></td>
    <td><?php echo $data['district_name'];?></td>
    <td><?php echo $data['place_name'];?></td>
    <td><a href="Place.php?did=<?php echo $data['place_id'];?>">Delete</a></td>
  </tr>
  <?php
  }
  ?>
</table>

</form>
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxDistrict.php?did=" + did,
      success: function (result) {

        $("#sel_district").html(result);
      }
    });
  }

</script>

<?php include("Foot.php"); ?>