<?php include "db.php"; ?>

<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $rarity = $_POST['rarity'];
    $category = $_POST['category'];
    $stock = $_POST['stock'];

    mysqli_query($conn, 
        "INSERT INTO items (name, rarity, category, stock) 
         VALUES ('$name', '$rarity', '$category', '$stock')");
    
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Tambah Item</title>
</head>
<body>
<div class="container">
    <h2>Tambah Item Game</h2>
    <form method="POST">
        <label>Nama Item</label>
        <input type="text" name="name" required><br><br>

        <label>Rarity</label>
        <select name="rarity">
            <option>Common</option>
            <option>Rare</option>
            <option>Epic</option>
            <option>Legendary</option>
        </select><br><br>

        <label>Kategori</label>
        <select name="category">
            <option>Weapon</option>
            <option>Armor</option>
            <option>Potion</option>
            <option>Material</option>
        </select><br><br>

        <label>Stok</label>
        <input type="number" name="stock" required><br><br>

        <button type="submit" name="submit">Simpan</button>
    </form>
</div>
</body>
</html>
