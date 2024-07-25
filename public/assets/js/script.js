const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));



// =============================================
document.querySelector('#courses').addEventListener('click', function (event) {
    document.querySelector('#courses-drop').classList.toggle('nav-drop-active');
    document.querySelector('#xoay-1').classList.toggle('active-xoay');
});
document.querySelector('#books').addEventListener('click', function (event) {
    document.querySelector('#books-drop').classList.toggle('nav-drop-active');
    document.querySelector('#xoay-2').classList.toggle('active-xoay');
});

// JavaScript
// document.getElementById('toggleButton').addEventListener('click', function () {
//     document.getElementById('hiddenSidebar').classList.toggle('active');
//     document.getElementById('hiddenArticle').classList.toggle('active');
// });
