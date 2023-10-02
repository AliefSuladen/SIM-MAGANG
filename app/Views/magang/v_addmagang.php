<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Kelompok Magang</h3>
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
            <?php echo form_open_multipart('insertmagang'); ?>
            <div class="form-group">
                <label>kelompok</label>
                <input name="kelompok" class="form-control" placeholder="Input Kelompok">
            </div>
            <div class="row">
                <div class="col-5">
                    <label>Waktu Mulai</label>
                    <input type="date" name="waktu_mulai" class="form-control">
                </div>
                <div class="col-5">
                    <label>Waktu Selesai</label>
                    <input type="date" name="waktu_selesai" class="form-control">
                </div>

                <div class="col-5">
                    <label>Pengantar Magang</label>
                    <input type="file" name="pengantar" class="form-control">
                    <label class="text-danger">File Harus Format .PDF</label>
                </div>
                <div class="col-5">
                    <label>Proposal Magang</label>
                    <input type="file" name="proposal" class="form-control">
                    <label class="text-danger">File Harus Format .PDF</label>
                </div>
            </div>
            <div class="form-group">
                <label>Divisi</label>
                <input name="divisi" class="form-control" placeholder="Input Divisi">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.card-body -->
    </div>
</div>