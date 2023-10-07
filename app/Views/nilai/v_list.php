<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <ul>
                <h5>KELOMPOK : <?= $magang['kelompok'] ?> </h5>
                <h5>DIVISI : <?= $magang['divisi'] ?> </h5>
            </ul>
        </div>
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
                                <td><img src="<?= base_url('foto/' . $value['foto']) ?>" width="80px" height="80px"></td>
                                <td>
                                    <a href="<?= base_url('addnilai/' . $value['id_siswa']) ?>" class="btn btn-xs btn-warning">Tambah Nilai</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>