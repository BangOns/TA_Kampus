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
    public function getDataKriteriaById($id)
    {
        try {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE id_kriteria = :id_kriteria';
            $this->query($query);
            $this->bind('id_kriteria', $id);
            $result =  $this->single();
            return Response(200, $result, "Berhasil get data kriteria");
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
            $kriteria = htmlspecialchars($data['kriteria']);
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
            $kriteria = htmlspecialchars($data['kriteria']);
            $bobot_kriteria = htmlspecialchars($data['bobot_kriteria']);
            $jenis_kriteria = htmlspecialchars($data['jenis_kriteria']);

            $query =  "UPDATE  $this->table  SET  kriteria = :kriteria, bobot_kriteria = :bobot_kriteria, jenis_kriteria = :jenis_kriteria WHERE id_kriteria = :id_kriteria";
            $this->query($query);

            $this->bind('id_kriteria', intval($id_kriteria));
            $this->bind('kriteria', $kriteria);
            $this->bind('bobot_kriteria', $bobot_kriteria);
            $this->bind('jenis_kriteria', $jenis_kriteria);
            $this->execute();
            return Response(200, [], "Berhasil edit data kriteria");
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return Response(404, [], "Gagal edit data kriteria");
        }
    }
    public function deleteKriteria($id)
    {
        try {
            $query = "DELETE FROM $this->table WHERE id_kriteria = :id_kriteria";
            $query_reference = "DELETE FROM $this->table_subkriteria WHERE id_kriteria = :id_kriteria";
            // 

            $this->query($query_reference);
            $this->bind('id_kriteria', intval($id));
            $this->execute();
            //
            $this->query($query);
            $this->bind('id_kriteria', intval($id));
            $this->execute();
            return Response(200, [], "Berhasil menghapus data kriteria");
        } catch (\Throwable $th) {
            return Response(400, [], "Gagal menghapus data kriteria");
        }
    }
    public function getDataSubKriteriaById($id)
    {
        try {
            $query = 'SELECT * FROM ' . $this->table_subkriteria . ' WHERE id_subkriteria = :id_subkriteria';
            $this->query($query);
            $this->bind('id_subkriteria', intval($id));
            $result =  $this->single();
            return Response(200, $result, "Berhasil get data kriteria");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal get data kriteria");
        }
    }
    public function addSubKriteria($data, $id)
    {
        try {
            $idKriteria = htmlspecialchars($id);
            $sub_kriteria = htmlspecialchars($data['sub_kriteria']);
            $bobot_subkriteria = htmlspecialchars($data['bobot_subkriteria']);
            $querySubKriteria = "INSERT INTO $this->table_subkriteria (id_kriteria,id_subkriteria,sub_kriteria,bobot_subkriteria) VALUES (:id_kriteria,'',:sub_kriteria,:bobot_subkriteria)";
            $this->query($querySubKriteria);
            $this->bind('id_kriteria', intval($idKriteria));
            $this->bind('sub_kriteria', $sub_kriteria);
            $this->bind('bobot_subkriteria', $bobot_subkriteria);
            $this->execute();
            return Response(200, [], "Berhasil tambah data Subkriteria");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal tambah data subkriteria");
        }
    }
    public function editSubKriteria($data,  $id_subkriteria)
    {
        try {
            $id_subKriteria = htmlspecialchars($id_subkriteria);
            $sub_kriteria = htmlspecialchars($data['sub_kriteria']);
            $bobot_subkriteria = htmlspecialchars($data['bobot_subkriteria']);
            $querySubKriteria =  "UPDATE  $this->table_subkriteria  SET  sub_kriteria = :sub_kriteria, bobot_subkriteria = :bobot_subkriteria WHERE id_subkriteria = :id_subkriteria";
            $this->query($querySubKriteria);
            $this->bind('id_subkriteria', intval($id_subKriteria));
            $this->bind('sub_kriteria', $sub_kriteria);
            $this->bind('bobot_subkriteria', $bobot_subkriteria);
            $this->execute();
            return Response(200, [], "Berhasil tambah data Subkriteria");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal tambah data subkriteria");
        }
    }

    public function deleteSubKriteria($id_subkriteria)
    {
        try {
            $query_reference = "DELETE FROM $this->table_subkriteria WHERE id_subkriteria = :id_subkriteria";
            // 

            $this->query($query_reference);
            $this->bind('id_subkriteria', intval($id_subkriteria));
            $this->execute();
            return Response(200, [], "Berhasil menghapus data Sub kriteria");
        } catch (\Throwable $th) {
            return Response(400, [], "Gagal menghapus data kriteria");
        }
    }
}
