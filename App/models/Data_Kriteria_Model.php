<?php
class Data_Kriteria_Model extends Database
{

    private $table = 'data_kriteria';
    private $table_subkriteria = 'data_subkriteria';
    public function getDataAllKriteria()
    {
        try {
            $query = 'SELECT * FROM ' . $this->table;
            $this->query($query);
            $results =  $this->resultSet();
            return Response(200, $results, "Berhasil get data pelanggaran");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal get data pelanggaran");
        }
    }
    public function getDataAllSubkriteria()
    {
        try {
            $query = 'SELECT * FROM ' . $this->table_subkriteria;
            $this->query($query);
            $results =  $this->resultSet();
            return Response(200, $results, "Berhasil get data pelanggaran");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal get data pelanggaran");
        }
    }
}
