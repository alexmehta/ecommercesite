<?php
    session_start();
    if($_SESSION['admin']==1){
        include 'includes/db_credentials.php';
        $sql = "SELECT * FROM listings";
        $results = mysqli_query($conn, $sql);
        $conn->close();
    }else{
        header("LOCATION: index.php");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
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
                    <a class="nav-link" href="#">Admin <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listing.php">Home</a>
                </li>

            </ul>

        </div>
    </nav>
    <h1>Admin Page</h1>
    <h2>Create Listing</h2>
    <form action="create.php" method="POST" enctype="multipart/form-data">
        <input type="text" placeholder="Name of Item" name="name" required>
        <input type="text" placeholder="Description" name="description" required>
        <input type="number" placeholder="$" name="cost" required>
        <input type="file" name="photo" accept="image/gif, image/jpeg, image/png" required>
        <input type="submit" name="submit">
    </form>
    <h2>Items List</h2>
    <br>

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
        <tr>
            <th scope="row"><?php echo $row['id'];?></th>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['description'];?></td>
            <td><?php echo $row['cost'];?></td>
            <td><img width="100" height="100" src="img/<?php echo $row['image_path'];?>"></td>
            <td><a href="edit.php?id=<?php echo $row['id'];?>">Edit</a></td>

        </tr>
        <?php endwhile;?>
        </tbody>
    </table>
</body>
</html>
