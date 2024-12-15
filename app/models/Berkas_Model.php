<?php

class Berkas_Model{

    private $table = "user";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function profile($data){

        date_default_timezone_set('Asia/Jakarta');

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

        // ==================================================
       
        if(!empty($_FILES['foto_siswa']['name'])){
            $nameFile   = $_FILES['foto_siswa']['name'];
            $ukuran     = $_FILES['foto_siswa']['size'];
            $tmpName    = $_FILES['foto_siswa']['tmp_name'];

            $extensionVal = ['jpg', 'jpeg', 'png'];
            $extensionGambar = explode('.', $nameFile);
            $extensionGambar = strtolower(end($extensionGambar));

            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $extensionGambar;

            $pindah = move_uploaded_file($tmpName, 'public/assets/img/profile/'. $namaFileBaru);

            if($pindah){
                $id_person = $_POST['id_person'];
                $query = "SELECT * FROM person WHERE id_person='$id_person'";
                $this->db->query($query);
                $this->db->execute();

                $id_berkas = $this->db->single()['id_berkas'];

                if(!$id_berkas){
                    
                    $query = "INSERT INTO berkas VALUES (:id_berkas,:kk, :akta, :ijazah, :kip, :profile, :kelakuan, :ortu, :sehat, :pas_foto, :lulus, :pindah)";
                    $this->db->query($query);
                    
                    $this->db->bind(':id_berkas', $result);
                    $this->db->bind(':kk', '-');
                    $this->db->bind(':akta', '-');
                    $this->db->bind(':ijazah', '-');
                    $this->db->bind(':kip', '-');
                    $this->db->bind(':profile', $namaFileBaru);
                    $this->db->bind(':kelakuan', '-');
                    $this->db->bind(':ortu', '-');
                    $this->db->bind(':sehat', '-');
                    $this->db->bind(':pas_foto', '-');
                    $this->db->bind(':lulus', '-');
                    $this->db->bind(':pindah', '-');
                    

                    // var_dump($$result);
                    // die();
                    $this->db->execute();

                    $inBer = $this->db->rowCount();

                    if($inBer > 0){
                        $email = $_POST['email'];

                        $query = "SELECT * FROM person WHERE email='$email'";

                        $this->db->query($query);
                        $this->db->execute();

                        $id_person = $this->db->single()['id_person'];
                    
                        // var_dump($id_person);
                        // die();

                        $queryP = "UPDATE person SET id_berkas='$result' WHERE id_person='$id_person'";
                        $this->db->query($queryP);
                        $this->db->execute();

                        return $this->db->rowCount();

                    }

                }else{
                    
                    $query = "UPDATE berkas SET profile='$namaFileBaru' WHERE id_berkas='$id_berkas'";
                    $this->db->query($query);
                    $this->db->execute();

                    return $this->db->rowCount();

                }
            }
        }else{    
            $disini = 1;
            return $disini;
        }

    }

