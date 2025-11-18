<h2>Tambah Tamu Baru</h2>

<form method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label>Nama Tamu *</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label>Instansi</label>
                <input type="text" name="instansi" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label>Tujuan *</label>
                <select name="tujuan" class="form-control" required>
                    <option value="pertemuan">Pertemuan</option>
                    <option value="pendaftaran">Pendaftaran</option>
                    <option value="penelitian">Penelitian</option>
                    <option value="sosialisasi">Sosialisasi</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label>Bertemu Dengan</label>
                <input type="text" name="bertemu_dengan" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label>Tanggal Berkunjung *</label>
                <input type="date" name="tanggal_berkunjung" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label>Waktu Masuk *</label>
                <input type="time" name="waktu_masuk" class="form-control" value="<?php echo date('H:i'); ?>" required>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label>Catatan</label>
        <textarea name="catatan" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?php echo BASEURL; ?>/index.php?page=guest" class="btn btn-secondary">Kembali</a>
</form>