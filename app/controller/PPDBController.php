<?php

class PPDBController extends Controller {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function index($id = 0){
          
        $id_person = (int)$id; 
        $data['title'] = "PPDB SMK PROFITA";

        $sql = "SELECT * FROM person WHERE id_person=".$id_person;
        $this->db->query($sql);
        $data['person'] = $this->db->single();

        $sql = "SELECT * FROM siswa WHERE id_person=".$id_person;
        $this->db->query($sql);
        $data['siswa'] = $this->db->single();

        $id_siswa = 0;
        if($data['siswa']){
            $id_siswa = $this->db->single()['id_siswa'];
        }

        $sql = "SELECT * FROM parents WHERE id_siswa=:id_siswa";
        $this->db->query($sql);
        // $this->db->bind(':id_person', $id_person);
        $this->db->bind(':id_siswa', $id_siswa);
        $data['parent'] = $this->db->single();

        // Berkas
        $id_berkas = $data['person']['id_berkas'];
 
        $sql = "SELECT * FROM berkas WHERE id_berkas=:id_berkas";
        $this->db->query($sql);
        $this->db->bind(':id_berkas', $id_berkas);
        $data['berkas'] = $this->db->single();
        
        $this->view('admin/code/header', $data);
            $this->view('ppdb/dashboard',  $data);
        $this->view('admin/code/footer');
    }

    public function berkas($id = 0){
        $id_person = (int)$id; 
        $data['title'] = "PPDB SMK PROFITA";

        $sql = "SELECT * FROM person WHERE id_person=".$id_person;
        $this->db->query($sql);
        $data['person'] = $this->db->single();

        // Berkas
        $id_berkas = $data['person']['id_berkas'];

        $sql = "SELECT * FROM siswa WHERE id_person=".$id_person;
        $this->db->query($sql);
        $data['siswa'] = $this->db->single();

        $sql = "SELECT * FROM berkas WHERE id_berkas=:id_berkas";
        $this->db->query($sql);
        $this->db->bind(':id_berkas', $id_berkas);
        $data['berkas'] = $this->db->single();

        $this->view('admin/code/header', $data);
            $this->view('ppdb/berkas', $data);
        $this->view('admin/code/footer');
    }
    public function cetakKartu($id = 0){
        $id_person = (int)$id; 
        $data['title'] = "PPDB SMK PROFITA";

        $sql = "SELECT * FROM person WHERE id_person=".$id_person;
        $this->db->query($sql);
        $data['person'] = $this->db->single();

        $sql = "SELECT * FROM siswa WHERE id_person=".$id_person;
        $this->db->query($sql);
        $data['siswa'] = $this->db->single();

        // Berkas
        $id_berkas = $data['person']['id_berkas'];

        $sql = "SELECT * FROM berkas WHERE id_berkas=:id_berkas";
        $this->db->query($sql);
        $this->db->bind(':id_berkas', $id_berkas);
        $data['berkas'] = $this->db->single();

        $this->view('admin/code/header', $data);
            $this->view('ppdb/cetakKartu', $data);
        $this->view('admin/code/footer');
    }

    public function user($id = 0){

        $data['id_person'] = $id;
        $data['title'] = "SMK PROFITA";

        $data['person'] = $this->model('User_model')->getUser();

        $this->view('admin/code/header');
            $this->view('admin/user');
        $this->view('admin/code/footer');
    }

    public function insertFormulir($id = 0){
        
        $person = $this->model('Person_Model')->update($_POST);
        
        if($person > 0){
            $siswa = $this->model('Siswa_Model')->insert($_POST);
             
            if($siswa > 0){ 
                $parent = $this->model('Parent_Model')->insert($_POST);
                // var_dump($parent);
                // die(); 
                 
                // if($parent > 0){
                    $berkas = $this->model('Berkas_Model')->profile($_POST);
                    // var_dump($berkas);
                    // die();
                    
                    if($berkas > 0){

                        $id_person = (int)$id;  
                        $data['title'] = "PPDB SMK PROFITA";

                        $sql = "SELECT * FROM person WHERE id_person=".$id_person;
                        $this->db->query($sql);
                        $data['person'] = $this->db->single();
                        
                        $_SESSION['alert_message'] = "Data formulir sudah terkirim...";
                    
                        header("Location: ".BASEURL."PPDBController/$id_person");
                        exit(); 
                    }

                // }

            }

        }

    }

    public function updateBerkas($id = 0){
        $berkas = $this->model('Berkas_Model')->allBerkas($_POST);
        var_dump($berkas);

        if($berkas > 0 ){
            $id_person = (int)$id; 
            $data['title'] = "PPDB SMK PROFITA";

            $sql = "SELECT * FROM person WHERE id_person=".$id_person;
            $this->db->query($sql);
            $data['person'] = $this->db->single();
        
            header("Location: ".BASEURL."PPDBController/berkas/$id_person");
            exit(); 
        }

    }


}