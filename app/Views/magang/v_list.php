<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="box-tools pull-right">
                <a href="<?= base_url('addmagang') ?>" class="btn btn-primary btn-sm btn-flat">
                    <i class="fa fa-plus"></i> Tambah Data Magang</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelompok</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Devisi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($magang as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['kelompok']; ?></td>
                                <td><?= $value['waktu_mulai']; ?></td>
                                <td><?= $value['waktu_selesai']; ?></td>
                                <td><?= $value['divisi']; ?></td>
                                <td>
                                    <a href="<?= base_url('editmagang/' . $value['id_magang']) ?>" class="btn btn-xs btn-warning">Edit</a>
                                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>