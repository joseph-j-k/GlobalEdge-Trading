<?php
include('../Assets/Connection/Connection.php');

if (isset($_POST['btn_submit'])) {
  $name = $_POST['txt_name'];
  $email = $_POST['txt_email'];
  $password = $_POST['txt_password'];
  $hid = $_POST["hidden_id"];

  if ($hid == "") {
    $insqry = "insert into tbl_admin(admin_name, admin_email, admin_password)values('" . $name . "', '" . $email . "', '" . $password . "')";

    if ($con->query($insqry)) {
      echo "<script>  
            alert('Inserted');
            window.location = 'AdminRegistration.php';
          </script";
    }
  } else {
    $update = " update tbl_admin set admin_name = '" . $name . "', admin_email = '" . $email . "', admin_password = '" . $password . "' where admin_id ='" . $hid . "'";
    if ($con->query($update)) {
      echo "<script>
			alert('Updated')
			window.location='AdminRegistration.php'
			</script>";
    }
  }
}



if (isset($_GET["did"])) {

  $deleteQry = "delete from tbl_admin  where admin_id = '" . $_GET["did"] . "'";
  if ($con->query($deleteQry)) {
    echo "<script>  
            alert('Deleted');
            window.location = 'AdminRegistration.php';
          </script";
  }
}


$eid = "";
$ename = "";
$email = "";
$epassword = "";

if (isset($_GET['eid'])) {
  $sel = "select * from tbl_admin where admin_id ='" . $_GET['eid'] . "'";
  $result = $con->query($sel);
  if ($data = $result->fetch_assoc()) {
    $eid = $data["admin_id"];
    $ename = $data["admin_name"];
    $email = $data["admin_email"];
    $epassword = $data["admin_password"];
  }

}


?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Admin Registation</title>
</head>

<body>
  <a href="HomePage.php">Home</a>
  <form id="form1" name="form1" method="post" action="">
    <h1 align="center">Admin Registation</h1>
    <div align="center">
      <table border="1">
        <tr align="center">
          <td>Name</td>
          <td><label for="txt_name"></label>
            <input type="text" name="txt_name" id="txt_name" value="<?php echo $ename ?>"/>
            <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $eid ?>" />
          </td>
        </tr>
        <tr align="center">
          <td>Email</td>
          <td><label for="txt_email"></label>
            <input type="text" name="txt_email" id="txt_email" value="<?php echo $email ?>"/>
          </td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="txt_password" id="txt_password" value="<?php echo $epassword ?>"/></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
          </td>
        </tr>
      </table>
      <br />
      <table align="center" border="1">
        <tr>
          <td>Si No</td>
          <td>Name</td>
          <td>Email</td>
          <td>Password</td>
          <td>Action</td>
        </tr>
        <?php
        $i = 0;
        $SelQry = "select * from tbl_admin";
        $result = $con->query($SelQry);
        while ($row = $result->fetch_assoc()) {
          $i++;
          ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['admin_name'] ?></td>
            <td><?php echo $row['admin_email'] ?></td>
            <td><?php echo $row['admin_password'] ?></td>
            <td>
            <a href="AdminRegistration.php?eid=<?php echo $row["admin_id"]?>">Edit</a>
            <a href="AdminRegistration.php?did=<?php echo $row['admin_id']; ?>">Delete</a>
            </td>
          </tr>
          <?php
        }
        ?>
      </table>
  </form>
</body>

</html>