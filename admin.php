<?php 
require_once "connect.php";

//Read
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="index.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Mode - IPT Project</title>
</head>
<body>
<section class="header-admin" id="header">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <img src="images/logo.png" alt="logo">
                    </div>
                    <div class="col-3">
                        <h2 class="text-center">Administrator Mode</h2>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-info btn-lg" href="adminviewproducts.php">Food</a>
                    </div>
            </div>
            </div>
    </section>

    <section class="top-page-admin">
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table" style="background: white; margin-top: 50px; margin-left:auto; margin-right:auto; border-radius: 10px; color:black; margin-bottom:50px; box-shadow: 0px 2px 13px 1px rgba(0,0,0,0.75);
    -webkit-box-shadow: 0px 2px 13px 1px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 2px 13px 1px rgba(0,0,0,0.75);
    background: white;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;">
                        <thead class="thead-dark">
                          <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Address</th>
                            <th>PhoneNo</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                while ($rows=mysqli_fetch_assoc($result)){
                ?>

                          <tr>
                            <td><?php echo $rows['ID']; ?></td>
                            <td><?php echo $rows['Username']; ?></td>
                            <td><?php echo $rows['Email']; ?></td>
                            <td><?php echo $rows['Password']; ?></td>
                            <td><?php echo $rows['Firstname']; ?></td>
                            <td><?php echo $rows['Lastname']; ?></td>
                            <td><?php echo $rows['Address']; ?></td>
                            <td><?php echo $rows['PhoneNo']; ?></td>

                            <td>
                                <form method="POST" action="adminupdate.php">
                                <input type="hidden" name="id" value="<?php echo $rows['ID']; ?>">
                                <button class="btn btn-success btn-lg" name="edit" type="submit">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="admindelete.php">
                                <input type="hidden" name="id" value="<?php echo $rows['ID']; ?>">
                                <button class="btn btn-danger btn-lg" name="delete" type="submit">Delete</button>
                                </form>
                            </td>
                          </tr>

                          <?php 
                            }
                          ?>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </section>

    <section class="bottom-page-admin">
        <div class="container">
            <div class="row">
                <div class="col">
                <div class="creators-name">
            <p class="text-center">Website Created by Jonathan A. Niez Jr. , Charles Bench Tianchon & Mar Nichol Sarillana</p>
                </div>
                </div>
            </div>
        </div>
        <a href="#header">
        <div class="back-to-top">
                <p class="text-center">Back to Top</p>
        </div>
    </a>
    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>