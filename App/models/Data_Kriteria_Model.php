<?php
class Data_Kriteria_Model extends Database
{

    private $table = 'data_kriteria';
    private $table_subkriteria = 'data_subkriteria';
    public function getDataAllKriteria()
    {
        try {
            $queryTest = 'SELECT *, data_subkriteria.sub_kriteria as Nama, data_subkriteria.bobot_subkriteria as Bobot FROM data_kriteria 
LEFT JOIN data_subkriteria 
ON data_kriteria.id_kriteria = data_subkriteria.id_kriteria';
            $this->query($queryTest);
            $results =  $this->resultSet();

            return Response(200, $results, "Berhasil get data kriteria");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal get data kriteria");
        }
    }
    public function getDataAllSubkriteria()
    {
        try {
            $query = 'SELECT * FROM ' . $this->table_subkriteria;
            $this->query($query);
            $results =  $this->resultSet();
            return Response(200, $results, "Berhasil get data kriteria");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal get data kriteria");
        }
    }
    public function addKriteria($data)
    {
        try {
            $kriteria = htmlspecialchars($data['nama_kriteria']);
            $bobot_kriteria = htmlspecialchars($data['bobot_kriteria']);
            $jenis_kriteria = htmlspecialchars($data['jenis_kriteria']);
            $sub_kriteria = htmlspecialchars($data['sub_kriteria']);
            $bobot_subkriteria = htmlspecialchars($data['bobot_subkriteria']);
            $query = "INSERT INTO $this->table (id_kriteria,kriteria,bobot_kriteria,jenis_kriteria) VALUES ('',:kriteria,:bobot_kriteria,:jenis_kriteria)";
            $this->query($query);
            $this->bind('kriteria', $kriteria);
            $this->bind('bobot_kriteria', $bobot_kriteria);
            $this->bind('jenis_kriteria', $jenis_kriteria);
            $idKriteria =  $this->lastId();
            $querySubKriteria = "INSERT INTO $this->table_subkriteria (id_kriteria,id_subkriteria,sub_kriteria,bobot_subkriteria) VALUES (:id_kriteria,'',:sub_kriteria,:bobot_subkriteria)";
            $this->query($querySubKriteria);
            $this->bind('id_kriteria', $idKriteria);
            $this->bind('sub_kriteria', $sub_kriteria);
            $this->bind('bobot_subkriteria', $bobot_subkriteria);
            $this->execute();
            return Response(200, [], "Berhasil tambah data kriteria");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal tambah data kriteria");
        }
    }
    public function editKriteria($data, $id)
    {
        try {
            $id_kriteria = htmlspecialchars($id);
            $kriteria = htmlspecialchars($data['nama_kriteria']);
            $bobot_kriteria = htmlspecialchars($data['bobot_kriteria']);
            $jenis_kriteria = htmlspecialchars($data['jenis_kriteria']);

            $query =  "UPDATE  $this->table  SET  nama_kriteria = :nama_kriteria, bobot_kriteria = :bobot_kriteria, jenis_kriteria = :jenis_kriteria WHERE id_kriteria = :id_kriteria";

            $this->bind('id_kriteria', $id_kriteria);
            $this->bind('kriteria', $kriteria);
            $this->bind('bobot_kriteria', $bobot_kriteria);
            $this->bind('jenis_kriteria', $jenis_kriteria);
            $this->query($query);
            // $idKriteria =  $this->lastId();
            // $querySubKriteria = "INSERT INTO $this->table_subkriteria (id_kriteria,id_subkriteria,sub_kriteria,bobot_subkriteria) VALUES (:id_kriteria,'',:sub_kriteria,:bobot_subkriteria)";
            // $this->query($querySubKriteria);
            // $this->bind('id_kriteria', $idKriteria);
            // $this->bind('sub_kriteria', $sub_kriteria);
            // $this->bind('bobot_subkriteria', $bobot_subkriteria);
            $this->execute();
            return Response(200, [], "Berhasil edit data kriteria");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal edit data kriteria");
        }
    }
}
