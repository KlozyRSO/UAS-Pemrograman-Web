<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
}
include('config.php');

$id = $_GET['id'];
$query = "SELECT * FROM partai WHERE id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $nama_partai = mysqli_real_escape_string($conn, $_POST['nama_partai']);
    $ketua_partai = mysqli_real_escape_string($conn, $_POST['ketua_partai']);
    $tahun_berdiri = mysqli_real_escape_string($conn, $_POST['tahun_berdiri']);
    
    $query = "UPDATE partai SET nama_partai='$nama_partai', ketua_partai='$ketua_partai', tahun_berdiri='$tahun_berdiri' WHERE id=$id";
    mysqli_query($conn, $query);
    
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Partai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #ff0000; /* Changed to red */
            border: none;
            color: #fff;
            padding: 10px;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #cc0000; /* Changed to darker red */
        }
        a {
            color: #ff0000; /* Changed to red */
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Partai</h1>
        <form method="post" action="">
            <label>Nama Partai:</label>
            <input type="text" name="nama_partai" value="<?php echo htmlspecialchars($row['nama_partai']); ?>" required>
            <label>Ketua Partai:</label>
            <input type="text" name="ketua_partai" value="<?php echo htmlspecialchars($row['ketua_partai']); ?>" required>
            <label>Tahun Berdiri:</label>
            <input type="number" name="tahun_berdiri" value="<?php echo htmlspecialchars($row['tahun_berdiri']); ?>" required>
            <input type="submit" name="submit" value="Update">
        </form>
        <a href="dashboard.php">Kembali</a>
    </div>
</body>
</html>
