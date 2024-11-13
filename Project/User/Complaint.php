<?php
include("Head.php");
include("../Assets/connection/connection.php");

if (isset($_POST["btnsave"])) {
    $complaint_title = $_POST["txt_complaint_title"];
    $complaint = $_POST["txtcomplaint"];

    $insqry = "INSERT INTO tbl_complaint(complaint_title, complaint_content, complaint_date, user_id) 
               VALUES ('$complaint_title', '$complaint', CURDATE(), '{$_SESSION["uid"]}')";

    if ($con->query($insqry)) {
         ?>
         <script>
            alert('Inserted');
            window.location='Location:complaint.php';
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
    <title>Complaints</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: #FFF8E1;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .form-card, .table-card {
            width: 80%;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
            padding: 30px;
            margin: 10px 0;
            animation: fadeIn 0.6s ease-out;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            font-size: 14px;
        }

        input[type="submit"] {
            width: 48%;
            padding: 10px;
            margin: 5px 1%;
            border: none;
            border-radius: 25px;
            color: white;
            cursor: pointer;
            background: #869897;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background: #869897;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #6a11cb;
            color: white;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>

    <div class="form-card">
        <h2>Loadge Complaint</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="txt_complaint_title">Complaint Title</label>
                <input type="text" name="txt_complaint_title" id="txt_complaint_title" required />
            </div>
            <div class="form-group">
                <label for="txtcomplaint">Complaint Details</label>
                <input type="text" name="txtcomplaint" id="txtcomplaint" required />
            </div>
            <input type="submit" name="btnsave" value="Submit" />
        </form>
    </div>

    <div class="table-card">
        <h2>My Complaints</h2>
        <table>
            <tr>
                <th>#</th>
                <th>Complaint Title</th>
                <th>Date</th>
                <th>Details</th>
                <th>Reply</th>
            </tr>
            <?php
            $i = 0;
            $selqry = "SELECT * FROM tbl_complaint c 
                       INNER JOIN tbl_user u ON u.user_id = c.user_id 
                       WHERE u.user_id ='".$_SESSION["uid"]."'";
            $result = $con->query($selqry);
            while ($row = $result->fetch_assoc()) {
                $i++;
                echo "<tr>
                        <td>$i</td>
                        <td>{$row["complaint_title"]}</td>
                        <td>{$row["complaint_date"]}</td>
                        <td>{$row["complaint_content"]}</td>
                        <td>{$row["complaint_reply"]}</td>
                      </tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>

<?php include("Foot.php"); ?>
