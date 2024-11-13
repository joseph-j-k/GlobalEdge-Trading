<?php
include("Head.php");

$sel="select * from tbl_trader where trader_id='".$_SESSION['tid']."'";
$row=$con->query($sel);
$data=$row->fetch_assoc();
if(isset($_POST["btn_submit"]))
{
    $name=$_POST['txt_name'];
    $email=$_POST['txt_email'];
    $contact=$_POST['txt_contact'];
    $address=$_POST['txt_address'];
    $upqry="update tbl_trader set trader_name='".$name."',trader_email='".$email."',trader_contact='".$contact."',trader_address='".$address."' where trader_id='".$_SESSION['tid']."'";
    if($con->query($upqry))
    {
        ?>
         <script>
         alert('Updated successfully');
         window.location="Editprofile.php";
         </script>
         <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Profile</title>
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
                <td>Name</td>
                <td><input type="text" name="txt_name" id="txt_name" value="<?php echo $data['trader_name']; ?>"/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="txt_email" id="txt_email" value="<?php echo $data['trader_email']; ?>" /></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data['trader_contact']; ?>"/></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="txt_address" value="<?php echo $data['trader_address']; ?>" /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Edit" />
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php include("Foot.php"); ?>
