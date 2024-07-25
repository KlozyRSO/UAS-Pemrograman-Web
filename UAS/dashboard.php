<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
}
include('config.php');

$query = "SELECT * FROM partai";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Partai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('psi.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8); /* White background with slight transparency */
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }
        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        a {
            color: #ff0000;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #ff0000;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .actions a {
            color: #ff0000;
            text-decoration: none;
            margin-right: 10px;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Partai</h1>
        <a href="add.php">Tambah Partai</a> | <a href="index.php?logout=true">Logout</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Partai</th>
                <th>Ketua Partai</th>
                <th>Tahun Berdiri</th>
                <th>Aksi</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['nama_partai']); ?></td>
                <td><?php echo htmlspecialchars($row['ketua_partai']); ?></td>
                <td><?php echo htmlspecialchars($row['tahun_berdiri']); ?></td>
                <td class="actions">
                    <a href="edit.php?id=<?php echo htmlspecialchars($row['id']); ?>">Edit</a> |
                    <a href="delete.php?id=<?php echo htmlspecialchars($row['id']); ?>">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
