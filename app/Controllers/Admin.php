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

    public function listnilai($id_magang)
    {
        // Mengambil rata-rata nilai dari model
        $rata_rata_nilai = $this->M_admin->getAverageNilai();

        $data = [
            'title' => 'Data Nilai',
            'page' => 'nilai/v_list',
            'magang' => $this->M_admin->detail_magang($id_magang),
            'siswa' => $this->M_admin->get_siswa_by_magang($id_magang),
            'rata_rata_nilai' => $rata_rata_nilai, // Mengirimkan rata-rata nilai ke tampilan
        ];

        return view('v_template', $data);
    }



    public function addnilai($id_siswa)
    {
        $data = [
            'title' => 'Data Nilai',
            'page' => 'nilai/v_add',
            // 'magang' => $this->M_admin->detail_magang($id_magang),
            'siswa' => $this->M_admin->get_siswa($id_siswa),

        ];
        return view('v_template', $data);
    }
    public function insertnilai($id_siswa)
    {
        // Dapatkan data siswa berdasarkan ID yang dikirimkan melalui URL
        $data_siswa = $this->M_admin->get_siswa($id_siswa);

        if (empty($data_siswa)) {
            // Handle jika data siswa tidak ditemukan
            return redirect()->to(base_url('listnilai'))->with('error', 'Siswa tidak ditemukan.');
        }

        // Dapatkan id_magang dari data siswa
        $id_magang = $data_siswa['id_magang'];

        // Lakukan validasi input nilai di sini (Anda dapat menggunakan library validasi CodeIgniter atau cara lain)

        // Jika validasi berhasil, simpan nilai ke database
        if ($this->request->getMethod() === 'post' && $this->validate([
            'disiplin' => 'required|numeric',
            'sikap' => 'required|numeric',
            'kejujuran' => 'required|numeric',
            'kerajinan' => 'required|numeric',
            'kerjasama' => 'required|numeric',
            'tanggungjawab' => 'required|numeric',
            'inisiatif' => 'required|numeric',
            'kreatifitas' => 'required|numeric',
            'dtp' => 'required|numeric',
            'kualitas' => 'required|numeric',
            // Tambahkan aturan validasi untuk input lainnya di sini
        ])) {
            // Ambil nilai-nilai dari form
            $data = [
                'id_siswa' => $id_siswa,
                'disiplin' => $this->request->getPost('disiplin'),
                'sikap' => $this->request->getPost('sikap'),
                'kejujuran' => $this->request->getPost('kejujuran'),
                'kerajinan' => $this->request->getPost('kerajinan'),
                'kerjasama' => $this->request->getPost('kerjasama'),
                'tanggungjawab' => $this->request->getPost('tanggungjawab'),
                'inisiatif' => $this->request->getPost('inisiatif'),
                'kreatifitas' => $this->request->getPost('kreatifitas'),
                'dtp' => $this->request->getPost('dtp'),
                'kualitas' => $this->request->getPost('kualitas'),
            ];

            // Simpan data nilai ke database (gunakan model)
            $this->M_admin->insert_nilai($data);

            // Redirect kembali ke halaman sebelumnya atau halaman lain
            return redirect()->to(base_url('listnilai/' . $id_magang))->with('success', 'Nilai berhasil disimpan.');
        }

        // Jika validasi gagal atau halaman pertama kali diakses, tampilkan halaman input nilai
        $data = [
            'title' => 'Input Nilai',
            'page' => 'nilai/v_input',
            'siswa' => $data_siswa,
        ];

        return view('v_template', $data);
    }
}
