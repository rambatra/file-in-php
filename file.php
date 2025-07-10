<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="stdname" placeholder="Enter Name">
        <input type="file" name="image">
        <input type="submit" value="Submit" name="btn">
    </form>

    <?php 
    if (isset($_FILES['image']) && isset($_POST['stdname'])) {
        $name = $_POST['stdname'];
        $img = $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];
        $path = "image/" . $img;

        if (move_uploaded_file($img_tmp, $path)) {
            $con = mysqli_connect("localhost", "root", "", "cred");
            $sql = "INSERT INTO practice (name, img) VALUES ('$name', '$img')";
            $result = mysqli_query($con, $sql);

            if ($result) {
                echo "<div>";
                echo "<p>Name: <strong>$name</strong></p>";
                echo "<img src='$path' alt='Uploaded Image' width='200'>";
                echo "</div>";
            } else {
                echo "Error inserting into database.";
            }
        } else {
            echo "Failed to upload image.";
        }
    }
    ?>
</body>
</html>
