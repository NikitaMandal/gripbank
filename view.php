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

        <title>Customer Details</title>
           <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.<!--com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          
    
    <link rel="stylesheet" type="text/css" href="css/table.css">
    

      <link rel="stylesheet" type="text/css" href="table.css">
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="animation.css">
      <style>
        button {
            transition: 1.5s;
           
        }

        button:hover {
            background-color: #F9F80A;
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
     <body style="background-color : #badeda ;">
        <?php
        include 'includes/header.php';
        ?>
      
        <?php
    include 'common.php';
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    ?>

        

    <div class="container">
        <h2 class="text-center pt-4" style="color : black;">Customers List</h2>
        <br>
        <div class="row">
            <div class="col">
                <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered" style="border-color:black;">
                        <thead style="color : black;">
                            <tr>
                                <th scope="col" class="text-center py-2">ACCOUNT NUMBER</th>
                                <th scope="col" class="text-center py-2">Name</th>
                                <th scope="col" class="text-center py-2">E-Mail</th>
                                <th scope="col" class="text-center py-2">Balance</th>
                                

                            
                            </tr>
                        </thead>
                        <tbody>
                      <?php
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>

                                <tr style="color : black;"  class="table-success">
                                    <td class="py-2"><?php echo $rows['id'] ?></td>
                                    <td class="py-2"><?php echo $rows['Name'] ?></td>
                                    <td class="py-2"><?php echo $rows['Email'] ?></td>
                                    <td class="py-2"><?php echo $rows['balance'] ?></td>
                                   

                                    
                                </tr>
                            <?php
                            }
                            ?>
                                

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <br><br><br><br>  <br><br><br><br>  <br><br><br><br><br><br>

          <footer>
                <div class="container">
                    <center>
                        Copyright Â© Made by <b>NIKITA MANDAL</b><br>GRIP TheSparksFoundation.
                    </center>
        </div>
          </footer>


    </body>
</html>
