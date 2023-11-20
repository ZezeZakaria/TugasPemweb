<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>

<body>
    <?php
    require './config/db.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = mysqli_query($db_connect, "SELECT * FROM products WHERE id=$id");

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $price = $row['price'];
            $image = $row['image'];
        }
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];

        // Handle image upload
        if ($_FILES['new_image']['error'] == 0) {
            $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/upload/';  // Sesuaikan dengan path yang sesuai
            $newImageName = uniqid() . '-' . $_FILES['new_image']['name'];
            $targetPath = $targetDir . $newImageName;

            move_uploaded_file($_FILES['new_image']['tmp_name'], $targetPath);

            // Hapus gambar lama jika berhasil diunggah gambar baru
            if ($image != "") {
                unlink($_SERVER['DOCUMENT_ROOT'] . $image);
            }

            // Update database dengan path gambar yang baru
            $image = '/upload/' . $newImageName;
        }

        mysqli_query($db_connect, "UPDATE products SET name='$name', price='$price', image='$image' WHERE id=$id");

        header("Location: show.php");
    }
    ?>


    <h2>Edit Produk</h2>
    <form method="POST" action="edit.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <label for="name">Nama Produk:</label>
        <input type="text" name="name" value="<?= $name; ?>">
        <br>
        <label for="price">Harga:</label>
        <input type="text" name="price" value="<?= $price; ?>">
        <br>
        <label for="new_image">Gambar Baru:</label>
        <input type="file" name="new_image">
        <br>
        <input type="submit" name="update" value="Update">
    </form>
</body>

</html>