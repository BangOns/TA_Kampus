<?php

class Nilai_Akhir_Model extends Database
{

    private $table = "hasil_akhir";
    public function getAdd()
    {
        try {
            $query = 'SELECT * FROM ' . $this->table;
            $this->query($query);
            $results =  $this->resultSet();
            return Response(200, $results, "Berhasil get data penilaian");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal get data penilaian");
        }
    }
    public function addDataHasilAkhir($data, $id) {}
}
