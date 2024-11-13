<?php
include("Head.php");

if(isset($_POST["btn_submit"]))
{
  
  $content=$_POST["txt_content"];
  
  $insqry="insert into tbl_feedback(feedback_content, user_id, feedback_date)values('".$content."','".$_SESSION["uid"]."',curdate())";   
  if($con -> query($insqry))
{
?>
<script>
alert('Inserted');
location.href='Feedback.php';
</script>
<?php  
}
else
{
?>
<script>
alert('Failed');
location.href='Feedback.php';
</script>
<?php
}
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback</title>
<style>
    body {
        background-color: #FFF8E1; /* Dark background */
        font-family: Arial, sans-serif; /* Font styling */
    }

    h1 {
        color: #ffffff; /* Light color for headings */
    }

    table {
        width: 80%;
        margin: 20px auto; /* Centering the table */
        border-collapse: collapse; /* Removing gaps between table cells */
    }

    
    th, td {
        padding: 10px; /* Padding for table cells */
        text-align: center; /* Centering text in table cells */
    }

    input[type="submit"], input[type="reset"] {
        background-color: #007BFF; /* Bootstrap primary button color */
        color: white; /* Text color for buttons */
        border: none; /* No border */
        padding: 10px 20px; /* Padding for buttons */
        cursor: pointer; /* Pointer cursor for buttons */
        border-radius: 5px; /* Rounded corners */
    }

    input[type="reset"] {
        background-color: #dc3545; /* Bootstrap danger button color */
    }

    input[type="submit"]:hover, input[type="reset"]:hover {
        opacity: 0.9; /* Slightly fade buttons on hover */
    }

    textarea {
        width: 90%; /* Full width */
        background-color: white; /* Dark textarea background */
        border: 1px solid #444; /* Dark border */
        border-radius: 5px; /* Rounded corners */
    }

    textarea:focus {
        outline: none; /* No outline on focus */
        border: 1px solid #007BFF; /* Highlight border color on focus */
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table align="center"  cellpadding="10">
    <tr align="center">
      <td>Feedback</td>
      <td><label for="txt_content"></label>
        <textarea name="txt_content" id="txt_content" cols="45" rows="5"></textarea></td>
    </tr>
    <tr align="center">
      <td colspan="2">
          <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
          <input type="reset" name="btn_reset" id="btn_reset" value="Cancel" />
        </td>
    </tr>
  </table>
  <br />
  <br />
  <table align="center" cellpadding="10">
    <tr align="center">
      <td>Sl.No</td>
      <td>Name</td>
      <td>Date</td>
      <td>Content</td>
    </tr>
    <?php 
	$selqry="select * from tbl_feedback f inner join tbl_user u on u.user_id = f.user_id where u.user_id = '".$_SESSION['uid']."'";
	$result = $con -> query($selqry);
	$i=0;
	while($row = $result -> fetch_assoc())
	{
		$i++;
		?>
    <tr align="center">
      <td><?php echo $i;?></td>
      <td><?php echo $row["user_name"] ?></td>
      <td><?php echo $row["feedback_date"] ?></td>
      <td><?php echo $row["feedback_content"] ?></td>
    </tr>
    <?php
	}
	
	?>
  </table>
</form>
</body>
</html>

<?php include("Foot.php"); ?>