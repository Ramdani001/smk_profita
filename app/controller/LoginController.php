<?php

class LoginController extends Controller {
    public function index($id = 0){
        
        $data['id_person'] = $id;
        $data['title'] = "SMK PROFITA";

        $data['person'] = $this->model('User_model')->getUser();

        $this->view('templates/header', $data);
            $this->view('auth/index', $data);
        $this->view('templates/footer');
    }

    public function logout(){ 
        session_destroy(); 
        Flasher::setFlash('Logout Berhasil, semoga harimu menyenangkan &#128519;', 'Login', 'success');

        $this->view('templates/header');
            $this->view('auth/index');
        $this->view('templates/footer');

    }

} 