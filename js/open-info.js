const openBtns = document.querySelectorAll('.advantages__item');
const closeBtns = document.querySelectorAll('.info__close');
// let closeBtn = document.querySelector('.info__close');
let infoClub = document.getElementById("info-club");
let infoBuddy = document.getElementById("info-buddy");
let infoTeacher = document.getElementById("info-teacher");
let infoQuests = document.getElementById("info-quests");


const infoList = [infoTeacher, infoClub, infoBuddy, infoQuests]
for (let i = 0; i < openBtns.length; i++) {

    const closeBtn = infoList[i].querySelector(".info__close");

    openBtns[i].addEventListener("click", function () {
        infoList[i].style.display = 'block';

    });

    closeBtn.addEventListener("click", function () {
        infoList[i].style.display = 'none';
    });
}
// openBtns.forEach(button => {
//
// });

// closeBtn.addEventListener("click", function(){
//     infoBlock.style.display = 'none';
// });