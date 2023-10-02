<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Siswa Magang</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
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
            <?php echo form_open_multipart('insertsiswa'); ?>
            <div class="form-group">
                <label>Nama Siswa</label>
                <input name="nama" class="form-control" placeholder="Input Nama">
            </div>
            <div class="form-group">
                <label>Instansi</label>
                <input name="instansi" class="form-control" placeholder="Input Instansi">
            </div>
            <div class="form-group">
                <label>Jurusan</label>
                <input name="jurusan" class="form-control" placeholder="Input Jurusan">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" class="form-control" placeholder="Input Alamat">
            </div>
            <div class="form-group">
                <label>No Hp</label>
                <input name="nope" class="form-control" placeholder="Input No Hp">
            </div>
            <div class="form-group">
                <label>Magang</label>
                <select name="id_magang" class="form-control">
                    <option value="">--Pilih Magang--</option>
                    <?php foreach ($magang as $key => $value) { ?>
                        <option value="<?= $value['id_magang'] ?>"><?= $value['kelompok'] ?></option>
                    <?php } ?>

                </select>
            </div>
            <div class="form-group">
                <label>Foto Siswa</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.card-body -->
    </div>
</div>