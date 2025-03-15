<?php
class Data_Sanksi_Model extends Database
{
    private $table = 'data_sanksi';


    public function getDataAll()
    {
        try {
            $query = 'SELECT * FROM ' . $this->table;
            $this->query($query);
            $results =  $this->resultSet();
            return Response(200, $results, "Berhasil get data Sanksi");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal get data Sanksi");
        }
    }
    public function getDataById($id)
    {
        try {
            $query = "SELECT * FROM $this->table WHERE id_sanksi = :id_sanksi ";
            $this->query($query);
            $this->bind('id_sanksi', $id);
            $result = $this->single();
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
            $getData =  array_search(floatval(trim($skor[1])), array_column($dataAll, 'max_skor'));
            if ($getData !== false && $getData >= 0) {
                throw new Exception('Skor Sudah digunakan!');
            }
            $query =  "INSERT INTO $this->table (id_sanksi,jenis_sanksi,deskripsi_sanksi,min_skor,max_skor) VALUES ('',:jenis_sanksi,:deskripsi_sanksi,:min_skor,:max_skor)";
            $this->query($query);
            $this->bind('jenis_sanksi', $jenis_sanksi);
            $this->bind('deskripsi_sanksi', $deskripsi_sanksi);
            $this->bind('min_skor', floatval(trim($skor[0])));
            $this->bind('max_skor', floatval(trim($skor[1])));
            $this->execute();
            return Response(200, [], "Berhasil Menambah Data Sanksi");
        } catch (\Throwable $e) {
            return Response(404, [], "Gagal Menambah Data Sanksi karena " . $e->getMessage() . " ");
        }
    }
    public function editSanksi($data, $id)
    {
        try {
            $id_sanksi = htmlspecialchars($id);
            $jenis_sanksi = htmlspecialchars($data['jenis_sanksi']);
            $deskripsi_sanksi = htmlspecialchars($data['deskripsi_sanksi']);
            $skor = explode("-", htmlspecialchars($data['min-max']));

            $query =  "UPDATE $this->table SET jenis_sanksi = :jenis_sanksi,deskripsi_sanksi = :deskripsi_sanksi,min_skor = :min_skor,max_skor = :max_skor WHERE id_sanksi = :id_sanksi";
            $this->query($query);
            $this->bind('id_sanksi', $id_sanksi);
            $this->bind('jenis_sanksi', $jenis_sanksi);
            $this->bind('deskripsi_sanksi', $deskripsi_sanksi);
            $this->bind('min_skor', floatval(trim($skor[0])));
            $this->bind('max_skor', floatval(trim($skor[1])));
            $this->execute();
            return Response(200, [], "Berhasil Merubah Data Sanksi");
        } catch (\Throwable $e) {
            return Response(404, [], "Gagal Merubah Data Sanksi karena " . $e->getMessage() . " ");
        }
    }
    public function deleteSanksi($id)
    {
        try {
            $query = "DELETE FROM $this->table WHERE id_sanksi = :id_sanksi";
            $this->query($query);
            $this->bind('id_sanksi', $id);
            $this->execute();
            return Response(200, [], "Berhasil Menghapus Data Sanksi");
        } catch (\Throwable $e) {
            return Response(404, [], "Gagal Menghapus Data Sanksi karena " . $e->getMessage() . " ");
        }
    }
}