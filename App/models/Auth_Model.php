<?php
class Auth_Model extends Database
{
    private $table = 'admin';
    public function login($data)
    {
        if ($data) {
            try {
                $id_admin = htmlspecialchars($data['id_admin']);
                $password = htmlspecialchars($data['password']);
                $query = "SELECT * FROM $this->table WHERE id_admin = :id_admin OR name = :id_admin";
                $this->query($query);
                $this->bind('id_admin', $id_admin);
                $user = $this->single();
                if (!$user) {
                    throw new Exception('ID Admin atau Password tidak ditemukan!');
                }
                if (!password_verify($password, $user['password'])) {
                    throw new Exception('Password tidak ditemukan! ' . $password . '');
                }
                return [
                    'status' => '200',
                    'message' => 'Berhasil Login',
                    'user' => [
                        $user['id_admin'],
                        $user['name']
                    ]
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
            $this->query($query);
            $this->bind('id_admin', $id_admin);
            $this->bind('name', $name);
            $this->bind('password', $hashPassword);
            $this->bind('pertanyaan', $pertanyaan);
            $this->bind('jawaban', $jawaban);
            $this->execute();
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
