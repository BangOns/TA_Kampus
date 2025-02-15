<?php

class Account_Settings_Model
{
    private $table = 'admin';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getDataAdminById($id)
    {
        try {
            $query = "SELECT * FROM $this->table WHERE id_admin = :id_admin ";
            $this->db->query($query);
            $this->db->bind('id_admin', $id);
            $user = $this->db->single();
            return Response(200, $user, "Berhasil get data admin");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagak get data admin");
        }
    }
}