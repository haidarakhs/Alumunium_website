<?php
    session_start(); // Memulai sesi untuk memeriksa status login

    // Cek apakah pengguna sudah login
    if (!isset($_SESSION['user_id'])) {
        // Jika tidak, alihkan ke halaman login yang ada di folder admin
        header("Location: ../index.php");
        exit();
    }

    include('database.php');

    // Cek apakah koneksi database berhasil
    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Ambil data dari tabel tb_product
    $result = mysqli_query($conn, "SELECT * FROM tb_product");

    // Jika query gagal, tampilkan pesan error
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Produk</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        .action-buttons a {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            margin-right: 5px;
            border-radius: 5px;
        }
        .edit { background: #28a745; }
        .delete { background: #dc3545; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Admin - Kelola Produk</h2>
    <a href="add_product.php" style="background: #007bff; color: white; padding: 10px; text-decoration: none; display: inline-block;">Tambah Produk</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td>
                        <?php if (!empty($row['image'])) { ?>
                            <img src="../uploads/<?php echo htmlspecialchars($row['image']); ?>" width="50">
                        <?php } else { ?>
                            (No Image)
                        <?php } ?>
                    </td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td>Rp <?php echo number_format($row['price'], 2, ',', '.'); ?></td>
                    <td class="action-buttons">
                        <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a>
                        <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
