<?php
session_start();
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))
{
	$reply=$_POST["txt_reply"];
	$update="update tbl_complaint set complaint_status=1, complaint_reply='".$reply."' where complaint_id='".$_GET["del"]."'";
	$con->query($update);
			        ?>
<script>
                        window.location='ViewComplaint.php';
                        </script>
<?php
			
}



?>

<?php include("Head.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reply</title>
<style>
        .body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 60px;
        }

        form {
            width: 500px;
            margin: 50px auto;
            padding: 40px;
            background-color: #869897;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #9ABFAB;
        }

        input[type="submit"] {
            background-color: #89b36c;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
            margin-left:10px
        }

        input[type="submit"]:hover {
            background-color: #a1c289;
        }

        input[type="reset"] {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
        }

        input[type="reset"]:hover {
            opacity: 0.8;
        }

    </style>
</head>

<body>
<div id="tab">
  <br/>
  <br/>
  <form id="form1" name="form1" method="post" action="">
    <table align="center">
      <tr align="center">
        <td align="center"></td>
        <td><textarea name="txt_reply" id="txt_reply" cols="45" rows="5" placeholder="Reply"></textarea></td>
      </tr>
      <tr align="center">
        <td  colspan="2" align="center">
          <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
          </td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>

<?php include("Foot.php"); ?>