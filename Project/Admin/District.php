<?php
include("../Assets/Connection/Connection.php");
include("Head.php");

$id = '';
$district = '';
if (isset($_POST['btn_submit'])) {
  $id = $_POST['txt_id'];
  $district = $_POST['txt_state'];
  $state = $_POST['sel_state'];
  if ($id == '') {
    $insqry = "insert into tbl_district(district_name,state_id) values('" . $district . "','" . $state . "')";
    if ($con->query($insqry)) {
      ?>
      <script>
        alert("Inserted");
        window.location = "District.php";
      </script>
      <?php
    }
  } else {
    $update = "update tbl_district set district_name='" . $district . "' where district_id='" . $id . "'";
    if ($con->query($update)) {
      ?>
      <script>
        alert("Updated");
        window.location = "District.php";
      </script>
      <?php
    }
  }

}

if (isset($_GET['did'])) {
  $delqry = "delete from tbl_district where district_id='" . $_GET['did'] . "'";
  if ($con->query($delqry)) {
    ?>
    <script>
      alert("Deleted");
      window.location = "District.php";
    </script>
    <?php
  }
}

$sname = '';
$sid = '';
if (isset($_GET['eid'])) {
  $sel = "select * from tbl_district where district_id='" . $_GET['eid'] . "'";
  $result = $con->query($sel);
  $data = $result->fetch_assoc();
  $sid = $data['state_id'];
  $sname = $data['state_name'];
}
?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>District</title>
</head>

<body>
  <form id="form1" name="form1" method="post" action="">
    <h1 align="center">District</h1>
    <table  align="center">
      <tr align="center">
        <td>State</td>
        <td><label for="sel_state"></label>
          <select name="sel_state" id="sel_state">
            <option>-------Select-------</option>
              <?php
              $selstate = "select * from tbl_state";
              $result = $con->query($selstate);
              while ($data = $result->fetch_assoc()) {
              ?>
              <option value="<?php echo $data['state_id']; ?>"><?php echo $data['state_name']; ?></option>
              <?php
            }
            ?>
          </select>
        </td>
      </tr>
      <tr align="center">
        <td>District</td>
        <td><input type="text" name="txt_state" id="txt_state" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
            <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        </td>
      </tr>
    </table>
    <br />
    <table>
      <tr>
        <td>SL&nbsp;NO</td>
        <td>State</td>
        <td>District</td>
        <td>Action</td>
      </tr>

      <?php
      $i = 0;
      $selqry = "select * from tbl_district d inner join tbl_state s on d.state_id=s.state_id";
      $result = $con->query($selqry);
      while ($data = $result->fetch_assoc()) {
        $i++;
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $data['state_name']; ?></td>
          <td><?php echo $data['district_name']; ?></td>
          <td>
            <div align="center"><a href="District.php?did=<?php echo $data['district_id']; ?>">Delete</a></div>
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