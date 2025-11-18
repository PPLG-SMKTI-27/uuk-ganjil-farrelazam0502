<h2>Dashboard</h2>

<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5>Total Tamu</h5>
                <h3><?php echo $stats['total']; ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5>Tamu Hari Ini</h5>
                <h3><?php echo $stats['today']; ?></h3>
            </div>
        </div>
    </div>
</div>

<div class="mt-4">
    <h4>Data Tamu Terbaru</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Instansi</th>
                <th>Tujuan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($guests as $guest): ?>
            <tr>
                <td><?php echo $guest->nama; ?></td>
                <td><?php echo $guest->instansi; ?></td>
                <td><?php echo $guest->tujuan; ?></td>
                <td><?php echo $guest->tanggal_berkunjung; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?php echo BASEURL; ?>/index.php?page=guest" class="btn btn-primary">Lihat Semua Data</a>
    <a href="<?php echo BASEURL; ?>/index.php?page=guest_create" class="btn btn-success">Tambah Tamu</a>
</div>