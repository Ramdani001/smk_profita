<?php

class Person_model{

    private $table = "person";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getUser(){
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    public function getById($id){
        $this->db->query('SELECT * FROM '. $this->table  .' WHERE id_person = '. $id .' LIMIT 1');
        return $this->db->single();
    }

    public function register($data){
        $nama = $data['nama'];
        $email = $data['email'];
        $type = 'siswa';
        $created_at = date('Y-m-d H:i:s');

        $query = "INSERT INTO $this->table VALUES ('', '', '', :type, :created_at)";
        $this->db->query($query);
        $this->db->bind('tipe', $type);
        $this->db->bind('created_at', $created_at);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update($data){
        
        $nama    = $_POST['nama_lengkap'];
        $id_person    = $_POST['id_person'];
        // $id_person    = $_POST['id_person'];
        $no_telp    = $_POST['no_telp'];
        $agama      = $_POST['agama'];
        $alamat     = $_POST['alamat'];
        $desa       = $_POST['desa'];
        $kecamatan  = $_POST['kecamatan'];
        $kab_kota   = $_POST['kab_kota'];
        $provinsi   = $_POST['provinsi'];
        $kode_pos   = $_POST['kode_pos'];
        $kewarganegaraan   = $_POST['kewarganegaraan'];
        $tempat_lhr   = $_POST['tempat'];
        $jk   = $_POST['jenis_kelamin'];
        $tanggal_lahir   = $_POST['tanggal_lahir'];
        $rt   = $_POST['rt'];
        $rw   = $_POST['rw'];
        date_default_timezone_set('Asia/Jakarta');
        $updated_at = date('Y-m-d H:i:s');

        $query = "UPDATE person SET nama='$nama', no_telp='$no_telp', agama='$agama', alamat='$alamat', desa='$desa', kecamatan='$kecamatan', kab_kota='$kab_kota', provinsi='$provinsi', kode_pos='$kode_pos', kewarganegaraan='$kewarganegaraan', tempat_lhir='$tempat_lhr', jk='$jk', tanggal_lahir='$tanggal_lahir', rt='$rt', rw='$rw', updated_at='$updated_at' WHERE id_person='$id_person'";
        $this->db->query($query);
        $this->db->execute();
        // var_dump($query);
        // die();
        return $this->db->rowCount();
        
        
    }

    public function deleteByIdPerson($id_person) {
        $query = "DELETE FROM ". $this->table ." WHERE id_person='$id_person'";
        $this->db->query($query);
        $this->db->execute();

        return $this->db->rowCount();
    }

}