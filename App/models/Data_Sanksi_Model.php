<?php
class Data_Sanksi_Model
{
    private $table = 'data_sanksi';
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
            return Response(200, $results, "Berhasil get data Sanksi");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal get data Sanksi");
        }
    }
    public function getDataById($id)
    {
        try {
            $query = "SELECT * FROM $this->table WHERE id_sanksi = :id_sanksi ";
            $this->db->query($query);
            $this->db->bind('id_sanksi', $id);
            $result = $this->db->single();
            return Response(200, $result, "Berhasil get data Sanksi");
        } catch (\Throwable $th) {
            return Response(200, [], "Berhasil get data Sanksi");
        }
    }
}