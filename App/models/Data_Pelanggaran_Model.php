<?php
class Data_Pelanggaran_Model
{
    private $table = 'data_pelanggaran';
    private $db;

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
            return Response(200, $results, "Berhasil get data pelanggaran");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal get data pelanggaran");
        }
    }
    public function getDataById($id)
    {
        try {
            $query = "SELECT * FROM $this->table WHERE id_pelanggaran = :id_pelanggaran ";
            $this->db->query($query);
            $this->db->bind('id_pelanggaran', $id);
            $result = $this->db->single();
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
            $this->db->query($query);
            $this->db->bind('nama_pelanggaran', $nama_pelanggaran);
            $this->db->bind('jenis_pelanggaran', $jenis_pelanggaran);
            $this->db->bind('bobot_pelanggaran', $bobot_pelanggaran);
            $this->db->execute();
            return Response(200, [], "Berhasil Menambah Data Pelanggaran");
        } catch (\Throwable $e) {
            return Response(404, [], "Gagal Menambah Data Pelanggaran " . $e->getMessage() . " ");
        }
    }
}