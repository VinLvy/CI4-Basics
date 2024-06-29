<?php echo $this->extend("layout\layout_utama") ?>

<?php echo $this->section("konten_utama") ?>

<h1>Wanted</h1>
<?php echo view_cell("\App\Libraries\Lib_halaman::info", ['admiral' => 'KIZARU', 'wrld' => 'CP0']) ?>
<h1><?php echo $title ?></h1>

<form action="" method="POST">
    <table>
        <tr>
            <td>Judul</td>
            <td><input value="<?php echo $halaman_isi['halaman_judul'] ?>" type="text" style="width:400px" name="halaman_judul" /></td>
        </tr>
        <tr>
            <td>Isi</td>
            <td><textarea style="width:400px" name="halaman_isi"><?php echo $halaman_isi['halaman_isi'] ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="simpan" value="Simpan Data" />
            </td>
        </tr>
    </table>
</form>

<?php echo $this->endSection() ?>