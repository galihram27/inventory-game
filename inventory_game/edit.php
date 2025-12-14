<?php include "db.php"; ?>

<?php
$id = $_GET['id'];
$item = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM items WHERE id=$id"));

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $rarity = $_POST['rarity'];
    $category = $_POST['category'];
    $stock = $_POST['stock'];

    mysqli_query($conn, "UPDATE items SET 
        name='$name',
        rarity='$rarity',
        category='$category',
        stock='$stock'
    WHERE id=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Edit Item</title>
</head>
<body>
<div class="container">
    <h2>Edit Item Game</h2>

    <form method="POST">
        <label>Nama Item</label>
        <input type="text" name="name" value="<?= $item['name'] ?>" required><br><br>

        <label>Rarity</label>
        <select name="rarity">
            <option <?= $item['rarity']=="Common"?"selected":"" ?>>Common</option>
            <option <?= $item['rarity']=="Rare"?"selected":"" ?>>Rare</option>
            <option <?= $item['rarity']=="Epic"?"selected":"" ?>>Epic</option>
            <option <?= $item['rarity']=="Legendary"?"selected":"" ?>>Legendary</option>
        </select><br><br>

        <label>Kategori</label>
        <select name="category">
            <option <?= $item['category']=="Weapon"?"selected":"" ?>>Weapon</option>
            <option <?= $item['category']=="Armor"?"selected":"" ?>>Armor</option>
            <option <?= $item['category']=="Potion"?"selected":"" ?>>Potion</option>
            <option <?= $item['category']=="Material"?"selected":"" ?>>Material</option>
        </select><br><br>

        <label>Stok</label>
        <input type="number" name="stock" value="<?= $item['stock'] ?>" required><br><br>

        <button type="submit" name="submit">Update</button>
    </form>

</div>
</body>
</html>
