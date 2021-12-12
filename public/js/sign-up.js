const form = document.querySelector('.signup form'),
continueBtn = document.querySelector('.button'),
errorText = document.querySelector('.error-txt');

form.onsubmit = (e) => {
    e.preventDefault();  
}
continueBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/signupValid.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data === 'success'){
                    location.href = 'user.php';
                }else{
                    errorText.textContent = data;
                    errorText.style.display = 'block';
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}