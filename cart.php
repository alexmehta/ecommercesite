<?php
    session_start();
    $user_id=$_SESSION['id_user'];
    include 'includes/db_credentials.php';
    $sql = "SELECT * FROM cart WHERE login_id = '{$user_id}'";
    $results = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alex's Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php">admin</a>
            </li>

        </ul>
        <a href="cart.php">Cart</a>

    </div>
</nav>

<table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Picture</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php while($row=(mysqli_fetch_assoc($results))): ?>
            <?php
                $sql2= "SELECT * FROM listings WHERE id='{$row['item']}'";
                $items = mysqli_fetch_assoc(mysqli_query($conn, $sql2));

            ?>
            <tr>
                <th scope="row"><?php echo $row['id'];?></th>
                <td><?php echo $items['name'];?></td>
                <td><?php echo $items['description'];?></td>
                <td><?php echo $items['cost'];?></td>
                <td><img width="100" height="100" src="img/<?php echo $items['image_path'];?>"></td>
            </tr>
        <?php endwhile;?>
        </tbody>
    </table>
    <a href="delete-cart.php" onclick="return confirm('are you sure you want to checkout?')" >Checkout</a>
    <a href="listing.php">Back to Home</a>
</body>
</html>
