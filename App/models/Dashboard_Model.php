<?php
class Dashboard_Model extends Database
{
    private $table = 'penilaian_santri';
    public function getData()
    {
        try {
            $query = 'SELECT * FROM ' . $this->table;
            $this->query($query);
            $results =  $this->resultSet();
            foreach ($results as $item) {
                $key = $item['id_reference'];
                if (!isset($result[$key])) {
                    $result[$key] = [
                        "id_penilaian" => $item['id_penilaian'],
                        "id_reference" => $item['id_reference'],
                        "id_pelanggaran" => $item['id_pelanggaran'],
                        "waktu" => $item['waktu'],
                        "id_santri" => $item['id_santri'],
                        'kriteria' => [],
                        'sub_kriteria' => [],
                    ];
                }
                $result[$key]['kriteria'][] = [
                    'id_kriteria' => $item['id_kriteria']
                ];
                $result[$key]['sub_kriteria'][] =  [
                    'id_subkriteria' => $item['id_subkriteria']
                ];
            }
            $result = array_values($result);
            return Response(200, $result, "Berhasil get data penilaian");
        } catch (\Throwable $th) {
            return Response(404, [], "Gagal get data penilaian");
        }
    }
    public function getDataById($id)
    {
        try {
            $query = "SELECT * FROM $this->table WHERE id_reference = :id_reference ";
            $this->query($query);
            $this->bind('id_reference', htmlspecialchars($id));
            $result = $this->single();
            return Response(200, $result, "Berhasil get  Data Pelanggaran Santri");
        } catch (\Throwable $e) {
            return Response(404, [], "Gagal get  Data Pelanggaran Santri");
        }
    }

    public function addDataPenilian($data)
    {
        try {

            $id_santri = $data['id_santri'];
            $id_pelanggaran = $data['nama_pelanggaran'];
            $id_reference = guidv4();
            $waktu = $data['waktu'];
            $id_kriteria = $data['id_kriteria'];
            $nilai = $data['nilai'];
            if (count($id_kriteria) !== count($nilai)) {
                throw new \Exception("Jumlah kriteria dan nilai tidak sesuai");
            }
            for ($i = 0; $i < count($id_kriteria); $i++) {
                list($id_subkriteria, $bobot) = explode('|', $nilai[$i]);
                $query = "INSERT INTO $this->table (id_penilaian,id_reference, id_pelanggaran, waktu, id_santri,id_kriteria, id_subkriteria, nilai) 
                      VALUES (NULL,:id_reference, :id_pelanggaran, :waktu,:id_santri, :id_kriteria, :id_subkriteria, :nilai)";
                $this->query($query);
                $this->bind(':id_reference', $id_reference);
                $this->bind(':id_pelanggaran', intval($id_pelanggaran));
                $this->bind(':waktu', $waktu);
                $this->bind(':id_santri', intval($id_santri));
                $this->bind(':id_kriteria', intval($id_kriteria[$i]));
                $this->bind(':id_subkriteria', intval($id_subkriteria));
                $this->bind(':nilai', intval($bobot));
                $this->execute();
            }
            return Response(200, [], "Berhasil Menambah Data Penilaian");
        } catch (\Throwable $e) {
            return Response(404, [], "Gagal Menambah Data Penilaian " . $e->getMessage() . " ");
        }
    }
}
