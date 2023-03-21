const navBarToggle = document.getElementById('navBarTog')
const headerEl = document.getElementById('header')
const mainEl = document.getElementById('main')


navBarToggle.addEventListener('click', function(){
    headerEl.classList.toggle('d-none')
})