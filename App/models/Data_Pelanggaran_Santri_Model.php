<?php

class Data_Pelanggaran_Santri_Model
{
    private $table = 'pelanggaran_santri';
    private $db;
    public  static $skala_bobot = 3;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getDataAll()
    {
        try {
            $query = 'SELECT * FROM ' . $this->table;
            $this->db->query($query);
            $results =  $this->db->resultSet();
            return Response(200, $results, "Berhasil get data pelanggaran Santri");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal get data pelanggaran");
        }
    }
    public function addPelanggaranSantri($data, $data_sanksi)
    {

        $id_santri = htmlspecialchars($data['id_santri']);
        $nama_pelanggaran = htmlspecialchars($data['nama_pelanggaran']);
        $waktu = htmlspecialchars($data['waktu']);
        $jenis = htmlspecialchars($data['c1']);
        $frekuensi = htmlspecialchars($data['c2']);
        $dampak = htmlspecialchars($data['c3']);
        $keseriusan_niat = htmlspecialchars($data['c4']);
        $permohonan_maaf = htmlspecialchars($data['c5']);
        $data_kriteria = [
            "jenis" => round((intval($jenis) / self::$skala_bobot), 2),
            "frekuensi" => round((intval($frekuensi) / self::$skala_bobot), 2),
            "dampak" => round((intval($dampak) / self::$skala_bobot), 2),
            "keseriusan_niat" => round((intval($keseriusan_niat) / self::$skala_bobot), 2),
            "permohonan_maaf" => round((intval($permohonan_maaf) / self::$skala_bobot), 2),
        ];
        $nilai_akhir  = sumPelanggaranSantri($data_kriteria);
        $get_skor_sanksi = 0;
        $filter_skor = [];
        foreach ($data_sanksi as $ds) {
            array_push($filter_skor, array($ds['min_skor'], $ds['max_skor']));
        };
        foreach (array_reverse($filter_skor) as $fs) {
            if ($nilai_akhir >= $fs[0] && $nilai_akhir <= $fs[1]) {
                $get_skor_sanksi = $fs[0];
                break;
            }
        }
        $get_index_sanksi_by_skor = array_search($get_skor_sanksi, array_column($data_sanksi, 'min_skor'));
        $final_get_sanksi = $data_sanksi[$get_index_sanksi_by_skor]['id_sanksi'];
        try {
            $query =  "INSERT INTO $this->table (id_pelanggaran_santri,nama_pelanggaran,c1,id_santri,id_sanksi,waktu,nilai_akhir,c2,c3,c4,c5) VALUES ('',:nama_pelanggaran,:c1,:id_santri,:id_sanksi,:waktu,:nilai_akhir,:c2,:c3,:c4,:c5)";
            $this->db->query($query);
            $this->db->bind('id_santri', $id_santri);
            $this->db->bind('nama_pelanggaran', $nama_pelanggaran);
            $this->db->bind('waktu', $waktu);
            $this->db->bind('c1', $jenis);
            $this->db->bind('c2', $frekuensi);
            $this->db->bind('c3', $dampak);
            $this->db->bind('c4', $keseriusan_niat);
            $this->db->bind('c5', $permohonan_maaf);
            $this->db->bind('nilai_akhir', $nilai_akhir);
            $this->db->bind('id_sanksi', $final_get_sanksi);
            $this->db->execute();
            return Response(200, [], "Berhasil Menambah Data Pelanggaran Santri");
        } catch (\Throwable $e) {
            return Response(404, [], "Gagal Menambah Data Pelanggaran Santri " . $e->getMessage() . " ");
        }
    }
}
