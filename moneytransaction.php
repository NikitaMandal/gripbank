<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
                <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Money Transaction</title>
           <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.<!--com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          
    
      <link rel="stylesheet" href="css/table.css" type="text/css">
      <link rel="stylesheet" type="text/css" href="animation.css">

      <style>
    footer{
    padding:10px 0;
    background-color:#101010;
    color:#9d9d9d;
    bottom:0;
    width:100%;
      </style>
    </head>
    <body style="background-color : #adc0c7 ;">
        <?php
            include 'includes/header.php';

    ?>

    <div class="container">
        <h2 class="text-center pt-4" style="color: black;">Transaction History</h2>

        <br>
        <div class="table-responsive-sm">
            <table class="table table-hover table-striped table-condensed table-bordered">
                <thead style="color: black;">
                    <tr>
                        <th class="text-center">S.No</S></th>
                        <th class="text-center">Sender</th>
                        <th class="text-center">Receiver</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Date & Time</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include 'common.php';

                    $sql = "SELECT * FROM `transcation`";
                    $query = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_assoc($query)) {

                    ?>

                        <tr style="color: black;">
                            <td class="py-2"><?php echo $rows['sno']; ?></td>
                            <td class="py-2"><?php echo $rows['sender']; ?></td>
                            <td class="py-2"><?php echo $rows['receiver']; ?></td>
                            <td class="py-2"><?php echo $rows['balance']; ?></td>
                            <td class="py-2"><?php echo $rows['datetime']; ?></td>
                        </tr>

                    <?php
                    }

                    ?>

                </tbody>


            </table>

        </div>


    </div>
    <br/><br/><br/><br/>
    <br/><br/><br/><br/><br/><br/><br/><br/>
    <br/><br/><br/><br/><br/><br/>
    
   <footer>
                <div class="container">
                    <center>
                        Copyright Â© Made by <b>NIKITA MANDAL</b><br>GRIP TheSparksFoundation.
                    </center>
        </div>
          </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    </body>
</html>
