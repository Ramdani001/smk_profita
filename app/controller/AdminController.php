<?php

class AdminController extends Controller {
    private $db;

    public function __construct(){
        $this->db = new Database;
    } 
    
    public function index($id = 0){
        
        $data['id_person'] = $id;
        $data['title'] = "SMK PROFITA | DASHBOARD";
        $data['person'] = $this->model('User_model')->getUser();

        $person = (object) $data['person'];

        $this->view('templates/header', $data);
        
        $this->view('section/navbar', $data);
        $this->view('section/heroSection', $data);
        $this->view('section/profileSection', $data);
        $this->view('section/Ekstrakulikuler', $data);
        $this->view('section/GaleriSection', $data);
        $this->view('section/BeritaSection', $data);
        $this->view('section/KontakSection', $data);

        $this->view('templates/footer'); 
    } 

    public function Auth($type){
        if($type == 'login'){
            $send = $this->model('User_model')->login($_POST);
            
            if($send[1]['SESSION'] > 0){

                $id_person = $send[0]['BERHASIL'];
                
                $sql = "SELECT tipe FROM person WHERE id_person = :id_person";
                $this->db->query($sql);
                $this->db->bind(':id_person', $id_person);
                $this->db->execute();
                
                if($this->db->single()['tipe'] == 3){
                    header('Location: '. BASEURL .'PPDBController/index/'.$id_person);
                }else{
                    header('Location: '. BASEURL .'ViewAdminController/index/'.$id_person);
                }
                exit;
            }else{  
                Flasher::setFlash('Gagal Login Mohon periksan emil & password', 'Login', 'danger');

                header('Location: '. BASEURL .'LoginController');
                exit;
            }
        }else if($type == 'register'){
            
            if($this->model('User_model')->register($_POST)){
                Flasher::setFlash('Selamat Bergabung', 'Login', 'success');
                $_SESSION['message'] = 'Berhasil dibuat!';
                header('Location: '. BASEURL .'LoginController');
                exit;
            }else{
                $_SESSION['message'] = 'Gagal dibuat!';
                header('Location: '. BASEURL .'AdminController');
                exit;
            }
        }
    }
  
    public function deleteUser($id_person) {
        if (isset($_SESSION["id_person"])) {
            $_SESSION['message'] = 'Berhasil dihapus!';
            $this->model('User_model')->deleteByIdPerson($id_person);
            $this->model('Person_model')->deleteByIdPerson($id_person);

            header('Location: '. BASEURL .'ViewAdminController/user');
            exit;
        } else {
            $_SESSION['message'] = 'Gagal dihapus!';
            header('Location: '. BASEURL .'ViewAdminController/user');
            exit;
        }
    }

    public function editStatus(){
        $id_siswa = $_POST['det_id_siswa'];
        $siswa = $this->model('Siswa_Model')->editStatus($_POST); 
        
        if($siswa > 0){
            header('Location: '. BASEURL .'ViewAdminController/siswaDaftar');
        }else{
            var_dump($siswa);
            die();
        }
    }

    public function messages($id){
        $id_person = (int)$id; 
        $data['title'] = "PPDB SMK PROFITA";

        $sql = "SELECT * FROM person WHERE id_person=".$id_person;
        $this->db->query($sql);
        $data['person'] = $this->db->single();

        $sql = "SELECT * FROM siswa WHERE id_person=".$id_person;
        $this->db->query($sql);
        $data['siswa'] = $this->db->single();

        $id_siswa = $this->db->single()['id_siswa'];

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

        $this->view('section/Dokumen', $data);
    }
}