<?php

class Flasher{

    public static function setFlash($pesan, $aksi, $tipe){
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi'  => $aksi,
            'tipe'  => $tipe
        ];
    }

    public static function flash(){
        if(isset($_SESSION['flash'])) {
            echo '<div class="alert alert-'.$_SESSION['flash']['tipe'].' alert-dismissible" role="alert">
                    '.$_SESSION['flash']['pesan'].' 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

            unset($_SESSION['flash']);
        }
    }

}