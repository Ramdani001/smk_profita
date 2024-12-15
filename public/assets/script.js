$(document).ready(() => {
    $('#textProfile').addClass('text-left');
    // Active Event Button Profile
        changeProf("p");

    $('#emailLogin').focus();

    

});

function changeProf(e){
    var active = $('#active-bg');

    if(e == "p"){

        $('#btnProfile').addClass('active-chose');

        active.removeClass('d-none');

        $('#textProfile').removeClass('d-none');
        $('#textSambutan').addClass('d-none');
        
        active.removeClass('active-sambutan');
        active.addClass('active-profile');
    }else{
        
        $('#btnProfile').removeClass('active-chose');

        $('#textProfile').addClass('d-none');
        $('#textSambutan').removeClass('d-none');
        $('#textSambutan').addClass('activeText');
        
        active.removeClass('d-none');
        active.removeClass('active-profile');
        active.addClass('active-sambutan');
        
        console.log("Console Event Sambutan");
    }

}

function auth(e){   
    console.log(e); 
  if(e == 'login'){
    console.log("BTN Login");
    document.getElementById('login').classList.add('d-flex');
    document.getElementById('login').classList.remove('d-none');

    document.getElementById('daftar').classList.add('d-none');
    document.getElementById('daftar').classList.remove('d-flex');
  }else{
    console.log("BTN register");

    document.getElementById('login').classList.remove('d-flex');
    document.getElementById('login').classList.add('d-none');

    document.getElementById('daftar').classList.remove('d-none');
    document.getElementById('daftar').classList.add('d-flex');
  }
}


