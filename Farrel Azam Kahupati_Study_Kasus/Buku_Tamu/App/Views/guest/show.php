<h2>Detail Tamu</h2>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Nama:</strong> <?php echo $guest->nama; ?></p>
                <p><strong>Email:</strong> <?php echo $guest->email; ?></p>
                <p><strong>Telepon:</strong> <?php echo $guest->telepon; ?></p>
                <p><strong>Instansi:</strong> <?php echo $guest->instansi; ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Tujuan:</strong> <?php echo $guest->tujuan; ?></p>
                <p><strong>Bertemu Dengan:</strong> <?php echo $guest->bertemu_dengan; ?></p>
                <p><strong>Tanggal:</strong> <?php echo $guest->tanggal_berkunjung; ?></p>
                <p><strong>Waktu Masuk:</strong> <?php echo $guest->waktu_masuk; ?></p>
                <p><strong>Waktu Keluar:</strong> <?php echo $guest->waktu_keluar; ?></p>
            </div>
        </div>
        <p><strong>Catatan:</strong> <?php echo $guest->catatan; ?></p>
        <p><strong>Ditambahkan oleh:</strong> <?php echo $guest->petugas; ?></p>
    </div>
</div>

<a href="<?php echo BASEURL; ?>/index.php?page=guest" class="btn btn-secondary mt-3">Kembali</a>