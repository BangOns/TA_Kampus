<?php
class Data_Pelanggaran_Model extends Database
{
    private $table = 'data_pelanggaran';

    public function getDataAll()
    {
        try {
            $query = 'SELECT * FROM ' . $this->table;
            $this->query($query);
            $results =  $this->resultSet();
            return Response(200, $results, "Berhasil get data pelanggaran");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal get data pelanggaran");
        }
    }
    public function getDataById($id)
    {
        try {
            $query = "SELECT * FROM $this->table WHERE id_pelanggaran = :id_pelanggaran ";
            $this->query($query);
            $this->bind('id_pelanggaran', $id);
            $result = $this->single();
            return Response(200, $result, "Berhasil get data pelanggaran");
        } catch (\Throwable $th) {
            return Response(200, [], "Berhasil get data pelanggaran");
        }
    }
    public function addPelanggaran($data)
    {
        $jenis_map = [
            "1" => "Ringan",
            "2" => "Sedang",
            "3" => "Berat",
        ];
        try {
            $nama_pelanggaran = htmlspecialchars($data['nama_pelanggaran']);
            $jenis_pelanggaran = $jenis_map[$data['jenis_pelanggaran']];
            $bobot_pelanggaran = htmlspecialchars($data['jenis_pelanggaran']);
            $query =  "INSERT INTO $this->table (id_pelanggaran,nama_pelanggaran,jenis_pelanggaran,bobot_pelanggaran) VALUES ('',:nama_pelanggaran,:jenis_pelanggaran,:bobot_pelanggaran)";
            $this->query($query);
            $this->bind('nama_pelanggaran', $nama_pelanggaran);
            $this->bind('jenis_pelanggaran', $jenis_pelanggaran);
            $this->bind('bobot_pelanggaran', $bobot_pelanggaran);
            $this->execute();
            return Response(200, [], "Berhasil Menambah Data Pelanggaran");
        } catch (\Throwable $e) {
            return Response(404, [], "Gagal Menambah Data Pelanggaran " . $e->getMessage() . " ");
        }
    }
    public function editPelanggaran($data, $id)
    {
        $jenis_map = [
            "1" => "Ringan",
            "2" => "Sedang",
            "3" => "Berat",
        ];
        try {
            $id_pelanggaran = htmlspecialchars($id);
            $nama_pelanggaran = htmlspecialchars($data['nama_pelanggaran']);
            $jenis_pelanggaran = $jenis_map[$data['jenis_pelanggaran']];
            $bobot_pelanggaran = htmlspecialchars($data['jenis_pelanggaran']);

            $query =  "UPDATE  $this->table  SET  nama_pelanggaran = :nama_pelanggaran, jenis_pelanggaran = :jenis_pelanggaran, bobot_pelanggaran = :bobot_pelanggaran WHERE id_pelanggaran = :id_pelanggaran";
            $this->query($query);
            $this->bind('id_pelanggaran', intval($id_pelanggaran));
            $this->bind('nama_pelanggaran', $nama_pelanggaran);
            $this->bind('jenis_pelanggaran', $jenis_pelanggaran);
            $this->bind('bobot_pelanggaran', $bobot_pelanggaran);
            $this->execute();
            return Response(200, [], "Berhasil Merubah Data Pelanggaran");
        } catch (\Throwable $e) {
            return Response(404, [], "Gagal Merubah Data Pelanggaran " . $e->getMessage() . " ");
        }
    }
    public function deletePelanggaran($id)
    {
        try {
            $query = "DELETE FROM $this->table WHERE id_pelanggaran = :id_pelanggaran";
            $this->query($query);
            $this->bind('id_pelanggaran', $id);
            $this->execute();
            return Response(200, [], "Berhasil Menghapus Data pelanggaran");
        } catch (\Throwable $e) {
            return Response(404, [], "Gagal Menghapus Data pelanggaran karena " . $e->getMessage() . " ");
        }
    }
}
