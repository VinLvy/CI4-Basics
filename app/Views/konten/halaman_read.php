<?php echo $this->extend("layout\layout_utama") ?>

<?php echo $this->section("konten_utama") ?>

<h1>Wanted</h1>

<h1><?php echo $title ?></h1>
<style>
    table,
    tr,
    th,
    td {
        border-collapse: collapse;
        border: 1px solid #333;
    }

    table {
        width: auto;
    }
</style>

<table>
    <tr>
        <th>Judul</th>
        <th>Isi</th>
        <th>Opsi</th>
    </tr>
    <?php
    foreach ($halaman_isi as $k => $v) {
    ?>
        <tr>
            <td><?php echo $v['halaman_judul'] ?></td>
            <td><?php echo $v['halaman_isi'] ?></td>
            <td>
                <a href="/halaman/halaman_update/<?php echo $v['halaman_id'] ?>">Update</a>
                <a href="/halaman/halaman_delete/<?php echo $v['halaman_id'] ?>">Delete</a>
            </td>
        </tr>
    <?php
    }

    ?>
</table>

<?php echo $this->endSection() ?>