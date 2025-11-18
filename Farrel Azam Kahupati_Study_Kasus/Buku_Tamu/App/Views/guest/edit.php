<h2>Edit Data Tamu</h2>

<form method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label>Nama Tamu *</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $guest->nama; ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $guest->email; ?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control" value="<?php echo $guest->telepon; ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label>Instansi</label>
                <input type="text" name="instansi" class="form-control" value="<?php echo $guest->instansi; ?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label>Tujuan *</label>
                <select name="tujuan" class="form-control" required>
                    <option value="pertemuan" <?php echo $guest->tujuan == 'pertemuan' ? 'selected' : ''; ?>>Pertemuan</option>
                    <option value="pendaftaran" <?php echo $guest->tujuan == 'pendaftaran' ? 'selected' : ''; ?>>Pendaftaran</option>
                    <option value="penelitian" <?php echo $guest->tujuan == 'penelitian' ? 'selected' : ''; ?>>Penelitian</option>
                    <option value="sosialisasi" <?php echo $guest->tujuan == 'sosialisasi' ? 'selected' : ''; ?>>Sosialisasi</option>
                    <option value="lainnya" <?php echo $guest->tujuan == 'lainnya' ? 'selected' : ''; ?>>Lainnya</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label>Bertemu Dengan</label>
                <input type="text" name="bertemu_dengan" class="form-control" value="<?php echo $guest->bertemu_dengan; ?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label>Tanggal Berkunjung *</label>
                <input type="date" name="tanggal_berkunjung" class="form-control" value="<?php echo $guest->tanggal_berkunjung; ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label>Waktu Masuk *</label>
                <input type="time" name="waktu_masuk" class="form-control" value="<?php echo $guest->waktu_masuk; ?>" required>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label>Waktu Keluar</label>
        <input type="time" name="waktu_keluar" class="form-control" value="<?php echo $guest->waktu_keluar; ?>">
    </div>

    <div class="mb-3">
        <label>Catatan</label>
        <textarea name="catatan" class="form-control" rows="3"><?php echo $guest->catatan; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?php echo BASEURL; ?>/index.php?page=guest" class="btn btn-secondary">Kembali</a>
</form>