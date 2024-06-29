<?php
if (session()->getFlashdata('error')) {
    echo "<ul>";
    foreach (session()->getFlashdata('error') as $value) {
        echo "<li> $value</li>";
    }
    echo "</ul>";
}
if (session()->getFlashdata("sukses")) {
    echo  "<h1>" . session()->getFlashdata("sukses") . "<h1>";
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <!-- <div>Nama</div>
    <div><input type="text" name="nama" value="<?php echo old('nama') ?>"></div>
    <div>Email</div>
    <div><input type="text" name="email" value="<?php echo old('email') ?>"></div>
    <div>Password</div>
    <div><input type="password" name="password"></div>
    <div>Konfirmasi password</div>
    <div><input type="password" name="konfirmasi_password"></div> -->
    <input type="file" multiple name="gambar[]">
    <input type="submit" name="submit" value="Simpan">
</form>