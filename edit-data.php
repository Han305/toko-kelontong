<?php
// include database connection file
include_once("koneksi.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id_barang = $_POST['id_barang'];
    
    $nama_barang=$_POST['nama_barang'];
    $stok=$_POST['stok'];
    $harga=$_POST['harga'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE barang SET nama_barang='$nama_barang',harga='$harga',stok='$stok' WHERE id_barang=$id_barang");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id_barang
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($connection, "SELECT * FROM barang WHERE id_barang=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $nama_barang = $user_data['nama_barang'];
    $harga = $user_data['harga'];
    $stok = $user_data['stok'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Barang</title>
</head>


<body>
<nav class="navbar bg-body-tertiary bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light">TOKO KELONTONG</a>
    <form class="d-flex" role="search">      
      <a class="btn btn-danger" href="logout.php">Logout</a>
    </form>
  </div>
</nav>
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        EDIT DATA
                    </div>
                    <div class="card-body">
                        <form action="update-data.php" method="POST">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_barang" value=<?php echo $nama_barang;?>>  
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="text" name="stok" value=<?php echo $stok;?>  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name="harga" value=<?php echo $harga;?>  class="form-control">
                            </div>
                            <input type="hidden" name="id_barang" value=<?php echo $_GET['id'];?>>
                            <button type="submit" class="btn btn-success">UPDATE</button>
                            <button type="reset" class="btn btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>