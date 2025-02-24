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
    public function getDataById($id)
    {
        try {
            $query = "SELECT * FROM $this->table WHERE id_pelanggaran_santri = :id_pelanggaran_santri ";
            $this->db->query($query);
            $this->db->bind('id_pelanggaran_santri', $id);
            $result = $this->db->single();
            return Response(200, $result, "Berhasil get data pelanggaran");
        } catch (\Throwable $th) {
            return Response(200, [], "Berhasil get data pelanggaran");
        }
    }
    public function addPelanggaranSantri($data)
    {
        try {

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
            $query =  "INSERT INTO $this->table (id_pelanggaran_santri,nama_pelanggaran,c1,id_santri,waktu,nilai_akhir,c2,c3,c4,c5) VALUES ('',:nama_pelanggaran,:c1,:id_santri,:waktu,:nilai_akhir,:c2,:c3,:c4,:c5)";
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
            $this->db->execute();
            return Response(200, [], "Berhasil Menambah Data Pelanggaran Santri");
        } catch (\Throwable $e) {
            return Response(404, [], "Gagal Menambah Data Pelanggaran Santri " . $e->getMessage() . " ");
        }
    }

    public function editPelanggaranSantri($data, $id)
    {
        try {

            $id_pelanggaran_santri = htmlspecialchars($id);
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
            $query =  "UPDATE $this->table SET nama_pelanggaran = :nama_pelanggaran,c1 = :c1,id_santri = :id_santri,waktu = :waktu,nilai_akhir = :nilai_akhir,c2 = :c2,c3 = :c3,c4 = :c4,c5 = :c5  WHERE id_pelanggaran_santri= :id_pelanggaran_santri";
            $this->db->query($query);
            $this->db->bind('id_pelanggaran_santri', $id_pelanggaran_santri);
            $this->db->bind('id_santri', $id_santri);
            $this->db->bind('nama_pelanggaran', $nama_pelanggaran);
            $this->db->bind('waktu', $waktu);
            $this->db->bind('c1', $jenis);
            $this->db->bind('c2', $frekuensi);
            $this->db->bind('c3', $dampak);
            $this->db->bind('c4', $keseriusan_niat);
            $this->db->bind('c5', $permohonan_maaf);
            $this->db->bind('nilai_akhir', $nilai_akhir);
            $this->db->execute();
            return Response(200, [], "Berhasil Merubah Data Pelanggaran Santri");
        } catch (\Throwable $e) {
            return Response(404, [], "Gagal Merubah Data Pelanggaran Santri " . $e->getMessage() . " ");
        }
    }
}