<?php
include("Head.php");

$selqry="select * from tbl_trader where trader_id='".$_SESSION['tid']."'";
$row=$con->query($selqry);
$data=$row->fetch_assoc();
$dbpassword=$data['trader_password'];
if(isset($_POST["btn_changepass"]))
{
    $OldPassword=$_POST["txt_old"];
    $NewPassword=$_POST["txt_new"];
    $ReTypePassword=$_POST["txt_confirm"];
    
    if($OldPassword==$dbpassword)
    {
        if($NewPassword==$ReTypePassword)
        {
            $up="update tbl_trader set trader_password='".$NewPassword."' where trader_id=".$_SESSION['tid'];
            if($con->query($up))
            {
                ?>
         <script>
         alert('Password Changed');
         window.location="Changepassword.php";
         </script>
         <?php
            }
        }
        else
        {
            ?>
         <script>
         alert('Password Does Not Match');
         </script>
         <?php
        }
    }
    ?>
         <script>
         alert('Incorrect Current Password');
         </script>
         <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Password</title>
<style>

    body{
        background-color: #FFF8E1;
    }

    .form-container {
        width: 100%;
        max-width: 400px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        opacity: 0;
        transform: translateY(20px);
        animation: fadeIn 1s ease-out forwards;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .form-container table {
        width: 100%;
        margin-top: 10px;
    }

    .form-container td {
        padding: 10px;
    }

    .form-container td:first-child {
        font-weight: bold;
        text-align: left;
        color: #333;
    }

    .form-container td:last-child {
        text-align: right;
    }

    .form-container input[type="text"],
    .form-container input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .form-container input[type="text"]:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
    }

    .form-container input[type="submit"] {
        background-color: #007bff;
        color: white;
        font-weight: bold;
        cursor: pointer;
        text-align: center;
    }

    .form-container input[type="submit"]:hover {
        background-color: #0056b3;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
</head>

<body>
<div class="form-container" style="margin-left:500px">
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td>Current password</td>
                <td><input type="text" name="txt_old" id="txt_old" /></td>
            </tr>
            <tr>
                <td>New password</td>
                <td><input type="text" name="txt_new" id="txt_new" /></td>
            </tr>
            <tr>
                <td>Confirm password</td>
                <td><input type="text" name="txt_confirm" id="txt_confirm" /></td>
            </tr>
            <tr>
                <td height="61"><input name="btn_changepass" type="submit" id="btn_changepass" value="Change Password" /></td>
                <td><div align="center">
                    <input name="cancel" type="submit" id="cancel" value="Cancel" />
                </div></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php include("Foot.php"); ?>
