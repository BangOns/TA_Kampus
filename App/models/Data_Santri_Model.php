<?php

class Data_Santri_Model
{
    private $table = 'data_santri';
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
            return Response(200, $results, "Berhasil get data Santri");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal get data Santri");
        }
    }
    public function getDataById($id)
    {
        try {
            $query = "SELECT * FROM $this->table WHERE id_santri = :id_santri ";
            $this->db->query($query);
            $this->db->bind('id_santri', $id);
            $result = $this->db->single();
            return Response(200, $result, "Berhasil get data Santri By Id");
        } catch (\Throwable $th) {
            return Response(200, [], "Berhasil get data Santri By Id");
        }
    }
}
