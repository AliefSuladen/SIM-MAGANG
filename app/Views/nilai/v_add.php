<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Nama : <?= $siswa['nama'] ?> </h5>
            <h5>Instansi : <?= $siswa['instansi'] ?> </h5>
            <h5>Jurusan : <?= $siswa['jurusan'] ?> </h5>
            <h5>Divisi : <?= $siswa['divisi'] ?> </h5>
        </div>
        <div class="card-body">
            <?php
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <h5>Ada Kesalahan !!!</h5>
                    <ul>
                        <?php foreach ($errors as $key => $value) { ?>
                            <li><?= esc($value) ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
            <?php echo form_open_multipart('insertnilai/' . $siswa['id_siswa']); ?>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                    <label>Disiplin</label>
                    <input name="disiplin" class="form-control">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label>Sikap</label>
                    <input name="sikap" class="form-control">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label>Kejujuran</label>
                    <input name="kejujuran" class="form-control">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label>Kerajinan</label>
                    <input name="kerajinan" class="form-control">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label>Kerjasama</label>
                    <input name="kerjasama" class="form-control">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label>Tanggung Jawab</label>
                    <input name="tanggungjawab" class="form-control">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label>Inisiatif</label>
                    <input name="inisiatif" class="form-control">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label>Kreatifitas</label>
                    <input name="kreatifitas" class="form-control">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label>Daya Tangkap</label>
                    <input name="dtp" class="form-control">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label>Kualitas</label>
                    <input name="kualitas" class="form-control">
                </div>
            </div>

            <label class="text-danger">Skala Penilaian = 1 - 100</label>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>