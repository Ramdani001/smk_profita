<style>
    @media print {
        #setting{
            display: none;
            @page: 0;
        }
    }
</style>
<!-- Setting -->
 <div id="setting">
    <div>
        <button type="button" id="cetak" style="padding: 2px 20px;">Cetak</button>
        <button type="button" id="download" style="padding: 2px 20px;">Download</button>
    </div>
 </div>
<!-- Setting -->

<header style="margin: 20px;">
        <div style="display: flex; gap: 30px; justify-content: center; align-items: center; border-bottom: 2px solid black;">
            <div>
                <img src="<?= BASEURL ?>public/assets/img/logo.png" alt="" style="width: 150px;">
            </div>
            <div style="text-align: center;">
                <h3>PEMERINTAH KOTA BANDUNG</h3>
                <h1 style="margin-top: -10px;">SMK PROFITA BANDUNG</h1>
                <div style="margin-top: -10px;">Jl. Pajagalan No.67, Karanganyar, Kec. Astanaanyar, Kota Bandung, Jawa Barat 40241</div>
            </div>
        </div>

        <div style="text-align: center;">
            <h3>
                <b>KEPUTUSAN <br>
                    KEPALA SEKOLAH SMK PROFITA BANDUNG
                </b>
            </h3>
            <div style="margin-top: -15px;">
                Nomor : 421.2/047-SMK/Kp.01/VI/2015
            </div>
        </div>

        <!-- Isi -->
        <div style="margin: 50px;">
            <span>Yang bertandatangan di bawah ini, kepala sekolah <b>SMK PROFITA BANDUNG</b> : </span>
            <div style="margin-top: 20px; margin-left: 20px;">
                <div style="display: flex; margin-top: 10px;">
                    <span style="width: 150px;">Nama</span>
                    <span style="width: 10px;">:</span>
                    <span>
                        <b>A Rahmat Nirwana, S.Pd.</b>
                    </span>
                </div>
                <div style="display: flex; margin-top: 10px;">
                    <span style="width: 150px;">NIS/NIP</span>
                    <span style="width: 10px;">:</span>
                    <span> - </span>
                </div>
                <div style="display: flex; margin-top: 10px;">
                    <span style="width: 150px;">Jabatan</span>
                    <span style="width: 10px;">:</span>
                    <span> Kepala Sekolah </span>
                </div>
                <div style="display: flex; margin-top: 10px;">
                    <span style="width: 150px;">Alamat</span>
                    <span style="width: 10px;">:</span>
                    <span>
                        Jl. Pajagalan No.67, Karanganyar, Kec. Astanaanyar, Kota Bandung, Jawa Barat 40241
                    </span>
                </div>
            </div>

            <!-- Siswa -->
            <div style="margin-top: 30px;">
                <span>Dalam rangka penerimaan siswa-siswi baru SMK Profita Bandung T.P 2024/2025 Menerangkan bahwa :</span>
                <div style="margin-top: 20px; margin-left: 20px;">
                    <div style="display: flex; margin-top: 10px;">
                        <span style="width: 150px;">Nama</span>
                        <span style="width: 10px;">:</span>
                        <span>
                            <b>
                                <?= $data['person']['nama'] ?>
                            </b>
                        </span>
                    </div>
                    <div style="display: flex; margin-top: 10px;">
                        <span style="width: 150px;">NIS/NISN</span>
                        <span style="width: 10px;">:</span>
                        <span> <?= $data['person']['nama'] ?> </span>
                    </div>
                    <div style="display: flex; margin-top: 10px;">
                        <span style="width: 150px;">Tempat, Tanggal Lahir</span>
                        <span style="width: 10px;">:</span>
                        <span> <?= $data['person']['tempat_lhir'] ?>, <?= $tanggal_format = date('d-m-Y', strtotime($data['person']['tanggal_lahir']))?> </span>
                    </div>
                    <div style="display: flex; margin-top: 10px;">
                        <span style="width: 150px;">Jenis Kelamin</span>
                        <span style="width: 10px;">:</span>
                        <span>
                            <?= $data['person']['jk'] ?>
                        </span>
                    </div>
                    <div style="display: flex; margin-top: 10px;">
                        <span style="width: 150px;">Asal Sekolah</span>
                        <span style="width: 10px;">:</span>
                        <span>
                        <?= $data['siswa']['asal_sekolah'] ?>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Siswa -->

            <!-- Status -->
            <div>
                <p>
                    Dengan ini telah dinyatakan di <b>
                        <?php 
                            if($data['siswa']['st'] == 1)
                                {
                                    echo 'DITERIMA / LULUS';
                                }else{
                                    echo "DITOLAK / TIDAK LULUS";
                                } 
                                ?>
                                </b> di SMK Profita Bandung demikian surat pemberitahuan ini kami sampaikan terimakasih
                </p>
            </div>
            <!-- Status -->

            <!-- TTD -->
            <div style="display: grid; justify-content: end; align-items: center; margin-top: 60px;">
                <div style="display: grid; justify-content: end;">
                    <span>Bandung, 20 Juli 2024</span>
                </div>

                <!-- img  -->
                <!-- ttd -->
                <div style="display: flex; justify-content: end; margin: 15px;">
                    <div style="">
                        <img src="<?= BASEURL ?>public/assets/img/ttd.png" alt="" style="width: 150px;" >
                    </div>
                </div>
                <!-- img  -->

                <b>
                    <u>A Rahmat Nirwana, S.Pd.</u>
                </b>

            </div>
            <!-- TTD -->

        </div>
        <!-- Isi -->
    </header>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>


    <script>

        let cetak = document.getElementById('cetak');
        let download = document.getElementById('download');

        cetak.addEventListener('click', () => {
            window.print();
        });


        // Download PDF
        document.getElementById('download').addEventListener('click', function () {
        const { jsPDF } = window.jspdf;

      html2canvas(document.querySelector('header')).then(canvas => {
            const imgData = canvas.toDataURL('image/png');
            const doc = new jsPDF({
                orientation: 'portrait',
                unit: 'mm',
                format: 'a4'
            });

            const imgProps= doc.getImageProperties(imgData);
            const pdfWidth = doc.internal.pageSize.getWidth();
            const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

            doc.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
            doc.save('Surat Pernyataan.pdf');
        });
        });

    </script>