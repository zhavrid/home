document.addEventListener('DOMContentLoaded', function() {
    const reg = document.querySelector('.reg');
    const popap = document.querySelector('#modalSignin');
    const close = document.querySelector('.close');
    
    reg.addEventListener('click', function(){
        popap.style.display = "flex";
        document.body.classList.add("disablescroll")
    });

    close.addEventListener('click', function(){
        popap.style.display = "none";
        document.body.classList.remove("disablescroll")
    });



    const login = document.querySelector('.login');
    const popaps = document.querySelector('#modalSignins');
    const closes = document.querySelector('.closes');

    login.addEventListener('click', function(){
        popaps.style.display = "flex";
        document.body.classList.add("disablescroll")
    });

    closes.addEventListener('click', function(){
        popaps.style.display = "none";
        document.body.classList.remove("disablescroll")
    });
})


