let openBtn = document.querySelector('.header__btn');
let headerForm = document.getElementById("header-form");

openBtn.addEventListener("click", function () {
    // let infoBlock = document.getElementById("info");
    console.log(infoBlock)
    headerForm.style.display = 'grid';
    openBtn.style.display = 'none';
});