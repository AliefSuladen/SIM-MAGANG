<?php

namespace App\Controllers;

use App\Models\M_admin;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->M_admin = new M_admin();
        helper('form');
    }
    public function index(): string
    {
        $data = [
            'page' => 'v_dashboard',
        ];
        return view('v_template', $data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Add Admin',
            'page'    => 'v_addadm'
        );
        return view('v_template', $data);
    }
    public function insertadm()
    {
        if ($this->validate([
            'nama' => [
                'label'  => 'Nama',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'email' => [
                'label'  => 'E-mail',
                'rules'  => 'required|is_unique[admin.email]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'is_unique' => '{field} Sudah Ada, Input {field} Lain !!!',
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
            'foto' => [
                'label'  => 'Foto',
                'rules'  => 'uploaded[foto]|max_size[foto,10000]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi !!!',
                    'max_size' => 'Ukuran {field} Max 1024 KB !!!',
                    'mime_in' => 'Format {field} Wajib PNG,JPEG,JPG,GIF',
                ]
            ],
        ])) {
            //mengambil file foto yg akan di upload di form
            $foto = $this->request->getFile('foto');
            //merandom nama file foto
            $nama_file = $foto->getRandomName();
            //jika valid
            $data = array(
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'foto' => $nama_file,
            );

            $foto->move('foto', $nama_file); //directori upload file
            $this->M_admin->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
            return redirect()->to('addadm');
        } else {
            //jika Tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('addadm');
        }
    }

    public function listsiswa()
    {
        $data = [
            'title' => 'Data Siswa',
            'page' => 'siswa/v_list',
            'siswa' => $this->M_admin->all_data_siswa(),

        ];
        return view('v_template', $data);
    }

    public function addsiswa()
    {
        $data = array(
            'title' => 'Add Admin',
            'page'    => 'siswa/v_addsiswa',
            'magang' => $this->M_admin->all_data_magang(),

        );
        return view('v_template', $data);
    }

    public function insertsiswa()
    {
        if ($this->validate([
            'nama' => [
                'label'  => 'Nama',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'instansi' => [
                'label'  => 'Instansi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
            'jurusan' => [
                'label'  => 'Jurusan',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
            'alamat' => [
                'label'  => 'Alamat',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
            'nope' => [
                'label'  => 'No Hp',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
            'id_magang' => [
                'label'  => 'Magang',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
            'foto' => [
                'label'  => 'Foto',
                'rules'  => 'uploaded[foto]|max_size[foto,10000]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi !!!',
                    'max_size' => 'Ukuran {field} Max 1024 KB !!!',
                    'mime_in' => 'Format {field} Wajib PNG,JPEG,JPG,GIF',
                ]
            ],
        ])) {
            //mengambil file foto yg akan di upload di form
            $foto = $this->request->getFile('foto');
            //merandom nama file foto
            $nama_file = $foto->getRandomName();
            //jika valid
            $data = array(
                'nama' => $this->request->getPost('nama'),
                'instansi' => $this->request->getPost('instansi'),
                'jurusan' => $this->request->getPost('jurusan'),
                'alamat' => $this->request->getPost('alamat'),
                'nope' => $this->request->getPost('nope'),
                'id_magang' => $this->request->getPost('id_magang'),
                'foto' => $nama_file,
            );

            $foto->move('foto', $nama_file); //directori upload file
            $this->M_admin->addsiswa($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
            return redirect()->to('listsiswa');
        } else {
            //jika Tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('addsiswa');
        }
    }
    public function listmagang()
    {
        $data = [
            'title' => 'Data Magang',
            'page' => 'magang/v_list',
            'magang' => $this->M_admin->all_data_magang(),

        ];
        return view('v_template', $data);
    }

    public function addmagang()
    {
        $data = array(
            'title' => 'Tambah Kelompok Magang',
            'page'    => 'magang/v_addmagang',
            'magang' => $this->M_admin->all_data_magang(),

        );
        return view('v_template', $data);
    }
    public function insertmagang()
    {
        if ($this->validate([
            'kelompok' => [
                'label'  => 'Kelompok',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'divisi' => [
                'label'  => 'Divisi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
        ])) {
            //mengambil file foto yg akan di upload di form
            $pengantar = $this->request->getFile('pengantar');
            $proposal = $this->request->getFile('proposal');
            //merandom nama file foto
            $nama_file = $pengantar->getRandomName();
            $nama_file = $proposal->getRandomName();
            //jika valid
            $data = array(
                'kelompok' => $this->request->getPost('kelompok'),
                'waktu_mulai' => $this->request->getPost('waktu_mulai'),
                'waktu_selesai' => $this->request->getPost('waktu_selesai'),
                'pengantar' => $nama_file,
                'proposal' => $nama_file,
                'divisi' => $this->request->getPost('divisi'),

            );

            $pengantar->move('file', $nama_file); //directori upload file
            $proposal->move('file', $nama_file); //directori upload file
            $this->M_admin->addmagang($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
            return redirect()->to(base_url('listmagang'));
        } else {
            //jika Tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('addmagang'));
        }
    }
    public function editmagang($id_magang)
    {
        $data = array(
            'title' => 'Tambah Kelompok Magang',
            'page'    => 'magang/v_editmagang',
            'magang' => $this->M_admin->detail_magang($id_magang),
        );
        return view('v_template', $data);
    }


    public function updatemagang($id_magang)
    {
        if ($this->validate([
            'kelompok' => [
                'label'  => 'Kelompok',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'divisi' => [
                'label'  => 'Divisi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
        ])) {
            // Mengambil file pengantar magang
            $pengantar = $this->request->getFile('pengantar');
            // Mengambil file proposal magang
            $proposal = $this->request->getFile('proposal');

            if ($pengantar->getError() == 4 && $proposal->getError() == 4) {
                // Jika kedua file tidak diubah
                $data = [
                    'kelompok' => $this->request->getPost('kelompok'),
                    'waktu_mulai' => $this->request->getPost('waktu_mulai'),
                    'waktu_selesai' => $this->request->getPost('waktu_selesai'),
                    'divisi' => $this->request->getPost('divisi'),
                ];
            } else {
                // Jika salah satu atau keduanya diubah
                $magang = $this->M_admin->detail_magang($id_magang);

                // Hapus file pengantar magang dan proposal magang yang lama
                if (!empty($magang['pengantar'])) {
                    unlink('file/' . $magang['pengantar']);
                }
                if (!empty($magang['proposal'])) {
                    unlink('file/' . $magang['proposal']);
                }

                // Merandom nama file baru untuk pengantar magang
                $namaFilePengantar = $pengantar->getRandomName();
                $pengantar->move('file', $namaFilePengantar);

                // Merandom nama file baru untuk proposal magang
                    $namaFileProposal = $proposal->getRandomName();
                    $proposal->move('file', $namaFileProposal);

                    $data = [
                        'kelompok' => $this->request->getPost('kelompok'),
                        'waktu_mulai' => $this->request->getPost('waktu_mulai'),
                        'waktu_selesai' => $this->request->getPost('waktu_selesai'),
                        'pengantar' => $namaFilePengantar,
                        'proposal' => $namaFileProposal,
                        'divisi' => $this->request->getPost('divisi'),
                    ];
            }

            // Menyimpan data ke dalam database menggunakan method update pada model
                $this->M_admin->edit_magang($data);

            session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
            return redirect()->to(base_url('listmagang'));
        } else {
            // Jika validasi tidak berhasil
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('editmagang/' . $id_magang));
        }
    }
        //ppppp
}
