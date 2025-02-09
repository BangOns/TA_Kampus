<?php
class Auth_Model
{
    private $table = 'admin';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($data)
    {
        if ($data) {
            try {
                $id_admin = htmlspecialchars($data['id_admin']);
                $password = htmlspecialchars($data['password']);
                $query = "SELECT * FROM $this->table WHERE id_admin = :id_admin AND password = :password";
                $this->db->query($query);
                $this->db->bind('id_admin', $id_admin);
                $this->db->bind('password', $password);
                $user = $this->db->single();
                if (!$user) {
                    throw new Exception('ID Admin atau Password tidak ditemukan!');
                }


                return [
                    'status' => '200',
                    'message' => 'Berhasil Login'
                ];
            } catch (\Throwable $e) {
                return [
                    'status' => '404',
                    'message' => $e->getMessage()
                ];
            }
        }
    }
    public function register($data)
    {
        try {

            $id_admin = htmlspecialchars($data['id_admin']);
            $name = htmlspecialchars($data['name']);
            $password = htmlspecialchars($data['password']);
            $repassword = htmlspecialchars($data['repassword']);
            $pertanyaan = htmlspecialchars($data['pertanyaan']);
            $jawaban = htmlspecialchars($data['jawaban']);

            if ($password !== $repassword) {
                throw new Exception('Password dan Re-Password tidak sama!');
            }
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO $this->table (id_admin,name,password,pertanyaan,jawaban) VALUES (:id_admin,:name,:password,:pertanyaan,:jawaban)";
            $this->db->query($query);
            $this->db->bind('id_admin', $id_admin);
            $this->db->bind('name', $name);
            $this->db->bind('password', $hashPassword);
            $this->db->bind('pertanyaan', $pertanyaan);
            $this->db->bind('jawaban', $jawaban);
            $this->db->execute();
            return [
                'status' => '200',
                'message' => 'Berhasil Register'
            ];
        } catch (\Throwable $e) {
            return [
                'status' => '404',
                'message' => $e->getMessage()
            ];
        }
    }
}