<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="box-tools pull-right">
                <a href="<?= base_url('addsiswa') ?>" class="btn btn-primary btn-sm btn-flat">
                    <i class="fa fa-plus"></i> Tambah Data Mahasiswa Magang</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Instansi</th>
                            <th>Jurusan</th>
                            <th>No Hp</th>
                            <th>Devisi</th>
                            <th>Foto Siswa</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($siswa as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['instansi']; ?></td>
                                <td><?= $value['jurusan']; ?></td>
                                <td><?= $value['nope']; ?></td>
                                <td><?= $value['divisi']; ?></td>
                                <td><img src="<?= base_url('foto/' . $value['foto']) ?>" width="80px" height="80px"></td>
                                <td class="text-center">
                                    <a href="" class="btn btn-xs btn-warning">Edit</a>
                                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>