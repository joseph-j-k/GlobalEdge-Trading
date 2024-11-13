<?php
session_start();
include("../Assets/Connection/Connection.php");
include("Head.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Feedback</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
    }

    form {
        width: 80%;
        margin: 50px auto;
        padding: 50px;
        background-color: #9ABFAB;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        margin-top:100px;
    }

    h1 {
        text-align: center;
        color: #4CAF50;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 40px;
    }

    th, td {
        padding: 12px;
        text-align: center;
    }

    th {
        color: white;
        background-color: #9ABFAB;
    }

    td {
        background-color: #9ABFAB;
    }

    input[type="text"], select {
        width: calc(100% - 16px); /* Adjust for padding */
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-top: -10px;
        box-sizing: border-box;
        background-color: #9ABFAB;
    }

    input[type="submit"] {
        background-color: #89b36c;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        border-radius: 4px;
        width: 100%;
    }

    input[type="submit"]:hover {
        background-color: #a1c289;
    }

    .actions a {
        text-decoration: none;
        padding: 5px 10px;
        background-color: #2196F3;
        color: white;
        border-radius: 4px;
        margin-right: 5px;
    }

    .actions a.delete {
        background-color: #f44336;
    }

    .actions a:hover {
        opacity: 0.8;
    }

    td {
        text-align: center;
    }

    .reply-action {
        text-align: center;
    }
</style>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <th>Sl.No</th>
      <th>Name</th>
      <th>Feedback</th>
    </tr>
    <?php 
	$selqry="select * from tbl_feedback f inner join tbl_user u on u.user_id=f.user_id";
	
	$res=$con->query($selqry);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		 $i++;
		?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $row["user_name"] ?></td>
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