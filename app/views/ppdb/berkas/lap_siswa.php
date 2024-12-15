<?php

    $siswa = $data['list_data'];
?>
<style>
    @media print {
        @page { margin: 0; }
        body  { margin: 1.6cm; }
    }
    b{
        color: black;
    }
</style>
<main style="margin: 20px;">
    <!-- <div style="display: grid; justify-content: end; text-align: center">
        <span style="font-size: 13px;">Nomor Pendaftaran</span>
        <span style="font-size: 15px;">
            <?= $siswa['no_pendaftaran'] ?>
        </span>
    </div> -->

    <h6 style="text-align: center; margin-top: 20px;">
        <u>
            SURAT PENDAFTARAN MURID BARU
        </u>
    </h6> 

    <!-- Top Main -->
    <div>
        <h6>
            <b>A. KETERANGAN ANAK</b>
        </h6>
        <!-- M -->
         <div style="margin-left: 20px;">
            <!-- Nama Lengkap -->
            <div style="display: flex;">
                <span style="width: 250px;">Nama Lengkap</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['nama'] ?>
                </span>
            </div>
            <!-- Jenis Kelamin -->
            <div style="display: flex;">
                <span style="width: 250px;">Jenis Kelamin</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['jk'] ?>
                </span>
            </div>
            <!-- No Telepon -->
            <div style="display: flex;">
                <span style="width: 250px;">No Telepon</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['no_telp'] ?>
                </span>
            </div>
            <!-- Tempat Lahir -->
            <div style="display: flex;">
                <span style="width: 250px;">Tempat Lahir</span>
                <span style="width: 10px;">:</span>
                <span>
                <?= $siswa['tempat_lhir'] ?>
                </span>
            </div>
            <!-- Tanggal Lahir -->
            <div style="display: flex;">
                <span style="width: 250px;">Tanggal Lahir</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['tanggal_lahir'] ?>
                </span>
            </div>
            <!-- NIK -->
            <!-- <div style="display: flex;">
                <span style="width: 250px;">NIK</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['nik'] ?>
                </span>
            </div> -->
            <!-- NISN -->
            <div style="display: flex;">
                <span style="width: 250px;">NISN</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['nisn'] ?>
                </span>
            </div>
            <!-- Agama -->
            <div style="display: flex;">
                <span style="width: 250px;">Agama</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['agama'] ?>
                </span>
            </div>
            <!-- Kewarganegaraan -->
            <div style="display: flex;">
                <span style="width: 250px;">Kewarganegaraan</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['kewarganegaraan'] ?>
                </span>
            </div>
            <!-- Anak Ke -->
            <div style="display: flex;">
                <span style="width: 250px;">Anak Ke</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['anak_ke'] ?>
                </span>
            </div>
            <!-- Jumlah Saudara/i -->
            <div style="display: flex;">
                <span style="width: 250px;">Jumlah Saudara/i</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['jml_saudara'] ?>
                </span>
            </div>
            <!-- Asal Sekolah -->
            <div style="display: flex;">
                <span style="width: 250px;">Asal Sekolah</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['asal_sekolah'] ?>
                </span>
            </div>
            <!-- Jurusan Yang Dipilih -->
            <div style="display: flex;">
                <span style="width: 250px;">Jurusan Yang Dipilih</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['jurusan'] ?>
                </span>
            </div>
            <!--  -->
         </div>
        <!-- M -->

        <!-- OT -->
         <!-- Ortu/Wali -->
         <h6 style="margin-top: 10px;">
            <b>B. ORANG TUA / WALI</b>
        </h6>
        <!-- Ortu/Wali -->

        <div style="margin-left: 20px;">
            <!-- Nama Ayah -->
            <h6>
                <b>Ayah</b>
            </h6>
            
            <div style="margin-left: 10px;">
            <div style="display: flex;">
                <span style="width: 250px;">Nama Ayah Kandung</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['nama_ayah'] ?>
                </span>
            </div>
            <!-- Tanggal Lahir Ayah -->
            <div style="display: flex;">
                <span style="width: 250px;">Tanggal Lahir</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['lhir_ayah'] ?>
                </span>
            </div>
            <div style="display: flex;">
                <span style="width: 250px;">Pendidikan</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['pendidikan_ayah'] ?>
                </span>
            </div>
            <!-- Pekerjaan -->
            <div style="display: flex;">
                <span style="width: 250px;">Pekerjaan</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['pekerjaan_ayah'] ?>
                </span>
            </div>
            <!-- Penghasilan Perbulan -->
            <div style="display: flex;">
                <span style="width: 250px;">Penghasilan Perbulan</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['penghasilan_ayah'] ?>
                </span>
            </div>

            </div>

            <!-- Ibu -->
            <h6>
                <b>Ibu</b>
            </h6>
            
            <div style="margin-left: 10px;">
                <!-- Nama Ibu -->
            <div style="display: flex;">
                <span style="width: 250px;">Nama Ibu Kandung</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['nama_ibu'] ?>
                </span>
            </div>
            <!-- Tanggal Lahir Ibu -->
            <div style="display: flex;">
                <span style="width: 250px;">Tanggal Lahir</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['lhir_ibu'] ?>
                </span>
            </div>
            <div style="display: flex;">
                <span style="width: 250px;">Pekerjaan</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['pendidikan_ibu'] ?>
                </span>
            </div>
            <div style="display: flex;">
                <span style="width: 250px;">Pekerjaan</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['pekerjaan_ibu'] ?>
                </span>
            </div>
            <!-- Penghasilan Perbulan -->
            <div style="display: flex;">
                <span style="width: 250px;">Penghasilan Perbulan</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['penghasilan_ibu'] ?>
                </span>
            </div>
            <!--  -->
            </div>

            <!-- Wali Murid -->
            <h6>
                <b>Wali Murid (Jika Ada)</b>
             </h6>
            <div style="margin-left: 10px;">
                <!-- Nama Wali -->
            <div style="display: flex;">
                <span style="width: 250px;">Nama Wali Kandung</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['name_wali'] ?>
                </span>
            </div>
            <!-- Tanggal Lahir Wali -->
            <div style="display: flex;">
                <span style="width: 250px;">No Wali</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['no_wali'] ?>
                </span>
            </div>
            <!-- Pekerjaan -->
            <div style="display: flex;">
                <span style="width: 250px;">Pekerjaan</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['pekerjaan_wali'] ?>
                </span>
            </div>
            <!-- Hubungan Dengan Siswa -->
            <div style="display: flex;">
                <span style="width: 250px;">Hubungan Dengan Siswa</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['hubungan_wali'] ?>
                </span>
            </div>
            <div style="display: flex;">
                <span style="width: 250px;">Alamat Wali</span>
                <span style="width: 10px;">:</span>
                <span>
                    <?= $siswa['alamat_wali']?>
                </span>
            </div>
            </div>
        </div>

        <!-- OT -->

    </div>
    <!-- Top Main -->

</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        window.print();
    });
</script>