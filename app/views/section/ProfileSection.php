<section id="profileSection" class="w-100 h-100">
    <div class="profileContent d-flex gap-5 p-5 align-items-center" style=' height: 100vh; background-repeat: no-repeat; background-position: center;'>
         
        <div class="kepsek w-50 h-100" style="display: grid; place-items: center;">
            <img src="<?= BASEURL ?>public/assets/img/kepsek.jpg" alt="" class="shadow-lg border border-3 border-light">
        </div>
        <div class="right-profile w-50">
            <!-- yang ini -->

            <div class="pb-2 text-center d-flex gap-2 mb-5 " style="width: 165px; border-bottom: 2px groove gray; z-index: 2;">
                <div class="d-none" id="active-bg">
                    &nbsp;
                </div>
                <!-- <button onclick="changeProf('p')" id="btnProfile" type="button" style="z-index: 2; background-color: transparent; padding: 2px 10px; border: none;">
                    Profile 
                </button>  -->
                <button onclick="changeProf('s')" id="btnSambutan" type="button" style="z-index: 2; background-color: transparent; padding: 2px 10px; border: none;">Sambutan</button>
            </div>
            <p id="textProfile">
            Pengantar Kepala Sekolah. Sebagai lembaga pendidikan, SMK PROFITA BANDUNG tanggap dengan perkembangan teknologi tersebut. Dengan dukungan SDM/Guru (lihat :Tenaga Pendidik dan lihat : Tenaga Kependidikan) yang di miliki sekolah ini siap untuk berkompetisi dengan sekolah lain dalam pelayanan informasi publik. Teknologi Informasi Web khususnya, menjadi sarana bagi SMK PROFITA BANDUNG untuk memberi pelayanan informasi secara cepat, jelas, dan akuntable. Dari layanan ini pula, sekolah siap menerima saran dari semua pihak yang akhirnya dapat menjawab Kebutuhan masyarakat.
            </p>
            <!-- Yang ini -->
            <!-- <p id="textSambutan" class="d-none h-100">
                Lorem ipsum dolor Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium repellat rerum laborum, eum atque mollitia quisquam! Nostrum molestias, illo reiciendis rerum unde, aliquam numquam rem quis quas similique sunt laudantium dignissimos, non earum! Asperiores inventore dolor illo fuga, commodi laborum sapiente ab repellendus velit, voluptates eius corrupti quod nulla aliquid.
            </p>  -->
        </div>

    </div>
</section>