<?php

class Data_Pelanggaran_Santri_Model extends Database
{
    private $table = 'pelanggaran_santri';
    public  static $skala_bobot = 3;


    public function getDataAll()
    {
        try {
            $query = 'SELECT * FROM ' . $this->table;
            $this->query($query);
            $results =  $this->resultSet();
            return Response(200, $results, "Berhasil get data pelanggaran Santri");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal get data pelanggaran");
        }
    }
    public function getDataById($id)
    {
        try {
            $query = "SELECT * FROM $this->table WHERE id_pelanggaran_santri = :id_pelanggaran_santri ";
            $this->query($query);
            $this->bind('id_pelanggaran_santri', $id);
            $result = $this->single();
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
            $this->query($query);
            $this->bind('id_santri', $id_santri);
            $this->bind('nama_pelanggaran', $nama_pelanggaran);
            $this->bind('waktu', $waktu);
            $this->bind('c1', $jenis);
            $this->bind('c2', $frekuensi);
            $this->bind('c3', $dampak);
            $this->bind('c4', $keseriusan_niat);
            $this->bind('c5', $permohonan_maaf);
            $this->bind('nilai_akhir', $nilai_akhir);
            $this->execute();
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
            $this->query($query);
            $this->bind('id_pelanggaran_santri', $id_pelanggaran_santri);
            $this->bind('id_santri', $id_santri);
            $this->bind('nama_pelanggaran', $nama_pelanggaran);
            $this->bind('waktu', $waktu);
            $this->bind('c1', $jenis);
            $this->bind('c2', $frekuensi);
            $this->bind('c3', $dampak);
            $this->bind('c4', $keseriusan_niat);
            $this->bind('c5', $permohonan_maaf);
            $this->bind('nilai_akhir', $nilai_akhir);
            $this->execute();
            return Response(200, [], "Berhasil Merubah Data Pelanggaran Santri");
        } catch (\Throwable $e) {
            return Response(404, [], "Gagal Merubah Data Pelanggaran Santri " . $e->getMessage() . " ");
        }
    }
    public function deletePelanggaranSantri($id)
    {
        try {
            $query = "DELETE FROM $this->table WHERE id_pelanggaran_santri = :id_pelanggaran_santri";
            $this->query($query);
            $this->bind('id_pelanggaran_santri', $id);
            $this->execute();
            return Response(200, [], "Berhasil Menghapus Data Pelanggaran Santri");
        } catch (\Throwable $e) {
            return Response(404, [], "Gagal Menghapus Data Pelanggaran Santri karena " . $e->getMessage() . " ");
        }
    }
}