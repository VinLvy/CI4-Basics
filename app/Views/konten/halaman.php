<?php echo $this->extend("layout\layout_utama") ?>

<?php echo $this->section("konten_utama") ?>

<h1>Wanted</h1>
<?php echo view_cell("\App\Libraries\Lib_halaman::info", ['admiral' => 'KIZARU', 'wrld' => 'CP0']) ?>
<h1><?php echo $judul_halaman ?></h1>

<div>$1.000.000.000</div>
<div><?php echo $isi_halaman ?></div>

<div>
    <ul>
        <?php
        foreach ($Yonkou as $k => $v) {
            echo "<li>$v</li>";
        }
        ?>
    </ul>
</div>
<?php echo $this->include("komponen\sidebar") ?>

<?php echo $this->endSection() ?>