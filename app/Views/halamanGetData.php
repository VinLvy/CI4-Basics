<style>
    table,
    td,
    tr {
        border: 1px solid #CCC;
        border-collapse: collapse;
        padding: 5px;
    }

    ul.pagination {
        list-style-type: none;
        margin: 5px 0px 5px 0px;
        padding: 0px;
    }

    ul.pagination li {
        float: left;
        padding: 5px;
        border: 1px solid #dedede;
        margin: 0px 2px 0px 2px;
    }
</style>
<table>
    <?php
    foreach ($dataEmail as $k => $v) {
    ?>
        <tr>
            <td><?php echo $v['id'] ?></td>
            <td><?php echo $v['value'] ?></td>
        </tr>
    <?php
    }
    ?>
</table>
<?php echo $pager->links() ?>