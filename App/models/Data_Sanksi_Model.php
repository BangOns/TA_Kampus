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
    public function addSanksi($data, $dataAll)
    {
        try {
            $jenis_sanksi = htmlspecialchars($data['jenis_sanksi']);
            $deskripsi_sanksi = htmlspecialchars($data['deskripsi_sanksi']);
            $skor = explode("-", htmlspecialchars($data['min-max']));
            $getData =  array_search(floatval(trim($skor[0])), array_column($dataAll, 'min_skor'));
            if (!$getData) {
                throw new Exception('Skor Sudah digunakan!');
            }
            $query =  "INSERT INTO $this->table (id_sanksi,jenis_sanksi,deskripsi_sanksi,min_skor,max_skor) VALUES ('',:jenis_sanksi,:deskripsi_sanksi,:min_skor,:max_skor)";
            $this->db->query($query);
            $this->db->bind('jenis_sanksi', $jenis_sanksi);
            $this->db->bind('deskripsi_sanksi', $deskripsi_sanksi);
            $this->db->bind('min_skor', floatval(trim($skor[0])));
            $this->db->bind('max_skor', floatval(trim($skor[1])));
            $this->db->execute();
            return Response(200, [], "Berhasil Menambah Data Sanksi");
        } catch (\Throwable $e) {
            return Response(404, [], "Gagal Menambah Data Sanksi karena " . $e->getMessage() . " ");
        }
    }
}
