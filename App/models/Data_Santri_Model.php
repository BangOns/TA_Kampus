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
    public function addSantri($data)
    {
        try {
            $nama_santri = htmlspecialchars($data['nama_santri']);
            $kelas = htmlspecialchars($data['kelas']);
            $alamat = htmlspecialchars($data['alamat']);
            $tahun_ajaran = htmlspecialchars($data['tahun_ajaran']);
            $query =  "INSERT INTO $this->table (id_santri,nama_santri,alamat,kelas,tahun_ajaran) VALUES ('',:nama_santri,:alamat,:kelas,:tahun_ajaran)";
            $this->db->query($query);
            $this->db->bind('nama_santri', $nama_santri);
            $this->db->bind('alamat', $alamat);
            $this->db->bind('kelas', $kelas);
            $this->db->bind('tahun_ajaran', $tahun_ajaran);
            $this->db->execute();
            return Response(200, [], "Berhasil Menambah Data Santri");
        } catch (\Throwable $e) {
            return Response(404, [], "Gagal Menambah Data Santri " . $e->getMessage() . " ");
        }
    }
}