const form = document.querySelector(".new_password form"),
continueBtn = form.querySelector(".button button"),
errorText = form.querySelector(".error-text"),
buttonText = form.querySelector(".button button span"),
buttonLoading = form.querySelector(".button button img");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
  buttonText.style.display = "none";
  buttonLoading.style.display = "block";
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/reset-password.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                alert("Your password is updated."); 
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
