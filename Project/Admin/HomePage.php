<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HomePage</title>
</head>

<body>
<table width="200" border="1" align="center">
  <tr>
    <td align="center">Welcome :: <?php echo $_SESSION['aname'] ?></td>
  </tr>
  <tr>
    <td><a href="AdminRegistration.php">AdminRegistration</a></td>
  </tr>
  <tr>
     <td><a href="Country.php">Country</a></td>
  </tr>
  <tr>
     <td><a href="State.php">State</a></td>
  </tr>
  <tr>
    <td><a href="District.php">District</a></td>
  </tr>
  <tr>
      <td><a href="Place.php">Place</a></td>
  </tr>
  <tr>
   <td><a href="ProductCategory.php">ProductCategory</a></td>
  </tr>
  <tr>
 <td><a href="SubCategory.php">SubCategory</a></td>
  </tr>
  <tr>
  <td><a href="TraderVerification.php">TraderVerification</a></td>
  </tr>
   <tr>
  <td><a href="UserList.php">UserList</a></td>
  </tr>
  <tr>
  <td><a href="ViewComplaint.php">View Comaplints</a></td>
  </tr>
</table>
</body>
</html>