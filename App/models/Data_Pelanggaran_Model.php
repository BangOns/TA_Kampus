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
}
