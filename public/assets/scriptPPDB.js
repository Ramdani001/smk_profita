function nextPage(p){
    // Button
    var dataDiri = document.getElementById('sub_dataDiri');
    var alamat = document.getElementById('sub_alamat');
    var orangTua = document.getElementById('sub_orangtua');
    var fotoUpload = document.getElementById('sub_fotoUpload')

    // Form
    var form_dataDiri = document.getElementById('form-diri');
    var form_alamat = document.getElementById('form-alamat');
    var form_orangtua = document.getElementById('form-orangtua');
    var form_foto = document.getElementById('form-foto');

    if(p == 1){
        // Page alamat active
        dataDiri.classList.remove('btn-primary');
        dataDiri.classList.add('btn-secondary');
        
        // Alamat
        alamat.classList.remove('btn-secondary');
        alamat.classList.add('btn-primary');
        
        // Form
        form_dataDiri.classList.add('d-none');
        form_alamat.classList.remove('d-none');
    }else if(p == 11){
        // Back Page Data Diri
        dataDiri.classList.add('btn-primary');
        dataDiri.classList.remove('btn-secondary');
        
        // Alamat
        alamat.classList.add('btn-secondary');
        alamat.classList.remove('btn-primary');
        
        // Form
        form_dataDiri.classList.remove('d-none');
        form_alamat.classList.add('d-none');
    }else if(p == 2){
        // Page Orang tua active

        orangTua.classList.add('btn-primary');
        orangTua.classList.remove('btn-secondary');

        alamat.classList.remove('btn-primary');
        alamat.classList.add('btn-secondary');

        // Form
        form_alamat.classList.add('d-none');
        form_orangtua.classList.remove('d-none');
        
    }else if(p == 21){
        orangTua.classList.remove('btn-primary');
        orangTua.classList.add('btn-secondary');

        alamat.classList.add('btn-primary');
        alamat.classList.remove('btn-secondary');

        // Form
        form_alamat.classList.remove('d-none');
        form_orangtua.classList.add('d-none');
    }else if(p == 3){
        // Page Orang tua active

        fotoUpload.classList.add('btn-primary');
        fotoUpload.classList.remove('btn-secondary');

        orangTua.classList.remove('btn-primary');
        orangTua.classList.add('btn-secondary');

        // Form
        form_orangtua.classList.add('d-none');
        form_foto.classList.remove('d-none');
        
    }else if(p == 31){
        fotoUpload.classList.remove('btn-primary');
        fotoUpload.classList.add('btn-secondary');

        orangTua.classList.add('btn-primary');
        orangTua.classList.remove('btn-secondary');

        // Form
        form_orangtua.classList.remove('d-none');
        form_foto.classList.add('d-none');
    }

}


