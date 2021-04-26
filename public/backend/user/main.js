let changePass = document.querySelector('.change-pass');
let hideChangePass = document.querySelector('.hide-change-pass');
let showChangePass = document.querySelector('.show-change-pass');
changePass.style.display = "none";
hideChangePass.style.display = "none";

showChangePass.onclick = () => {
    showChangePass.style.display = "none";
    changePass.style.display = "block";
    hideChangePass.style.display = "block";
}

hideChangePass.onclick = () => {
    showChangePass.style.display = "block";
    changePass.style.display = "none";
    hideChangePass.style.display = "none";
}

//