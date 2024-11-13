<?php
include("../Assets/Connection/Connection.php");
include("Head.php");

$id='';
$Subcategory='';
if(isset($_POST['btn_submit']))
{
	$id=$_POST['txt_id'];
	$Subcategory=$_POST['txt_Subcategory'];
	$Category=$_POST['sel_Category'];
	if($id=='')
	{
		$insqry="insert into tbl_subcategory(subcat_name,category_id) values('".$Subcategory."','".$Category."')";
		if($con->query($insqry))
		{
			?>
        	<script>
        	alert("Inserted");
			    window.location="SubCategory.php";
        	</script>
        	<?php
		}
	}
	else
	{
		$update="update tbl_subcategory set subcat_name='".$Subcategory."' where subcat_id='".$id."'";
		if($con->query($update))
		{
			?>
        	<script>
        	alert("Updated");
			    window.location="SubCategory.php";
        	</script>
        	<?php
		}
	}
	
}

if(isset($_GET['did']))
{
	$delqry="delete from tbl_subcategory where subcat_id='".$_GET['did']."'";
	if($con->query($delqry))
	{
		?>
        <script>
        alert("Deleted");
		    window.location="SubCategory.php";
        </script>
        <?php
	}
}

$sname='';
$sid='';
if(isset($_GET['eid']))
{
	$sel="select * from tbl_subcategory where subcat_id='".$_GET['eid']."'";
	$result=$con->query($sel);
	$data=$result->fetch_assoc();
	$sid=$data['subcat_id'];
	$sname=$data['subcat_name'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SubCategory</title>
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
<h1 align="center">Subcategory</h1>
  <table   align="center">
  <tr>
      <td>Category Name</td>
      <td>
      <select name="sel_Category" id="sel_Category">
      <option>---Category---</option>
      <?php 
	   $sel = "select * from tbl_category";
	   $result = $con -> query($sel);
	   while($data = $result -> fetch_assoc())
	   {
	  ?>
      <option value="<?php echo $data["category_id"] ?>"><?php echo $data["category_name"] ?></option>
      <?php } ?>
      </select>
      </td>
    </tr>
    <tr>
      <td>Subcategory Name</td>
      <td><label for="txt_Subcategory"></label>
      <input type="text" name="txt_Subcategory" id="txt_Subcategory" value="<?php echo $sname ?>"/>
      <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $sid ?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <br />
  <table  align="center">
  <tr>
    <td>SL NO</td>
    <td>Subcategory</td>
    <td>Category</td>
    <td>Action</td>
  </tr>
  <?php
  $i=0;
  $selqry="select * from tbl_subcategory sc inner join tbl_category c on sc.category_id=c.category_id";
  $result=$con->query($selqry);
  while($data=$result->fetch_assoc())
  {
	  $i++;
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $data['subcat_name'];?></td>
    <td><?php echo $data['category_name'];?></td>
    <td>
      <a href="Subcategory.php?did=<?php echo $data['subcat_id'];?>">Delete</a>
      <a href="Subcategory.php?eid=<?php echo $data['subcat_id'];?>">Edit</a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>

</form>
</body>
</html>

<?php include("Foot.php"); ?>