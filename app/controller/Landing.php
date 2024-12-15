<?php

class Landing extends Controller {
    public function index($id = 0){
        
        $data['id_person'] = $id;
        $data['title'] = "SMK PROFITA";

        $this->view('templates/header', $data);
        $this->view('section/Navbar', $data);
            $this->view('section/HeroSection', $data);
            $this->view('section/ProfileSection', $data);
            $this->view('section/Ekstrakulikuler', $data);
            $this->view('section/GaleriSection', $data);
            $this->view('section/BeritaSection', $data);
            $this->view('section/KontakSection', $data);
            $this->view('section/Footer');
        $this->view('templates/footer');
    }


    public function Akademika($id = 0){
        $data['id_person'] = $id;
        $data['title'] = "SMK PROFITA";

 
        $this->view('templates/header', $data);

        $this->view('section/Navbar');
            $this->view('Pages/Akademika');
        $this->view('section/Footer');

        $this->view('templates/footer');

    }

    public function Sarana($id = 0){
        $data['id_person'] = $id;
        $data['title'] = "SMK PROFITA";

 
        $this->view('templates/header', $data);

        $this->view('section/Navbar');
            $this->view('Pages/SaranaPrasarana');
        $this->view('section/Footer');

        $this->view('templates/footer');

    }

}