    public function allBerkas($data){

        $query = "SELECT COUNT(*) as total_rows FROM berkas";
        $this->db->query($query);

        $result = $this->db->single();

        $result = $result['total_rows'];

        // ==================================================

        $id_person = $_POST['id_person'];
        
        $query = "SELECT * FROM person WHERE id_person='$id_person'";
        $this->db->query($query);
        $this->db->execute();
        
        $id_berkas = $this->db->single()['id_berkas'];
        
        if($id_berkas == 0){
        //     var_dump("Masuk insert");
        // die();
        
            // Query INSERT tanpa id_berkas jika id_berkas adalah AUTO_INCREMENT
            $query = "INSERT INTO berkas (kk, akta, ijazah, kip, profile, kelakuan, ortu, sehat, pas_foto, lulus, pindah)
            VALUES (:kk, :akta, :ijazah, :kip, :profile, :kelakuan, :ortu, :sehat, :pas_foto, :lulus, :pindah)";

            // Menyiapkan statement
            $this->db->query($query);

            // Mengikat parameter
            $this->db->bind(':kk', '-');
            $this->db->bind(':akta', '');
            $this->db->bind(':ijazah', '-');
            $this->db->bind(':kip', '-');
            $this->db->bind(':profile', '-');
            $this->db->bind(':kelakuan', '-');
            $this->db->bind(':ortu', '-');
            $this->db->bind(':sehat', '-');
            $this->db->bind(':pas_foto', '-');
            $this->db->bind(':lulus', '-');
            $this->db->bind(':pindah', '-');

            // Eksekusi query
            $this->db->execute();
            $id_berkas = $this->db->lastInsertId();

            $query = "UPDATE person SET id_berkas=$id_berkas WHERE id_person=$id_person";
    
            // die("UPDATE person SET id_berkas = ". $id_berkas ." WHERE id_person=$id_person");
            $this->db->query($query);
            $this->db->execute();
        }
        
        $count = 0;

        // ============== KK =====================
        if(!empty($_FILES['kkFile']['name'])){
            $kkFile_nameFile   = $_FILES['kkFile']['name'];
            $kkFile_ukuran     = $_FILES['kkFile']['size'];
            $kkFile_tmpName    = $_FILES['kkFile']['tmp_name'];

            $kkFile_extensionVal = ['jpg', 'jpeg', 'png'];
            $kkFile_extensionGambar = explode('.', $kkFile_nameFile);
            $kkFile_extensionGambar = strtolower(end($kkFile_extensionGambar));

            $kkFile_namaFileBaru = uniqid();
            $kkFile_namaFileBaru .= '.';
            $kkFile_namaFileBaru .= $kkFile_extensionGambar;

            $kkFile_pindah = move_uploaded_file($kkFile_tmpName, 'public/assets/img/kk/'. $kkFile_namaFileBaru);

            $query = "UPDATE berkas SET kk='$kkFile_namaFileBaru' WHERE id_berkas='$id_berkas'";
            $this->db->query($query);

            $this->db->execute();
            $count++;
        }
        // ============== KK =====================

        // ============== Pindah =====================
        if(!empty($_FILES['PindahFile']['name'])){
            $PindahFile_nameFile   = $_FILES['PindahFile']['name'];
            $PindahFile_ukuran     = $_FILES['PindahFile']['size'];
            $PindahFile_tmpName    = $_FILES['PindahFile']['tmp_name'];

            $PindahFile_extensionVal = ['jpg', 'jpeg', 'png'];
            $PindahFile_extensionGambar = explode('.', $PindahFile_nameFile);
            $PindahFile_extensionGambar = strtolower(end($PindahFile_extensionGambar));

            $PindahFile_namaFileBaru = uniqid();
            $PindahFile_namaFileBaru .= '.';
            $PindahFile_namaFileBaru .= $PindahFile_extensionGambar;

            $PindahFile_pindah = move_uploaded_file($PindahFile_tmpName, 'public/assets/img/Pindah/'. $PindahFile_namaFileBaru);

            $query = "UPDATE berkas SET Pindah='$PindahFile_namaFileBaru' WHERE id_berkas='$id_berkas'";
            $this->db->query($query);

            $this->db->execute();
            $count++;
        }
        // ============== KK =====================

        // ============== Akta =====================
        if(!empty($_FILES['aktaFile']['name'])){
            $aktaFile_nameFile   = $_FILES['aktaFile']['name'];
            $aktaFile_ukuran     = $_FILES['aktaFile']['size'];
            $aktaFile_tmpName    = $_FILES['aktaFile']['tmp_name'];

            $aktaFile_extensionVal = ['jpg', 'jpeg', 'png'];
            $aktaFile_extensionGambar = explode('.', $aktaFile_nameFile);
            $aktaFile_extensionGambar = strtolower(end($aktaFile_extensionGambar));

            $aktaFile_namaFileBaru = uniqid();
            $aktaFile_namaFileBaru .= '.';
            $aktaFile_namaFileBaru .= $aktaFile_extensionGambar;

            $aktaFile_pindah = move_uploaded_file($aktaFile_tmpName, 'public/assets/img/akta/'. $aktaFile_namaFileBaru);

            $query = "UPDATE berkas SET akta='$aktaFile_namaFileBaru' WHERE id_berkas='$id_berkas'";
            $this->db->query($query);

            $this->db->execute();
            $count++;
        }
        // ============== Akta =====================

        // ============== Ijazah =====================
        if(!empty($_FILES['ijazahFile']['name'])){

            $ijazahFile_nameFile   = $_FILES['ijazahFile']['name'];
            $ijazahFile_ukuran     = $_FILES['ijazahFile']['size'];
            $ijazahFile_tmpName    = $_FILES['ijazahFile']['tmp_name'];

            $ijazahFile_extensionVal = ['jpg', 'jpeg', 'png'];
            $ijazahFile_extensionGambar = explode('.', $ijazahFile_nameFile);
            $ijazahFile_extensionGambar = strtolower(end($ijazahFile_extensionGambar));

            $ijazahFile_namaFileBaru = uniqid();
            $ijazahFile_namaFileBaru .= '.';
            $ijazahFile_namaFileBaru .= $ijazahFile_extensionGambar;

            $ijazahFile_pindah = move_uploaded_file($ijazahFile_tmpName, 'public/assets/img/ijazah/'. $ijazahFile_namaFileBaru);

            $query = "UPDATE berkas SET ijazah='$ijazahFile_namaFileBaru' WHERE id_berkas='$id_berkas'";
            $this->db->query($query);

            $this->db->execute();

            $inBer = $this->db->rowCount();
            $count++;
        }
        // ============== Ijazah =====================

        // ============== Kip =====================
        if(!empty($_FILES['kipFile']['name'])){
            $kipFile_nameFile   = $_FILES['kipFile']['name'];
            $kipFile_ukuran     = $_FILES['kipFile']['size'];
            $kipFile_tmpName    = $_FILES['kipFile']['tmp_name'];

            $kipFile_extensionVal = ['jpg', 'jpeg', 'png'];
            $kipFile_extensionGambar = explode('.', $kipFile_nameFile);
            $kipFile_extensionGambar = strtolower(end($kipFile_extensionGambar));

            $kipFile_namaFileBaru = uniqid();
            $kipFile_namaFileBaru .= '.';
            $kipFile_namaFileBaru .= $kipFile_extensionGambar;

            $kipFile_pindah = move_uploaded_file($kipFile_tmpName, 'public/assets/img/kip/'. $kipFile_namaFileBaru);

            $query = "UPDATE berkas SET kip='$kipFile_namaFileBaru' WHERE id_berkas='$id_berkas'";
            $this->db->query($query);

            $this->db->execute();
            $count++;
        }
        // ============== Kip =====================

        // ============== Surat Kelakuan Baik =====================
        if(!empty($_FILES['kelakuanFile']['name'])){
            $kelakuanFile_nameFile   = $_FILES['kelakuanFile']['name'];
            $kelakuanFile_ukuran     = $_FILES['kelakuanFile']['size'];
            $kelakuanFile_tmpName    = $_FILES['kelakuanFile']['tmp_name'];

            $kelakuanFile_extensionVal = ['jpg', 'jpeg', 'png'];
            $kelakuanFile_extensionGambar = explode('.', $kelakuanFile_nameFile);
            $kelakuanFile_extensionGambar = strtolower(end($kelakuanFile_extensionGambar));

            $kelakuanFile_namaFileBaru = uniqid();
            $kelakuanFile_namaFileBaru .= '.';
            $kelakuanFile_namaFileBaru .= $kelakuanFile_extensionGambar;

            $kelakuanFile_pindah = move_uploaded_file($kelakuanFile_tmpName, 'public/assets/img/kelakuan/'. $kelakuanFile_namaFileBaru);

            $query = "UPDATE berkas SET kelakuan='$kelakuanFile_namaFileBaru' WHERE id_berkas='$id_berkas'";
            $this->db->query($query);

            $this->db->execute();
            $count++;
        }
        // ============== Surat Kelakuan Baik =====================

        // ============== KTP Orang Tua =====================
        if(!empty($_FILES['ortuFile']['name'])){
            $ortuFile_nameFile   = $_FILES['ortuFile']['name'];
            $ortuFile_ukuran     = $_FILES['ortuFile']['size'];
            $ortuFile_tmpName    = $_FILES['ortuFile']['tmp_name'];

            $ortuFile_extensionVal = ['jpg', 'jpeg', 'png'];
            $ortuFile_extensionGambar = explode('.', $ortuFile_nameFile);
            $ortuFile_extensionGambar = strtolower(end($ortuFile_extensionGambar));

            // if( $ortuFile_ukuran > 10500000 ){
            //     echo "<script>
            //             alert('Ukuran Gambar Terlalu Besar !!!');
            //         </script>";

            //     return false;
            // };

            $ortuFile_namaFileBaru = uniqid();
            $ortuFile_namaFileBaru .= '.';
            $ortuFile_namaFileBaru .= $ortuFile_extensionGambar;

            $ortuFile_pindah = move_uploaded_file($ortuFile_tmpName, 'public/assets/img/ortu/'. $ortuFile_namaFileBaru);

            $query = "UPDATE berkas SET ortu='$ortuFile_namaFileBaru' WHERE id_berkas='$id_berkas'";
            $this->db->query($query);

            $this->db->execute();
            $count++;
        }
        // ============== KTP Orang Tua =====================

        // ============== Surat Keterangan Sehat =====================
        if(!empty($_FILES['sehatFile']['name'])){
            $sehatFile_nameFile   = $_FILES['sehatFile']['name'];
            $sehatFile_ukuran     = $_FILES['sehatFile']['size'];
            $sehatFile_tmpName    = $_FILES['sehatFile']['tmp_name'];

            $sehatFile_extensionVal = ['jpg', 'jpeg', 'png'];
            $sehatFile_extensionGambar = explode('.', $sehatFile_nameFile);
            $sehatFile_extensionGambar = strtolower(end($sehatFile_extensionGambar));

            $sehatFile_namaFileBaru = uniqid();
            $sehatFile_namaFileBaru .= '.';
            $sehatFile_namaFileBaru .= $sehatFile_extensionGambar;

            $sehatFile_pindah = move_uploaded_file($sehatFile_tmpName, 'public/assets/img/sehat/'. $sehatFile_namaFileBaru);

            $query = "UPDATE berkas SET sehat='$sehatFile_namaFileBaru' WHERE id_berkas='$id_berkas'";
            $this->db->query($query);

            $this->db->execute();
            $count++;
        }
        // ============== Surat Keterangan Sehat =====================

        // ============== Pas Foto =====================
        // var_dump($_FILES['pasFotoFile']['name']);
        // die();
        if(!empty($_FILES['pasFotoFile']['name'])){
            $pasFotoFile_nameFile   = $_FILES['pasFotoFile']['name'];
            $pasFotoFile_ukuran     = $_FILES['pasFotoFile']['size'];
            $pasFotoFile_tmpName    = $_FILES['pasFotoFile']['tmp_name'];

            $pasFotoFile_extensionVal = ['jpg', 'jpeg', 'png'];
            $pasFotoFile_extensionGambar = explode('.', $pasFotoFile_nameFile);
            $pasFotoFile_extensionGambar = strtolower(end($pasFotoFile_extensionGambar));

            $pasFotoFile_namaFileBaru = uniqid();
            $pasFotoFile_namaFileBaru .= '.';
            $pasFotoFile_namaFileBaru .= $pasFotoFile_extensionGambar;

            $pasFotoFile_pindah = move_uploaded_file($pasFotoFile_tmpName, 'public/assets/img/pas_foto/'. $pasFotoFile_namaFileBaru);

            $query = "UPDATE berkas SET pas_foto='$pasFotoFile_namaFileBaru' WHERE id_berkas='$id_berkas'";
            $this->db->query($query);

            $this->db->execute();
            $count++;
        }
        // ============== Pas Foto =====================

        // ============== Lulus =====================
        if(!empty($_FILES['lulusFile']['name'])){
            $lulusFile_nameFile   = $_FILES['lulusFile']['name'];
            $lulusFile_ukuran     = $_FILES['lulusFile']['size'];
            $lulusFile_tmpName    = $_FILES['lulusFile']['tmp_name'];

            $lulusFile_extensionVal = ['jpg', 'jpeg', 'png'];
            $lulusFile_extensionGambar = explode('.', $lulusFile_nameFile);
            $lulusFile_extensionGambar = strtolower(end($lulusFile_extensionGambar));

            $lulusFile_namaFileBaru = uniqid();
            $lulusFile_namaFileBaru .= '.';
            $lulusFile_namaFileBaru .= $lulusFile_extensionGambar;

            $lulusFile_pindah = move_uploaded_file($lulusFile_tmpName, 'public/assets/img/lulus/'. $lulusFile_namaFileBaru);

            $query = "UPDATE berkas SET lulus='$lulusFile_namaFileBaru' WHERE id_berkas='$id_berkas'";
            $this->db->query($query);

            $this->db->execute();
            $count++;
        }
        // ============== Lulus =====================


        // return $this->db->rowCount();
        return $count;
    }

}