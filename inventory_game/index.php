<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Inventory Game</title>
</head>
<body>
<div class="container">
    <h2>Inventory Item Game</h2>
    <a class="button" href="add.php">+ Tambah Item</a>

    <table>
        <tr>
            <th>Nama Item</th>
            <th>Rarity</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php
        $items = mysqli_query($conn, "SELECT * FROM items");
        while ($row = mysqli_fetch_assoc($items)) :
        ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['rarity'] ?></td>
            <td><?= $row['category'] ?></td>
            <td><?= $row['stock'] ?></td>
            <td>
                <a class="button" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a class="button" style="background:red"
                   href="delete.php?id=<?= $row['id'] ?>"
                   onclick="return confirm('Hapus item?');">
                   Hapus
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
