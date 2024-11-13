<?php
include("../Assets/Connection/Connection.php");
include("Head.php");

if (isset($_POST["btn_submit"])) {
  $name = $_POST["txt_name"];
  $zipCode = $_POST["txt_zipcode"];
  $hid = $_POST["hidden_id"];

  if ($hid == "") {
    $insQry = "insert into tbl_country(country_name, country_code)values('" . $name . "', '" . $zipCode . "')";

    if ($con->query($insQry)) {
      echo "<script>
					alert('Inserted');
					window.location = 'Country.php';
				  </script>";

    }
  } else {

    $update = " update tbl_country set country_name = '" . $name . "', country_code = '" . $zipCode . "' where country_id ='" . $hid . "'";
    if ($con->query($update)) {
      echo "<script>
			alert('Updated');
			window.location='Country.php';
			</script>";
    }
  }
}


if (isset($_GET["did"])) {

  $deleteQry = "delete from tbl_country where country_id = '".$_GET["did"]."'";
  if ($con->query($deleteQry)) {
    echo "<script>
			alert('Deleted');
			window.location='Country.php';
			</script>";
  }
}


$eid = "";
$ename = "";
$ecode = "";


if (isset($_GET['eid'])) {
  $sel = "select * from tbl_country where country_id ='" . $_GET['eid'] . "'";
  $result = $con->query($sel);
  if ($data = $result->fetch_assoc()) {
    $eid = $data["country_id"];
    $ename = $data["country_name"];
    $ecode = $data["country_code"];
  }

}

?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Country</title>
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
    <h1 align="center">Country</h1>
    <table align="center">
      <tr>
        <td>Name</td>
        <td><label for="txt_name"></label>
          <input type="text" name="txt_name" id="txt_name" value="<?php echo $ename ?>" />
          <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $eid ?>" />
        </td>
      </tr>
      <tr>
        <td>Zip code</td>
        <td><label for="txt_zipcode"></label>
          <input type="text" name="txt_zipcode" id="txt_zipcode" value="<?php echo $ecode ?>" />
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        </td>
      </tr>
    </table>
    <br />
    <table  align="center">
      <tr>
        <td>#</td>
        <td>Country</td>
        <td>Zip&nbsp;Code </td>
        <td colspan="2" align="center">Action</td>
      </tr>
      <?php
      $i = 0;
      $sel = "select * from tbl_country";
      $result = $con->query($sel);
      while ($data = $result->fetch_assoc()) {
        $i++;
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $data["country_name"] ?></td>
          <td><?php echo $data["country_code"] ?></td>
          <td>
            <a href="Country.php?eid=<?php echo $data["country_id"]; ?>">Edit</a>
            <a href="Country.php?did=<?php echo $data["country_id"]; ?>">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </table>


  </form>
</body>

</html>

<?php include("Foot.php"); ?>