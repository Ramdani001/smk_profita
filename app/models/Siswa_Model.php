<?php

class Siswa_Model{

    private $table = "siswa";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    
    public function getAll(){
        // $this->db->query('SELECT * FROM '. $this->table .' s INNER JOIN person p ON s.id_person = p.id_person RIGHT JOIN berkas k ON p.id_berkas = k.id_berkas RIGHT JOIN parents z ON z.id_siswa = s.id_siswa');
        $this->db->query('
            SELECT * 
            FROM ' . $this->table . ' s 
            INNER JOIN person p ON s.id_person = p.id_person 
            LEFT JOIN berkas k ON p.id_berkas = k.id_berkas 
            LEFT JOIN parents z ON z.id_siswa = s.id_siswa
        ');


        return $this->db->resultSet();
    }

    public function getFilter($filStat){
        
        $filterData = $filStat['filter_data'];

        if($filStat['filter_status'] == "getAll"){
            $status     = $filStat['filter_status'];
        }else{
            $status     = (int)$filStat['filter_status'];
        }

        $jenis_daftar = "";
        if($filterData == "getAll"){
            $jenis_daftar = "";
        }else{
            $jenis_daftar = "WHERE s.jenis_daftar='".$filterData."'";
        }

        $status_siswa = "";
        if($status == "getAll"){
            $status_siswa .= "";
        }else{
            if($filterData == "getAll"){
                $status_siswa .= " WHERE s.st=".$status." ";
            }else{
                $status_siswa .= " AND s.st=".$status." ";
            }
        }

        
        $this->db->query('
            SELECT * 
            FROM ' . $this->table . ' s 
            INNER JOIN person p ON s.id_person = p.id_person 
            LEFT JOIN berkas k ON p.id_berkas = k.id_berkas 
            LEFT JOIN parents z ON z.id_siswa = s.id_siswa
            '.$jenis_daftar.' '.$status_siswa.'
        ');

        return $this->db->resultSet();
    }

    public function regulerGet(){
        // $this->db->query('SELECT * FROM '. $this->table .' s INNER JOIN person p ON s.id_person = p.id_person RIGHT JOIN berkas k ON p.id_berkas = k.id_berkas RIGHT JOIN parents z ON z.id_siswa = s.id_siswa');
        $this->db->query('
            SELECT * 
            FROM ' . $this->table . ' s 
            INNER JOIN person p ON s.id_person = p.id_person 
            LEFT JOIN berkas k ON p.id_berkas = k.id_berkas 
            LEFT JOIN parents z ON z.id_siswa = s.id_siswa
            WHERE s.jenis_daftar = "Reguler"
        ');


        return $this->db->resultSet();
    }

    public function pindahanGet(){
        // $this->db->query('SELECT * FROM '. $this->table .' s INNER JOIN person p ON s.id_person = p.id_person RIGHT JOIN berkas k ON p.id_berkas = k.id_berkas RIGHT JOIN parents z ON z.id_siswa = s.id_siswa');
        $this->db->query('
            SELECT * 
            FROM ' . $this->table . ' s 
            INNER JOIN person p ON s.id_person = p.id_person 
            LEFT JOIN berkas k ON p.id_berkas = k.id_berkas 
            LEFT JOIN parents z ON z.id_siswa = s.id_siswa
            WHERE s.jenis_daftar = "Pindahan"
        ');


        return $this->db->resultSet();
    }

    public function insert(){
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

        $id_person    = $_POST['id_person'];

        $created_at = date('Y-m-d H:i:s');
        $sql = "SELECT * FROM person WHERE id_person = :id_person";
        $this->db->query($sql);
        $this->db->bind(':id_person', $id_person);
        $id_person = $this->db->single()['id_person'];
        
        $sqlS = "SELECT * FROM siswa WHERE id_person=:id_person";
        $this->db->query($sqlS);
        $this->db->bind(':id_person', $id_person);
        $record2 = $this->db->single();
        if($record2){
            $id_siswa = (int)$record2['id_siswa'];
        }
 
        if(!$id_siswa){ 
        //     var_dump("Masuk IF");
        // die();
            $query = "INSERT INTO siswa VALUES (:result, :id_person, :no_pendaftaran, :asal_sekolah, :npsn_sekolah_asal,:nisn, :nik, :biaya_sekolah, :sd, :smp, :kip, :cita_cita, :hobi, :anak_ke, :transportasi, :jarak_sekolah, :waktu_tempuh, :jml_saudara, :no_kk, :kepala_keluarga, :status, :jurusan, :kelas_awal, :alasan_pindah, :jenis_daftar, :created_at, :created_at)";
    
            $this->db->query($query);

            $this->db->bind(':result', $result);
            $this->db->bind(':id_person', $_POST['id_person']);
            $this->db->bind(':no_pendaftaran', $result);
            $this->db->bind(':asal_sekolah', $_POST['asal_sekolah']);
            $this->db->bind(':npsn_sekolah_asal', '');
            $this->db->bind(':nisn', $_POST['nisn']);
            $this->db->bind(':nik', '');
            $this->db->bind(':nisn', $_POST['nisn']); 
            $this->db->bind(':biaya_sekolah', ''); 
            $this->db->bind(':sd', '');
            $this->db->bind(':smp', '');
            $this->db->bind(':kip', $_POST['kip'] == "" ? "-" : $_POST['kip']);
            $this->db->bind(':cita_cita', $_POST['cita_cita']);
            $this->db->bind(':hobi', $_POST['hobi']);
            $this->db->bind(':anak_ke', $_POST['anak_ke']);
            $this->db->bind(':transportasi', "");
            $this->db->bind(':jarak_sekolah', "");
            $this->db->bind(':waktu_tempuh', "");
            $this->db->bind(':jml_saudara', $_POST['jml_saudara']);
            $this->db->bind(':no_kk', '');
            $this->db->bind(':kepala_keluarga', '');
            $this->db->bind(':status', 0); 
            $this->db->bind(':jurusan', $_POST['jurusan']);
            $this->db->bind(':kelas_awal', $_POST['kelas_awal']);
            $this->db->bind(':alasan_pindah', $_POST['alasan_pindah']);
            $this->db->bind(':jenis_daftar', $_POST['jenis_daftar']);
            $this->db->bind(':created_at', $created_at);
            // var_dump("MASUK IF");
            // die();
        }else{
            
            $id_person                 = $_POST['id_person'];
            $no_pendaftaran            = $result;
            $asal_sekolah              = $_POST['asal_sekolah'];
            $npsn_sekolah_asal         = '';
            $nisn                      = $_POST['nisn'];
            $nik                       = '';
            $nisn                      = $_POST['nisn'];
            $biaya_sekolah             = '';
            $sd                        = ''; 
            $smp                       = '';
            $kip                       = $_POST['kip'];
            $cita_cita                 = $_POST['cita_cita'];
            $hobi                      = $_POST['hobi'];
            $anak_ke                   = $_POST['anak_ke'];
            $transportasi              = "";
            $jarak_sekolah             = "";
            $waktu_tempuh              = "";
            $jml_saudara               = $_POST['jml_saudara'];
            $no_kk                     = '';
            $kepala_keluarga           = '';
            $jurusan                   = $_POST['jurusan'];
            $kelas_awal                   = $_POST['kelas_awal'];
            $alasan_pindah                   = $_POST['alasan_pindah'];
            $jenis_daftar                   = $_POST['jenis_daftar'];

            $query = "UPDATE siswa SET no_pendaftaran='$no_pendaftaran', asal_sekolah='$asal_sekolah', npsn_sekolah_asal='$npsn_sekolah_asal',nisn='$nisn', nik='$nik', biaya_sekolah='$biaya_sekolah', sd='$sd', smp='$smp', kip='$kip', cita_cita='$cita_cita', hobi='$hobi', anak_ke='$anak_ke', transportasi='$transportasi', jarak_sekolah='$jarak_sekolah', waktu_tempuh='$waktu_tempuh', jml_saudara='$jml_saudara', no_kk='$no_kk', kepala_keluarga='$kepala_keluarga', jurusan='$jurusan', kelas_awal='$kelas_awal', alasan_pindah='$alasan_pindah', jenis_daftar='$jenis_daftar', updated_at='$created_at' WHERE id_siswa='$id_siswa' ";
            // var_dump($query);
            // die();
            $this->db->query($query);
        }
 
        $this->db->execute();
        return $this->db->rowCount();
        
    }
 
    public function editStatus(){
        $id_siswa = $_POST['det_id_siswa'];
        $stat = (int)$_POST['edit_stat_siswa'];
        try{
            $sqlS = "UPDATE siswa SET st=$stat WHERE id_siswa=:id_siswa";
            $this->db->query($sqlS);
            $this->db->bind(':id_siswa', $id_siswa);
            $this->db->single();

            $this->db->execute();
            // return $this->db->rowCount();
            return 1;
        }catch(Exception $e){
            return 0;
        }
    }

    public function getData(){
        $query = "SELECT COUNT(*) as total_rows FROM siswa WHERE st=0";
        $this->db->query($query);
        $result = $this->db->single();
        return $result['total_rows'];
    }

    public function getDaftar(){
        $query = "SELECT COUNT(*) as total_rows 
                    FROM siswa s 
                    INNER JOIN person p ON s.id_person = p.id_person 
                    LEFT JOIN berkas k ON p.id_berkas = k.id_berkas 
                    LEFT JOIN parents z ON z.id_siswa = s.id_siswa
                  ";
        $this->db->query($query);

        $result = $this->db->single();
 
        return $result['total_rows'];
    }

    public function getUser(){
        $query = "SELECT COUNT(*) as total_rows FROM user";
        $this->db->query($query);

        $result = $this->db->single();

        return $result['total_rows'];
    }

    public function count(){

        $sql = "SELECT 
                SUM(CASE WHEN s.jurusan = 'Akuntansi' THEN 1 ELSE 0 END) AS akuntansi,
                SUM(CASE WHEN s.jurusan = 'Penjualan' THEN 1 ELSE 0 END) AS penjualan,
                SUM(CASE WHEN s.jurusan = 'Administrator Perkantoran' THEN 1 ELSE 0 END) AS administrator_perkantoran
                FROM siswa s
                INNER JOIN person p ON s.id_person = p.id_person 
                LEFT JOIN berkas k ON p.id_berkas = k.id_berkas 
                LEFT JOIN parents z ON z.id_siswa = s.id_siswa;

        ";
        $this->db->query($sql);
        $this->db->execute();
        $record = $this->db->single();

        return $record;
    }

    public function getLap($id){
 
        $sql = "SELECT a.*, b.*, c.* FROM siswa a 
                LEFT JOIN person b ON a.id_person=b.id_person
                LEFT JOIN parents c ON a.id_siswa=c.id_siswa
                WHERE a.id_siswa=$id
                LIMIT 1";
        $this->db->query($sql);
        $this->db->execute();
        $record = $this->db->single();

        // var_dump($record);
        // die();

        return $record;

    }

}
