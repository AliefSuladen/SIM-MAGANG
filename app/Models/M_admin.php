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

    public function get_siswa_by_magang($id_magang)
    {
        return $this->db->table('siswa')
            ->where('id_magang', $id_magang)
            ->get()
            ->getResultArray();
    }

    public function get_siswa($id_siswa)
    {
        return $this->db->table('siswa')
            ->where('id_siswa', $id_siswa)
            ->join('magang', 'magang.id_magang = siswa.id_magang', 'left')
            ->get()
            ->getRowArray();
    }
    public function insert_nilai($data)
    {
        $this->db->table('nilai')->insert($data);
    }

    public function getAverageNilai()
    {
        $query = $this->db->table('nilai')
            ->select('id_siswa, AVG(disiplin) as rata_disiplin, AVG(sikap) as rata_sikap, AVG(kejujuran) as rata_kejujuran, AVG(kerajinan) as rata_kerajinan, AVG(kerjasama) as rata_kerjasama, AVG(tanggungjawab) as rata_tanggungjawab, AVG(inisiatif) as rata_inisiatif, AVG(kreatifitas) as rata_kreatifitas, AVG(dtp) as rata_dtp, AVG(kualitas) as rata_kualitas')
            ->groupBy('id_siswa')
            ->get();

        return $query->getResult();
    }
}
