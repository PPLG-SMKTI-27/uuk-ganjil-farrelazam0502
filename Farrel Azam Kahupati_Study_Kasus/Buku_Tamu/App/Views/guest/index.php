<h2>Data Tamu</h2>

<a href="<?php echo BASEURL; ?>/index.php?page=guest_create" class="btn btn-success mb-3">Tambah Tamu</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Instansi</th>
            <th>Tujuan</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($guests as $guest): ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $guest->nama; ?></td>
            <td><?php echo $guest->instansi; ?></td>
            <td><?php echo $guest->tujuan; ?></td>
            <td><?php echo $guest->tanggal_berkunjung; ?></td>
            <td>
                <a href="<?php echo BASEURL; ?>/index.php?page=guest_show&id=<?php echo $guest->id; ?>" class="btn btn-info btn-sm">Detail</a>
                <a href="<?php echo BASEURL; ?>/index.php?page=guest_edit&id=<?php echo $guest->id; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?php echo BASEURL; ?>/index.php?page=guest_delete&id=<?php echo $guest->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>