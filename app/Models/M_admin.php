<?php

namespace App\Models;

use CodeIgniter\Model;

class M_admin extends Model
{
    public function add($data)
    {
        $this->db->table('admin')->insert($data);
    }
    public function addsiswa($data)
    {
        $this->db->table('siswa')->insert($data);
    }
    public function all_data_magang()
    {
        return $this->db->table('magang')
            //->join('tbl_dep', 'tbl_dep.id_dep = tbl_user.id_dep', 'left')
            ->orderBy('id_magang', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function all_data_siswa()
    {
        return $this->db->table('siswa')
            ->join('magang', 'magang.id_magang = siswa.id_magang', 'left')
            ->orderBy('id_siswa', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function addmagang($data)
    {
        $this->db->table('magang')->insert($data);
    }

    public function detail_magang($id_magang)
    {
        return $this->db->table('magang')
            ->where('id_magang', $id_magang)
            ->get()
            ->getRowArray();
    }
    public function edit_magang($data)
    {
        $this->db->table('magang')
            ->where('id_magang', $data['id_magang'])
            ->update($data);
    }
}
