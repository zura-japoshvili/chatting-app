const pass_field = document.querySelector('.form input[type = "password"]'),
toggleBtn = document.querySelector('.form .field i');

toggleBtn.onclick = ()=> {
    if(pass_field.type == 'password'){
        pass_field.type = 'text';
        toggleBtn.classList.add("active");
    }else{
        pass_field.type = 'password';
        toggleBtn.classList.remove("active");
    }
}