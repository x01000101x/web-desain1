<html>

<head>
    <title>Backend System</title>
</head>

<body>
    <table width="800px" height="600px" border="1px" align="center">
        <tr height="100px">
            <td>
                <a href="<?php echo site_url('Welcome/DataSiswa'); ?>">Data Siswa</a>
                <a href="<?php echo site_url('Welcome/Logout'); ?>">Logout</a>
            </td>
        </tr>
        <tr height="500px">
            <td>
                <?php $this->load->view($content); ?>
            </td>
        </tr>
    </table>
</body>

</html>