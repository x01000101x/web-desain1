<table border="1px">
    <tr>
        <td colspan="4">
            <a href="<?php echo site_url('Welcome/VFormAddSiswa'); ?>">Add</a>
        </td>
    </tr>
    <tr>
        <th>NIS</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Tools</th>
    </tr>
    <?php
    if (!empty($DataSiswa)) {
        foreach ($DataSiswa as $ReadDS) {
    ?>

            <tr>
                <td><?php echo $ReadDS->nis; ?></td>
                <td><?php echo $ReadDS->nama; ?></td>
                <td><?php echo $ReadDS->alamat; ?></td>
                <td>
                    <a href="<?php echo site_url('Welcome/DataSiswa/' . $ReadDS->nis . '/view') ?>">Update</a>
                    <a href="<?php echo site_url('Welcome/DeleteDataSiswa/' . $ReadDS->nis) ?>">Delete</a>
                </td>
            </tr>

    <?php
        }
    }
    ?>
</table>