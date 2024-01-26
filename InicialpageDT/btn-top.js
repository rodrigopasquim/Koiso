window.addEventListener('scroll', function() {
    let scroll = document.querySelector('#ScrollTop')
        scroll.classList.toggle('active', window.scrollY > 450)
})

function backtop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    })
}