<?php
$server = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($server, $username, $password, "bank");
if (!$conn) {
    die(mysqli_connect_error());
}

extract($_POST);
if (isset($save)) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from user where id=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from user where id=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);


    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    } else if ($amount > $sql1['balance']) {

        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';
        echo '</script>';
    } else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {
        $sender = $sql1['Name'];
        $receiver = $sql2['Name'];

        $money = $amount;
        if ($sender == $receiver) {
            $money = 0;
        }

        $newbalance = $sql1['balance'] - $money;
        $sql = "UPDATE user set balance=$newbalance where id=$from";
        mysqli_query($conn, $sql);



        $newbalance = $sql2['balance'] + $money;
        $sql = "UPDATE user set balance=$newbalance where id=$to";
        mysqli_query($conn, $sql);

        $sql = "insert into transaction (sender, receiver, balance) values ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);



        echo "<script type='text/javascript'>";
        echo "alert('Transaction Sucessful!!!')";
        echo "</script>";

        $newbalance = 0;
        $amount = 0;
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="table.css">
   
 <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="animation.css">
        
    <style type="text/css">
        button {
            border: none;
            background: #d9d9d9;
        }

        button:hover {
            background-color: #777E8B;
            transform: scale(1.1);
            color: white;
        }
        footer{
    padding:10px 0;
    background-color:#101010;
    color:#9d9d9d;
    bottom:0;
    width:100%;
}

    </style>
</head>

<body style="background-color : #adc7c3 ;">

    <?php
    include 'includes/header.php';
    ?>

<div class="container">
    <h2 class="text-center pt-4" style="margin-top: 80px;"><b><u>Transaction</u></b></h2>
    <hr class="hr">
    <?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($server, $username, $password, "bank");
    if (!$conn) {
        die(mysqli_connect_error());
    }

    ?>
    <form method="post" name="tcredit" class="tabletext"><br>
        <label style="font-weight: bold;font-size:larger;">Sender:</label>

        <select name="from" class="form-control" required>
            <option value="" disabled selected>----------------</option>

            <?php

            $server = "localhost";
            $username = "root";
            $password = "";
            $conn = mysqli_connect($server, $username, $password, "bank");
            if (!$conn) {
                die(mysqli_connect_error());
            }
            $sql = "SELECT * FROM user where 1";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "Error " . $sql . "<br>" . mysqli_error($conn);
            }
            while ($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id']; ?>">

                    <?php echo $rows['Name']; ?> [ Balance:
                    <?php echo $rows['balance']; ?> ]

                </option>
            <?php
            }
            ?>
            <div>
        </select>
        <br>
        <br>
        <label style="font-weight: bold; font-size:larger;">Receiver:</label>

        <select name="to" class="form-control" required>
            <option value="" disabled selected>----------------</option>

            <?php

            $server = "localhost";
            $username = "root";
            $password = "";
            $conn = mysqli_connect($server, $username, $password, "Bank");
            if (!$conn) {
                die(mysqli_connect_error());
            }
            $sql = "SELECT * FROM user where 1";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "Error " . $sql . "<br>" . mysqli_error($conn);
            }
            while ($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id']; ?>">

                    <?php echo $rows['Name']; ?> [ Balance:
                    <?php echo $rows['balance']; ?> ]

                </option>
            <?php
            }
            ?>
            <div>
        </select>
        <br>
        <br>
        <label style="font-weight: bold;font-size:larger;">Amount:</label>

        <input type="number" class="form-control" name="amount" required>
        <br><br>
        <div class="text-center">
            <button class="btn mt-3 btn-success" name="save" value="Save" type="submit" id="myBtn">Transfer</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<br> <footer>
                <div class="container">
                    <center>
                        Copyright Â© Made by <b>NIKITA MANDAL</b><br>GRIP TheSparksFoundation.
                    </center>
        </div>
          </footer>
        </body>
        </html>