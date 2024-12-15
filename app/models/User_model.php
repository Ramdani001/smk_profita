<?php

class User_model{

    private $table = "user";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getUser(){
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    public function register($data){
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $password = hash('sha256', $_POST['password']);

        $type = 3;
        $created_at = date('Y-m-d H:i:s');

        $operators = ['+', '-', '*', '/'];
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $operator = $operators[array_rand($operators)];

        if ($operator == '/') {
            $num2 = rand(1, 10); 
            $num1 = $num2 * rand(1, 10); 
        }

        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                $result = $num1 / $num2;
                break;
        }
  
        $query = "INSERT INTO person VALUES( :result, :name, '', :email, :type, '', '', '', '', '', '', '', '', '', '', :created_at, '', '', 0,:created_at, :created_at)";

        $this->db->query($query);
        $this->db->bind('type', $type);
        $this->db->bind('name', $name);
        $this->db->bind('result', $result);
        $this->db->bind('email', $email);
        $this->db->bind('created_at', $created_at);
        $this->db->execute();
        
        $nameFull = $data['name'];
        $emailFull = $data['email'];

        if ($this->db->rowCount() == 0) {
            return false; // Gagal memasukkan data ke tabel person
        }
        // ======
        $this->db->query('SELECT id_person FROM person WHERE email=:email');
        $this->db->bind(':email', $email);
        $id_person = $this->db->single();
        
        $idPerson = (int)$id_person['id_person'];

        $query = "INSERT INTO user VALUES (:result, :id_person, :password, :created_at, :created_at)";
        $this->db->query($query);
        $this->db->bind('result', $result);
        $this->db->bind(':id_person', $id_person['id_person']);
        $this->db->bind('password', $password);
        $this->db->bind('created_at', $created_at);
        
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function login($data){
        $email = $_POST['email'];
        $password = hash('sha256', $_POST['password']);

        $sql = "SELECT * FROM person WHERE email = :email";
        $this->db->query($sql);
        $this->db->bind(':email', $email);
        $this->db->execute();

        
        try {
            $this->db->execute();
            
            if($this->db->rowCount() > 0){
                $id_person = $this->db->single()['id_person'];
                $sql2 = "SELECT * FROM user WHERE id_person= :id_person";
                $this->db->query($sql2);
                $this->db->bind(':id_person', $id_person);
                $this->db->execute();

                $result = $this->db->single()['password'];
                $checked = strcasecmp($password, $result);

                if($checked === 0){
                    $_SESSION['id_person'] = $this->db->single()['id_person'];
                    $send = [
                        ['BERHASIL' => $_SESSION['id_person'] = $this->db->single()['id_person']],
                        ['SESSION' => $this->db->rowCount()]
                    ];     
                    return $send;
                }else{
                    $send = [
                        ['SESSION' => 'Gagal Login']
                    ];
                    return $send;
                }
            }else{
                return $this->db->rowCount();
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    public function deleteByIdPerson($id_person) {
        $query = "DELETE FROM ". $this->table ." WHERE id_person='$id_person'";
        $this->db->query($query);
        $this->db->execute();

        return $this->db->rowCount();
    }

}