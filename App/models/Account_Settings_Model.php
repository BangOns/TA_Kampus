<?php

class Account_Settings_Model extends Database
{
    private $table = 'admin';

    public function getDataAdminById($id)
    {
        try {
            $query = "SELECT * FROM $this->table WHERE id_admin = :id_admin ";
            $this->query($query);
            $this->bind('id_admin', $id);
            $user = $this->single();
            return Response(200, $user, "Berhasil get data admin");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagak get data admin");
        }
    }
}