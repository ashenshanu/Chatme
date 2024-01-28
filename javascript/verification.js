const form = document.querySelector(".verification form"),
continueBtn = form.querySelector(".button button"),
errorText = form.querySelector(".error-text"),
resendBtn = form.querySelector(".button #resend"),
buttonText = form.querySelector(".button button span"),
buttonLoading = form.querySelector(".button button img");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
  buttonText.style.display = "none";
  buttonLoading.style.display = "block";
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/verification.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href = "login.php";
              }else{
                buttonLoading.style.display = "none";
                buttonText.style.display = "block";
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
resendBtn.onclick = ()=>{
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/resend-code.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;
            if(data === "success"){
              location.href = "verification.php";
            }else{
              errorText.style.display = "block";
              errorText.textContent = data;
            }
        }
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);
}