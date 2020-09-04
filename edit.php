<?php
    session_start();
    if($_SESSION['admin']==1){

    }else{
        header("LOCATION: index.php");
    }
    print_r($_GET);
    include 'includes/db_credentials.php';

    $sql = "SELECT * FROM listings WHERE id='{$_GET['id']}'";
    $results = mysqli_query($conn, $sql);
    $conn->close();
    $row=(mysqli_fetch_assoc($results))

    ?>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<h1>Admin Page</h1>
<h2>Create Listing</h2>
<form action="edit-form.php?id=<?php echo $_GET['id'];?>" method="POST" enctype="multipart/form-data">
    <input type="text" placeholder="Name of Item" name="name" value="<?php echo $row['name']?>" required>
    <input type="text" placeholder="Description" name="description" value="<?php echo $row['description']?>" required>
    <input type="number" placeholder="$" name="cost" value="<?php echo $row['cost']?>" required>
    <input type="file" name="photo" value="<?php echo $row['image_path']?>" required>
    <input type="submit" name="submit">
</form>
<a onClick="return confirm('Do you want to delete this listing')" href="delete.php?id=<?php echo $_GET['id'];?>">Delete<a/>
